<ul class="pagination">
  <?php
    if ( !isset($paginated_table_name) ) { die('Cannot run paginator without a table name'); };
    if ( !isset($per_page)) { die('Cannot run paginator without a per page variable'); };

    $object_count_query = "SELECT COUNT(*) as count FROM " . $paginated_table_name ;

    $object_count_result = mysql_query($object_count_query, GetMyConnection()) or die('Error getting blog entry: ' . mysql_error()) ;

    $object_count = mysql_fetch_object($object_count_result) -> count;

    $max_pages = round($object_count/$per_page);

    if (isset($_REQUEST["page_id"]) && is_numeric($_REQUEST["page_id"])) {
      $prev_page_id = $_REQUEST["page_id"]-1;
      $next_page_id = $_REQUEST["page_id"]+1;
    } else {
      $prev_page_id = null;
      $next_page_id = 2;
    }

    // Disable next page link if at the last page
    if (isset($_REQUEST["page_id"]) && $_REQUEST["page_id"] >= $max_pages) {
      $next_page_id = null;
    }
  ?>

  <li class="<?php if (!is_numeric($prev_page_id)) {echo 'disabled'; }?>">
    <?php
      if (is_numeric($prev_page_id)) {
        echo "<a href=\"?page_id=$prev_page_id\">&laquo;</a>";
      } else {
        echo "<a> &laquo;</a>";
      }
    ?>
  </li>
  <li class="<?php if (!is_numeric($next_page_id)) {echo 'disabled'; }?>">
    <?php
      if (is_numeric($next_page_id)) {
        echo "<a href=\"?page_id=$next_page_id\">&raquo;</a>";
      } else {
        echo "<a> &raquo; </a>";
      }
    ?>
  </li>
</ul>
