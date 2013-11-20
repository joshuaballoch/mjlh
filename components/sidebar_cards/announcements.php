<div class="card free-highlight-links">
  <h2>
    <?php talk("Announcements","Annonces",$lang); ?>
  </h2>
   <?php
        $query = "select ann_date, ".$lang." as ann from ANNOUNCEMENTS order by ann_date desc";
        $result = mysql_query($query, GetMyConnection()) or die('Error getting announcements: ' . mysql_error());
        if (mysql_num_rows($result))
        {
           while ($line = mysql_fetch_array($result))
           {
                 echo $line['ann'];
                 // echo $line['ann_date'];
           }
        }
        else
        {
            echo "<li>";
             talk("No recent announcements.","Aucune annonce r&eacute;cente",$lang);
             echo "</li>\n";
        }
   ?>
</div>
