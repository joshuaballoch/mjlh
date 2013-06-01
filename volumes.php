<?php

      $headtext = '<script type="text/javascript" src="dropdown.js"></script>';
      $headtext .= "\n<script>\nfunction PopupCenter(pageURL, title,w,h) {\nvar left = (screen.width/2)-(w/2);\nvar top = (screen.height/2)-(h/2);\nvar targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);\n}\n</script>\n";
      require_once "header.php";

//      echo "<table<tr><td valign = 'top'>\n";
echo "<div id = 'volumedetails'>\n";

      $query = "SELECT volume_num,issue_num,volume_date_".$lang.",filename FROM VOLUMES order by volume_num desc, issue_num desc";
      $result = mysql_query($query, GetMyConnection()) or die('Error getting volume list: ' . mysql_error());
      
      $runonce = true;

      $displayvolume = 0;
      $displayissue = 0;
      if (array_key_exists('v', $_REQUEST) && array_key_exists('i', $_REQUEST))
      {
          $displayvolume = clean_input($_REQUEST['v']);
          $displayissue = clean_input($_REQUEST['i']);
      }

      $displaytext = "";
      $vol_filename = "";
      $switchmenuitems = "";

      $issue_term = "Issue ";
      if ($lang == "fr")
      {
        $issue_term = "Num&eacute;ro ";
      }

      while ($line = mysql_fetch_array($result))
      {
        if ($runonce && $displayvolume == 0)
        {
          $runonce = false;
          $displayvolume = $line[0];
          $displayissue = $line[1];
          $displaytext = "Volume ". $line[0] . ", " . $issue_term . $line[1] . " (" . $line[2] . ")";
          $vol_filename = "vol" . $line[0] . "-" . $line[1] ."/" . $line[3];
        }
        else if ($displayvolume == $line[0] && $displayissue == $line[1])
        {
          $displaytext = "Volume ". $line[0] . ", " . $issue_term . $line[1] . " (" . $line[2] . ")";
          $vol_filename = "vol" . $line[0] . "-" . $line[1] ."/" . $line[3];
        }

        $switchmenuitems .= "<a class='sample_attach' href='volumes.php?v=" . $line[0]. "&i=" . $line[1] . "'>Volume " . $line[0] . ", " . $issue_term . $line[1] . " (" . $line[2] . ")</a>\n";
      }


      echo "<table width = '100%'><tr><td><nobr><h2>" . $displaytext . "</h2></nobr><strong><a href = '/pdfs/" . $vol_filename ."' target='viewerwindow' onClick=\"parent.location='dltracker.php?v=" . $displayvolume ."&i=". $displayissue ."'\">";
      talk("Download Full Issue (PDF)", "T&eacute;l&eacute;charger le num&eacute;ro complet (PDF)", $lang);
      echo "</a></strong> <img src = 'images/document-pdf.png' align = 'middle'></td>";
      echo "<td valign = 'top'><nobr>\n";
      echo '<div id="sample_attach_menu_parent" class="sample_attach">';
      talk("Select Another Issue","S&eacute;lectionnez un autre num&eacute;ro",$lang);
      echo ' <img src = "images/arrow-curve-270.png" align = "middle"></div>';
      echo '<div id="sample_attach_menu_child">';
      echo $switchmenuitems;
      echo "</div></nobr></td>";
      

      echo "<td rowspan = '2' valign = 'top'><div id = 'commentsdiv'>\n";

      //Comment div content
      echo "<span style = \"float:right;padding-top: 5px;padding-right: 10px;\"><strong><a href = '#' onclick=\"PopupCenter('http://mjlh.mcgill.ca/comment.php?src=v" . $displayvolume ."-". $displayissue. "&l=" . $lang . "', 'myPop1',400,400);\">";
      talk("Leave a Comment","Laissez un commentaire",$lang);
      echo "</a></strong></span>\n";
      echo "<h4>";
      talk("Your Thoughts:","Vos pens&eacute;es:", $lang);
      echo "</h4>";

      $query = "select POSTED_BY, COMMENT, DATE_FORMAT(COMMENT_DATE, '<i>(%b. %e, %Y at %l:%i %p ET)</i>') as DATE from COMMENTS where source = 'v" . $displayvolume . "-" . $displayissue . "' order by COMMENT_DATE desc";
      $result = mysql_query($query, GetMyConnection()) or die('Error getting volume comments: ' . mysql_error());
      if (mysql_num_rows($result))
      {
          while ($line = mysql_fetch_array($result))
          {
            echo "<strong>" . htmlentities($line['POSTED_BY']) . "</strong> " . $line['DATE'] . ":<p>" . htmlentities($line['COMMENT']) ."</p>";
             //apply htmlentities or htmlspecialchars to contents of db
          }
      }
      else
      {
        echo "<p><i>";
        talk("No one has commented on this Issue.","Personne n'a encore comment&eacute;e.",$lang);
        echo "</i></p>\n";
      }

      echo "</div></td></tr>\n";


      echo "<tr><td colspan = '2' id = 'volumecontentscell' valign = 'top'>\n";


      $query = "SELECT * FROM VOLUME_ITEMS where volume_num = '".$displayvolume."' and issue_num = '" . $displayissue . "' order by start_page";
      $result = mysql_query($query, GetMyConnection()) or die('Error getting volume contents: ' . mysql_error());

      $currentheading = "";
      while ($line = mysql_fetch_array($result))
      {
        //Hack: 'Case Comments' is the only type which is not the same in both languages. Instead of adding another DB field, just do it here.
        if ($line['TYPE'] == "Case Comments" && $lang == "fr")
        {
          $line['TYPE'] = "Commentaires d'arrêt";
        }

        if ($line['TYPE'] != $currentheading)
        {
          $currentheading = $line['TYPE'];
          echo "<h4>" . $currentheading . "</h4>\n";
        }
        echo "<p><strong><a href = '/pdfs/vol" . $line['VOLUME_NUM'] . "-" . $line['ISSUE_NUM'] . "/" . $line['FILENAME'] ."' target='viewerwindow' onClick=\"parent.location='dltracker.php?item=" . $line['ITEM_ID'] ."'\">".$line['TITLE'] . "</a></strong><br>" . $line['AUTHOR'] . " (";

        if ($line['START_PAGE'] == $line['END_PAGE']) echo "p." . $line['START_PAGE'] . ")";
        else echo "pp. " . $line['START_PAGE'] . "-" . $line['END_PAGE'] . ")";
        echo "</p>\n";
      }
      
      echo "</td></tr></table>\n";
      
      ?>

      <script type="text/javascript">
      at_attach("sample_attach_menu_parent", "sample_attach_menu_child", "click", "y", "pointer");
      </script>
      <?php

      echo "</div>\n";

      //echo "</div></td></tr></table>\n";

      /*
      if (array_key_exists('id', $_GET))
      {
         $query = "select ".$lang." from CONTENT where content_id =".clean_input($_GET['id']);
         $result = mysql_query($query, GetMyConnection()) or die('Error getting contents: ' . mysql_error());
         $line = mysql_fetch_array($result);
         echo $line[0];
      }   */

      require_once "footer.php";
?>