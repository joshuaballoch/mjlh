<?php require $_SERVER["DOCUMENT_ROOT"]."/components/sidebar_cards/search.php"; ?>
<?php require $_SERVER["DOCUMENT_ROOT"]."/components/sidebar_cards/announcements.php"; ?>
<?php
  // SHOW THE OTHER ARTICLES IN THIS VOLUME
  $volume_card_volume = $article["VOLUME_NUM"];
  $volume_card_issue = $article["ISSUE_NUM"];
  require $_SERVER["DOCUMENT_ROOT"]."/components/sidebar_cards/volume.php";
?>
<?php require $_SERVER["DOCUMENT_ROOT"]."/components/sidebar_cards/volumes.php"; ?>
<?php require $_SERVER["DOCUMENT_ROOT"]."/components/sidebar_cards/twitter_feed.php"; ?>
