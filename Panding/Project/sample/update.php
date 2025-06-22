<?php
include "connection.php";

// 1. Validate and sanitize the input
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid student ID");
}

$studentid = (int)$_GET['id']; // Force integer type

// 2. Check if the student exists first
$check_query = "SELECT id, image FROM tbl_student WHERE id = ?";
$check_stmt = mysqli_prepare($conn, $check_query);
mysqli_stmt_bind_param($check_stmt, "i", $studentid);
mysqli_stmt_execute($check_stmt);
mysqli_stmt_store_result($check_stmt);

if (mysqli_stmt_num_rows($check_stmt) == 0) {
    header("Location: select.php?status=notfound");
    exit();
}
mysqli_stmt_bind_result($check_stmt, $existing_id, $old_image_name);
mysqli_stmt_fetch($check_stmt);
mysqli_stmt_close($check_stmt);

// 3. Process form submission for update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $image_name = null;
    $upload_error = false;

    // Handle image upload if provided
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . basename($_FILES['image']['name']); // Add timestamp for uniqueness
        $target_path = "uploads/" . $image_name;

        // Delete old image if exists
        if (!empty($old_image_name) && file_exists("uploads/" . $old_image_name)) {
            unlink("uploads/" . $old_image_name);
        }

        // Upload new image
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $upload_error = true;
            $upload_error_message = "Failed to upload the new image.";
        }
    }

    // 4. Prepare the update query
    if (!$upload_error) {
        if ($image_name !== null) {
            $query = "UPDATE tbl_student SET
                        name = ?,
                        email = ?,
                        gender = ?,
                        image = ?
                        WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $gender, $image_name, $studentid);
        } else {
            $query = "UPDATE tbl_student SET
                        name = ?,
                        email = ?,
                        gender = ?
                        WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $gender, $studentid);
        }

        // 5. Execute the update
        if (mysqli_stmt_execute($stmt)) {
            header("Location: select.php?status=updated");
            exit();
        } else {
            header("Location: select.php?status=error&message=" . urlencode(mysqli_error($conn)));
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        header("Location: select.php?status=error&message=" . urlencode($upload_error_message));
        exit();
    }
}

// 6. Fetch current student data for the form
$query = "SELECT * FROM tbl_student WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $studentid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Student</title>
    <style>
        .form-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .current-image {
            max-width: 100px;
            display: block;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Update Student Record</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <select name="gender" required>
                    <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                    <option value="Other" <?= $student['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>Current Image:</label>
                <?php if (!empty($student['image'])): ?>
                    <img src="uploads/<?= htmlspecialchars($student['image']) ?>" class="current-image">
                <?php else: ?>
                    <p>No image uploaded</p>
                <?php endif; ?>

                <label>Update Image (leave blank to keep current):</label>
                <input type="file" name="image">
            </div>

            <div class="form-group">
                <input type="submit" value="Update Student">
                <a href="select.php" style="margin-left: 10px;">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php
mysqli_close($conn);
?>