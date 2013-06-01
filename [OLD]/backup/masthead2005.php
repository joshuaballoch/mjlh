<?php
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
//include '_private/db1.php';
//include '_private/constants.php';
//include 'login.php';
include 'header.php';

echo '<head><link rel="stylesheet" href="style.css" type="text/css" /></head>';

//************* MAIN PAGE *************
echo '<div id="main">';

	if ($lang == "fr")
	{
		echo '<title>PDSM : &#233quipe</title>';
		echo '<h3 align=center>COMIT&#201 DE R&#201DACTION 2005-2006</h3>';
		echo '<BR>
		<table border=0 width=500 align=center>
 			<tr>
 				<td colspan=2><h5 align=center>Comit&#233 de r&#233daction ex&#233cutif</h5></td>
 			</tr>
 			<tr>
 				<td colspan=2><h6 align=center>R&#233dacteurs en chef</h6></td>
 			</tr>
 			<tr align=center>
 				<td colspan=2 class=body>Daniel Ambrosini</td>
 			</tr>
 			<tr align=center>
 				<td colspan=2 class=body>Reuven Ashtar</td>
 			</tr>
 			<tr>
 				<td width=250><h6 align=center>R&#233dactrices en chef adjointes - &#201dition</h6></td>
 				<td><h6 align=center>R&#233dactrice en chef adjointe - Administration</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Caitlin Rose - English</td>
 				<td class=body>Gillian Nycum</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Catherine Simard - Fran&#231ais</td>
 			</tr>
 		</table>
		
		<BR>
		<table border=0 width=500 align=center>
 			<tr>
 				<td colspan=2><h5 align=center>Comit&#233 de r&#233daction principal</h5></td>
 			</tr>
 			<tr>
 				<td width=250><h6 align=center>R&#233dacteurs principaux</h6></td>
 				<td><h6 align=center>Directrice &#233lectronique</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Balkees Jarrah</td>
 				<td class=body>Chelsea Clogg</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Sharon Lee</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Andrew MacDonald</td>
 			</tr>
 		</table>

		<BR>
		<table border=0 align=center>
 			<tr>
 				<td colspan=3><h5 align=center>Comit&#233 de r&#233daction principal</h5></td>
 			</tr>
 			<tr>
 				<td width=166><h6 align=center>R&#233dacteurs associ&#233s</h6></td>
 				<td width=166><h6 align=center>R&#233dacteurs administratifs</h6></td>
 				<td width=166><h6 align=center>R&#233dacteurs &#233lectroniques</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Nicolas Brochu</td>
 				<td class=body>Natalie Haras</td>
 				<td class=body>Simon Grant</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Chelsea Clogg</td>
 				<td class=body>Danielle Moubarak</td>
 				<td class=body>Jennifer Wu</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Brynn Enros</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Damian Hornich</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Sybil Thompson</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Marc-Alexandre Tremblay</td>
 			</tr>
  			<tr align=center>
 				<td class=body>Josh Wilner</td>
 			</tr>
 		</table>';

	}
	else
	{
		echo '<title>MHLP : masthead</title>';
		echo '<h3 align=center>MASTHEAD 2005-2006</h3>';
		echo '<BR>
		<table border=0 width=500 align=center>
 			<tr>
 				<td colspan=2><h5 align=center>Executive Editorial Board</h5></td>
 			</tr>
 			<tr>
 				<td colspan=2><h6 align=center>Editors-in-Chief</h6></td>
 			</tr>
 			<tr align=center>
 				<td colspan=2 class=body>Daniel Ambrosini</td>
 			</tr>
 			<tr align=center>
 				<td colspan=2 class=body>Reuven Ashtar</td>
 			</tr>
 			<tr>
 				<td width=250><h6 align=center>Executive Editors</h6></td>
 				<td><h6 align=center>Executive Managing Editor</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Caitlin Rose - English</td>
 				<td class=body>Gillian Nycum</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Catherine Simard - Fran&#231ais</td>
 				<td><h6 align=center>Web Director</h6></td>
 			</tr>
 			<tr align=center>
 				<td></td>
 				<td class=body>Chelsea Clogg</td>
 			</tr>
 		</table>
		
		<BR>
		<table border=0 width=500 align=center>
 			<tr>
 				<td colspan=2><h5 align=center>Senior Editorial Board</h5></td>
 			</tr>
 			<tr>
 				<td width=250><h6 align=center>Senior Editors</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Balkees Jarrah</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Sharon Lee</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Andrew MacDonald</td>
 			</tr>
 		</table>

		<BR>
		<table border=0 align=center>
 			<tr>
 				<td colspan=3><h5 align=center>Junior Editorial Board</h5></td>
 			</tr>
 			<tr>
 				<td width=166><h6 align=center>Junior Editors</h6></td>
 				<td width=166><h6 align=center>Managing Editors</h6></td>
 				<td width=166><h6 align=center>Web Editors</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Nicolas Brochu</td>
 				<td class=body>Natalie Haras</td>
 				<td class=body>Simon Grant</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Chelsea Clogg</td>
 				<td class=body>Danielle Moubarak</td>
 				<td class=body>Jennifer Wu</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Brynn Enros</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Damian Hornich</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Sybil Thompson</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Marc-Alexandre Tremblay</td>
 			</tr>
  			<tr align=center>
 				<td class=body>Josh Wilner</td>
 			</tr>
 		</table>';
	}

	
		
echo '</div>';



?>