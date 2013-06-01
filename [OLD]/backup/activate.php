<?
echo '<head><link rel="stylesheet" href="/styles/style.css" type="text/css" media="screen" /></head>';
include '_private/db1.php';

/* Account activation script */

// Create variables from URL.
$user = $_REQUEST['user'];
$code = $_REQUEST['code'];

$sql = mysql_query("UPDATE users SET activated='1' WHERE user='$user' AND password='$code'");

$sql_doublecheck = mysql_query("SELECT * FROM users WHERE user='$user' AND password='$code' AND activated='1'");
$doublecheck = mysql_num_rows($sql_doublecheck);

if($doublecheck == 0){
	echo "<strong><font color=red>Your account could not be activated!</font></strong> Please contact the webmaster.";
} elseif ($doublecheck > 0) {
	echo "<strong>Your account has been activated!</strong> Return to the <a href='index.php' target='_self'>main page</a> to login!";
}

?>