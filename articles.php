<?php
  require_once "header.php";
?>
<?php
  // run queries to get the article
  if (!isset($_REQUEST["article_id"]) || !is_numeric($_REQUEST["article_id"])) {
    die('cannot access article without id');
  }
  $query = "SELECT * FROM VOLUME_ITEMS where item_id = '".$_REQUEST["article_id"]."'";
  $result = mysql_query($query, GetMyConnection()) or die('Error getting article : ' . mysql_error());
  $article = mysql_fetch_array($result);

  //FETCH THE VOLUME

  $volume_query = "SELECT * FROM VOLUMES WHERE VOLUME_NUM = '".$article["VOLUME_NUM"]."' AND ISSUE_NUM ='".$article["ISSUE_NUM"]."'";
  $volume_result = mysql_query($volume_query, GetMyConnection()) or die('Error getting volume : ' . mysql_error());
  $volume = mysql_fetch_array($volume_result);

?>

<div class="row">
  <div class="col-sm-8">
    <div class="header-card">
      <h1>
        <?php talk("The Journal", "Le Journal", $lang) ?>
      </h1>
    </div>
    <div class="card full-page-card">
        <?php
          if ($lang == "fr") {
            $date_key = "VOLUME_DATE_FR";
            $abstract_key = "ABSTRACT_FR";
            $issue_text = "Numéro ";
          } else {
            $date_key = "VOLUME_DATE_EN";
            $abstract_key = "ABSTRACT_EN";
            $issue_text = "Issue ";
          }
          // FALLBACK FOR ABSTRACT LOADED IN ONLY ONE LANGUAGE

          $abstract = $article[$abstract_key];

          if (!$abstract) {
            if ($lang == "fr") {
              $abstract = $article["ABSTRACT_EN"];
            } else {
              $abstract = $article["ABSTRACT_FR"];
            }
          }

        ?>
        <h2>
        <a href="/volumes.php?v=<?php echo $article["VOLUME_NUM"]?>&i=<?php echo $article["ISSUE_NUM"]?>">
          <?php echo "Volume ". $volume["VOLUME_NUM"] . ", " . $issue_text . $volume["ISSUE_NUM"] . " (" . $volume[$date_key] . ")";?>
        </a>
        </h2>
        <h3> <?php echo $article["TITLE"] ?> </h3>
        <div class="author_stamp">
          <?php echo $article["AUTHOR"] ?>
          <?php
            echo "(";
            if ($article['START_PAGE'] == $article['END_PAGE']) {
              echo "p." . $article['START_PAGE'] . ")";
            } else {
              echo "pp. " . $article['START_PAGE'] . "-" . $article['END_PAGE'] . ")";
            }
          ?>
        </div>
        <br>
        <div class="content">
            <?php //if ($article["TYPE"] != null) { ?>
              <h4>
                <?php talk("ABSTRACT","RÉSUMÉ",$lang) ?>
              </h4>
            <?php //}?>

          <?php echo $abstract ?>

          <?php if ($article["TYPE"] == null) { // THEN IT IS AN EDITOR'S NOTE ?>
            <?php if ($abstract == null) {
                talk("No content is available for display.", "Pas de content consultable pour cet article", $lang);
            } ?>
          <?php } else { // THEN IT IS AN ARTICLE ?>
            <?php if ($abstract == null) {
                talk("No abstract is available for display.", "Pas de résumé consultable pour cet article", $lang);
            } ?>
          <?php } ?>
        </div>


        <br>
        <h5> <?php talk("Download", "Téléchargement", $lang) ?> </h5>

        <a href = '/pdfs/vol<?php echo $article['VOLUME_NUM'] ?>-<?php echo $article['ISSUE_NUM'] ?>/<?php echo $article['FILENAME'] ?>' target='_blank' onClick="parent.location='dltracker.php?item=<?php echo $article['ITEM_ID'] ?>">
          <i class="icon-download"></i>
          <?php echo $article["TITLE"]." (PDF)" ?>

        </a>
        <br>


      <div class="card-share">
        <?php require $_SERVER["DOCUMENT_ROOT"]."/components/shared/share.php" ?>
      </div>
    </div>
    <div class="card">
      <?php
        //Add the comments
        // MUST define identifier first
        $disqus_identifier = "volume/".$article["VOLUME_NUM"]."/issue/".$article["ISSUE_NUM"]."/articles/".$article["ITEM_ID"]; // FIXME ADD ARTICLE INFO
        require $_SERVER["DOCUMENT_ROOT"]."/components/shared/comments.php";
      ?>
    </div>
  </div>

  <div class="col-sm-4">
    <?php require $_SERVER["DOCUMENT_ROOT"]."/components/articles/sidebar.php"; ?>
  </div>
</div>

<?php
  require_once "footer.php";
?>
