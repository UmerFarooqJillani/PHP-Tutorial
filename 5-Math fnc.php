<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        print(pi() . "<br>");  // The pi() function returns the value of PI
        echo(min(0, 150, 30, 20, -8, -200) . "<br>");
        print(max(0, 150, 30, 20, -8) . "<br>");
        print(abs(-6.7)."<br>");  // The abs() function returns the absolute (positive) value of a number
        echo(sqrt(64)."<br>");

        // The round() function rounds a floating-point number to its nearest integer
        echo(round(0.60). "<br>");
        echo(round(0.49). "<br>");

        // Random Numbers
        echo(rand(). "<br>");
        echo(rand(0, 100));
    ?>
</body>
</html>