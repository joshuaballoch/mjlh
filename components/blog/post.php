<?php
  $read_more_link = "blog.php?blog_id=". $line['BLOG_ID'];
?>

<div class="card highlight-links">
  <h2>
    <a href="<?php echo $read_more_link ?>">
      <?php echo $line['TITLE'] ?>
    </a>
  </h2>
  <div class="author_stamp">
    <?php talk("Posted By", "Post&eacute; par", $lang); ?>
    <?php echo " ".$line['AUTHOR']." "?>
    <i>
      <?php echo "(".$line['date'].")"?>
    </i>
  </div>
  <div class = 'content'>
    <?php
      printTruncated(800,$line['ENTRY']);
    ?>
  </div>

  <a class="read_more" href="<?php echo $read_more_link ?>" >
    <i class="icon-right-circled"></i>
    <?php talk("Read more","En savoir plus",$lang); ?>
  </a>
</div>
