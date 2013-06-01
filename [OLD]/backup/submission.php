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
		echo '<title>PDSM : soumissions</title>';
		echo '<h3 align=center>SOUMISSIONS</h3>';
		?>
		<BR><p>Les soumissions d'articles sont pour le moment sur invitation
seulement.  N'h&#233sitez surtout pas, cependant, &#224 nous soumettre vos
commentaires ou vos questions &#224 l'adresse suivante : <a href="mailto:editor.mhlp@mail.mcgill.ca">editor.mhlp@mail.mcgill.ca</a>.
		<?php
	}
	else
	{
		echo '<title>MHLP : submit</title>';
		echo '<h3 align=center>SUBMISSIONS</h3>
		<BR><p>Submissions are by invitation only at this time. We do, however, welcome comments and enquiries at <a href="mailto:editor.mhlp@mail.mcgill.ca">editor.mhlp@mail.mcgill.ca</a>.';
	}
	
echo '</div>';

?>