<?
$r=$_GET['r'];
if (!intval($r))
	$r=1;
	
$res_title = array();

$res_title['en'][1]="Forum Policy";
$res_title['en'][2]="Forum Procedure";

$res_title['fr'][1]="Normes du forum";
$res_title['fr'][2]="Processus d'&eacute;valuation";

?>


<div class="browser_list">
<div class="header2" style="margin-bottom:5px"><?=$misc_text['submit'][$sess->lang]?></div>
<?
$x=0;
foreach ($res_title[$sess->lang] as $value)
{
	$x++;
	echo '<div';
	if ($x == $r) echo ' class="current_article"';
	echo ' style="margin-bottom:5px;"><a href="page.php?id=submit_comment&r='.$x.'">'.$value.'</a></div>';
}

?>
<div class="header3" style="margin-top:20px"><?=$misc_text['seealso'][$sess->lang]?></div>
<div style="margin-bottom:5px;"><a href="page.php?id=forum"><?=$misc_text['whatis'][$sess->lang]?></a></div>
<div><a href="page.php?id=visit_forum"><?=$misc_text['visit'][$sess->lang]?></a></div>

</div>

<div style="float:right; margin-right:5px; padding-left:10px; line-height:normal; width:645px; text-align:left; border-left:1px solid #ECECEC; text-align:justify">
<? 
$sub_page="forum/".$r."_".$sess->lang.".php";
$unilingual=0;

if (!file_exists($sub_page))
{
	if ($sess->lang == "fr")
		$sub_page="forum/".$r."_en.php";
	else
		$sub_page="forum/".$r."_fr.php";
	$unilingual=1;
}

include($sub_page); 
?>
</div>
<br>