<?php

     require_once $_SERVER["DOCUMENT_ROOT"]."/secure/dbconnect.php";
     //Input and language handling routines
     require_once $_SERVER["DOCUMENT_ROOT"]."/components/public_functions.php";

     if (array_key_exists('item', $_GET))
     {
        $item_id = clean_input($_GET['item']);

       //Update download count
       $query = "update VOLUME_ITEMS set DOWNLOADS=DOWNLOADS+1 where item_id=".$item_id;
       $result = mysql_query($query, GetMyConnection()) or die('Error updating article download count: ' . mysql_error());

       //Return to previous screen
       echo '<script type=""text/javascript"">history.go(-1);</script>';

     }
     else if (array_key_exists('v', $_GET) && array_key_exists('i', $_GET))
     {
       $volume_num = clean_input($_GET['v']);
       $issue_num = clean_input($_GET['i']);

       //Update download count
       $query = "update VOLUMES set DOWNLOADS=DOWNLOADS+1 where volume_num=".$volume_num. " and issue_num =" .$issue_num;
       $result = mysql_query($query, GetMyConnection()) or die('Error updating volume download count: ' . mysql_error());

       //Return to previous screen
       echo '<script type=""text/javascript"">history.go(-1);</script>';
     }


?>
