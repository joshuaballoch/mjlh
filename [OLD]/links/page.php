<?
@session_start();

session_start(); 
include("includes/db_connect.php"); // Accès à la banque de données

if (!session_is_registered("counted")){   // Compteur
    mysql_query("UPDATE mhlp_simplecount SET count=(count + 1) WHERE id=1"); 
session_register("counted"); 
} 

ini_set('display_errors', '1'); // Afficher les erreurs PHP

include("includes/sess.inc.php");  // Variable de session pour retenir le choix de langue
$sess = new Sess;

function switch_lang()
{
	$u = $_SERVER['REQUEST_URI'];
	if (strpos($u,'?') <= 0)
		return $u.'?switch=1';
	else
		return $u.'&switch=2';
}

if (intval($_GET["switch"]))
{
	$sess->switch_lang();
	if ($_GET["switch"]=="1")
		$ln = str_replace("?switch=1","",$_SERVER['REQUEST_URI']);
	else
		$ln = str_replace("&switch=2","",$_SERVER['REQUEST_URI']);
	redirect($ln);
}

function redirect($url)
{
	if (headers_sent())
	{
?>
<script type="text/javascript">
<!--
window.location = "<?=$url?>"
//-->
</script>
<?
	}
	else
	{
		header("location: ".$url);
	}
	die();
}



// Sections du menu

$menu_title[1]['en']="The Publication";
$menu_title[2]['en']="Forum";
$menu_title[3]['en']="Submissions";
$menu_title[4]['en']="Peer Reviewers";
$menu_title[5]['en']="McGill Students";
$menu_title[6]['en']="Advisory Board";
$menu_title[7]['en']="Mastheads";
$menu_title[8]['en']="Resources";

$menu_title[1]['fr']="La publication";
$menu_title[2]['fr']="Forum";
$menu_title[3]['fr']="Soumissions";
$menu_title[4]['fr']="Révision par les pairs";
$menu_title[5]['fr']="Étudiants de McGill";
$menu_title[6]['fr']="Comité consultatif";
$menu_title[7]['fr']="Comités de rédaction";
$menu_title[8]['fr']="Ressources";

// Catégories d'articles
$categories[2]="Articles";
$categories[3]="Opinions";
$categories[4]="Book reviews";
$categories[5]="&nbsp;";

// Textes divers
$misc_text[1]["en"] = "Volume 1, April 2007";
$misc_text[1]["fr"] = "Volume 1, Avril 2007";

$misc_text[2]["en"] = "Volume 1, August 2008";
$misc_text[2]["fr"] = "Volume 1, Ao&ocircu;t 2008";

$misc_text[3]["en"] = "Past Volumes";
$misc_text[3]["fr"] = "Anciens volumes";

$misc_text['seealso']["en"] = "See also";
$misc_text['seealso']["fr"] = "Voir aussi";

// Forum

$misc_text['whatis']['en'] = "What is the Forum?";
$misc_text['whatis']['fr'] = "Qu'est-ce que le forum?";

$misc_text['submit']['en'] = "Submit a Comment";
$misc_text['submit']['fr'] = "Contribuez au Forum";

$misc_text['visit']['en'] = "Visit the Forum";
$misc_text['visit']['fr'] = "Visitez le forum";

$misc_text['download']['en'] = "Download (PDF)";
$misc_text['download']['fr'] = "Télécharger (PDF)";

$id = $_GET['id'];

$page = "pages/".$id.".php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MJLH | RDSM</title>
<link href="layout.css" rel="stylesheet" type="text/css" />
<link href="lightbox.css" rel="stylesheet" type="text/css" />
</head>

<body style="text-align:center">
<? include("includes/submenus_".$sess->lang.".htm"); // Tables des sous-menus ?>

<div align="center">
    
<!-- Entête du site -->
    <div id="header_frame">
        <div style="float:right; margin-right: 7px;">
        	<a href="<? echo switch_lang(); ?>"><img src="images/<? if ($sess->lang=="en") echo "versionfrancaise"; else echo "englishversion"; ?>.gif" border="0"/></a>
        </div>
	</div>
<!-- Fin de l'entête -->

<div style="background-color:#EFEFEF; width:918px; height:20px; margin-top:-12px; vertical-align:middle ;background-image: url(images/menu_bg.jpg);">
    <div id="menu_table">
    	<table width=900 align="center" style="height:16px; margin-top:1px;" cellspacing="0">
          <tr align="center">
                <td width="101" style="border-left:none;" onMouseOver="show_submenu(this,'submenu1');" onMouseOut="hide_menu('submenu1');">
                    <?=$menu_title[1][$sess->lang];?>              </td>
            <td width="79" onMouseOver="show_submenu(this,'submenu2');" onMouseOut="hide_menu('submenu2');">
            <?=$menu_title[2][$sess->lang];?>                 </td>
            <td width="97" onClick="jump_to('submissions');">
                    <?=$menu_title[3][$sess->lang];?>            </td>
                
            <td width="140" onClick="jump_to('peer_reviewers');">
                    <?=$menu_title[4][$sess->lang];?>            </td>
            <td width="123" onClick="jump_to('students');">
                    <?=$menu_title[5][$sess->lang];?>            </td>
            <td width="121" onClick="jump_to('board');">
                    <?=$menu_title[6][$sess->lang];?>            </td>
            <td width="126" onMouseOver="show_submenu(this,'submenu3');" onMouseOut="hide_menu('submenu3');">
                    <?=$menu_title[7][$sess->lang];?>            </td>
            <td width="95" onMouseOver="show_submenu(this,'submenu5');" onMouseOut="hide_menu('submenu5');">
                    <?=$menu_title[8][$sess->lang];?>            </td>

          </tr>
      </table>
    </div>
</div>

<!-- Contenu principal -->
    <div id="main_frame">
        <div id="page_contents">
        <?  include($page); ?>
        </div>
    <br clear="all" />
    </div>
<!-- Fin du contenu principal -->

<!-- Footer du site -->
    <div id="footer"></div>
<!-- Fin du Footer -->

</div>
<script src="http://www.google-analytics.com/urchin.js"
type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2798411-1";
urchinTracker();
</script>

</body>
</html>
