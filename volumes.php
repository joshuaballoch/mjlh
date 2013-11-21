<?php
  require_once "header.php";
?>
<?php
  // MAKE THE REQUEST FOR THE VOLUME
  if (array_key_exists('v', $_REQUEST) && array_key_exists('i', $_REQUEST)) {
    $displayvolume = clean_input($_REQUEST['v']);
    $displayissue = clean_input($_REQUEST['i']);
    $volume_query = "SELECT * FROM VOLUMES WHERE VOLUME_NUM = '".$displayvolume."' AND ISSUE_NUM = '".$displayissue."' limit 1";
  } else {
    $volume_query = "SELECT * FROM VOLUMES order by volume_num DESC, issue_num DESC limit 1";
  }

  $volume_result = mysql_query($volume_query, GetMyConnection()) or die('Error getting volume ' . mysql_error());
  $volume = mysql_fetch_array($volume_result);

  // SET DISPLAYVOLUME and DISPLAYISSUE unless set
  if (!isset($displayvolume)) {
    $displayvolume = $volume["VOLUME_NUM"];
  }
  if (!isset($displayissue)) {
    $displayissue = $volume["ISSUE_NUM"];
  }

  // LANGUAGE SPECIFIC VARIABLE
  if ($lang == "fr") {
    $date_key = "VOLUME_DATE_FR";
    $issue_text = "Numéro ";
  } else {
    $date_key = "VOLUME_DATE_EN";
    $issue_text = "Issue ";
  }

?>

<div class="row">
  <div class="col-sm-8">
    <div class="header-card">
      <h1>
        <?php talk("The Journal", "Le Journal", $lang) ?>
      </h1>
    </div>
    <div class="card full-page-card volumes">
      <h2>
        <?php echo "Volume ". $volume["VOLUME_NUM"] . ", " . $issue_text . $volume["ISSUE_NUM"] . " (" . $volume[$date_key] . ")";?>
      </h2>
      <div class="author_stamp pull-right">
        <?php // RENDER THE DOWNLOAD LINK ?>
        <a href="/pdfs/vol<?php echo $volume["VOLUME_NUM"] ?>-<?php echo $volume["ISSUE_NUM"] ?>/<?php echo $volume["FILENAME"] ?>" target="_blank" onClick="parent.location='dltracker.php?v=<?php echo $displayvolume ?>&i= <?php echo $displayissue ?>'">
          <i class="icon-download"></i><?php talk("Download Full Issue (PDF)", "T&eacute;l&eacute;charger le num&eacute;ro complet (PDF)", $lang); ?>
        </a>
      </div>

      <div class="content">

        <?php // RENDER THE ISSUE CONTENTS
          $items_query = "SELECT * FROM VOLUME_ITEMS where volume_num = '".$displayvolume."' and issue_num = '" . $displayissue . "' order by start_page";
          $items_result = mysql_query($items_query, GetMyConnection()) or die('Error getting volume contents: ' . mysql_error());

          $currentheading = "";
          while ($item = mysql_fetch_array($items_result)) {
            //Hack: 'Case Comments' is the only type which is not the same in both languages. Instead of adding another DB field, just do it here.
            if ($item['TYPE'] == "Case Comments" && $lang == "fr")
            {
              $item['TYPE'] = "Commentaires d'arrêt";
            }

            if ($item['TYPE'] != $currentheading)
            {
              $currentheading = $item['TYPE'];
              echo "<h4>" . $currentheading . "</h4>\n";
            }
            ?>
            <div class="article">
              <p>
              <strong><a href="articles.php?article_id=<?php echo $item["ITEM_ID"] ?>">
                <?php echo $item["TITLE"] ?>
              </a></strong>
              </p>
              <div class="about-article">

                <?php echo $item["AUTHOR"] ?>

                <?php
                  echo "(";
                  if ($item['START_PAGE'] == $item['END_PAGE']) {
                    echo "p." . $item['START_PAGE'] . ")";
                  } else {
                    echo "pp. " . $item['START_PAGE'] . "-" . $item['END_PAGE'] . ")";
                  }
                ?>
              </div>
              <a class="download-link" href = '/pdfs/vol<?php echo $item['VOLUME_NUM'] ?>-<?php echo $item['ISSUE_NUM'] ?>/<?php echo $item['FILENAME'] ?>' target='_blank' onClick="parent.location='dltracker.php?item=<?php echo $item['ITEM_ID'] ?>">
                <i class="icon-download"></i>
                <?php talk("Download (PDF)","Telechargez (PDF)",$lang) ?>
              </a>
            </div>

          <?php } // end while item = fetch array ?>

      </div>



      <div class="card-share">
        <?php require $_SERVER["DOCUMENT_ROOT"]."/components/shared/share.php" ?>
      </div>
    </div>
    <?php // DISABLE VOLUME LEVEL COMMENTS
      //<div class="card">
      //  <?php
      //    //Add the comments
      //    // MUST define identifier first
      //    $disqus_identifier = "volume/".$displayvolume."/issue/".$displayissue;
      //    require $_SERVER["DOCUMENT_ROOT"]."/components/shared/comments.php";
      //
      //</div>
    ?>

  </div>

  <div class="col-sm-4">
    <?php require $_SERVER["DOCUMENT_ROOT"]."/components/volumes/sidebar.php"; ?>
  </div>
</div>

<?php
  require_once "footer.php";
?>
