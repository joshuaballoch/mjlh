
         </div>      <!--container-inner-->
    </div>           <!--container-->
    <footer>
         <div id = "footer-inner">

         </div>
    </footer>

          <!--HTML for the Drop Down Menus associated with Top Menu Bar-->
          <!--They should be inserted OUTSIDE any element other than the BODY tag itself-->
          <!--A good location would be the end of the page (right above "</BODY>")-->

          <!--'Colloquium' Submenu-->
          <ul id="colloquiumsubmenu" class="ddsubmenustyle">
          <li><a href="page.php?id=colloquiumreg"><?php talk("REGISTER FOR THE COLLOQUIUM NOW!","R&eacute;actions",$lang); ?></a></li>
          <li><a href="page.php?id=colloquiumspeakers"><?php talk("Speakers","Conf&eacute;renciers",$lang); ?></a></li>
          <li><a href="page.php?id=colloquiumsched"><?php talk("Schedule","Programme",$lang); ?></a></li>
          </ul>

          <!--'About the MJLH' Submenu-->
          <ul id="aboutsubmenu" class="ddsubmenustyle">
          <li><a href="masthead.php"><?php talk("Mastheads","Comit&eacute;s de r&eacute;daction",$lang); ?></a></li>
          <li><a href="page.php?id=advisoryboard"><?php talk("Advisory Board","Comit&eacute; consultatif",$lang); ?></a></li>
          <li><a href="page.php?id=recruitment"><?php talk("Student Recruitment","&Eacute;tudiants de McGill",$lang); ?></a></li>
          <li><a href="page.php?id=subscriptions"><?php talk("Subscriptions","Abonnements",$lang); ?></a></li>
          <li><a href="page.php?id=donations"><?php talk("Donations","Dons",$lang); ?></a></li>
          </ul>


      <script type="text/javascript">
      var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
      document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
      </script>
      <script type="text/javascript">
      var pageTracker = _gat._getTracker("UA-6281539-1");
      pageTracker._trackPageview();
      </script>


    </body> <!-- starts in header.php -->
</html> <!-- starts in header.php -->
