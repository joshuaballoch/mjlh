<?php
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
echo '<head> <meta http-equiv="content-type" content="text-html; charset=utf-8"><link rel="stylesheet" href="style.css" type="text/css" /></head>';

// CONSTANTS
// Get the language selected by the user
$lang = $_GET[lang];

// These are the menu titles, depending on the language
if ($lang == "fr")
{
	$title = 'Publication en droit de la sant&#233 de McGill';
	$mandat = '&nbsp&nbsp&nbsp ACCUEIL';
	$main = '&nbsp&nbsp&nbsp EVENEMENTS';
	$pub = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PUBLICATION';
	$mast = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp EQUIPE 2006-2007';
	$mast2005 = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp EQUIPE 2005-2006';
	$fac = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp FACULTE';
	$submission = '&nbsp&nbsp&nbsp SOUMISSIONS';
	$res = '&nbsp&nbsp&nbsp&nbsp RESSOURCES';
	$link = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp LIENS';
	$contact = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp CONTACT';
}
else
{
	$lang = "en";
	$title = 'McGill Health Law Publication';
	$mandat = '&nbsp&nbsp&nbsp HOME';
	$main = '&nbsp&nbsp&nbsp EVENTS';
	$pub = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PUBLICATION';
	$mast = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp MASTHEAD 2006-2007';
	$mast2005 = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp MASTHEAD 2005-2006';
	$fac = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp FACULTY';
	$submission = '&nbsp&nbsp&nbsp SUBMISSIONS';
	$res = '&nbsp&nbsp&nbsp&nbsp RESOURCES';
	$link = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp LINKS';
	$contact = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp CONTACT';
}

$current = getenv("SCRIPT_NAME");		// GET CURRENT PAGE VIEWED

if ($subpage <> 0);
elseif ($current == '/index.php')
   $mandat = "<font style='color:#CC0000;'>$mandat</font>";
elseif ($current == '/news.php')
   $main = "<font style='color:#CC0000;'>$main</font>";
elseif ($current == '/pub.php')
   $pub = "<font style='color:#CC0000;'>$pub</font>";
elseif ($current == '/masthead.php')
   $mast = "<font style='color:#CC0000;'>$mast</font>";
elseif ($current == '/masthead2005.php')
   $mast2005 = "<font style='color:#CC0000;'>$mast2005</font>";
elseif ($current == '/fac.php')
   $fac = "<font style='color:#CC0000;'>$fac</font>";
elseif ($current == '/submission.php')
   $submission = "<font style='color:#CC0000;'>$submission</font>";
elseif ($current == '/res.php')
   $res = "<font style='color:#CC0000;'>$res</font>";
elseif ($current == '/links.php')
   $link = "<font style='color:#CC0000;'>$link</font>";
elseif ($current == '/contact.php')
   $contact = "<font style='color:#CC0000;'>$contact</font>";

if ($current <> '/index.php')
   $mandat = "<a class='menu' href='index.php?lang=$lang'>$mandat</a>";
if ($current <> '/news.php')
   $main = "<a class='menu' href='news.php?lang=$lang'>$main</a>";
if ($current <> '/pub.php')
   $pub = "<a class='menu' href='pub.php?lang=$lang'>$pub</a>";
if ($current <> '/masthead.php')
   $mast = "<a class='menu' href='masthead.php?lang=$lang'>$mast</a>";
if ($current <> '/fac.php')
   $mast2005 = "<a class='menu' href='masthead2005.php?lang=$lang'>$mast2005</a>";
if ($current <> '/fac.php')
   $fac = "<a class='menu' href='fac.php?lang=$lang'>$fac</a>";
if ($current <> '/submission.php')
   $submission = "<a class='menu' href='submission.php?lang=$lang'>$submission</a>";
if ($current <> '/res.php')
   $res = "<a class='menu' href='res.php?lang=$lang'>$res</a>";
if ($current <> '/links.php')
   $link = "<a class='menu' href='links.php?lang=$lang'>$link</a>";
if ($current <> '/contact.php')
   $contact = "<a class='menu' href='contact.php?lang=$lang'>$contact</a>";

echo '<div id="menu">';

//************* MENU *************
	echo "<p class='title' align=right><a href='index.php?lang=$lang'><img src='logo.gif'></a><br><em>$title</em><br><br></p>";

	switch ($subpage) {
	case 0:
		echo "<br> $mandat <BR><BR> $pub <BR><BR> $mast <BR><BR> $mast2005 <BR><BR> $fac <BR><BR> $submission <BR><BR> $res <BR><BR> $main <BR><BR> $link <BR><BR> $contact <BR>";
		break;
	case 1:
		echo "<br> $mandat <BR><BR> $pub &nbsp > &nbsp <font style='color:#CC0000;'> $current_name </font><BR><BR> $mast <BR><BR> $mast2005 <BR><BR> $fac <BR><BR> $submission <BR><BR> $res <BR><BR> $main <BR><BR> $link <BR><BR> $contact <BR>";
		break;
	case 2:
		echo "<br> $mandat <BR><BR> $pub &nbsp > &nbsp <font style='color:#CC0000;'> $current_name </font><BR><BR> $mast <BR><BR> $mast2005 <BR><BR> $fac <BR><BR> $submission <BR><BR> $main <BR><BR> $res <BR><BR> $link <BR><BR> $contact <BR>";
		break;
	case 3:
		echo "<br> $mandat <BR><BR> $pub <BR><BR> $mast &nbsp > &nbsp <font style='color:#CC0000;'> $current_name </font><BR><BR> $mast2005 <BR><BR> $fac <BR><BR> $submission <BR><BR> $main <BR><BR> $res <BR><BR> $link <BR><BR> $contact <BR>";
		break;
	case 4:
		echo "<br> $mandat <BR><BR> $pub <BR><BR> $mast <BR><BR> $mast2005 <BR><BR> $fac <BR><BR> $submission &nbsp > &nbsp <font style='color:#CC0000;'> $current_name </font><BR><BR> $main <BR><BR> $res <BR><BR> $link <BR><BR> $contact <BR>";
		break;
	case 5:
		echo "<br> $mandat <BR><BR> $pub <BR><BR> $mast <BR><BR> $mast2005 <BR><BR> $fac <BR><BR> $submission <BR><BR> $main &nbsp > &nbsp <font style='color:#CC0000;'> $current_name </font><BR><BR> $res <BR><BR> $link <BR><BR> $contact <BR>";
		break;
	case 6:
		echo "<br> $mandat <BR><BR> $pub <BR><BR> $mast <BR><BR> $mast2005 <BR><BR> $fac <BR><BR> $submission <BR><BR> $main <BR><BR> $res <BR><BR> $link &nbsp > &nbsp <font style='color:#CC0000;'> $current_name </font><BR><BR> $contact <BR>";
		break;
	}
	
	$subpage = 0;

echo '</div>';

echo '<div id="top">';
		if ($lang == "fr")
		{
			echo "<a href='$current?lang=en'>English</a>";
		}
		else
		{
			echo "<a href='$current?lang=fr'>fran&#231ais</a>";
			$lang = "en";
		}
echo '</div>';
?>

