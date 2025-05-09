<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Tutorial</title>
</head>
<body>
    <?php
    /* 
     -> Variables are "containers" for storing information.
        - Creating (Declaring) PHP Variables
        - In PHP, a variable starts with the $ sign
        - Variable names are case-sensitive ($age and $AGE are two different variables)
        - A variable name cannot start with a number
    */ 
    $name = "Umer Farooq Jillani";  // $name is an string
    $name_2 = 'Abu Bakar Jillani';  // $name_2 is an string
    $Age = 20;      // $Age is an integer
    $x = 5;         // $x is an integer
    $y = 4;         // $y is an integer
    $a = $b = $c = "Fruit";     //Assign the multiple values
    
    echo $x + $y;
    echo "<br>";
    echo "a = $a, b = $b, c = $c";
    echo "<br>";
    echo "I Love $name.<br>";
    echo "My name is $name_2.<br>";
    echo "My age is $Age.<br>";
// --------------------------------------------------------------------------------------------
    /*
    -> PHP supports the following data types:
        - String
        - Integer
        - Float (floating point numbers - also called double)
        - Boolean
        - Array
        - Object
        - NULL
        - Resource
    */
    $cars = array("Volvo","BMW","Toyota");
    echo "$cars[0]";
    echo "<br>";
    var_dump($cars);
    echo "<br>";
    var_dump($x);   //Get the Type
    echo "<br>";
    var_dump($name); 
    echo "<br>";
    var_dump(5);
    echo "<br>";
    var_dump("John");
    echo "<br>";
    var_dump(3.14);     // Float
    echo "<br>";
    var_dump(true);     // Boolean
    echo "<br>";
    var_dump([2, 3, 56]);   //Array
    echo "<br>";
    var_dump(NULL);        //NULL
    echo "<br>";
// --------------------------------------------------------------------------------------------
    /* 
    -> PHP Variables Scope
        The scope of a variable is the part of the script where the variable can be referenced/used.
        PHP has three different variable scopes:
            - global
            - local
            - static
    */
// --------------------------------------------------------------------------------------------
    // Global Scope
    // A variable declared outside a function has a GLOBAL SCOPE and can only be 
    // accessed outside a function 
    $x = 5; // global scope
    function myTest() {
      // using x inside this function will generate an error
      echo "<p>Variable x inside function is: $x</p>";
    }
    myTest();  //fnc call
    echo "<p>Variable x outside function is: $x</p>";
// --------------------------------------------------------------------------------------------
    // Local Scope
    // A variable declared within a function has a LOCAL SCOPE and can only be accessed 
    // within that function
    function myTest_2() {
        $w = 6; // local scope
        echo "<p>Variable x inside function is: $w</p>";
      }
      myTest_2();
      
      // using x outside the function will generate an error
      echo "<p>Variable x outside function is: $w</p>";
// --------------------------------------------------------------------------------------------
    // PHP The global Keyword
    // The global keyword is used to access a global variable from within a function.
    $A = 50;
    $B = 100;
    function myTest_3() {
      global $A, $B;
      $B = $A + $B;
    }
    myTest_3();
    echo $B; // outputs 15
// --------------------------------------------------------------------------------------------
    // PHP also stores all global variables in an array called $GLOBALS[index]. 
    // The index holds the name of the variable. This array is also accessible from
    // within functions and can be used to update global variables directly.
    $x = 5;
    $y = 10;
    function myTest_4() {
      $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
    }
    myTest_4();
    echo "<br>$y"; // outputs 15
// --------------------------------------------------------------------------------------------
    // static
    // Normally, when a function is completed/executed, all of its variables are deleted. 
    // However, sometimes we want a local variable NOT to be deleted. We need it for a further job.
    // Then, each time the function is called, that variable will still have the information 
    // it contained from the last time the function was called.
    function myTest_5() {
        static $x = 0;
        echo "<p>$x</p>";
        $x++;
    }
    myTest_5();
    myTest_5();
    myTest_5();
    ?>
</body>
</html>