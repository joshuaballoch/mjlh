<?php
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
//include '_private/db1.php';
//include '_private/constants.php';
//include 'login.php';
include 'header.php';

echo '<head><link rel="stylesheet" href="style.css" type="text/css" /></head>';

//************* MAIN PAGE *************
echo '<div id="main">';

	if ($lang == "fr")
	{
		echo '<title>PDSM : ressources</title>';
		echo '<h3 align=center>RESSOURCES</h3>';

	}
	else
	{
		echo '<title>MHLP : resources</title>';
		echo '<h3 align=center>RESOURCES</h3>';
	}

?>
	<BR>
	<li><a href="#drug">Online Pharmacies/Drug Sales</a>
	<li><a href="#fraud">Scientific Fraud</a>
	<li><a href="#info">Health Information</a>
	<li><a href="#reprod">Reproductive Technologies</a>
	<li><a href="#suicide">Assisted Suicide</a>
	<li><a href="#cdn">The Changing Structure of Canadian Health Care</a>
	<BR>

	<BR><a name=drug><h4>Online Pharmacies/Drug Sales</h4></a>
	<BR><p>In the last few years, online pharmacies, especially Canadian online pharmacies, have been a hot topic in the news. Consumer-patients have turned to the internet in an attempt to minimize the cost of pharmaceuticals. This has sparked concern over the safety of drugs purchased with a few keystrokes and mouse-clicks from pharmacies existing somewhere in cyberspace. Are these businesses regulated effectively by governments? Legislation has been tabled in both houses of the US Congress and the FDA and Canadian pharmacists' organizations have issued guidelines and policies for buying pharmaceuticals online as regulators attempt to keep up with technology. 

	<p>The "Ryan Haight Act" co-sponsored by Congressmen Waxman and <a href="http://tomdavis.house.gov/cgi-data/news/files/153.shtml">Davis</a> in Congress and by Senators <a href="http://feinstein.senate.gov/05releases/r-internet-pharm.htm">Feinstein</a> and Coleman in the Senate introduced to the US Congress on February 16, 2005. The bill was referred to the Subcommittee on Health on March 14, 2005.
	<ul>
	<li>The text and status of the bill can be tracked at these two websites:
<BR><a href="http://www.govtrack.us/congress/bill.xpd?tab=main&bill=h109-840">govtrack</a> and <a href="http://thomas.loc.gov/cgi-bin/query/z?c109:H.R.1808:">library of congress</a>
	</ul>
	<p>The following several websites provide advice on precautions to take when buying pharmaceuticals online.
	<ul>
	<li>FDA testimony on <a href="http://www.fda.gov/ola/2004/internetdrugs0318.html">online drug sales</a> and <a href="http://www.fda.gov/buyonline/">guidelines</a>
	<li><a href="http://www.napra.org/docs/0/95/158/186.asp">National Association of Pharmacy Regulatory Authorities (Canada) on Internet Standards</a>
	<li>Report by the Ordre des pharmaciens du Qu&#233bec on <a href="http://www.opq.org/fr/prise_position/memoires/PDF/chantier%20bernier%20V%20JUIN_.pdf">21st century pharmacy practices</a> (PDF)
	<li><a href="http://www.worthknowing.ca/client/ocp/OCPHome.nsf/web/Policy+for+Ontario+Pharmacies+Operating+Internet+Sites?OpenDocument">Ontario College of Pharmacists policy on online pharmacies</a>
	<li><a href="http://www.nabp.net/vipps/">Verified Internet Pharmacy Practice Sites - National Association of Boards of Pharmacy (US)</a> - gives information on online pharmacies approved by the NABP
	<li><a href="http://academic.udayton.edu/health/syllabi/health/Unit03/lesson20e.htm">Excerpt from journal article from 2001 on online regulation in the US</a> (from "Annals of Health Law")
	</ul>
	
	<p>Combining the ongoing scare surrounding Avian Flu and online pharmacies, the <a href="http://www.cbc.ca/consumers/market/files/health/tamiflu/index.html">CBC reported recently on suspect, unregulated sale of Tamiflu</a>, the most promising drug now available for protection against flu outbreaks.

	<p>The story of crossborder pharmaceutical purchasing by Americans has been controversial with many US State governments, as well as individuals, buying their supplies of drugs from Canada.
	<ul>
	<li><a href="http://www.washingtonpost.com/wp-dyn/content/article/2005/06/14/AR2005061400254_pf.html">Washington Post story</a> reports that most "Canadian" online pharmacies are actually linked to US entities.
	<li><a href="http://www.cbc.ca/news/background/drugs/">A CBC Indepth feature on crossborder drug sales.</a>
	</ul>
<BR>
<?php /************************************************/ ?>	

	<a name=fraud><h4>Scientific Fraud</h4></a>
<BR><p>	On rare occasions the objectivity of scientific studies commissioned by multinational pharmaceutical companies can be called into question. A recent high-profile report by the CBC on a Memorial University researcher's career alleges that results desired by big business were produced without any of the necessary research actually being done. When individual researchers breach their ethical duties as scientists and scientific journals fail to catch suspect results through their peer review systems, people using products or needing medical information can be affected.

<p>The <a href="http://www.cbc.ca/national/news/chandra/">CBC report on Dr. Chandra</a>, who is now suspected of basing many of his results on non-existent research.
<ul><li>Reactions: <a href="http://today.mun.ca/news.php?news_id=1780">Memorial University's website</a>, the watchdog group <a href="http://www.babymilkaction.org/press/press3feb06.html">Baby Milk Action</a>, and <a href="http://www.sethroberts.net/">one of the scientists involved</a> in uncovering Dr. Chandra's apparent dishonesty
</ul>
<p>The very high-profile Vioxx case is also alleged to have involved the meddling with results, as <a href="http://www.forbes.com/business/feeds/ap/2006/02/05/ap2501196.html">Forbes reports criticism of Merck's scientists' results</a> in the New England Journal of Medicine
<p>The question of conflicts of interest in journal publishing and whether journals should even publish industry-funded studies is an important issue as the two cases above and the links that follow show.
<ul><li>The Lancet, a highly esteemed British medical journal, <a href="http://www.genetics-and-society.org/newsdisp.asp?id=813">recently published an article</a> asking exactly this question.
	<li><a href="http://www.tufts.edu/~skrimsky/PDF/conflict.PDF">An older study</a> (PDF) on conflict of interest policies in scientific journals generally.
	<li>The Journal of the American Medical Association recently changed its policy for industry-sponsored studies submitted for review, requiring additional independent assurances of the accuracy of the data not required for independent studies. This <a href="http://www.pharmacoepi.org/resources/jama_guidelines_statement.pdf">website (PDF)</a> details some reaction to this change (the actual announcement of the change and other reaction to it are not hyperlinked because they are password protected).
	<li>The UK's Parliamentary Office of Science and Technology's <a href="http://www.parliament.uk/post/pn182.pdf">short summary of peer review</a> and the possibility of fraudulent research
</ul>
<BR>
<?php /************************************************/ ?>	
	<a name=info><h4>Health Information</h4></a>
	<BR><p>The <a href="http://laws.justice.gc.ca/en/p-8.6/93196.html">Personal Information Protection and Electronic Documents Act</a> (PIPEDA) extends legislative protection to personal information in the private sectors. This federal legislation imposes mandatory standards, and applies to all organizations that collect, use or disclose personal information in the course of a "commercial activity".
<h5>Scope of Application</h5>
<p>The scope of application of the PIPEDA to health information has been the subject of considerable concern and uncertainty, in particular related to the meaning of "commercial activity" [PIPEDA, S.C. 2000, c.5., s. 2(1)]. The division between commercial and non-commercial activities may not necessarily be the same as between private and public sectors.
<ul><li><u>Private and Public Sectors</u>: For example, the fact that health services are publicly paid for by provincial health care plans seems an unlikely basis for treating them as non-commercial when similar services provided for a fee outside provincial health plans, perhaps by the same professionals, would likely be characterized as being commercial.
	<li><u>Charitable and Non-Profit Organizations</u>: Non-Profit status does not automatically exempt an organization from the application of the Act. However, most non-profits are not subject to the Act because they do not engage in commercial activities.
	<li><a href="http://www.privcom.gc.ca/fs-fi/02_05_d_19_e.asp">Privacy Commissioner's guidance</a>
	<li>First Canadian court decision to examine the meaning of "commercial activity" within the context of PIPEDA: <em>Rodgers v. Calvert</em> (2004), 244 D.L.R. (4th) 479.
</ul>
<h5>Substantially Similar Provincial Legislations</h5>
<p>Section 26(2)(b) provides grounds for an exemption to organizations and activities if the health information legislation enacted by a province applies and is deemed "substantially similar" to the PIPEDA by the Governor in Council. To date, the Ontario, Alberta, British Columbia and Quebec legislations <a href="http://www.privcom.gc.ca/legislation/ss_index_e.asp">have been found to be "substantially similar"</a>.

<h5>Rights of the Individual to Access Own Information</h5>
<p>Under the PIPEDA and each of the provincial initiatives, individuals will enjoy a right to access their own personal health information held by a regulated entity, subject to a number of specific limitations. Exemptions, while varying substantially from jurisdiction to jurisdiction, may include, among others, circumstances where the release of information would risk harm to the applicant, to another person or to public safety, or reveal third party personal information. In the context of genetic information that can sometimes reveal information regarding a person's relatives or entire groups of people, opinion is mixed as to whether genetic information should be treated differently from other types of health information. It is arguable that a corollary right not to be exposed to certain information (eg. Information indicating that one has a genetic predisposition to a certain illness) should be recognized as part of the right to privacy.
<BR><BR>
<?php /************************************************/ ?>	
	<a name=reprod><h4>Reproductive Technologies</h4></a>
	<p>The <a href="http://laws.justice.gc.ca/en/A-13.4/">Assisted Human Reproduction Act [Not in force] S.C. 2004, c. 2</a>  prohibits assisted reproduction procedures that are considered to be ethically unacceptable. Other types of assisted reproduction procedures are prohibited unless carried out in accordance with a licence and applicable regulations, which will address health and safety concerns. The creation and use of embryos for research purposes is also addressed. A privacy regime governs the collection, use and disclosure of health reporting information.

<p>History
<ul><li>In 1989, the federal government created the Royal Commission on Reproductive Technologies, in response to growing public concerns. The Royal Commission made 293 recommendations, concluding that decisive, timely, and comprehensive national action was required with respect to the regulation of new reproductive technologies. The Royal Commission stated that the federal government should use its power under the Criminal Code and prohibit certain practices.

<BR>Royal Commission, Proceed With Care: Final Report of the Royal Commission on New Reproductive Technologies (Ottawa: Minister of Supply and Services Canada, 1993).  

	<li>In 1996, the federal government introduced Bill C-47, which included a list of prohibited activities and imposed criminal sanctions for infringements of serious prohibitions. See <a href="http://www.parl.gc.ca/PDF/35/2/parlbus/chambus/house/bills/government/C-47_1.pdf">An Act Respecting Human Reproductive Technologies and Commercial Transactions relating to Human reproduction</a> (PDF)

	<li>In 1997, the Canadian Bar Association responded to Bill C-47 by strongly criticizing the use of criminal prohibitions for failing to balance "individual autonomy" and the inherent dangers in the use of reproductive technology. The CBA was also concerned with the possible "chilling effect" on research and clinical practice. It recommended professional self-regulation. Other commentators recommended a regulatory rather than a criminal framework to avoid pushing reproductive technologies practices to the underground market.
	<li>At the same time, the federal government published a White Paper promising to establish a regulatory framework within which the regulation of acceptable practices would take place. The regime would provide a separate body removed from the government, which would issue licences as well as establish standards and information registries and health surveillance procedures. 

See <a href="http://www.hc-sc.gc.ca/ahc-asc/media/nr-cp/1996/1996_44_e.html">New Reproductive Technologies: Setting Boundaries, Enhancing Health</a> (Ottawa: Supply and Services Canada, 1996)

</ul>

<p>The <em>Assisted Human Reproduction Act</em> combines all three approaches: prohibited activities, controlled activities, and the creation of a regulatory agency.

<a href="http://canadagazette.gc.ca/partII/2005/20050518/html/si42-e.html">Order Fixing January 12, 2006 as the Date of the Coming into Force of Certain Sections of the Act</a>
	<BR><BR>

<?php /************************************************/ ?>	
	<a name=suicide><h4>Assisted Suicide</h4></a>
	<p>60-year-old Marielle Houle, who helped her ailing son commit suicide as he struggled with the early stages of multiple sclerosis, was spared jail time on January 27, 2006 and sentenced to three years of probation. The maximum penalty for such a crime is 14 years' imprisonment. Quebec Superior Court Justice Maurice Laramée stressed that Houle's sentence is not to be used as a general model in other cases. 
<p>Houle's son, Charles Fariala, a playwright and nurse, took a cocktail of drugs from a recipe he found on the Internet and then his mother put a plastic bag over his head to asphyxiate him.  
Houle's lawyer Salvatore Mascia said federal legislation on assisted suicide is needed, and Justice Laram&#233e noted that if Canada had such legislation, <a href="http://cnews.canoe.ca/CNEWS/Law/2006/01/23/1407787-cp.html">"we wouldn't be here."</a>

<ul><li><a href="http://www.educaloi.qc.ca/en/loi/health_care_users/214">General legal info on euthanasia</a> (Educaloi)
	<li>Bloc Qu&#233b&#233cois MP Francine Lalonde <a href="http://www.canada.com/montrealgazette/news/montreal/story.html?id=cd0e7af0-83ac-4fad-b286-584ff2f97d7f
">said in late January 2006</a> that she will reintroduce a private member's bill to legalize assisted suicide for terminally ill patients under certain conditions in the next session of Parliament. (Montreal Gazette)
	<li><a href="http://www.theglobeandmail.com/servlet/story/RTGAM.20060117.wscotus0117/BNPrint/International/">The U.S. Supreme Court has upheld Oregon's unique physician-assisted suicide law</a>, rejecting a Bush administration attempt to punish doctors who help terminally ill patients die. The 6-3 majority said the 1997 Oregon law trumped federal authority to regulate doctors. (Globe and Mail)
	<li><a href="http://www.parl.gc.ca/38/1/parlbus/chambus/house/bills/private/C-407/C-407_1/C-407_cover-E.html">BILL C-407</a> (first reading)
</ul>
<BR>

<?php /************************************************/ ?>	
	<a name=cdn><h4>The Changing Structure of Canadian Health Care</h4></a>
	<BR><p><a href="http://www.ctv.ca/servlet/ArticleNews/story/CTVNews/20060126/alberta_private_healthcare_060126/20060127?hub=Canada">Alberta Premier Ralph Klein suggested on January 26, 2005</a> that some of the province's so-called "third way" reforms, a nine-point healthcare plan that his caucus has unanimously agreed to move ahead with, might violate the <em>Canada Health Act</em>. It would allow people to buy private insurance for non-essential procedures, which effectively allows queue-jumping by patients willing to pay, and permits doctors to practise in both the public and private health systems. Alberta has not yet tabled legislation, but watch for it this spring in the coming session of the Alberta legislature: see also stories by <a href="http://www.ctv.ca/servlet/ArticleNews/story/CTVNews/20051108/alberta_healthcare_051108?s_name=&no_ads=">CTV</a> and by <a href="http://www.theglobeandmail.com/servlet/story/LAC.20060127.NATS27-1/TPStory/TPHealth/">Globe and Mail</a>

	<p>During the federal election campaign Stephen Harper promised to protect the Canada Health Act against breaches. A federal-provincial "propaganda war" may be brewing: <a href="http://www.theglobeandmail.com/servlet/ArticleNews/TPStory/LAC/20060201/ALTAHEALTH01/National/Idx">Globe and Mail</a>

<p>[It is unclear how Stephen Harper's pledge of "open federalism", his promise to right the "fiscal imbalance", and the Conservative penchant for privatization will jibe with the Prime Minister's vow to protect the Canada Health Act. Open federalism is about the federal government granting the provinces wider freedom. Will that include the freedom to go the privatization route? Correcting the fiscal imbalance means transferring federal surpluses to financially overburdened provinces. Will that include transferring money to the richest province in Canada? Will the federal government be willing to transfer money that it has historically used to enforce the Canada Health Act - by attaching strings and by threatening to discontinue/lessen the transfers? Finally, if any political party in Canada is likely to support privatization, or at the very least allow it to occur, it is the Conservatives. But will a minority Conservative government, with the Liberals, NDP and Bloc just waiting for an excuse to bring it down?]

<h5>The Conservative Government</h5>
<a href="http://media.conservative.ca/video/20060113-Platform.pdf">According to the Conservative Party platform</a> (PDF), Stephen Harper will work in conjunction with the provinces on health care, and allow for a mix of public and private health care delivery, as long as health care remains publicly funded and universally accessible.

<p>"The Conservative Party is committed to ensuring that all Canadians have access to timely, quality health care services regardless of their ability to pay. We are committed to a universal, publicly funded health care system that respects the five principles of the Canada Health Act and
the Canadian Charter of Rights and Freedoms."

<p>[Note that the Chaoulli decision only applies in Quebec, as the majority judgment only found that the Quebec Charter had been violated, and only a minority of the Supreme Court found that s. 7 of the Canadian Charter had been violated. Strictly speaking, then, as a precedent Chaoulli is only good in Quebec. However, it will surely spark similar challenges elsewhere in Canada, one of which could be found to violate the Canadian Charter. Indeed, the Supreme Court came very close to holding just this in Chaoulli, as the Court split 4-3 on it.]

<?php
		
echo '</div>';



?>