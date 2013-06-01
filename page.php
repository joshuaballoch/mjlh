<?php

      require_once "header.php";

      if (array_key_exists('id', $_GET))
      {
         $query = "select ".$lang." from CONTENT where content_id =".clean_input($_GET['id']);
         $result = mysql_query($query, GetMyConnection()) or die('Error getting contents: ' . mysql_error());
         $line = mysql_fetch_array($result);
         echo $line[0];
      }

      require_once "footer.php";
?>