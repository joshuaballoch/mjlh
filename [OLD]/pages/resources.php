<?
$r=$_GET['r'];
if (!intval($r))
	$r=1;
	
$res_title = array();

$res_title['en'][1]="Online Pharmacies/Drug Sales";
$res_title['en'][2]="Scientific Fraud";
$res_title['en'][3]="Health Information";
$res_title['en'][4]="Reproductive Technologies";
$res_title['en'][5]="Assisted Suicide";
$res_title['en'][6]="The Changing Structure of Canadian Health Care";
$res_title['en'][7]="The Chaoulli Decision";

$res_title['fr'][1]="Pharmacies en-ligne/vente de m&eacute;dicaments";
$res_title['fr'][2]="Fraude scientifique";
$res_title['fr'][3]="Informations m&eacute;dicales";
$res_title['fr'][4]="Technologies de reproduction";
$res_title['fr'][5]="Suicide assist&eacute;";
$res_title['fr'][6]="La structure changeante des soins de sant&eacute; au Canada";
$res_title['fr'][7]="La d&eacute;cision Chaoulli";

$misc_text['links']["en"]="Links";
$misc_text['links']["fr"]="Liens";
?>


<div class="browser_list">
<div class="header2" style="margin-bottom:5px">Resources</div>
<?
$x=0;
foreach ($res_title[$sess->lang] as $value)
{
	$x++;
	echo '<div';
	if ($x == $r) echo ' class="current_article"';
	echo ' style="margin-bottom:5px;"><a href="page.php?id=resources&r='.$x.'">'.$value.'</a></div>';
}

?>
<div class="header3" style="margin-top:20px"><?=$misc_text['seealso'][$sess->lang]?></div>
<div style="margin-bottom:5px;"><a href="page.php?id=links"><?=$misc_text['links'][$sess->lang]?></a></div>
</div>

<div style="float:right; margin-right:5px; padding-left:10px; line-height:normal; width:645px; text-align:left; border-left:1px solid #ECECEC; text-align:justify">
<? 
$sub_page="resources/".$r."_".$sess->lang.".php";
$unilingual=0;

if (!file_exists($sub_page))
{
	if ($sess->lang == "fr")
		$sub_page="resources/".$r."_en.php";
	else
		$sub_page="resources/".$r."_fr.php";
	$unilingual=1;
}
include("resources/note.php");
include($sub_page); 
?>
</div>
<br>