<?php
  // run queries to get all volumes
  $query = "SELECT * FROM VOLUMES order by volume_num desc, issue_num desc";
  $result = mysql_query($query, GetMyConnection()) or die('Error getting volume list: ' . mysql_error());

  $issue_term = "Issue ";
  if ($lang == "fr") {
    $issue_term = "Numéro ";
    $issue_date_key = "VOLUME_DATE_FR";
  } else {
    $issue_term = "Issue ";
    $issue_date_key = "VOLUME_DATE_EN";
  }

?>

<div class="card">
  <h2>
    <?php talk("Select An Issue","S&eacute;lectionnez un num&eacute;ro",$lang); ?>
  </h2>
  <ul>
    <?php while ($line = mysql_fetch_array($result)) { ?>
      <li>
        <a href="volumes.php?v=<?php echo $line["VOLUME_NUM"] ?>&i=<?php echo $line["ISSUE_NUM"]?>">
          <?php echo "Volume ".$line["VOLUME_NUM"].", ".$issue_term.$line["ISSUE_NUM"]." (".$line[$issue_date_key].")" ?>
        </a>
      </li>
    <?php } ?>
  </ul>
</div>
