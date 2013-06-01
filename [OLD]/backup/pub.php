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
		echo '<title>PDSM : publication</title>';
		echo '<h3 align=center>PUBLICATION</h3>';
		?>
		<BR><p>La Publication, lanc&#233 le 30 avril 2007, est maintenant disponible <a href="pdfs/MHLP full text.pdf">ici</a> en format &#233lectronique. Pour en savoir davantage sur la PDSM, n'h&#233sitez surtout pas &#224 nous contacter &#224 : <a href="mailto:editor.mhlp@mail.mcgill.ca">editor.mhlp@mail.mcgill.ca</a>.
		<BR><BR><a href="pdfs/MHLP full text.pdf">T&#233l&#233chargez le texte complet ici</a>.
		<?php
	}
	else
	{
		echo '<title>MHLP : publication</title>';
		echo '<h3 align=center>PUBLICATION</h3>';
		?>
		<BR><p>The MHLP features peer-reviewed, solicited submissions.  The online release is now available <a href="pdfs/MHLP full text.pdf">here</a>, on LexisNexis, and on Westlaw. To find out more about the MHLP, including our submissions policy, please do not hesitate to contact us at: <a href="mailto:editor.mhlp@mail.mcgill.ca">editor.mhlp@mail.mcgill.ca</a>.
		<BR><BR><a href="pdfs/MHLP full text.pdf">Download the full text here</a>.
		<?php
	}
	
echo '</div>';

?>