<?php

      require_once "header.php";
?>
<div id = 'announcements'>
<h2>
<?php talk("Announcements","Annonces",$lang); ?>
</h2>
<ul>
     <?php
          $query = "select ann_date, ".$lang." as ann from ANNOUNCEMENTS order by ann_date desc";
          $result = mysql_query($query, GetMyConnection()) or die('Error getting announcements: ' . mysql_error());
          if (mysql_num_rows($result))
          {
             while ($line = mysql_fetch_array($result))
             {
                   echo "<li>". $line['ann'];
//                   echo " <i>[". $line['ann_date']."]</i>";
                   echo "</li>";
             }
          }
          else
          {
              echo "<li>";
               talk("No recent announcements.","Aucune annonce r&eacute;cente",$lang);
               echo "</li>\n";
          }
     ?>
</ul>
</div>
<!--
<div id = 'homelinkbar'>
<a href="page.php?id=about"><?php talk("About the MJLH","&Aacute; propos de la RDSM",$lang); ?></a> |
<a href="page.php?id=contact"><?php talk("Contact","Nous joindre",$lang); ?></a> |
<a href="page.php?id=submissions"><?php talk("Submissions","Soumissions",$lang); ?></a> |
<a href="page.php?id=colloquiumhome" rel = "colloquiumsubmenu"><?php talk("Colloquium","Colloque",$lang); ?></a> |
<a href="page.php?id=donations"><?php talk("Donations","Dons",$lang); ?></a> |
<a href="page.php?id=recruitment"><?php talk("Student Recruitment","&Eacute;tudiants de McGill",$lang); ?></a>
</div>
-->

<div id = 'homeblog'>
<h1>
<?php talk("MJLH Online","RDSM en ligne",$lang); ?>
</h1>
<?php
      $query = "SELECT BLOG_ID, TITLE, AUTHOR, DATE_FORMAT(BLOG_DATE,'%b. %e, %Y') as date,ENTRY FROM BLOGS order by BLOG_DATE desc limit 1";
      $result = mysql_query($query, GetMyConnection()) or die('Error getting blog entry: ' . mysql_error());
      $line = mysql_fetch_array($result);
      echo "<h2><a href = 'blog.php'>" . $line['TITLE'] . "</a></h2><div style = \"padding-bottom: 5px; border-bottom: 1px dotted black;\">\n";
      talk ("Posted By","Post&eacute; par",$lang);
      echo " <strong>" . $line['AUTHOR'] . "</strong> <i>(" . $line['date'] . ")</i></div>\n";
      echo "<div id = 'homeblogentry'>" . myTruncate($line['ENTRY'],800, " ","...") . "</div>";

      $query = "SELECT count(*) from COMMENTS where SOURCE = 'b" . $line['BLOG_ID'] . "'";
      $result = mysql_query($query, GetMyConnection()) or die('Error getting blog comment count: ' . mysql_error());
      $line = mysql_fetch_array($result);
?>
      <div id = 'homeblogfooter'>
      <table width = '95%'><tr><td align = 'center'><strong><a href = 'blog.php'>
      <?php talk("Read More >>","Lire la suite >>",$lang); ?>
      </a></strong></td><td align = 'center'><a href = 'blog.php'><img src = "images/balloon-quotation.png" alt = "" >
      <?php talk ("Comments (","Commentaires (",$lang); echo $line[0]; ?>)</a></td></tr>
      <tr><td colspan = '2'><br><strong><a href = 'blog.php'>
      <?php talk("Past Entries >>","Derni&egrave;res entr&eacute;es >>",$lang); ?>
      </a></strong></td></tr></table>
    </div>
</div>


<div id = 'homevolume'>
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

<?php

      require_once "footer.php";
?>