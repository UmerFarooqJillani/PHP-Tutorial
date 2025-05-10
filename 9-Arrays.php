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
        // Array Items
        // The most common are strings and numbers (int, float), but array items 
        // can also be objects, functions or even arrays.
        function myFunction() {
          echo "This text comes from a function";
        }
        $myArr = array("Volvo", 15, ["apples", "bananas"], myFunction());
        $myArr[3];
//------------------------------------------
        // The count() function for counting array items
        $cars = ["Volvo", "BMW", "Toyota"];
        // $cars = array("Volvo", "BMW", "Toyota");
        echo "<br>" . count($cars) . "<br>";
        $cars[1] = "Ford";
        var_dump($cars);
        // The array_push() function to add a new item, the new item will get the index 3
        array_push($cars, "Ford");
        print "<br>";
        print_r($cars);
        // If you have an array with random index numbers, like this:
        $cars[5] = "Volvo";
        $cars[7] = "BMW";
        $cars[14] = "Toyota";
        array_push($cars, "Ford");
        print "<br>";
        print_r($cars);
//------------------------------------------
        // Associative Arrays
//------------------------------------------
        print "<br>";
        print "<br>";
        $car = [
            "brand" => "Ford",
            "model" => "Mustang",
            "year" => 1964
        ];
        // $car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
        var_dump($car);
        echo "<br>" . $car["model"] . "<br>";
        
        // Loop Through an Associative Array
        foreach ($car as $x => $y) {
            echo "$x: $y <br>";
        }
//------------------------------------------
        // Add Array Item
        print "<br>";
        $fruits = ["Apple", "Banana", "Cherry"];
        $fruits[] = "Orange";
        var_dump($fruits);

        // Associative Arrays
        print "<br>";
        $cars = array("brand" => "Ford", "model" => "Mustang");
        $cars["color"] = "Red";
        print_r($cars);
//------------------------------------------
        // Delete Array Items
        print "<br>";
        $cars = array("Volvo", "BMW", "Toyota");
        // array_splice() function you specify the index (where to start) 
        // and how many items you want to delete
        array_splice($cars, 1, 1);
        // array_splice($cars, 1, 2);
        print_r($cars); print "<br>";
        unset($cars[1]);
        // unset($cars[0], $cars[1]);   //Remove the first and the second item
        // unset($cars["model"]);    // for Associative Arrays
        print_r($cars);

        // You can also use the array_diff() function to remove items from an associative array.
        $cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
        $newarray = array_diff($cars, ["Mustang", 1964]);

        // Remove the Last Item
        $cars = array("Volvo", "BMW", "Toyota");
        array_pop($cars); print "<br>";
//------------------------------------------
        // -> PHP - Sort Functions For Arrays
//------------------------------------------
        /*
        sort() - sort arrays in ascending order
        rsort() - sort arrays in descending order
        asort() - sort associative arrays in ascending order, according to the value
        ksort() - sort associative arrays in ascending order, according to the key
        arsort() - sort associative arrays in descending order, according to the value
        krsort() - sort associative arrays in descending order, according to the key
        */
        $cars = array("Volvo", "BMW", "Toyota");
        rsort($cars);
    ?>
</body>
</html>