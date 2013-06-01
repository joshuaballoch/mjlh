<?php
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
//include '_private/db1.php';
//include '_private/constants.php';
include 'header.php';

echo '<head><link rel="stylesheet" href="style.css" type="text/css" /><meta http-equiv="content-type" content="text-html; charset=utf-8"></head>';
echo '<title>MHLP : PDSM</title>';

// CONSTANTS
$lang = $_GET[lang];

//************* MAIN PAGE *************
echo '<div id="main">';

	if ($lang == "fr")
	{
		echo '
		<BR><p>La <em>Publication en droit de la sant&#233 de McGill</em> (PDSM) est une entreprise &#233tudiante en ligne, soutenue par la <a href="http://www.law.mcgill.ca/index-fr.htm">Facult&#233 de droit de l\'Universit&#233 McGill</a>. Ce projet multidisciplinaire consiste d\'une part en une anthologie de contributions par des chercheurs et des praticiens renomm&#233s, r&#233vis&#233es par un comit&#233 de lecture,  et d\'autre part en une banque de donn&#233es en ligne organique se voulant une ressource pour les d&#233veloppements r&#233cents dans le domaine du droit de la sant&#233. Ces deux composantes visent &#224 informer le d&#233bat public autour de la sant&#233, de la politique publique et de l\'&#233thique. La Publication explore de mani&#232re critique le point de rencontre entre la sant&#233 et le droit, dans un cadre transsyst&#233mique.
		</p>
		<p>Avec son <a href="news.php?lang=fr">lancement le 30 avril 2007</a>, la <em>Publication en droit de la sant&#233 de McGill</em> esp&#232re faire figure de ressource &#233ducative tant pour les chercheurs, les &#233tudiants, les professionnels de la sant&#233 et les politiciens, que pour le public en g&#233n&#233ral.
		</p>
		<p>La Publication est g&#233r&#233e par <a href="masthead.php?lang=fr">19 &#233tudiants en droit de l\'Universit&#233 McGill.</a>
		<p>La Publication en droit de la sant&#233 de l\'Universit&#233 McGill pr&#233sente les diff&#233rents articles ci-mentionn&#233s, soumissions receuillies par solicitation et ayant &#233t&#233 &#233valu&#233es par un comit&#233 de pairs.  Les articles sont maintenant disponible ici, ainsi que sur LexisNexis et Westlaw. Pour en savoir plus sur notre Publication, n\'h&#233sitez pas &#224 nous
contacter &#224 l\'adresse suivante: <a href="mailto:editor.mhlp@mail.mcgill.ca">editor.mhlp@mail.mcgill.ca</a>.
<BR><BR>Vous pouvez soit t&#233l&#233charger <a href="pdfs/MHLP full text.pdf">le texte complet de la publication</a> ou choisir un article particulier ci-dessous.
';

	}
	else
	{
		echo '
		<BR><p>The <em>McGill Health Law Publication</em> (MHLP) is a student-run, on-line endeavor sponsored by the <a href="http://www.law.mcgill.ca/">Faculty of Law at McGill University</a>. The MHLP is an interdisciplinary project consisting of a peer-reviewed anthology featuring scholarly contributions by renowned academics and practitioners alongside an organic on-line database - a resource of recent developments in the field of health law. Both components aim to inform the vital public debate surrounding health, public policy and ethics and to critically explore the nexus of health and law in a transsystemic framework. 
		</p>
		<p>With our <a href="news.php?lang=en">April 30th, 2007, launch</a>, the <EM>McGill Health Law Publication</EM> serves as an educational resource for academics, students, healthcare professionals, policy-makers, and the general public alike.  The Publication is run by <a href="masthead.php?lang=en">these McGill law students</a>.
		<p>The MHLP features the following peer-reviewed, solicited submissions. The online release is now available <a href="pdfs/MHLP full text.pdf">here</a>, on LexisNexis, and on Westlaw. To find out more about the MHLP, including our submissions policy, please do not hesitate to contact us at: <a href="mailto:editor.mhlp@mail.mcgill.ca">editor.mhlp@mail.mcgill.ca</a>.
		<BR><BR>Download the <a href="pdfs/MHLP full text.pdf">full text of the publication</a> or select individual components below.
	</p>

		';
	}

// THIS PART IS THE SAME WHETHER IN ENGLISH OR IN FRENCH:
	echo '

		<p><a href="pdfs/editors-note.pdf"><article>Editors\' Note</article></a>
		<br>Daniel L. Ambrosini and Reuven Ashtar 

		<p><a href="pdfs/foreword_kasirer.pdf"><article>Foreword / Avant-Propos</article></a>
		<br><a href="http://people.mcgill.ca/nicholas.kasirer/">Nicholas Kasirer</a> 

<p><b>ARTICLES</b></p>

		<p><a href="pdfs/flood-hardcastle.pdf"><article>Selling Uninsured Cancer Drugs in Public Hospitals: Tough Issues at the Public/Private Interface in Health Care
		</article></a><br><a href="http://www.law.utoronto.ca/faculty_content.asp?profile=24&cType=facMembers&itemPath=1/3/4/0/0">Colleen M. Flood</a> & <a href="http://www.healthlawtraining.ca/alumni/showAlumni.php?sID=45">Lorian Hardcastle</a>

		<p><a href="pdfs/downie-herder.pdf"><article>Reflections on the Commercialization of Research Conducted in Public Institutions in Canada</article></a>
		<br><a href="http://www.healthlawtraining.ca/team_people_downie.php">Jocelyn Downie</a> & Matthew Herder 

		<p><a href="pdfs/noiville-bellivier.pdf"><article>Sant&#233 publique et nouveaux r&#244les du m&#233decin</article></a>
		<br><a href="http://panjuris.univ-paris1.fr/pages/cvnoivil.html">Christine Noiville</a> & Florence Bellivier

		<p><a href="pdfs/baylis-mcinnes.pdf"><article>Warning: Women at Risk Embryonic and Fetal Stem Cell Research in Canada</article></a>
		<br><a href="http://bioethics.medicine.dal.ca/WhoWeAre/Baylis.htm">Fran&ccedil;oise Baylis</a> & Caroline McInnes 

		<p><a href="pdfs/ali.pdf"><article>Defining the Standard of Prenatal Care: An Analysis of Legislative and Judicial Response</article></a>
		<br>Kristin Ali
 
		<p><a href="pdfs/bordet-feldman-knoppers.pdf"><article>Legal Aspects of Animal-Human Combinations in Canada</article></a>
		<br><a href="http://www.humgen.umontreal.ca/int/team.cfm?Id=9">Bartha Knoppers</a>, <a href="http://www.humgen.umontreal.ca/int/team.cfm?Id=216">Sylvie Bordet</a> & <a href="http://www.humgen.umontreal.ca/int/team.cfm?id=267">Sabrina Feldman</a>
 

		<p><b>OPINIONS</b></p>

		<p><a href="pdfs/jones-pre.pdf"><article>Interface of Law and Ethics in Canadian Research Ethics Standards: An Advisory Opinion on Confidentiality, its Limits & Duties to Others</article></a>
		<br><a href="http://www.pre.ethics.gc.ca/english/aboutus/panelmembers/derek.cfm">Derek Jones</a> and <a href="http://www.pre.ethics.gc.ca">PRE</a>
 
		<p><a href="pdfs/lowman-palys.pdf"><article>PRE\'s Opinion on the Interface of Law and Ethics: The "Law of the Land" Doctrine in All But Name</article></a>
		<br>John Lowman & <a href="http://www.sfu.ca/~palys/">Ted Palys</a>

<p>
		<p><a href="pdfs/afterword_baudouin.pdf"><article>Afterword / Postface</article></a>
		<br><a href="http://www.president.uottawa.ca/doctorate-details_93.html">Jean-Louis Baudouin</a> 



	';

echo '</div>';



?>