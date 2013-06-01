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
		echo '<title>MHLP : masthead</title>';
		echo '<h3 align=center>COMIT&#201 DE R&#201DACTION 2006-2007</h3>';
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
 				<td width=250><h6 align=center>R&#233dacteurs en chef adjoints</h6></td>
 				<td><h6 align=center>R&#233dactrices en chef adjointes - Administration</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Damian Hornich</td>
 				<td class=body>Chelsea Clogg</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Balkees Jarrah</td>
 				<td class=body>Gillian Nycum</td>
  			</tr>
 			<tr align=center>
 				<td class=body>Caitlin Rose</td>
 			</tr>
  			</tr>
 			<tr align=center>
 				<td class=body>Catherine Simard</td>
 			</tr>
  			</tr>
 			<tr align=center>
 				<td class=body>Josh Wilner</td>
 			</tr>
		<BR>
		<table border=0 width=500 align=center>
 			<tr>
 				<td colspan=2><h5 align=center>Comit&#233 de r&#233daction</h5></td>
 			</tr>
 			<tr>
 				<td width=250><h6 align=center>R&#233dacteurs</h6></td>
 				<td><h6 align=center>R&#233dacteurs administratifs</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Brynn Enros</td>
 				<td class=body>Alison Bier</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Anja Grabundzija</td>
 				<td class=body>Simon Grant - R&#233dacteur &#233l&#233ctronique </td>
  			</tr>
 			<tr align=center>
 				<td class=body>Andrew MacDonald</td>
 				<td class=body>Natalie Haras - &#233v&#233nements</td>
 			</tr>
  			</tr>
 			<tr align=center>
 				<td class=body>Virginie Marier</td>
 				<td class=body>Paul Matrosov</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Julie Maronani</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Dorian Needham</td>
  			</tr>
 			<tr align=center>
 				<td class=body>Clare Ryan</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Sybil Thompson</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Sophie Tremblay</td>
 			</tr>
 		</table>
		<BR>
		 		</table>';
	}
	else
	{
		echo '<title>MHLP : masthead</title>';
		echo '<h3 align=center>MASTHEAD 2006-2007</h3>';
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
 				<td><h6 align=center>Executive Managing Editors</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Damian Hornich</td>
 				<td class=body>Chelsea Clogg</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Balkees Jarrah</td>
 				<td class=body>Gillian Nycum</td>
  			</tr>
 			<tr align=center>
 				<td class=body>Caitlin Rose</td>
 			</tr>
  			</tr>
 			<tr align=center>
 				<td class=body>Catherine Simard</td>
 			</tr>
  			</tr>
 			<tr align=center>
 				<td class=body>Josh Wilner</td>
 			</tr>
		<BR>
		<table border=0 width=500 align=center>
 			<tr>
 				<td colspan=2><h5 align=center>Editorial Board</h5></td>
 			</tr>
 			<tr>
 				<td width=250><h6 align=center>Editors</h6></td>
 				<td><h6 align=center>Managing Editors</h6></td>
 			</tr>
 			<tr align=center>
 				<td class=body>Brynn Enros</td>
 				<td class=body>Alison Bier</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Anja Grabundzija</td>
 				<td class=body>Simon Grant - Web Editor</td>
  			</tr>
 			<tr align=center>
 				<td class=body>Andrew MacDonald</td>
 				<td class=body>Natalie Haras - Events</td>
 			</tr>
  			</tr>
 			<tr align=center>
 				<td class=body>Virginie Marier</td>
 				<td class=body>Paul Matrosov</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Julie Maronani</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Dorian Needham</td>
  			</tr>
 			<tr align=center>
 				<td class=body>Clare Ryan</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Sybil Thompson</td>
 			</tr>
 			<tr align=center>
 				<td class=body>Sophie Tremblay</td>
 			</tr>
 		</table>
		<BR>
		 		</table>';
	}

	
		
echo '</div>';



?>