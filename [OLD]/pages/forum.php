<?
$r=$_GET['r'];
if (!intval($r))
	$r=1;
	
$res_title = array();

$res_title['en'][1]="What is the Forum?";
$res_url['en'][1]="forum";

$res_title['fr'][1]="Qu'est-ce que le forum?";
$res_url['fr'][1]="forum";


?>


<div class="browser_list">
<div class="header2" style="margin-bottom:5px">Forum</div>
<?
$x=0;
foreach ($res_title[$sess->lang] as $value)
{
	$x++;
	echo '<div';
	if ($x == $r) echo ' class="current_article"';
	echo ' style="margin-bottom:5px;"><a href="page.php?id='.$res_url[$sess->lang][$x].'">'.$value.'</a></div>';
}

?>
<div class="header3" style="margin-top:20px"><?=$misc_text['seealso'][$sess->lang]?></div>
<div style="margin-bottom:5px;"><a href="page.php?id=submit_comment"><?=$misc_text['submit'][$sess->lang]?></a></div>
<div style="margin-bottom:5px;"><a href="page.php?id=visit_forum"><?=$misc_text['visit'][$sess->lang]?></a></div>
</div>

<div style="float:right; margin-right:5px; padding-left:10px; line-height:normal; width:645px; text-align:left; border-left:1px solid #ECECEC; text-align:justify">
<? 
include("pages/wi_forum.php"); 
?>
</div>
<br>