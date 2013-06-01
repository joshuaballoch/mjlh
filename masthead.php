<?php

      require_once "header.php";
      
      $runonce = true;
      $displayyear = 0;

      $query = "SELECT content_id FROM CONTENT where content_id like 'masthead%' order by content_id desc";
      $result = mysql_query($query, GetMyConnection()) or die('Error getting masthead content: ' . mysql_error());
      ?>
      <h1 style="text-align: center;"><?php talk("Masthead ","Comit&eacute; de r&eacute;daction ",$lang); ?>
      <SELECT name="mastheadselect" SIZE="1" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <?php
      while ($line = mysql_fetch_array($result))
      {
         $year = substr($line[0],8);
         $year += 2000;
         $prevyear = $year - 1;
         
         if ($runonce)
         {
           $runonce = false;
           $displayyear = $year;    //Display the most recent year by default unless overridden below with yr paramter.
         }

         if ($_REQUEST['yr'] == $year)
         {
           echo "<option selected = 'selected' ";
         }
         else
         {
           echo "<option ";
         }
         echo "value = 'masthead.php?yr=" . $year . "'>" .$prevyear . "-" .$year. "</option>\n";
      }
      echo "</SELECT></h1>";
      
     if (array_key_exists('yr', $_REQUEST))
     {
       $displayyear = $_REQUEST['yr'];
     }
     $displayyear = clean_input($displayyear);
     $query = "select ".$lang." from CONTENT where content_id = 'masthead".substr($displayyear,2,2)."'";
     $result = mysql_query($query, GetMyConnection()) or die('Error getting contents: ' . mysql_error());
     $line = mysql_fetch_array($result);
     echo $line[0];


      require_once "footer.php";
?>