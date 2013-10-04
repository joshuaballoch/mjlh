<?php
  require_once "header.php";
?>
<?php
  // run queries to get the issue
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
?>

<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <h1>
        <?php echo $displaytext ?>
      </h1>
    </div>
    <div class="card">
      <?php // RENDER THE DOWNLOAD LINK ?>
      <a href="/pdfs/<?php echo $vol_filename ?>" target="_blank" onClick="parent.location='dltracker.php?v=<?php echo $displayvolume ?>&i= <?php echo $displayissue ?>'">
        <?php talk("Download Full Issue (PDF)", "T&eacute;l&eacute;charger le num&eacute;ro complet (PDF)", $lang); ?>
      </a>

      <?php // RENDER THE ISSUE CONTENTS
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
      <div class="card-share">
        <?php require $_SERVER["DOCUMENT_ROOT"]."/components/shared/share.php" ?>
      </div>
    </div>
    <div class="card">
      <?php
        //Add the comments
        // MUST define identifier first
        $disqus_identifier = "volume/".$displayvolume."/issue/".$displayissue;
        require $_SERVER["DOCUMENT_ROOT"]."/components/shared/comments.php";
      ?>
    </div>
  </div>

  <div class="col-sm-4">
    <?php require $_SERVER["DOCUMENT_ROOT"]."/components/volumes/sidebar.php"; ?>
  </div>
</div>

<?php
  require_once "footer.php";
?>
