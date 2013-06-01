<?php

      require_once "header.php";

      ?>
      <p style="text-align: center;">
	<a href="page.php?id=colloquiumhome"><img alt="McGill Student Colloquium on Health and Law | Colloque &eacute;tudiant de la sant&eacute; et le droit de McGill" src="http://mjlh.mcgill.ca/images/logoen.gif" style="border: medium none ; width: 624px; height: 115px;" /></a></p>
<?php
     
      $msg = "An unknown error has occurred. Please <a href = 'page.php?id=colloquiumreg'>go back</a> and try again.";
      if ($lang == "fr")
      {
        $msg =  "Une erreur inconnue est survenue. Veuillez <a href = 'page.php?id=colloquiumreg'>retourner &agrave; la page pr&eacute;c&eacute;dente</a> et r&eacute;essayer.";
      }
 
 /*     if (array_key_exists('email', $_POST) && array_key_exists('name', $_POST))
      {
          if ($_POST['email'] != "" && $_POST['name'] != "")
          {
              $notified = 0;
              if ($_POST['paymethod'] == "inperson") $notified = 1;
              
              // Make a safe query
              $insertquery = sprintf("REPLACE INTO COLLOQUIUM VALUES (%s, %s, %s, %s, %s, %s, %s, %s, DEFAULT, %u, DEFAULT)",
                          clean_input($_POST['email']),
                          clean_input($_POST['name']),
                          clean_input($_POST['student']),
                          clean_input($_POST['university']),
                          clean_input($_POST['program']),
                          clean_input($_POST['small_groups']),
                          clean_input($_POST['how_did_you_hear']),
                          clean_input($_POST['paymethod']),
                          $notified );

              $insertresult = mysql_query($insertquery, GetMyConnection()) or die('Insert query failed: ' . mysql_error());
  
              //Success
              if ($lang == "fr")
              {
                $msg = "Merci de vous &ecirc;tre enregistr&eacute;.";
                if ($_POST['paymethod'] == "inperson")
                {
                   $msg .= " Le paiement pourra &ecirc;tre fait en personne &agrave; la table d'enregistrement lors de la journ&eacute;e de l'&eacute;v&eacute;nement.";
                }
                else if ($_POST['paymethod'] == "mail")
                {
                  $msg .= " Please make your cheque payable to the \"McGill Journal of Law and Health\", and post it to <a href = 'page.php?id=contact'>our mailing address</a>.";
                }
                else     //email
                {
                   $msg .= " To complete payment, please <a href = 'documents/ColloquiumPaymentForm.doc'>fill out the form found here</a>, and email it to the address specified on the form.";
                }

                $msg .= "<br><br><a href = 'page.php?id=colloquiumhome'>Retournez &agrave; la page d'accueil du colloquium.</a>";
              }
              else
              {
                $msg = "Thank you for your registration!";
                if ($_POST['paymethod'] == "inperson")
                {
                   $msg .= " Payment can be made in-person at the registration table on the day of the event.";
                }
                else if ($_POST['paymethod'] == "mail")
                {
                  $msg .= " Please make your cheque payable to the \"McGill Journal of Law and Health\", and post it to <a href = 'page.php?id=contact'>our mailing address</a>.";
                }
                else     //email
                {
                   $msg .= " To complete payment, please <a href = 'documents/ColloquiumPaymentForm.doc'>fill out the form found here</a>, and email it to the address specified on the form.";
                }
                $msg .= "<br><br><a href = 'page.php?id=colloquiumhome'>Return to Colloquium Home Page.</a>";
              }
          }
          else
          {
            //Omitted info
            if ($lang == "fr")
            {
              //To be translated
              $msg = "Une information requise a &eacute;t&eacute; omise. Veuillez retourner &agrave; la page pr&eacute;c&eacute;dente et inscrire votre nom et votre courriel.";
            }
            else
            {
              $msg = "A required piece of information was omitted.<br>Please press your browser's 'Back' button and provide your name and e-mail address.";
            }
          }
      }   */

      if (array_key_exists('feedback', $_POST))
      {
          if ($_POST['feedback'] != "")
          {

              // Make a safe query
              $insertquery = sprintf("INSERT INTO COLLOQ_FEEDBACK VALUES (DEFAULT, %s, %s, %s)",
                          clean_input($_POST['name']),
                          clean_input($_POST['email']),
                          clean_input($_POST['feedback']) );

              $insertresult = mysql_query($insertquery, GetMyConnection()) or die('Insert query failed: ' . mysql_error());
  
              //Success
              if ($lang == "fr")
              {
                $msg = "Thank you for your feedback!";
                $msg .= "<br><br><a href = 'page.php?id=colloquiumhome'>Retournez &agrave; la page d'accueil du colloquium.</a>";
              }
              else
              {
                $msg = "Thank you for your feedback!";

                $msg .= "<br><br><a href = 'page.php?id=colloquiumhome'>Return to Colloquium Home Page.</a>";
              }
          }
          else
          {
            //Omitted info
            if ($lang == "fr")
            {
              //To be translated
              $msg = "Une information requise a &eacute;t&eacute; omise. Veuillez retourner &agrave; la page pr&eacute;c&eacute;dente et inscrire votre feedback.";
            }
            else
            {
              $msg = "A required piece of information was omitted.<br>Please press your browser's 'Back' button and provide your feedback.";
            }
          }
      }

      echo "<div style = 'width: 400px;margin: 0px auto;font-size: 14px;text-align: center; padding: 10px;'>" . $msg . "</div>";

      require_once "footer.php";
?>