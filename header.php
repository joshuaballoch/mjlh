<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<?php

     // dbconnect.php is located outside the public_html folder to protect DB passwords
     //We can call GetMyConnection() and CloseMyConnection() in the rest of the code to get the link
     require_once $_SERVER["DOCUMENT_ROOT"]."/secure/dbconnect.php";
     //Input and language handling routines
     require_once "func.php";

     $lang = "en";
     if ( array_key_exists ('lang',$_GET) && ($_GET['lang'] == "fr" || $_GET['lang'] == "en") )
     {
        //If set in the URL, take that language.
        $lang = $_GET['lang'];
     }
     else if (isset($_COOKIE['lang']) && ($_COOKIE['lang'] == "fr" || $_COOKIE['lang'] == "en"))
     {
        //Else, retrieve language from cookie if it exists
        $lang = $_COOKIE['lang'];
     }
     else
     {
         //If no cookie is present, look to browser settings.
         if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == "fr") {
            $lang = "fr";
         }
     }
     //Save language to cookie
     $expire=time()+60*60*24*60;  //Expires in 2 months
     setcookie("lang", $lang, $expire);
?>
<?php talk("","",$lang); ?>
<html>
    <head>
        <title><?php talk("McGill Journal of Law and Health","Revue de droit et sant&eacute; de McGill",$lang); ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" >
        <meta name="test2" content="adsf">
        <meta name="description" content= "McGill Journal of Law and Health | Revue de droit et sant&eacute; de McGill | McGill University - Montreal, Quebec, Canada">
        <meta name="keywords" content="McGill,university,health,journal,law,college,canada,academic">
        <meta name="copyright" content="Copyright (C) 2010">


        <link rel="stylesheet" type="text/css" href="http://mjlh.mcgill.ca/css/mjlh.css" media="all">
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="icon" type="image/ico" href="/favicon.ico">

        <!-- Menu Stylesheets/Script -->
        <link rel="stylesheet" type="text/css" href="http://mjlh.mcgill.ca/menu/ddlevelsmenu-base.css">
        <link rel="stylesheet" type="text/css" href="http://mjlh.mcgill.ca/menu/ddlevelsmenu-mjlhmenu.css">

        <script type="text/javascript" src="http://mjlh.mcgill.ca/menu/ddlevelsmenu.js">
        /***********************************************
        * All Levels Navigational Menu- (c) Dynamic Drive DHTML code library (http://www.dynamicdrive.com)
        * This notice MUST stay intact for legal use
        * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
        ***********************************************/
        </script>
         <!--
        <script type="text/javascript" src="http://www.mcgillswimming.ca/js/basic.js">
        /**Basic Script Function Library**/
        </script>  -->

        <!-- End menu stuff -->

        <?php if (isset($headtext)) echo $headtext; ?>

    </head>
    <body>
    <div id = "topdiv">
         <div id = "top-innerdiv">
              <a href = "index.php"><img src = "/images/mjlh-logo.jpg" alt = "MJLH | RDSM"></a>
              <span id = "bannertext"><?php talk("McGill Journal of<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Law and Health","Revue de droit<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;et sant&eacute; de McGill",$lang);?></span>
              <span id = "languagelink"><?php echo getSwitchLanguageLink($lang); ?></span>

              <!-- Main Menu (Sub Menus are declared in Footer  -->
              <span id="menubar" class="mjlhmenu">
                <ul>
                  <li><a href="index.php"><?php talk("Home","&nbsp;Accueil&nbsp;",$lang); ?></a></li>
                  <li><a href="volumes.php"><?php talk("Current & Past Volumes","&nbsp;Volumes&nbsp;",$lang); ?></a></li>
                  <li><a href="blog.php"><?php talk("MJLH Online","&nbsp;RDSM en ligne&nbsp;",$lang); ?></a></li>
                  <li><a href="page.php?id=colloquiumhome" rel = "colloquiumsubmenu"><?php talk("Colloquium","&nbsp;Colloque&nbsp;",$lang); ?></a></li>
                  <li><a href="page.php?id=submissions"><?php talk("Submissions","Soumissions",$lang); ?></a></li>
                  <li><a href="page.php?id=about" rel="aboutsubmenu"><?php talk("About the MJLH","&Aacute; propos de la RDSM",$lang); ?></a></li>
                  <li><a href="page.php?id=contact"><?php talk("Contact","&nbsp;&nbsp;Nous joindre&nbsp;&nbsp;",$lang); ?></a></li>
                 </ul>
              </span>

              <script type="text/javascript">
              ddlevelsmenu.setup("menubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
              </script>
         </div>
    </div>
    <div id = "maindiv">
         <div id = "main-innerdiv">

