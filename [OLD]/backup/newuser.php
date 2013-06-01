<?
echo '<head><link rel="stylesheet" href="/styles/style.css" type="text/css" media="screen" /></head>';
include '_private/db1.php';
//include '_private/constants.php';

// Valid email address (format) check:
function is_email_valid($email)
{
//if (eregi("^[a-z0-9]+([-_\.]?[a-z0-9])+@[a-z0-9]+([-_\.]?[a-z0-9])+\.[a-z]{2,4}", $email)) return TRUE; else return FALSE; 
//if (eregi("^[a-z0-9\._-]+@+[a-z0-9\._-]+\.+[a-z]{2,3}$", $email)) 
if (ereg("([[:alnum:]\.\-]+)(\@[[:alnum:]\.\-]+\.+)", $email)) return TRUE; 
	else return FALSE; 
}

$firstname = stripslashes($_POST[firstname]);
$lastname = stripslashes($_POST[lastname]);
$bday = stripslashes($_POST[bday]);
$bmonth = stripslashes($_POST[bmonth]);
$byear = stripslashes($_POST[byear]);
$email = stripslashes($_POST[email]);
$website = stripslashes($_POST[website]);
$user = stripslashes($_POST[user]);

echo '<center>';
// First time this form is displayed:
if (!$_POST[submit]) 
{	echo '<br>ok. let\'s get this party started.';
	echo '<br><br>an email will be sent to you to activate your account.<br><br>';
	echo '<p>EXISTING USERS: click <a href="mailpassword.php" target="_self">HERE</a> to have a password emailed to you.</p>';
	include 'joinform.htm';
	exit();
}
// Error checking for user entries:
else
{	if (!$firstname || !$lastname || !$bday || !$bmonth || !$byear || !$email || !$user )
	{	echo '<error>You haven\'t filled in everything, have you?</error>';
		include 'joinform.htm';
		exit(); // if error checking failed, exit script
	}
	elseif ((strlen($bmonth) != 2) || (strlen($bday) != 2))
	{	echo '<p class=error>Birthday and month with two digits please!</p>';
		include 'joinform.htm';
		exit(); // if error checking failed, exit script
	}
	elseif (strlen($byear) != 4)
	{	echo '<p class=error>Birth year needs four digits...</p>';
		include 'joinform.htm';
		exit(); // if error checking failed, exit script
	}
	elseif (!is_email_valid($email))
	{	echo '<p class=error>Please enter a valid email address.</p>';
		include 'joinform.htm';
		exit(); // if error checking failed, exit script
	}
}

// Check that email address or username does not exist in database already
$sql_email_check = mysql_query("SELECT emailaddr FROM users WHERE emailaddr='$email'");
$sql_username_check = mysql_query("SELECT user FROM users WHERE user='$user'");

$email_check = mysql_num_rows($sql_email_check);
$username_check = mysql_num_rows($sql_username_check);

if ($email_check > 0)
{	echo 'Your email address has already been used by another member on our site. Please enter a different address.';
	include 'joinform.htm';
	exit();
}
elseif ($username_check > 0)
{	echo 'How unoriginal, someone else has that username. Please choose another!';
	include 'joinform.htm';
	exit();
}

// If we've reached this far, everything has checked out.

$birthdate = $byear.'-'.$bmonth.'-'.$bday;

// Random password generator (thanks to www.phpfreaks.com!)
function makeRandomPassword()
{
  $salt = "abchefghjkmnpqrstuvwxyz0123456789";
  srand((double)microtime()*1000000); 
  	$i = 0;
  	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($salt, $num, 1);
		$pass = $pass . $tmp;
		$i++;
  	}
  	return $pass;
}

$random_password = makeRandomPassword();

$db_password = md5($random_password);

$sql = mysql_query("INSERT INTO users (firstname, lastname, emailaddr, user, password, signupdate) VALUES('$firstname', '$lastname', '$email', '$user', '$db_password', now())") or die (mysql_error());

if(!$sql)
{	echo 'There has been an error creating your account. Please contact the webmaster.';
}
else
{	$userid = mysql_insert_id();
	// Let's mail the user!
	$subject = "Your MHLP account";
	$message = "Dear $firstname $lastname,
Thank you for registering at our website, http://www.healthlaw.mcgill.ca!
	
You are two steps away from logging in and accessing our members site.
	
To activate your membership, please click here: http://www.healthlaw.mcgill.ca/activate.php?user=$user&code=$db_password
	
Once you activate your membership, you will be able to login with the following information:
Username: $user
Password: $random_password
	
Thanks!
The Webmaster
	
This is an automated response, please do not reply!";

	mail($email, $subject, $message, "From: mcgill healthlaw journal <MHLP@mail.mcgill.ca>\nX-Mailer: PHP/" . phpversion());
	echo 'Your membership information has been mailed to your email address! Please check it and follow the directions!';
}
?>
</center>