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

<?php // LINKEDIN SHARE ?>
<a href="https://www.linkedin.com/cws/share?url=http%3A%2F%2Fmjlh.mcgill.ca/blog.php?blog_id=79" class="js-share">
  <i class="icon-linkedin-squared"></i>
</a>

<script type="IN/Share" data-counter="right"></script>
