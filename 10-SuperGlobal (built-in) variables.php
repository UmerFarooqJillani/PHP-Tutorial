<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!----------(1)----------------->
    <!-- <form method="post">
        Email: <input type="email" name="email" placeholder="Enter Email">
        <input type="submit">
    </form> -->
    <!-- ----------------------  comment one and check/use one by one ---------------------- -->
    <!----------(2)----------------->
    <form method="get">
        Name: <input type="text" name="name" placeholder="Enter Name">
        <input type="submit">
    </form>
    <!----------(3)----------------->
    <!-- <form method="post">
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
        <input type="submit">
        <input type="reset">
    </form> -->
    <!----------(4)----------------->
    <!-- <form method="post">
        <fieldset style="border: none;">
            <label for="male">
                <input type="checkbox" value="male" name="gender[]" id="male"> Male
            </label>
            <label for="female">
                <input type="checkbox" value="female" name="gender[]" id="female"> Female
            </label>
            <label for="other">
                <input type="checkbox" value="other" name="gender[]" id="other"> Other
            </label>
        </fieldset>
        <input type="submit" name="submit">
    </form> -->
    <?php
// ----------------------------------------------
        /*
        -> $GLOBALS
            - Stores all global variables in a single array.
            - Allows access to global variables inside functions.
        */
// ----------------------------------------------
        $x = 10;
        $y = 20;
        function add() {
            $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
        }
        add();
        // echo $z; // Output: 30
// ----------------------------------------------
        /*
        There is two type of method in form: 

        -> $_GET, $_POST 
            - Special variable used to collect data from an HTML form data is send 
                to the file in the action attribute of <form>
                    <form action="some_file.php" method="get">

        -> $_POST
            $_POST contains an array of variables received via the HTTP POST method.
            There are two main ways to send variables via the HTTP Post method:
                1. HTML forms
                2. JavaScript HTTP requests
            - Used to collect data sent via an HTML form using the POST method.
            - Data is not visible in the URL.
            - For sending secure or large amounts of data (like login forms)
            - Data is Packaged inside the body of the HTTP request
            - More Secure
            - No Data limit
            - Cannot bookmark
            - Get request are not cached
            - Better for Submitting credentials/sensitive infomation
            - Are Secure and send the password, use in most of the cases
                <form action="" method="post"></form>
                
        -> $_GET
            $_GET contains an array of variables received via the HTTP GET method.
            There are two main ways to send variables via the HTTP GET method:
                1. Query strings in the URL
                2. HTML Forms
            - Collects data sent via URL parameters using the GET method.
            - Data is visible in the URL.
            - When sending small data via URL, like search queries.
            - Not Secure
            - Char limit
            - Bookmark is possible with value
            - GET request can be cached
            - Better for a Search Page
            - get data are show in URL
                <form action="" method="get"></form>
        */
// ----------------------------------------------
            // ----------(1)-----------------
            // if (isset($_POST["email"])) {
            //     $data = $_POST["email"];
            //     echo "<br>" . $data;
            // }
            // ----------------------  comment one and check/use one by one ----------------------
            // ----------(2)-----------------
            // if (isset($_GET["name"])) {
            //     $data = $_GET["name"];
            //     echo "<br>" . $data . "<br>";
            // }

            foreach ($_GET as $key => $value){      // $_GET, $_POST is an associative array
                print "$key = $value <br>";
            }
            // ----------(3)-----------------
            // if(isset($_POST['gender'])){
            //     $checkpoint = $_POST['gender'];
            //     // echo $checkpoint;
            // }
            // switch($checkpoint){
            //     case "male":
            //         print "You select the Male.";
            //         break;
            //     case "female":
            //         print "You select the Female.";
            //         break;
            //     case "other":
            //         print "You select the Other.";
            //         break;
            //     default:
            //         print "Make sure! To select Data.";
            // }
            // ----------(4)-----------------
            if(isset($_POST['submit'])){
                $gender = $_POST['gender'];
                // print_r($gender);
                if(isset($gender[0])){
                    print "You are male. <br>";
                }
                if(isset($gender[1])){
                    print "You are female. <br>";
                }
                if(isset($gender[2])){
                    print "You are other. <br>";
                }
                if(empty($gender[0])){
                    print "You don't male. <br>";
                }
                if(empty($gender[1])){
                    print "You don't female. <br>";
                }
                if(empty($gender[2])){
                    print "You don't other. <br>";
                }
                //-----------OR----------------------
                // foreach ($gender as $gen){
                //     echo "$gen <br>";
                // }
            }
// ----------------------------------------------
/*
            
*/
// ----------------------------------------------


        
    ?>
</body>
</html>