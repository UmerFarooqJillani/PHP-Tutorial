<?php

include "connection.php";

$query = "select * from tbl_student";
$selectquery = mysqli_query($conn, $query);

$num = mysqli_num_rows($selectquery);
$html = "";
while ($row = mysqli_fetch_array($selectquery)) {

    $html .= '<tr>
		<td>' . $row['id'] . '</td>
		<td>' . $row['name'] . '</td>
		<td>' . $row['email'] . '</td>
		<td>' . $row['gender'] . '</td>
		<td><img src="uploads/' . $row['image'] . '" width="240" height="240" alt="no image"/></td>
		<td><a href="del.php?id=' . $row['id'] . '">Delete</a></td>
		<td><a href="update.php?id=' . $row['id'] . '">Update</a></td>
	</tr>';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <table width="80%" border="1">
        <tr>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Gender
            </th>
            <th>
                Image
            </th>
            <th>
                Action
            </th>
        </tr>
        <?php echo $html; ?>
    </table>
</body>

</html>