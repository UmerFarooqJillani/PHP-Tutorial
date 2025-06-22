<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
</head>

<body>
    <h2>Student Registration Form</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Gender:</label><br>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br><br>

        <label>Upload Image:</label><br>
        <input type="file" name="image" accept="image/*" required><br><br>

        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    include "connection.php";
    // ✅ Only run this if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Get form data safely
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $gender = $_POST['gender'] ?? '';

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_path = "uploads/" . $image_name;

            // Create uploads folder if not exists
            if (!file_exists("uploads")) {
                mkdir("uploads");
            }

            move_uploaded_file($image_tmp, $image_path);
        } else {
            $image_name = ''; // fallback if upload fails
        }

        // Connect to database
        $conn = new mysqli("localhost", "root", "", "db_students");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert into tbl_student
        $sql = "INSERT INTO tbl_student (name, email, password, gender, image) 
            VALUES ('$name', '$email', '$password', '$gender', '$image_name')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Student registered successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
</body>

</html>