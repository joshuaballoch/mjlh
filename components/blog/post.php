<?php
  echo "<div class=\"card\">";
  $read_more_link = "blog.php?blog_id=". $line['BLOG_ID'];
  echo "<h2><a href =". $read_more_link .">" . $line['TITLE'] . "</a></h2><div style = \"padding-bottom: 5px; border-bottom: 1px dotted black;\">\n";
  talk ("Posted By","Post&eacute; par",$lang);
  echo " <strong>" . $line['AUTHOR'] . "</strong> <i>(" . $line['date'] . ")</i></div>\n";
  echo "<div id = 'homeblogentry'>" . printTruncated(800,$line['ENTRY']) . "</div>";
?>
  <a class="read_more" href="<?php echo $read_more_link ?>" >
    <?php talk("Read more","En savoir plus",$lang); ?>
  </a>
  </div>
