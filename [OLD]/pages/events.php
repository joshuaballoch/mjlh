<?
$r=$_GET['r'];
if (!intval($r))
	$r=0;
	
$res_title = array();

$res_title['en'][1]="McGill Health Law Publication Launch";
$res_title['en'][2]="Implementing <em>Chaoulli v. Quebec</em>: Opening the door to private health care in Quebec?";
$res_title['en'][3]="Operation: Coffeehouse";

$res_title['fr'][1]="Lancement de la PDSM";
$res_title['fr'][2]="Implementing <em>Chaoulli v. Quebec</em>: Opening the door to private health care in Quebec?";
$res_title['fr'][3]="Operation: Coffeehouse";

$misc_text['upcoming']['en']="Upcoming Events";
$misc_text['past']['en']="Past Events";

$misc_text['upcoming']['fr']="&Eacute;v&eacute;nements &agrave; venir";
$misc_text['past']['fr']="&Eacute;v&eacute;nements pass&eacute;s";

$misc_text['calendar']['en']="View Calendar";
$misc_text['calendar']['fr']="Consulter le calendrier";

?>


<div class="browser_list">

<!-- BEGINNING OF UPCOMING EVENTS -->
<!--
<div class="header2" style="margin-bottom:5px"><?=$misc_text['upcoming'][$sess->lang]?></div>
<div <? if ($r == 0) echo ' class="current_article"'; ?>><a href="page.php?id=events"><?=$misc_text['calendar'][$sess->lang]?></a></div>
<br> -->
<!-- END OF UPCOMING EVENTS -->

<!-- BEGINNING OF PAST EVENTS -->
<div class="header2" style="margin-bottom:5px"><?=$misc_text['past'][$sess->lang]?></div>
<?
$x=0;
foreach ($res_title[$sess->lang] as $value)
{
	$x++;
	echo '<div';
	if ($x == $r) echo ' class="current_article"';
	echo ' style="margin-bottom:5px;"><a href="page.php?id=events&r='.$x.'">'.$value.'</a></div>';
}

?>
</div>
<!-- END OF PAST EVENTS -->


<div style="float:right; margin-right:5px; padding-left:10px; line-height:normal; width:645px; text-align:left; border-left:1px solid #ECECEC; text-align:justify">
<? 
if ($r)
	$sub_page="events/".$r."_".$sess->lang.".php";
else
	$sub_page="pages/calendar.php";
$unilingual=0;

if (!file_exists($sub_page))
{
	if ($sess->lang == "fr")
		$sub_page="events/".$r."_en.php";
	else
		$sub_page="events/".$r."_fr.php";
	$unilingual=1;
}

include($sub_page); 
?>

</div>
<br>