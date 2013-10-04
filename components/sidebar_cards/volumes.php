<?php
  // run queries to get all volumes
  $query = "SELECT volume_num,issue_num,volume_date_".$lang.",filename FROM VOLUMES order by volume_num desc, issue_num desc";
  $result = mysql_query($query, GetMyConnection()) or die('Error getting volume list: ' . mysql_error());

  $runonce = true;

  $displaytext = "";
  $vol_filename = "";
  $switchmenuitems = "";

  $issue_term = "Issue ";
  if ($lang == "fr")
  {
    $issue_term = "Numéro ";
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


?>

<div class="card">
  <h2>
    <?php talk("Select Another Issue","S&eacute;lectionnez un autre num&eacute;ro",$lang); ?>
  </h2>
  <?php echo $switchmenuitems ?>
</div>
