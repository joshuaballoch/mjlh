<?php
      require_once "header.php";
?>

<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <?php
        if (array_key_exists('id', $_GET))
        {
           $query = "select ".$lang." from CONTENT where content_id =".clean_input($_GET['id']);
           $result = mysql_query($query, GetMyConnection()) or die('Error getting contents: ' . mysql_error());
           $line = mysql_fetch_array($result);
           echo $line[0];
        }
      ?>
      <div class="card-share">
        <?php require $_SERVER["DOCUMENT_ROOT"]."/components/shared/share.php" ?>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <?php
      $request_uri = $_SERVER["REQUEST_URI"];
      if ( $request_uri === "/page.php?id=about" || $request_uri === "/page.php?id=advisoryboard" || $request_uri === "/page.php?id=recruitment" || $request_uri === "/page.php?id=subscriptions" || $request_uri === "/page.php?id=donations" ) {
        require $_SERVER["DOCUMENT_ROOT"]."/components/sidebar_cards/about.php";
      }
      require $_SERVER["DOCUMENT_ROOT"]."/components/shared/sidebar.php";
    ?>
  </div>
</div>

<?php
  require_once "footer.php";
?>
