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
    <div class="card">
      <h1>
        <?php
          if ($lang == "fr") {
            $date_key = "VOLUME_DATE_FR";
            $issue_text = "Numéro ";
          } else {
            $date_key = "VOLUME_DATE_EN";
            $issue_text = "Issue ";
          }
        ?>
        <a href="/volumes.php?v=<?php echo $article["VOLUME_NUM"]?>&i=<?php echo $article["ISSUE_NUM"]?>">
          <?php echo "Volume ". $volume["VOLUME_NUM"] . ", " . $issue_text . $volume["ISSUE_NUM"] . " (" . $volume[$date_key] . ")";?>
        </a>
      </h1>
    </div>
    <div class="card">
      <?php echo $article["VOLUME_NUM"] ?>
      <div class="card-share">
        <?php require $_SERVER["DOCUMENT_ROOT"]."/components/shared/share.php" ?>
      </div>
    </div>
    <div class="card">
      <?php
        //Add the comments
        // MUST define identifier first
        $disqus_identifier = "volume/".$displayvolume."/issue/".$displayissue."/articles/"; // FIXME ADD ARTICLE INFO
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
