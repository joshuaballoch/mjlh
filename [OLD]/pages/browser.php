<?
	// Textes divers
	

	$misc_text[2]["en"] = "Table of Contents";
	$misc_text[2]["fr"] = "Table des mati&egrave;res";
	
	$misc_text[3]["en"] = "close";
	$misc_text[3]["fr"] = "fermer";
	
	$misc_text[4]["en"] = "Download as PDF";
	$misc_text[4]["fr"] = "T&eacute;l&eacute;charger en format PDF";
	
	$misc_text[5]["en"] = "this article";
	$misc_text[5]["fr"] = "cet article";
	
	$misc_text[6]["en"] = "this issue";
	$misc_text[6]["fr"] = "ce num&eacute;ro";
		
	$misc_text[7]["en"] = "Previous";
	$misc_text[7]["fr"] = "Pr&eacute;c&eacute;dent";
		
	$misc_text[8]["en"] = "Next";
	$misc_text[8]["fr"] = "Suivant";
	
	$text = intval($_GET['text']);
	
	
	// Valeurs par defaut:
	if (!$text)
	{
		$vol = intval($_GET['vol']);
		if ($vol) // Si le texte n'est pas specifie, mettre premier article du volume specifie
		{
			$result=mysql_query("SELECT id FROM mhlp_texts WHERE volume='$vol' ORDER BY id LIMIT 1;");
			$res_object=mysql_fetch_object($result);
			$text = intval($res_object->id);
		}
		else // Si le volume non plus n'est pas specifie, mettre premier texte du dernier volume
		{
			$result=mysql_query("SELECT id FROM mhlp_volumes ORDER BY id LIMIT 1;");
			$res_object=mysql_fetch_object($result);
			$vol = intval($res_object->id);
			
			$result=mysql_query("SELECT id FROM mhlp_texts WHERE volume='$vol' ORDER BY id LIMIT 1;");
			$res_object=mysql_fetch_object($result);
			$text = intval($res_object->id);
		}
	}
	else
	{
		$result=mysql_query("SELECT volume FROM mhlp_texts WHERE id='$text';");
		$res_object=mysql_fetch_object($result);
		$vol = intval($res_object->volume);
	}
		
	$result=mysql_query("SELECT * FROM mhlp_volumes WHERE id='$vol';");
	$curvol=mysql_fetch_object($result);

	$result=mysql_query("SELECT * FROM mhlp_texts WHERE id='$text';");
	$curtext=mysql_fetch_object($result);
?>

<!-- Script pour faire apparaître la table des matières -->

<script language="javascript">

function show_toc()
{
	 document.getElementById('overlay').style.display='block';
	document.getElementById('toc').style.display='block';
	document.getElementById('curPage').style.visibility='hidden';
}

function hide_toc()
{
 	document.getElementById('toc').style.display='none';
	document.getElementById('overlay').style.display='none';
	document.getElementById('curPage').style.visibility='visible';
}

</script>

<!-- fin du script -->

<!-- Table des matières et masque transparent -->

<div id="overlay" class="overlay"></div> 

<div id="toc" class="lightbox">

<div class="header3" style="float:left"><?=$misc_text[1][$sess->lang]?></div><div style="float:right; cursor:pointer;" onclick="hide_toc();"><b><?=$misc_text[3][$sess->lang]?> [x]</b></div><br clear="all" /><br />

<?

$result=mysql_query("SELECT * FROM mhlp_texts WHERE volume='$vol' ORDER BY category, textorder;");
$cat=0;
while($row=mysql_fetch_object($result))
{
	if ($row->category != $cat && $row->category != '1') {
		if ($row->category!='5')
		{
			echo "<div style='margin-top:5px; margin-bottom:3px; font-weight:bold; font-size:13px; color:#000000;border-bottom:1px dotted #DDDDDD'>".$categories[$row->category]."</div>";
		}
		else
		{
			echo "<br>";
		}
	}
	$cat=$row->category;
?>
<div style="padding-bottom:5px;">
	<div style="font-size:8pt;"><a href="page.php?id=browser&text=<?=$row->id?>"><?=$row->title?></a></div>
</div>
<?
}

	
	
?>

</div>

<!-- Fin de la table des matieres -->


<div style="margin-right:5px; line-height:normal; 895px; text-align:left">

<table width="876" border="0">

  <tr>
  	<td width="198" valign="top"><a href="javascript:;" onclick="show_toc()">
  	  <div style="font-size:14px;"><b>[+] <?=$misc_text[2][$sess->lang]?></b></div></a></td>
    <td width="475" align="center"><div class="header2"><?=$misc_text[1][$sess->lang]?></div>
    <b><div class="header4"><?=$curtext->title?></div>
      <div style="margin-top:-3px;margin-bottom:10px;font-size:10px;"><i><?=$curtext->author?></i></div></td>
    <td width="189" align="right" valign="top"><b><?=$misc_text[4][$sess->lang]?></b><br />
       <a href="texts/volume<?=$curtext->volume?>/pdf/<?=$curtext->pdf?>"><?=$misc_text[5][$sess->lang]?></a> | <a href="texts/volume<?=$curtext->volume?>/pdf/<?=$curvol->fulltext?>"><?=$misc_text[6][$sess->lang]?></a><br />
    </td>
  </tr>
</table>
<a id="page_top"></a>
<table width="878" border="0" bgcolor="#F9F9F9" class="browser_top">
  <tr>
    <td width="82" align="left"><div id='prev1' style="visibility:hidden" class="browser_options" onclick="previous(0)">&nbsp;&nbsp;<?=$misc_text[7][$sess->lang]?></div></td>
    <td width="711" align="center"><select name="curPage" style="z-index:2;" id="curPage" onchange="goToPage(this.value)">
<?
	for ($i=$curtext->page_low; $i<=$curtext->page_high; $i++)
	{
		echo '<option value="'.$i.'">page '.$i.'</option>';
	}
?>
</select>
</td>
    <td width="71" align="right"><div id='next1'<? if ($curtext->page_low == $curtext->page_high) echo 'style="visibility:hidden"';?> class="browser_options" onclick="next(0)"><?=$misc_text[8][$sess->lang]?>&nbsp;&nbsp;</div></td>
  </tr>
</table>

<?
$curpage = $curtext->page_low+2;
?>
<img id="currentPage" name="currentPage" src="texts/volume<?=$curtext->volume?>/gif/MHLP-full-text-<?=$curpage?>.gif" style="border: 1px solid #CCCCCC; border-bottom:1px solid #EEEEEE; border-top:1px solid #EEEEEE;" />
<table width="878" border="0" bgcolor="#F9F9F9" class="browser_bottom">
  <tr>
    <td width="801" align="left"><div id="prev2" style="visibility:hidden" class="browser_options" onclick="previous(1)">&nbsp;&nbsp;<?=$misc_text[7][$sess->lang]?></div></td>
    <td width="67" align="right"><div id="next2"<? if ($curtext->page_low == $curtext->page_high) echo 'style="visibility:hidden"';?> class="browser_options" onclick="next(1)"><?=$misc_text[8][$sess->lang]?>&nbsp;&nbsp; </div></td>
  </tr>
</table>
</div>


<script language="javascript">

function zero_fill(str, zeros)
{
	var z_page = new String(str);
	len = z_page.length;
	for (i=0; i<3-len; i++){
		z_page = "0"+z_page;
	}
	return z_page;
}

function goToPage(page,jump)
{
	document.getElementById('curPage').value = page;
	z_page = parseFloat(page)+2;
	document.getElementById('currentPage').src="texts/volume<?=$curtext->volume?>/gif/MHLP-full-text-" + z_page + ".gif";
	
	if (page==<?=$curtext->page_high?>)
	{
		document.getElementById('next1').style.visibility='hidden';
		document.getElementById('next2').style.visibility='hidden';
	}
	else
	{
		document.getElementById('next1').style.visibility='visible';
		document.getElementById('next2').style.visibility='visible';
	}
	
	if (page==<?=$curtext->page_low?>)
	{
		document.getElementById('prev1').style.visibility='hidden';
		document.getElementById('prev2').style.visibility='hidden';
	}
	else
	{
		document.getElementById('prev1').style.visibility='visible';
		document.getElementById('prev2').style.visibility='visible';
	}
	
	if (jump) {
	window.location = "#page_top";
	}
}

function previous(jump) 
{
	prevPage = parseFloat(document.getElementById('curPage').value)-1;
	goToPage(prevPage,jump);
}

function next(jump) 
{
	nextPage = parseFloat(document.getElementById('curPage').value)+1;
	goToPage(nextPage,jump);
}
</script>
