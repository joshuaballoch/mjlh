
         </div>      <!--container-inner-->
    </div>           <!--container-->
    </div> <!-- end #wrap for sticky footer -->
    <footer>
          <div id="footer-inner" class="container">
            <div class="row">
              <div class="col-md-3">
                <h3><a href="page.php?id=about" rel="aboutsubmenu"><?php talk("ABOUT THE MJLH","ÀPROPOS DE LA RDSM",$lang); ?></a></h3>
                <ul>
                  <li><a href="masthead.php"><?php talk("Mastheads","Comités de rédaction",$lang); ?></a></li>
                  <li><a href="page.php?id=advisoryboard"><?php talk("Advisory Board","Comité consultatif",$lang); ?></a></li>
                  <li><a href="page.php?id=recruitment"><?php talk("Student Recruitment","Étudiants de McGill",$lang); ?></a></li>
                  <li><a href="page.php?id=subscriptions"><?php talk("Subscriptions","Abonnements",$lang); ?></a></li>
                  <li><a href="page.php?id=donations"><?php talk("Donations","Dons",$lang); ?></a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h3><a href="page.php?id=contact"><?php talk("CONTACT","NOUS JOINDRE",$lang); ?></a></h3>
                <!--
                  <?php talk("McGill Journal of Law & Health","Revue de Droit et Santé de McGill",$lang); ?><br>
                  <?php talk("Faculty of Law - McGill University","Faculté de Droit - Université McGill",$lang); ?><br>
                  <?php talk("3644 Peel Street, Rm. 305","3644, Rue Peel, Bureau 305",$lang); ?><br>
                  Montréal, Quebec H3A 1W9 <br>
                  Tel.: (514) 398-5960<br>
                -->
                <ul>
                  <li><?php talk("McGill Journal of Law & Health","Revue de Droit et Santé de McGill",$lang); ?></li>
                  <li><?php talk("Faculty of Law - McGill University","Faculté de Droit - Université McGill",$lang); ?></li>
                  <li><?php talk("3644 Peel Street, Rm. 305","3644, Rue Peel, Bureau 305",$lang); ?></li>
                  <li>Montréal, Quebec H3A 1W9</li>
                  <li>Tel.: (514) 398-5960</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h3>More Infor</h3>
              </div>
            </div>
          </div>
        <div class="footer-shadow">
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
