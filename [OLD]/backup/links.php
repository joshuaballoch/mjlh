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
?>
		<title>PDSM : liens</title>
		<h3 align=center>LIENS</h3>
<?php
	}
	else
	{
?>
		<title>MHLP : links</title>
		<h3 align=center>LINKS</h3>
<?php
	}
?>
		<BR><h4>Related Journals</h4>
		<BR><a href="http://www.law.depaul.edu/students/organizations%5Fjournals/student%5Forgs/lawhlj/">DePaul Journal of Health Care Law</a> (DePaul University College of Law)
		<BR><a href="http://www.law.ualberta.ca/centres/hli">Health Law Journal / Health Law Review</a> (University of Alberta Health Law Institute)
		<BR><a href="http://www.law.uh.edu/hjhlp/">Houston Journal of Health Law & Policy</a> (University of Houston Law Center)
		<BR><a href="http://academic.udayton.edu/health/">Race, Health Care and the Law</a> (University of Dayton Institute on Race, Health Care, and the Law)
<?php
	
echo '</div>';

?>