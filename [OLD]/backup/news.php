<?php
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
//include '_private/db1.php';
//include '_private/constants.php';
//include 'login.php';
include 'header.php';

echo '<head><link rel="stylesheet" href="style.css" type="text/css" /><meta http-equiv="content-type" content="text-html; charset=utf-8"></head>';
echo '<title>MHLP : PDSM</title>';

// CONSTANTS
$lang = $_GET[lang];

//************* MAIN PAGE *************
echo '<div id="main">';

		echo '<h3 align=center>EVENEMENTS / EVENTS</h3>';
		echo "<p align=center><BR><img src='images/events/MHLP_launch.jpg'>";
		echo '<BR><a href="oldnews.php">Past events / &eacute;v&eacute;nements pass&eacute;s</a>';
		
	
echo '</div>';



?>