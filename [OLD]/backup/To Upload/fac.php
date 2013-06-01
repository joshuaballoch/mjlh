<?php
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
//include '_private/db1.php';
//include '_private/constants.php';
//include 'login.php';
include 'header.php';

echo '<head><link rel="stylesheet" href="style.css" type="text/css" /></head>';

// CONSTANTS
$lang = $_GET[lang];

//************* MAIN PAGE *************
echo '<div id="main">';

	if ($lang == "fr")
	{
		echo '<title>PDSM : facult&#233</title>';
		echo '<h3 align=center>COMITE CONSULTATIF DE FACULTE</h3>';
		?>
		<p align=center>
		<BR><a href="http://people.mcgill.ca/angela.campbell/">Angela Campbell</a>
		<BR>Pierre Deschamps
		<BR>Derek Jones
		<BR><a href="http://people.mcgill.ca/nicholas.kasirer/">Nicholas Kasirer</a>
 		<BR><a href="http://people.mcgill.ca/lara.khoury/">Lara Khoury</a>
 		<BR><a href="http://people.mcgill.ca/marie-claude.premont/">Marie-Claude Pr&#233mont</a>
 		<BR><a href="http://people.mcgill.ca/margaret.somerville/">Margaret Somerville</a>
		<?php
	}
	else
	{
		echo '<title>MHLP : faculty</title>';
		echo '<h3 align=center>FACULTY ADVISORY BOARD</h3>';
		?>
		<p align=center>
		<BR><a href="http://people.mcgill.ca/angela.campbell/">Angela Campbell</a>
		<BR>Pierre Deschamps
		<BR>Derek Jones
		<BR><a href="http://people.mcgill.ca/nicholas.kasirer/">Nicholas Kasirer</a>
 		<BR><a href="http://people.mcgill.ca/lara.khoury/">Lara Khoury</a>
 		<BR><a href="http://people.mcgill.ca/marie-claude.premont/">Marie-Claude Pr&#233mont</a>
 		<BR><a href="http://people.mcgill.ca/margaret.somerville/">Margaret Somerville</a>
		<?php
	}
	
echo '</div>';

?>