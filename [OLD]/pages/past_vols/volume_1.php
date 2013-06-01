<div class="header2" style="padding-bottom:0px"><?=$misc_text[1][$sess->lang]?></div><br />
<div class="header3" style="padding-bottom:0px"><a href = "../texts/volume1/pdf/MHLP full text.pdf">[PDF]</a></div><br /><?
$result=mysql_query("SELECT * FROM mhlp_texts WHERE volume='1' ORDER BY category, textorder;");
$cat=0;

while($row=mysql_fetch_object($result))
{
	if ($row->category != $cat && $row->category != '1') {
		echo "<div class='header3' style='margin-top:5px; margin-bottom:5px;'>".$categories[$row->category]."</div>";
	}
	$cat = $row->category;
?>
<div style="padding-bottom:5px; font-size:8pt;">
	<div><strong><a href="../page.php?id=browser&text=<?=$row->id?>"><?=$row->title?></a></strong></div>
    <div style="margin-bottom:5px; font-size:10px;"><b><?=$row->author?></b></div>
</div>
<?
}
?>

