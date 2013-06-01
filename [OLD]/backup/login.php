<?php
session_start();
include '_private/db1.php';
//include '_private/constants.php';
echo '<head><meta http-equiv="Content-Type" content="text/html;charset=utf-8" ><link rel="stylesheet" href="/styles/style.css" type="text/css" media="screen" /></head>';

if ($Submit)
{
   $user = $_POST['user'];
   $password = $_POST['password'];

   if (!$user)
   {  $err_msg = 'Please enter username.';
   }
   else if (!$password)
   {  $err_msg = 'Please enter password.';
   }
   else
   {
   // CONVERT PASSWORD TO MD5 HASH
      $password = md5($password);
   // VERIFY LOGIN INFO
      $sql = mysql_query("SELECT * FROM users WHERE user='$user' AND password='$password' AND activated='1'") or die (mysql_error());
      $login_check = mysql_num_rows($sql);

      if ($login_check > 0)
      {  while ($row = mysql_fetch_array($sql))
         {  foreach ($row AS $key => $val)
            {  $$key = stripslashes($val);
            }
         }
      // REGISTER SESSION VARIABLES
         $_SESSION['login_email'] = $emailaddr;
         $_SESSION['login_user'] = $user;
         mysql_query("UPDATE users SET last_login=now() WHERE user='$user'");
      }
      else
      {  $err_msg = 'Login failed. Typo?';
      }
   }
}
echo "<p align=right class='error'>test";
if ($err_msg)
{
   echo "<p align=right>$err_msg";
}

if (isset($_SESSION['login_user']))
{
	$user = $_SESSION['login_user'];
	echo "<p align=right><font color=#FFFFFF size=2><br><br>$user</font><BR>";
	$link = 'addblog.php';

	echo " . <a class='login' href='changepassword.php'>pword</a>";

	echo " . <a class='login' href='logout.php' target='_self'>LOGOUT</a>";
}
else
{
  $_SESSION = array();
  session_destroy();
?>
  <table border="0" align="right">
    <tr><td align="center">
      <form action="<?php echo $PHP_SELF;?>" method="post" name="formlogin">
        <input name="user" type="text"
		onFocus="if(this.value=='login')this.value=''"
		onBlur="if(this.value=='')this.value='login'" value="login" size="12" maxlength="12" color: #647480>
    <tr><td align="center">
        <input name="password" type="password" id="password" value="" font-size: 10px; color: #647480; size="12" maxlength="12">
    <tr><td align="center">
        <input type="submit" name="Submit" value="go"><a href="newuser.php" target="_self"><font size=1 color="FFCC00"> huh?</font></a>
      </form>
    </td><td width="35"></td></tr>
  </table>
<?php
}
?>