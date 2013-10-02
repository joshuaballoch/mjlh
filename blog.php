<?php
      require_once "header.php";
?>

<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <h1>
        <a href="/">
          <?php talk("MJLH Online","RDSM en ligne",$lang); ?>
        </a>
      </h1>
    </div>
    <div class="card">
      <?php
        // Base Query
        $query = "SELECT BLOG_ID, TITLE, AUTHOR, DATE_FORMAT(BLOG_DATE,'%b. %e, %Y') as date,ENTRY FROM BLOGS ";
        // Where Clause
        $whereclause = "order by BLOG_DATE desc limit 1";
        if (isset($_REQUEST['blog_id']) && is_numeric($_REQUEST['blog_id']) )
        {
          $whereclause = " where blog_id = " . clean_input($_REQUEST['blog_id']);
        } else {
          // Do an error without a blog_id
          die('Cannot load blog without blog_id');
        }
        // Fetch from the db
        $result = mysql_query($query.$whereclause, GetMyConnection()) or die('Error getting blog entry: ' . mysql_error());
        $line = mysql_fetch_array($result);

        $current_blog_id = $line['BLOG_ID'];
      ?>
      <h2><?php echo $line['TITLE'] ?></h2>

      <?php talk ("Posted By", "Posté par",$lang) ?>
      <?php echo $line['AUTHOR'] ?>
      <?php echo $line['date'] ?>
      <?php echo $line['ENTRY'] ?>
      <div class="card-share">
        <?php talk ("Share", "Partagez", $lang) ?>
        <?php // FACEBOOK SHARE ?>
        <a href="#"
        onclick="
          window.open(
            'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),
            'facebook-share-dialog',
            'width=626,height=436');
          return false;">
        <i class="icon-facebook-squared"></i>
        </a>

        <?php // TWITTER SHARE ?>
        <a href="https://twitter.com/share" class="twitter-share-button"><i class="icon-twitter-squared"></i></a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
      </div>
    </div>
    <div class="card">

      <?php
        //Add the comments
        // MUST define identifier first
        $disqus_identifier = "blogs/".$_REQUEST['blog_id'];
        require $_SERVER["DOCUMENT_ROOT"]."/components/shared/comments.php";
      ?>
    </div>
  </div>
  <div class="col-sm-4">
    <?php require $_SERVER["DOCUMENT_ROOT"]."/components/shared/sidebar.php"; ?>
  </div>
</div>

<?php
  require_once "footer.php";
?>
