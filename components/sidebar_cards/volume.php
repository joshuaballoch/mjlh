<div class="card">
  <?php
    $query = "SELECT volume_num,issue_num,volume_date_".$lang." FROM VOLUMES order by volume_num desc, issue_num desc limit 1";
    $result = mysql_query($query, GetMyConnection()) or die('Error getting volume list: ' . mysql_error());

    $displayvolume = 0;
    $displayissue = 0;
    $displaytext = "";

    while ($line = mysql_fetch_array($result))
    {
        $displayvolume = $line[0];
        $displayissue = $line[1];
        $displaytext = "Volume ". $line[0] . ", ";
        if ($lang == "fr")
        {
          $displaytext .= "Num&eacute;ro ";
        }
        else
        {
          $displaytext .= "Issue ";
        }
        $displaytext .= $line[1] . " (" . $line[2] . ")";
    }
    echo "<h1>";
    talk("Current Issue ","Num&eacute;ro actuel ",$lang);
    echo "</h1><h2><a href = 'volumes.php'>".$displaytext . "</a></h2>\n";



    $query = "SELECT * FROM VOLUME_ITEMS where volume_num = '".$displayvolume."' and issue_num = '" . $displayissue . "' order by start_page";
    $result = mysql_query($query, GetMyConnection()) or die('Error getting volume contents: ' . mysql_error());

    $currentheading = "";
    while ($line = mysql_fetch_array($result))
    {
      if ($line['TYPE'] != $currentheading)
      {
        $currentheading = $line['TYPE'];
        echo "<h4>" . $currentheading . "</h4>\n";
      }
      echo "<p><strong><a href = 'volumes.php'>".$line['TITLE'] . "</a><br>" . $line['AUTHOR'] . " (";

      if ($line['START_PAGE'] == $line['END_PAGE']) echo "p." . $line['START_PAGE'] . ")";
      else echo "pp. " . $line['START_PAGE'] . "-" . $line['END_PAGE'] . ")";
      echo "</strong></p>\n";
    }

    //Display a comment if any exist
    $query = "select POSTED_BY, COMMENT from COMMENTS where source = 'v" . $displayvolume . "-".$displayissue."' order by COMMENT_DATE desc limit 1";
    $result = mysql_query($query, GetMyConnection()) or die('Error getting comments: ' . mysql_error());
    if (mysql_num_rows($result))
    {
        $line = mysql_fetch_array($result);
        echo "<div id = 'homecommentbox' ><h4>";
        talk("Recent Comments:","Commentaires r&eacute;cents",$lang);
        echo "</h4><strong>&nbsp;&nbsp;&nbsp;" . htmlentities($line['POSTED_BY']) . "</strong>: \"" . htmlentities($line['COMMENT']) ."\"";
        echo "<p align = 'right' style=\"margin-top: 2px;\"><a href = 'volumes.php'>";
        talk("Read More >>","Lire la suite >>",$lang);
        echo "</a>&nbsp;&nbsp;&nbsp;</p></div>";
    }
?>
</div>
