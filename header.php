<!DOCTYPE html>
<?php

     // dbconnect.php is located outside the public_html folder to protect DB passwords
     //We can call GetMyConnection() and CloseMyConnection() in the rest of the code to get the link
     require_once $_SERVER["DOCUMENT_ROOT"]."/secure/dbconnect.php";
     // require "public functions" for commonly used functions
     require_once $_SERVER["DOCUMENT_ROOT"]."/components/public_functions.php";

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
<html> <!-- ends in footer.php -->
    <head>
        <title><?php talk("McGill Journal of Law and Health","Revue de droit et sant&eacute; de McGill",$lang); ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
        <meta name="description" content= "McGill Journal of Law and Health | Revue de droit et sant&eacute; de McGill | McGill University - Montreal, Quebec, Canada">
        <meta name="keywords" content="McGill,university,health,journal,law,college,canada,academic">
        <meta name="copyright" content="Copyright (C) 2010">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Assets -->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" media="all">
        <script type="text/javascript" src="vendor/jquery.js"></script>
        <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/share.js"></script>

        <!-- FIXME: check this link before push!! -->
        <link rel="stylesheet" type="text/css" href="css/mjlh.css" media="all">

        <!-- Icon Fonts -->
        <link rel="stylesheet" href="vendor/fontello-css/fontello.css">
        <!--[if IE 7]>
        <link rel="stylesheet" href="vendor/fontello-css/fontello-ie7.css"><![endif]-->


        <!-- sticky footer solution for IE -->
        <!--[if !IE 7]>
          <style type="text/css">
            #wrap {display:table;height:100%}
          </style>
        <![endif]-->

        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="icon" type="image/ico" href="/favicon.ico">

        <!-- JavaScript Assets -->
        <script type="text/javascript" src="js/responsive.js"></script>

        <!-- Menu Stylesheets/Script -->

        <?php if (isset($headtext)) echo $headtext; ?>

    </head>
    <body> <!-- ends in footer.php -->
      <div id="wrap"> <!-- dummy for sticky footer soln, ends in footer.php -->
      <header>
        <div id="header-inner" class="container">
          <a href="/">
            <h1 class="hidden-xs"><div class="mjlh-logo"></div><?php talk("THE McGILL JOURNAL OF LAW & HEALTH","REVUE DE DROIT ET SANTÉ DE McGILL",$lang); ?></h1>
            <h1 class="visible-xs small"><div class="mjlh-logo"></div><?php talk("THE McGILL JOURNAL OF LAW & HEALTH","REVUE DE DROIT ET SANTÉ DE McGILL",$lang); ?></h1>
          </a>
          <nav>
            <ul class="nav">
              <?php $path = explode('?', $_SERVER['REQUEST_URI'], 2); $path = $path[0];?>
              <li><a class="<?php if ($path === "/index.php" || $path === "/") echo "active" ;?>" href="index.php"><?php talk("Home","&nbsp;Accueil&nbsp;",$lang); ?></a></li>
              <li><a class="<?php if ($path === "/volumes.php") echo "active" ;?>" href="volumes.php"><?php talk("Issues","&nbsp;Numéros&nbsp;",$lang); ?></a></li>
              <li><a class="<?php if ($_SERVER["REQUEST_URI"] === "/page.php?id=colloquiumhome") echo "active" ;?>" href="page.php?id=colloquiumhome" rel = "colloquiumsubmenu"><?php talk("Colloquium","&nbsp;Colloque&nbsp;",$lang); ?></a></li>
              <li><a class="<?php if ($_SERVER["REQUEST_URI"] === "/page.php?id=submissions") echo "active" ;?>" href="page.php?id=submissions"><?php talk("Submissions","Soumissions",$lang); ?></a></li>
            </ul>
          </nav>
        </div>
      </header>

    <div id="container">
         <div class= "container">
