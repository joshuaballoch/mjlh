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

		echo '<h3 align=center>EVENEMENTS PASSES / PAST EVENTS</h3>';
		echo "<p align=center><BR><img src='images/events/operation_poster.jpg'>";
		echo "<p align=center><a href='chaoulli.php?lang=$lang'><img src='images/events/top.jpg'></a>";
		echo "<BR><h4 align=center>Thanks to all who attended the panel!";
		echo "<BR>Background materials can be found <a href='chaoulli.php?lang=$lang'>HERE</a>.</h4>";
		echo '<BR><p align=center><img src="images/events/chaoulli panel1.jpg">  <br><img src="images/events/chaoulli panel2.jpg">';
		echo '<BR><IMG SRC="images/events/bottom.jpg" title="Chaoulli - le 22 mars" alt="Chaoulli - le 22 mars">';
echo '<BR><a href="news.php">Upcoming events / &eacute;v&eacute;nements &agrave; venir</a>';		
	
echo '</div>';



?>