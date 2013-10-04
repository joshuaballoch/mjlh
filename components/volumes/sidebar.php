<div class="card">
  <h2>
    <?php talk("Select Another Issue","S&eacute;lectionnez un autre num&eacute;ro",$lang); ?>
  </h2>
  <?php echo $switchmenuitems ?>
</div>
<div class="card">
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

<a class="twitter-timeline" href="https://twitter.com/McGill_JLH" height="300" data-chrome="nofooter noborder noscrollbar" data-border-color="#dfdfdf" data-widget-id="376030135377358848">Tweets by @McGill_JLH</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
