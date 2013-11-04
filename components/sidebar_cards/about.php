<div class="card">
  <h2>
    <a href="page.php?id=about">
      <?php talk("About the MJLH","Apropos de la RDSM",$lang); ?>
    </a>
  </h2>

  <ul>
    <li><a class='<?php if ( $_SERVER["REQUEST_URI"] === "/masthead.php" ) echo "active" ;?>' href="masthead.php"><?php talk("Mastheads","Comités de rédaction",$lang); ?></a></li>
    <li><a class='<?php if ( $_SERVER["REQUEST_URI"] === "/page.php?id=advisoryboard" ) echo "active" ;?>' href="page.php?id=advisoryboard"><?php talk("Advisory Board","Comité consultatif",$lang); ?></a></li>
    <li><a class='<?php if ( $_SERVER["REQUEST_URI"] === "/page.php?id=recruitment" ) echo "active" ;?>' href="page.php?id=recruitment"><?php talk("Student Recruitment","Étudiants de McGill",$lang); ?></a></li>
    <li><a class='<?php if ( $_SERVER["REQUEST_URI"] === "/page.php?id=subscriptions" ) echo "active" ;?>' href="page.php?id=subscriptions"><?php talk("Subscriptions","Abonnements",$lang); ?></a></li>
    <li><a class='<?php if ( $_SERVER["REQUEST_URI"] === "/page.php?id=donations" ) echo "active" ;?>' href="page.php?id=donations"><?php talk("Donations","Dons",$lang); ?></a></li>
  </ul>
</div>
