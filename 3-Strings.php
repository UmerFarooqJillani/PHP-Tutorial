<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* -> String in PHP: 
            A string is a sequence of characters, like "Hello world!".
    */
    $a = "Umer Farooq Jillani";
    print "Hello! $a";          // Double quoted strings perform action on special characters
    print '<br>Hello! $a <br>';      // Single quoted string literals returns the string as it is

    //--------------------------------------------------------------
    // -> String Functions in PHP

    print strlen("$a");   // String Length
    print "<br>" . str_word_count("Umer Farooq Jillani!");          // Word Count

    // If a match is found, the function returns the character position of the first match. 
    // If no match is found, it will return FALSE.
    // Search for the text "Farooq" in the string "Umer Farooq Jillani"
    echo "<br>" . strpos("Umer Farooq Jillani", "Farooq"); 

    print "<br>" . strtoupper("$a");    // Upper Case
    print "<br>" . strtolower("$a");     // Lower Case
    print "<br>" . str_replace("Jillani", "Samdani", "$a"); // Replace the text "Jillani" with "Samdani"

    $s = "Umer Farooq Jillani Jillani";
    print "<br>" . str_replace("Jillani", "Samdani", "$s");  // Replace the text "Jillani" with "Samdani"
    print "<br>" . strrev("$a");  // Reverse a String
    print "<br>" . trim("$a"); // The trim() removes any whitespace from the beginning or the end

    // Convert String into Array
    $y = explode(" ", $a);
    $z = explode("a", $a);
    echo "<br>";
    print_r($y);  echo "<br>"; // Use the print_r() function to display the result
    print "$y[0]"; echo "<br>";
    print_r($z);  echo "<br>";

    // Slicing Strings
    // The first character has index 0.
    print substr($a, 6, 5);  // Start the slice at index 6 and end the slice 5 positions later
    print "<br>" . substr($a, 6); // Start the slice at index 6 and go all the way to the end
    // The last character has index -1 (or) total_index - 5 = start this index
    print "<br>" . substr($a, -5, 3); // Get the 3 characters, starting from the "l" in world (index -5)
    echo "<br>" . substr($a, 5, -3);  // Farooq Jill


    



        





    ?>
</body>
</html>