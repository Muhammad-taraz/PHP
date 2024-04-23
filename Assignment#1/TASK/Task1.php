<?php
   
    $a = "   Silver Point   ";

   // String to lowercase
    $a = strtolower($a);

    // Remove whitespaces
    $a = str_replace(' ', '', $a);

    // Reverse the string
    $a = strrev($a);

    echo $a;
?>
