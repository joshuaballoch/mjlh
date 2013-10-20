<?php
  echo "<div class=\"card\">";
  $read_more_link = "blog.php?blog_id=". $line['BLOG_ID'];
  echo "<h2><a href =". $read_more_link .">" . $line['TITLE'] . "</a></h2><div class=\"author_stamp\">\n";
  talk ("Posted By","Post&eacute; par",$lang);
  echo " " . $line['AUTHOR'] . " <i>(" . $line['date'] . ")</i></div>\n";
  echo "<div id = 'homeblogentry'>" . printTruncated(800,$line['ENTRY']) . "</div>";
?>
  <a class="read_more" href="<?php echo $read_more_link ?>" >
    <i class="icon-right-circled"></i>
    <?php talk("Read more","En savoir plus",$lang); ?>
  </a>
  </div>
