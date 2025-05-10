<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//------------------------------------------
        // -> While LOOP
//------------------------------------------
        $i = 1;
        while ($i < 6) {
          echo $i. "<br>";
          $i++;
        }
//------------------------------------------
        print "<br>";
        $i = 1;
        while ($i < 6) {
          if ($i == 3) break;
          echo $i. "<br>";
          $i++;
        }
//------------------------------------------
        print "<br>";
        $i = 0;
        while ($i < 6) {
          $i++;
          if ($i == 3) continue;
          echo $i;
        }
//------------------------------------------
        // do while Loop
//------------------------------------------
        print "<br>";
        print "<br>";
        $i = 1;
        do {
          echo $i. "<br>";
          $i++;
        } while ($i < 6);
//------------------------------------------
        // for Loop
//------------------------------------------
    print "<br>";
        for ($x = 0; $x <= 10; $x++) {
            echo "The number is: $x <br>";
        }
//------------------------------------------
        // foreach Loop
//------------------------------------------
        // Loops through a block of code for each element in an array or each property in an object.
        $colors = array("red", "green", "blue", "yellow");
        foreach ($colors as $x) {
          echo "$x <br>";
        }
//------------------------------------------
        $members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        foreach ($members as $x => $y) {
          echo "$x : $y <br>";
        }
                        // Peter : 35
                        // Ben : 37
                        // Joe : 43
//------------------------------------------
        // Foreach By-reference
//------------------------------------------
        // By default, changing an array item will not affect the original array
        $colors = array("red", "green", "blue", "yellow");
        foreach ($colors as $x) {
          if ($x == "blue") $x = "pink";
        }
        // var_dump($colors);
        print_r($colors);
//------------------------------------------
        // By assigning the array items by reference, changes will affect the original array
        print("<br>");
        $colors = array("red", "green", "blue", "yellow");
        foreach ($colors as &$x) {
          if ($x == "blue") $x = "pink";
        }
        var_dump($colors);
    ?>
</body>
</html>