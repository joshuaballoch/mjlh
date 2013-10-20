<?php

      require_once "header.php";
?>
<div class="row">
  <div class="col-sm-8">
    <div class="header-card">
      <h1>
        <a href="">
          <?php talk("MJLH Online","RDSM En Ligne",$lang); ?>
        </a>
      </h1>
    </div>
      <?php
        // RENDER BLOG POSTS
        $per_page = 5;

        $query = "SELECT BLOG_ID, TITLE, AUTHOR, DATE_FORMAT(BLOG_DATE,'%b. %e, %Y') as date,ENTRY FROM BLOGS order by BLOG_DATE desc limit " . $per_page;
        // Adjust query to deal with pagination!
        if (isset($_REQUEST["page_id"]) && is_numeric($_REQUEST["page_id"])) {
          $offset=$per_page*$_REQUEST["page_id"];
          $query = $query . " OFFSET " . $offset;
        }
        $result = mysql_query($query, GetMyConnection()) or die('Error getting blog entry: ' . mysql_error());
        if (mysql_num_rows($result)) {
          while ($line = mysql_fetch_array($result)) {
            require $_SERVER["DOCUMENT_ROOT"]."/components/blog/post.php";
          }
        }


      ?>

      <?php
        $paginated_table_name = "BLOGS";
        require($_SERVER["DOCUMENT_ROOT"]."/components/shared/paginator.php");
      ?>
  </div>
  <div class="col-sm-4">
    <?php require $_SERVER["DOCUMENT_ROOT"]."/components/shared/sidebar.php"; ?>
  </div>
</div>



<?php

      require_once "footer.php";
?>
