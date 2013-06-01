<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<?php


     require_once $_SERVER["DOCUMENT_ROOT"]."/secure/dbconnect.php";
     //Input handling routines
     require_once $_SERVER["DOCUMENT_ROOT"]."/func.php";

     $verified = "0";
     $msg = "Either the e-mail or password field was left blank. Please press Back and correct.";
     if ($_POST['email'] != "" && $_POST['pw'] != "")
     {
       // Make a safe query
         $verifyquery = "select count(*) from USERS where email = " . clean_input($_POST['email']) . " and password = AES_ENCRYPT(" . clean_input($_POST['pw']) ."," . $AES_key.")";
        $verifyresult = mysql_query($verifyquery, GetMyConnection()) or die('Verify query failed: ' . mysql_error());

        $verified = mysql_result($verifyresult, 0);
        if ($verified == "1")
        {
          //Create session token
        $newtoken = clean_input($_POST['email']) . "breer" . strval(time());
          $newtoken = md5($newtoken);

          $updatequery = "update USERS set session_token = '" . $newtoken . "' where email = " . clean_input($_POST['email']);
          $updateresult = mysql_query($updatequery, GetMyConnection()) or die('Update query failed: ' . mysql_error());

          //Set cookie with session token
          setcookie("tkn", $newtoken);
          $msg = "Login successful. Please wait...";
        }
        else
        {
          $msg = "Login failed. Please press Back and check your e-mail and password.";
        }
        
        //    INSERT INTO user_aes VALUES ('member1',AES_ENCRYPT('secretpassword',$AES_key) );
//SELECT * FROM user_aes WHERE user_name='member1' AND password=AES_ENCRYPT('secretpassword','my_secret_key_to_encrypt');
     }


?>

<html>
      <head>
            <title>MJLH Website Admin Log-In</title>
            <link rel="stylesheet" type="text/css" href="http://mjlh.mcgill.ca/css/mjlh.css" media="all">
            <?php
                 if ($verified == "1")
                 {
                   echo '<META http-equiv="REFRESH" content="1; url=http://mjlh.mcgill.ca/backend/backend.php">';
                 }
            ?>
      </head>
      <body>
      <center><h3><?php echo $msg; ?></h3></center>

      </body>
</html>

