<?php

      $headtext = '<script type="text/javascript" src="dropdown.js"></script>';
      $headtext .= "\n<script>\nfunction PopupCenter(pageURL, title,w,h) {\nvar left = (screen.width/2)-(w/2);\nvar top = (screen.height/2)-(h/2);\nvar targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);\n}\n</script>\n";
      require_once "header.php";

//      echo "<table<tr><td valign = 'top'>\n";
echo "<div id = 'blogentry'>\n";

      $whereclause = "order by BLOG_DATE desc limit 1";
      if (isset($_REQUEST['blog_id']) && is_numeric($_REQUEST['blog_id']) )
      {
        $whereclause = " where blog_id = " . clean_input($_REQUEST['blog_id']);
      }

      $query = "SELECT BLOG_ID, TITLE, AUTHOR, DATE_FORMAT(BLOG_DATE,'%b. %e, %Y') as date,ENTRY FROM BLOGS ";
      $result = mysql_query($query.$whereclause, GetMyConnection()) or die('Error getting blog entry: ' . mysql_error());
      $line = mysql_fetch_array($result);
      
      /*$runonce = true;

      $displayvolume = 0;
      if (array_key_exists('v', $_REQUEST))
      {
          $displayvolume = clean_input($_REQUEST['v']);
      }

      $displaytext = "";
      $vol_filename = "";
      $switchmenuitems = "";

      while ($line = mysql_fetch_array($result))
      {
        if ($runonce && $displayvolume == 0)
        {
          $runonce = false;
          $displayvolume = $line[0];
          $displaytext = "Volume ". $line[0] . " (" . $line[1] . ")";
          $vol_filename = "vol" . $line[0] . "/" . $line[2];
        }
        else if ($displayvolume == $line[0])
        {
          $displaytext = "Volume ". $line[0] . " (" . $line[1] . ")";
          $vol_filename = "vol" . $line[0] . "/" . $line[2];
        }
        $switchmenuitems .= "<a class='sample_attach' href='volumes.php?v=" . $line[0]. "'>Volume " . $line[0] . " (" . $line[1] . ")</a>\n";
      }   */

      $current_blog_id = 0;
      if (isset($_REQUEST['blog_id']) && is_numeric($_REQUEST['blog_id']) )
      {
         $current_blog_id = clean_input($_REQUEST['blog_id']);
      }
      else
      {
         $current_blog_id = $line['BLOG_ID'];
      }

      echo "<table width = '97%'><tr><td><h1>&nbsp;";
      talk("MJLH Online","RDSM en ligne",$lang);
      echo "</h1></td>";

      echo "<td align = 'right'>\n";
   /*   echo '<div id="sample_attach_menu_parent" class="sample_attach">';
      talk("Past Blog Entries","?????",$lang);
      echo ' <img src = "images/arrow-curve-270.png" align = "middle"></div>';
      echo '<div id="sample_attach_menu_child">';
      
      echo '<a class="sample_attach" href="blog.php">Blog 1</a>';

      echo "</div>";  */
      echo "</td></tr></table>\n";
      ?>

 <!--     <script type="text/javascript">
      at_attach("sample_attach_menu_parent", "sample_attach_menu_child", "click", "y", "pointer");
      </script>  -->
      <?php

      echo "<table width = '100%'><tr><td id = 'blogcontentscell' valign = 'top'>\n";


      echo "<h2>" . $line['TITLE'] . "</h2><div style = \"padding-bottom: 5px; border-bottom: 1px dotted black; font-size: 11px; color: #777777;\">\n";
      talk ("Posted By","Post&eacute; par",$lang);
      echo " <strong>" . $line['AUTHOR'] . "</strong> <i>(" . $line['date'] . ")</i></div>\n";
      echo "<div id = 'blogentrydiv'>" . $line['ENTRY'] . "</div>";
      
      echo "</div>\n";

      echo "<div id = 'blogcommentsdiv'>\n";

      //Comment div content
      echo "<span style = \"float:right;padding-top: 5px;padding-right: 10px;\"><strong><a href = '#' onclick=\"PopupCenter('http://mjlh.mcgill.ca/comment.php?src=b" . $current_blog_id ."&l=" . $lang . "', 'myPop1',400,400);\">";
      talk("Leave a Comment","Laissez un commentaire",$lang);
      echo "</a></strong></span>\n";
      echo "<h4>";
      talk("Your Comments:","Vos pens&eacute;es:", $lang);
      echo "</h4>";

      $query = "select POSTED_BY, COMMENT, DATE_FORMAT(COMMENT_DATE, '<i>(%b. %e, %Y at %l:%i %p ET)</i>') as DATE from COMMENTS where source = 'b" . $current_blog_id . "' order by COMMENT_DATE desc";
      $result = mysql_query($query, GetMyConnection()) or die('Error getting volume contents: ' . mysql_error());
      if (mysql_num_rows($result))
      {
          while ($line = mysql_fetch_array($result))
          {
            echo "<strong>" . htmlentities($line['POSTED_BY']) . "</strong> " . $line['DATE'] . ":<p>" . htmlentities($line['COMMENT']) ."</p>";
             //apply htmlentities or htmlspecialchars to contents of db
          }
      }
      else
      {
        echo "<p><i>";
        talk("No one has commented on this article.","Personne n'a encore comment&eacute;e.",$lang);
        echo "</i></p>\n";
      }

      echo "</div>";
      echo "</td><td valign = 'top'>";
      
      echo "<div id = 'bloglistdiv'><h4>\n";
      talk ("Past Entries:","Derni&egrave;res entr&eacute;es:",$lang);
      echo "</h4>\n";
      $query = "select BLOG_ID, TITLE, AUTHOR, DATE_FORMAT(BLOG_DATE, '<i>(%b. %e, %Y)</i>') as DATE from BLOGS order by BLOG_DATE desc";
      $result = mysql_query($query, GetMyConnection()) or die('Error getting blog contents: ' . mysql_error());
      if (mysql_num_rows($result))
      {
          while ($line = mysql_fetch_array($result))
          {
            echo "<p><a href = 'blog.php?blog_id=" . $line['BLOG_ID'] . "'><strong>" . $line['TITLE'] . "</strong><br> " . $line['AUTHOR'] . "</a> <i>" .  $line['DATE']."</i></p>";
          }
      }
      echo "</div>";

      echo "<div style = \"text-align:center; font-size:12px;padding-top: 5px;\">";
      talk("<b>Want to contribute to the MJLH Online? <a href = 'mailto:manager.mjlh@mail.mcgill.ca?subject=MJLH Online Submission'>Contact us</a>.</b>","<b>Souhaitez-vous contribuer au RDSM en ligne? <a href = 'mailto:manager.mjlh@mail.mcgill.ca?subject=Soumission au RDSM en ligne'>Nous joindre.</a></b>",$lang);
      echo "</div>";

      echo "<div style = \"text-align:left; font-size:10px;padding-top: 5px;\">";
      talk("<b>Policy</b>: The <i>MJLH</i> Online is an extension of our biannual, bilingual, and bijuridical publication. It fosters scholarly discussion of our Journal articles as well as anything else &quothot&quot in health law. The <i>MJLH</i> Online encourages students, scholars, practitioners, and the public alike to contribute ideas touching upon contemporary health law issues in an open and safe environment. Thus comments that are off-topic, discriminatory, or otherwise offensive will be removed without prior notice.", "<b>Notre politique</b>: <i>RDSM en ligne</i> est une addition &agrave; nos publications bilingues semestrielles. Elle encourage une discussion entourant les enjeux soulev&eacute;s par nos articles ou tout sujet d&apos;actualit&eacute; en droit de la sant&eacute;. <i>RDSM en ligne</i> encourage les &eacute;tudiants, universitaires, juristes ainsi que le public &agrave; prendre part aux d&eacute;bats contemporains en sant&eacute; &agrave; l&apos;int&eacute;rieur d&apos;un environnement ouvert et s&eacute;curitaire. C&apos;est ainsi que les commentaires hors sujet, discriminatoires et offensifs seront retir&eacute;s sans avertissement pr&eacute;alable.",$lang);

  echo "<div style = \"text-align:left; font-size:10px;padding-top: 5px;\">";
      talk("<b>Disclaimer</b>: The opinions expressed by <i>MJLH</i> Online contributors are theirs alone, and do not reflect the opinions of the <i>MJLH</i>. Thus, the <i>MJLH</i>, or any member thereof, is not responsible for the accuracy of any of the information supplied by Online contributors. Furthermore, the <i>MJLH</i> Online neither claims to be nor should be used as a substitute for competent legal advice from a licensed lawyer.", "<b>D&eacute;gagement de responsabilit&eacute;</b>: Les opinions exprim&eacute;es sur <i>RDSM en ligne</i> sont celles des participants et ne refl&egrave;tent pas celles de la RDSM. La RDSM, ou ses membres ne garantissent pas la fiabilit&eacute; et la v&eacute;racit&eacute; de l&apos;information partag&eacute;e par les participants de <i>RDSM en ligne</i>. De plus, <i>RDSM en ligne</i> ne pr&eacute;tend pas &ecirc;tre, et ne devrait pas &ecirc;tre, un substitut au conseil juridique d&apos;un avocat d&eacute;tenant un permis d&apos;exercice." ,$lang);

      echo "</div>\n";

      echo "</td></tr></table>\n";

      echo "</div>\n";

      //echo "</div></td></tr></table>\n";

      /*
      if (array_key_exists('id', $_GET))
      {
         $query = "select ".$lang." from CONTENT where content_id =".clean_input($_GET['id']);
         $result = mysql_query($query, GetMyConnection()) or die('Error getting contents: ' . mysql_error());
         $line = mysql_fetch_array($result);
         echo $line[0];
      }   */

      
      
      require_once "footer.php";
?>