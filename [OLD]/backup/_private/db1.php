<?php
$location = "localhost"; 
$username = "healthlaw"; 
$password = "xaePh9cha7"; 
$database = "healthlaw"; 

// Connect to mySQL database:
$conn = mysql_connect("$location","$username","$password"); 
if (!$conn) die ("Could not connect MySQL"); 
mysql_select_db($database,$conn) or die ("Could not open database");
?>
