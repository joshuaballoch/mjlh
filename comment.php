<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
   <html><head><link rel="stylesheet" type="text/css" href="http://mjlh.mcgill.ca/css/mjlh.css" media="all">
<?php
     require_once $_SERVER["DOCUMENT_ROOT"]."/secure/dbconnect.php";
     //Input handling routines
     require_once $_SERVER["DOCUMENT_ROOT"]."/func.php";
     require_once('recaptchalib.php');

     //Put the current page URL in $pageURL
     $pageURL = 'http';
     if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
     $pageURL .= "://";
     if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
     } else {
      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
     }

     $lang = "en";
     if (array_key_exists('l', $_GET) && $_GET['l'] == "fr")
     {
       $lang = "fr";
     }
     echo "<title>";
     talk("MJLH - Leave a Comment","RDSM - Laissez un commentaire",$lang);
     echo "</title>";

     if ($lang == "fr")
     {
       echo "<script> var RecaptchaOptions = {lang : 'fr'};</script>\n";
     }

     echo "</head><body>\n";
     
     $display_form = true;
     $msg = "";

     if (array_key_exists('_comment_submit_check', $_POST))
     {

        $privatekey = "6LfpUQoAAAAAAHcA5-A44OxblM94-qTarps3_te5";
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);
        
        if (!$resp->is_valid) {
          if ($lang == "fr")
          {
            $msg = "Les deux mots n'ont pas &eacute;t&eacute; entr&eacute; correctement. S'il vous pla&icirc;t essayez de nouveau.";
          }
          else
          {
            $msg = "Error: The two test words weren't entered correctly. Please try again."; //. "(reCAPTCHA said: " . $resp->error . ")");
          }
        }
        else if ($_POST['poster'] == "" || $_POST['comment'] == "")
        {
          if ($lang == "fr")
          {
            $msg = "S'il vous pla&icirc;t remplir tous les champs.";
          }
          else
          {
            $msg = "Error: Please fill out all fields.";
          }
        }
        else
        {
          //Recaptcha valid - save the comment
            $display_form = false;
            $poster = clean_input($_POST['poster']);
            $comment = clean_input($_POST['comment']);
            $source = clean_input($_GET['src']);
            $query = "insert into COMMENTS values (\"\",DEFAULT," .$poster."," .$comment.",".$source.")";
            $result = mysql_query($query, GetMyConnection()) or die('Save comment failed: ' . mysql_error());
            if ($lang == "fr")
            {
             $msg = "Merci pour votre commentaire. Cliquez <a href = '#' onClick = \"window.close();if (window.opener && !window.opener.closed) {window.opener.location.reload();}\">ici</a> pour fermer la fen&ecirc;tre.";
            }
            else
            {
             $msg = "Thank you for your comment. Click <a href = '#' onClick = \"window.close();if (window.opener && !window.opener.closed) {window.opener.location.reload();}\">here</a> to close the window.";
            }
        }
     }
     
     if ($display_form)
     {
        ?>
        <div>
        <h2 style = "text-align:center;">
        <?php talk("MJLH - Leave a Comment","RDSM - Laissez un commentaire",$lang); ?>
        </h2>
        <?php if ($msg != "")
        {
          echo "<h4 style = \"text-align:center;\">".$msg."</h4>\n";
        }     ?>
        <form name="commentform" method="post" action="<?php echo $pageURL; ?>">
           <table><tr><td><?php talk("Name","Nom",$lang);?>:</td><td><input name = "poster" type = "text" value = "<?php echo $_POST['poster'];?>" size = "45"></td></tr>
           <tr><td><?php talk("Comment","Commentaire",$lang);?>:</td><td><textarea name = "comment" cols = '45' rows = '6'><?php echo $_POST['comment'];?></textarea></td></tr>
           <tr><td colspan = "2"><center>
             <?php
             $publickey = "6LfpUQoAAAAAAB3k1o5MFVsqNjQjmA-KLRCU3YF4"; // you got this from the signup page
             echo recaptcha_get_html($publickey);
             ?>
           </center></td></tr>
           <tr><td colspan = "2"><center><input type = "submit" value = "Submit"></center></td></tr></table>
           <input type = 'hidden' name = '_comment_submit_check' value = '1'>

           </form>
           </div>
        <?php
     }
     else
     {
       if ($msg != "")
        {
          echo "<h4>".$msg."</h4>\n";
        }
     }


     echo "</body></html>\n";
?>