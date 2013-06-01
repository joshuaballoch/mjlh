<?
$r=$_GET['r'];
if (!intval($r))
        $r=1;
        
$res_title = array();

$res_title['en'][1]="Health Law Journals";
$res_title['fr'][1]="Revues en droit de la sant&eacute;";

$res_title['en'][2]="Government - Federal";
$res_title['fr'][2]="Gouvernement - f&eacute;d&eacute;rale";

$res_title['en'][3]="Government - Provincial";
$res_title['fr'][3]="Gouvernement - provincial";

$res_title['en'][4]="United States";
$res_title['fr'][4]="&Eacute;tats-Unis";

$res_title['en'][5]="International";
$res_title['fr'][5]="International";

$res_title['en'][6]="Professional Organizations";
$res_title['fr'][6]="Organisations professionnelles";

$res_title['en'][7]="McGill";
$res_title['fr'][7]="McGill";

$misc_text['res']["en"] = "Resources";
$misc_text['res']["fr"] = "Ressources";

$misc_text['link']["en"] = "Links";
$misc_text['link']["fr"] = "Liens";
?>


<div class="browser_list">
<div class="header2" style="margin-bottom:5px"><?=$misc_text['link'][$sess->lang]?></div>
<?
$x=0;
foreach ($res_title[$sess->lang] as $value)
{
        $x++;
        echo '<div';
        if ($x == $r) echo ' class="current_article"';
        echo ' style="margin-bottom:5px;"><a href="page.php?id=links&r='.$x.'">'.$value.'</a></div>';
}

?>
<div class="header3" style="margin-top:20px"><?=$misc_text['seealso'][$sess->lang]?></div>
<div style="margin-bottom:5px;"><a href="page.php?id=resources"><?=$misc_text['res'][$sess->lang]?></a></div>
</div>

<div style="float:right; margin-right:5px; padding-left:10px; line-height:normal; width:645px; text-align:left; border-left:1px solid #ECECEC; text-align:justify">
<? 
$sub_page="links/".$r."_".$sess->lang.".php";
$unilingual=0;

if (!file_exists($sub_page))
{
        if ($sess->lang == "fr")
                $sub_page="links/".$r."_en.php";
        else
                $sub_page="links/".$r."_fr.php";
        $unilingual=1;
}

include($sub_page); 
?>
</div>
<br>
