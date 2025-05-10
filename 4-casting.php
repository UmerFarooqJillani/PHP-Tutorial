<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "hello"; // String
        $d = true;    // Boolean
        $e = NULL;    // NULL
        $f = "25 kilometers"; // String
        $g = "kilometers 25"; // String
        $h = 0;       // Integer
        $i = -1;      // Integer
        $j = 0.1;     // Float
        $k = "";      // String

        $a = (string) $a;
        $b = (string) $b;
        $c = (string) $c;
        $d = (string) $d;
        $e = (string) $e;
        $f = (string) $f;
        $g = (string) $g;
        $h = (string) $h;
        $i = (string) $i;
        $j = (string) $j;
        $k = (string) $k;

        $a = (int) $a;
        $b = (int) $b;
        $c = (int) $c;
        $d = (int) $d;
        $e = (int) $e;
        $f = (int) $f;
        $g = (int) $g;
        $h = (int) $h;
        $i = (int) $i;
        $j = (int) $j;
        $k = (int) $k;

        $a = (float) $a;
        $b = (float) $b;
        $c = (float) $c;
        $d = (float) $d;
        $e = (float) $e;
        $f = (float) $f;
        $g = (float) $g;
        $h = (float) $h;
        $i = (float) $i;
        $j = (float) $j;
        $k = (float) $k;

        $a = (bool) $a;
        $b = (bool) $b;
        $c = (bool) $c;
        $d = (bool) $d;
        $e = (bool) $e;
        $f = (bool) $f;
        $g = (bool) $g;
        $h = (bool) $h;
        $i = (bool) $i;
        $j = (bool) $j;
        $k = (bool) $k;

        //To verify the type of any object in PHP, use the var_dump() function:
        print "a = ( $a ) ------- Cast ------- "; echo var_dump($a) . "<br>"; 
        print "b = ( $b ) ------- Cast ------- "; echo var_dump($b) . "<br>"; 
        print "c = ( $c ) ------- Cast ------- "; echo var_dump($c) . "<br>"; 
        print "d = ( $d ) ------- Cast ------- "; echo var_dump($d) . "<br>"; 
        print "e = ( $e ) ------- Cast ------- "; echo var_dump($e) . "<br>"; 
        print "f = ( $f ) ------- Cast ------- "; echo var_dump($f) . "<br>"; 
        print "g = ( $g ) ------- Cast ------- "; echo var_dump($g) . "<br>"; 
        print "h = ( $h ) ------- Cast ------- "; echo var_dump($h) . "<br>"; 
        print "i = ( $i ) ------- Cast ------- "; echo var_dump($i) . "<br>"; 
        print "j = ( $j ) ------- Cast ------- "; echo var_dump($j) . "<br>"; 
        print "k = ( $k ) ------- Cast ------- "; echo var_dump($k) . "<br>"; 

        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "hello"; // String
        $d = true;    // Boolean
        $e = NULL;    // NULL
        $f = "25 kilometers"; // String
        $g = "kilometers 25"; // String
        $h = 0;       // Integer
        $i = -1;      // Integer
        $j = 0.1;     // Float
        $k = "";      // String

        $a = (array) $a;
        $b = (array) $b;
        $c = (array) $c;
        $d = (array) $d;
        $e = (array) $e;
        $f = (array) $f;
        $g = (array) $g;
        $h = (array) $h;
        $i = (array) $i;
        $j = (array) $j;
        $k = (array) $k;

        print_r($a); echo "<br>";
        print_r($b); echo "<br>";
        print_r($c); echo "<br>";
        print_r($d); echo "<br>";
        print_r($e); echo "<br>";
        print_r($f); echo "<br>";
        print_r($g); echo "<br>";
        print_r($h); echo "<br>";
        print_r($i); echo "<br>";
        print_r($j); echo "<br>";
        print_r($k); echo "<br>";
    ?>
</body>
</html>