<?php
// There is two type of method in form: 
    // post -> Are Secure and send the password, use in most of the cases
    //         <form action="" method="post"></form>
    // get -> get data are show in URL
    //         <form action="" method="get"></form>

$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['info'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="Container"
        style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
        <h1>Enter You Complete Details</h1>
        <?php
            if($insert == true){
                echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
            }
        ?>
        <form action="" method="post" style="display: flex; flex-direction: column;">
            <input type="text" name="name" id="name" placeholder="Enter Your Name"><br>
            <input type="number" name="age" id="age" placeholder="Enter Your Age"><br>
            <input type="email" name="email" id="email" placeholder="Enter Your Email"><br>
            <input type="tel" name="phone" id="phone" placeholder="Enter Phone Number"><br>
            <input type="password"  name="password" id="password" placeholder="Enter password"><br>
            <fieldset style="border: none;">
                Gender:
                <label for="male">
                    <input type="radio" value="male" name="gender" id="male"> Male
                </label>
                <label for="female">
                    <input type="radio" value="female" name="gender" id="female"> Female
                </label>
                <label for="other">
                    <input type="radio" value="other" name="gender" id="other"> Other
                </label>
            </fieldset>
            <textarea name="info" id="info" cols="30" rows="10"
                placeholder="Add the aditional information"></textarea><br>
            <input type="submit" value="SUBMIT">
            <input type="reset" value="RESET">
        </form>
    </section>
</body>

</html>
