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
		echo '<title>contactez PDSM!</title>';
		echo '<h3 align=center>CONTACT</h3>
		<BR><p>Pour rejoindre la PDSM :
		<BR><p>3661, rue Peel
		<BR>Montr&#233al, Qu&#233bec
		<BR>H3A 1X1

		<BR><p>T&#233l&#233phone : (514) 398-5960
		<BR><p>Comit&#233 de r&#233daction : <a href="mailto:editor.mhlp@mail.mcgill.ca">editor.mhlp@mail.mcgill.ca</a>
		<BR>Comit&#233 administratif : <a href="mailto:manager.mhlp@mail.mcgill.ca">manager.mhlp@mail.mcgill.ca</a>
		';
	}
	else
	{
		echo '<title>contact MHLP!</title>';
		echo '<h3 align=center>CONTACT</h3>
		<BR><p>The MHLP team can be reached at:
		<BR><p>3661 Peel Street
		<BR>Montreal, Quebec
		<BR>H3A 1X1

		<BR><p>Telephone: (514) 398-5960
		<BR><p>Editorial Board: <a href="mailto:editor.mhlp@mail.mcgill.ca">editor.mhlp@mail.mcgill.ca</a>
		<BR>Managerial Board: <a href="mailto:manager.mhlp@mail.mcgill.ca">manager.mhlp@mail.mcgill.ca</a>
		';
	}
	
echo '</div>';

?>