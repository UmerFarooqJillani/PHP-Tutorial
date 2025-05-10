<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//-----------------------------------
        // -> If Statement
//-----------------------------------
        $t = 14;
        $a = "14";
        if ($t === $a) {
          echo "Have a good day!";
        }
//-----------------------------------
        $a = 200;
        $b = 33;
        $c = 500;
        if ($a > $b && $a < $c ) {
          echo "<br> Both conditions are true";
        }
//-----------------------------------
        $a = 5;
        if ($a == 2 || $a == 3 || $a == 4 || $a == 5 || $a == 6 || $a == 7) {
          echo "<br> $a is a number between 2 and 7";
        }
//-----------------------------------
        // -> if...else Statement
//-----------------------------------
        $t = date("H");     // It returns the current hour in 24-hour format (from 00 to 23)
        // echo "<br>". $t ;
        print "<br>";
        if ($t < "10") {
            echo "Have a good morning!";
        } else if ($t < "20") {
          echo "Have a good day!";
        } else {
          echo "Have a good night!";
        };
//-----------------------------------
        // -> Short Hand If
//-----------------------------------
        $a = 5;
        print "<br>";
        if ($a < 10) $b = "Hello";
        echo $b;
//-----------------------------------
        // -> Ternary Operators, or Conditional Expressions
//-----------------------------------
        print "<br>";
        $a = 13;
        $b = $a < 10 ? "Hello" : "Good Bye";
        echo $b;
//-----------------------------------
        // -> switch Statement
        $favcolor = "red";
        print "<br>";
        switch ($favcolor) {
          case "red":
            echo "Your favorite color is red!";
            break;
          case "blue":
            echo "Your favorite color is blue!";
            break;
          case "green":
            echo "Your favorite color is green!";
            break;
          default:
            echo "Your favorite color is neither red, blue, nor green!";
        }
//-----------------------------------
    ?>
</body>
</html>