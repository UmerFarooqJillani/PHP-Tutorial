<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // PHP has over 1000 built-in functions that can be called directly, 
        // from within a script, to perform a specific task.
//------------------------------------------
        // -> PHP User Defined Functions
//------------------------------------------
        function familyName($fname) {
            echo "$fname Refsnes.<br>";
        }
        familyName("Jani");
        familyName("Hege");
        familyName("Stale");
        familyName("Kai Jim");
        familyName("Borge");
//------------------------------------------
        // Default Argument Value
        function setHeight($minheight = 50) {
          echo "The height is : $minheight <br>";
        }
        setHeight(350);
        setHeight(); // will use the default value of 50
//------------------------------------------
        // Returning values
        function sum($x, $y) {
           $z = $x + $y;
           return $z;
        }
        echo "5 + 10 = " . sum(5, 10) . "<br>";
        echo "7 + 13 = " . sum(7, 13) . "<br>";
//------------------------------------------
        // Passing Arguments by Reference
        function add_five(&$value) {
          $value += 5;
        }
        $num = 2;
        add_five($num);
        echo $num;
//------------------------------------------
        // -> Variable Number of Arguments
        // By using the ... operator in front of the function parameter, 
        // the function accepts an unknown number of arguments. This is also called a variadic function.
        // The variadic function argument becomes an array.
        print "<br>". "variadic function" . "<br>";
        function sumMyNumbers(...$x) {
        // function myFamily($lastname, ...$firstname){
          $n = 0;
          $len = count($x);
          //echo "$len";
          for($i = 0; $i < $len; $i++) {
            $n += $x[$i];
          }
          return $n;
        }
        $a = sumMyNumbers(5, 2, 6, 2, 7, 7);
        echo $a;
        print "<br>";
//------------------------------------------
        // Build-in Function in PHP
        // isset() = Return TRUE if a variable is declared and not null 
        $userName = "Umer Farooq Jillani";
        if(isset($userName)){
                print "This variable is set";
        }else{
                print "This variable is not set";
        }
        // empty() = Return True if a variable is not declared, false, null, "" 
        $Name = "";
        if(empty($Name)){
                print "<br>This variable is empty";
        }else{
                print "<br>This variable is : $Name";
        }
    ?>
</body>
</html>