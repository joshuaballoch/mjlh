<?php
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
// CONSTANTS
$lang = $_GET[lang];
$current_name = "Chaoulli";
$subpage = 1;

include 'header.php';

echo '<head><link rel="stylesheet" href="style.css" type="text/css" /><meta http-equiv="content-type" content="text-html; charset=utf-8"></head>';
echo '<title>Chaoulli</title>';

//************* MAIN PAGE *************
echo '<div id="main">';

		echo '<h3 align=center>L\'arr&#234t Chaoulli / The Chaoulli Decision</h3>
		<BR>';

		echo '
		<h5>Judgments</h5><ul>
		<li>Supreme Court of Canada, [2005] 1 S.C.R. 791, 2005 SCC 35: <a href="http://www.canlii.org/ca/cas/scc/2005/2005scc35.html">English</a> / 
<a href="http://www.lexum.umontreal.ca/csc-scc/fr/pub/2005/vol1/html/2005rcs1_0791.html">Fran&#231ais</a> 
		<li>Qu&#233bec Court of Appeal, <a href="http://www.canlii.org/qc/jug/qcca/2002/2002qcca10171.html">
2002 IIJCan 33075 (QC C.A.), [2002] R.J.Q. 1205</a> (CanLII)
		<li>Cour sup&#233rieure du Qu&#233bec, [2000] R.J.Q. 786, [2000] Q.J. NO. 479 (QL).
		</ul>
		<p><h5>Legislation</h5><ul>
		<li><a href="http://www.canlii.org/ca/const_en/const1982.html#I">Canadian Charter of Rights and Freedoms</a>
		<li><a href="http://www.canlii.org/qc/laws/sta/c-12/20060115/whole.html">Quebec Charter of Rights and Freedoms, R.S.Q., c. C-12</a>
		<li><a href="http://www.canlii.org/qc/laws/sta/a-29/20060115/whole.html">Quebec Health Insurance Act, R.S.Q., c. A-29</a>
		<li><a href="http://www.canlii.org/qc/laws/sta/a-28/20060115/whole.html">Quebec Hospital Insurance Act, R.S.Q., c. A-28</a>
		</ul>
		<p><h5>Cited Case Law</h5><ul>
		<li><a href="http://www.canlii.org/ca/cas/scc/1988/1988scc2.html">R. v. Morgantaler</a>, [1988] 1 S.C.R. 30, (1988), 63 O.R. (2d) 281.
		<li><a href="http://www.canlii.org/ca/cas/scc/1993/1993scc101.html">Rodriguez v. British Columbia (Attorney General)</a>, [1993] 3 S.C.R. 519, 107 D.L.R. (4th) 342.
		<li><a href="http://www.canlii.org/ca/cas/scc/1996/1996scc86.html">Quebec (Public Curator) v. Syndicat national des employ&#233s de l\'h&#244pital St-Ferdinand</a>, [1996] 3 S.C.R. 211, (1996), 138 D.L.R. (4th) 577
		<li><a href="http://www.canlii.org/ca/cas/scc/2004/2004scc78.html">Auton (Guardian ad litem of) v. British Columbia (Attorney General)</a> [2004] 3 S.C.R. 657, 2004 SCC 78 (CanLII)
		</ul>
		<p><h5>Reports</h5><ul>
		<li>Commission on the Future of Health Care in Canada.  <a href="http://www.hc-sc.gc.ca/english/pdf/romanow/pdfs/HCC_Final_Report.pdf">Building on Values:  The Future of Health Care in Canada:  Final Report, 2002.</a> ("Romanow Report")
		<li>The Health of Canadians - The Federal Role. <a href="http://www.parl.gc.ca/37/2/parlbus/commbus/senate/com-e/SOCI-E/rep-e/repoct02vol6-e.pdf">Final Report of the Standing Senate Committee on Social Affairs, Science and Technology, 2002. </a> ("Kirby Report", Volume 6)
		<li>The Health of Canadians - The Federal Role.  Interim Report of the Standing Senate Committee on Social Affairs, Science and Technology, 2001-2002: <a href="http://www.parl.gc.ca/37/1/parlbus/commbus/senate/com-E/SOCI-E/rep-e/repintmar01-e.htm">Volume 1</a>, 
<a href="http://www.parl.gc.ca/37/1/parlbus/commbus/senate/com-E/SOCI-E/rep-e/repjan01vol2-e.htm">Volume 2</a>, 
<a href="http://www.parl.gc.ca/37/1/parlbus/commbus/senate/com-E/SOCI-E/rep-e/repjan01vol3-e.htm">Volume 3</a>,
<a href="http://www.parl.gc.ca/37/1/parlbus/commbus/senate/com-E/SOCI-E/rep-e/repintsep01-e.htm">Volume 4</a>,
<a href="http://www.parl.gc.ca/common/Committee_SenHome.asp?Language=E&Parl=37&Ses=1&comm_id=47">Volume 5</a>
		<li>Health Analysis and Measurement Group. <a href="http://dsp-psd.pwgsc.gc.ca/Collection/Statcan/82-575-X/82-575-XIE2002001.pdf">Access to Health Care Services in Canada, 2001.</a> By Claudia Sanmartin, Christian Houle, Jean_Marie Berthelot and Kathleen White.  Statistics Canada, 2002.
		<li><a href="http://www.who.int/whr/1999/en/whr99_en.pdf">The World Health Report 1999:  Making a Difference.</a>  World Health Organization, 1999.
		<li><a href="http://www.hc-sc.gc.ca/english/media/
releases/waiting_list.html
">Waiting Lists and Waiting Times for Health Care in Canada:  More Management!!  More Money??</a>  Health Canada, 1998. ("MacDonald Report")
		<li>Waiting Lists in Canada and the Potential Effects of Private Access to Health Care Services.  Report prepared for the Department of Justice, Canada, October 1998. ("Wright Report")<a href=""></a>
		</ul>
		<p><h5>Cited Commentary</h5><ul>
		<li>C. H. Tuohy, C. M. Flood and M. Stabile, <a href="http://www.chass.utoronto.ca/cepa/Private.pdf">"How Does Private Finance Affect Public Health Care Systems? Marshaling the Evidence from OECD Nations" (2004)</a>, 29 J. Health Pol. 359.
		<li>Sanmartin, Claudia, et al. <a href="http://www.cmaj.ca/cgi/content/full/162/9/1305">"Waiting for medical services in Canada:  lots of heat, but little light" (2000)</a>, 162 C.M.A.J. 1305.
		<li>S. Lewis et al., <a href="http://epe.lac-bac.gc.ca/100/201/300/cdn_medical_association/cmaj/vol-162/issue-9/1297.htm">"Ending waiting-list mismanagement: principles and practice" (2000)</a>, 162 C.M.A.J. 1297
		</ul>
		<p><h5>Other</h5><ul>
		<li><a href="http://www.law.utoronto.ca/content_tr.asp?itemPath=&contentId=1109">The Chaoulli Case: Resources and Commentary (University of Toronto)</a>
<BR>A wealth of resources on the Chaoulli case including facta, transcripts of proceedings, commentary, etc.
		</ul>
	';

	echo '<BR><h4>AFTERMATH & REACTIONS</h4><BR>
		<h5>Commentary & Analysis</h5><ul>
		<LI><a href="http://www.sgmlaw.com/pagefactory.aspx?PageId=488">Sack Goldblatt Mitchell Case Analysis</a>
		<LI>Timothy Caulfield, <a href="http://www.law.uh.edu/healthlaw/perspectives/homepage.html">"Chaoulli v. Quebec (Attorney General): The Supreme Court of Canada Deals a Blow to Publicly Funded Health Care" (2006)</a> Health Law Perspectives
		<LI>Colleen M. Flood and Terrence Sullivan <a href="http://www.cmaj.ca/cgi/content/full/173/2/142">"Supreme disagreement: The highest court affirms an empty right"</a> CMAJ, July 19, 2005; 173 (2).
		</ul>
		<h5>Canadian Medical Community</h5><ul>
		<LI>CMA supports private health insurance<a href="http://www.cmaj.ca/cgi/rapidpdf/cmaj.051035v1.pdf">(C.M.A.J. 2005 AUG 18)</a>
		<LI><a href="http://www.sma.sk.ca/communications/pdf/tamingofthequeuefinal.pdf">The Taming of the Queue: Toward a Cure for Health Care Wait Times. Discussion Paper  prepared for the Canadian Medical Association and Canadian Nurses Association</a> (July 2004)
		</ul>
		<h5>Legal / Academic</h5><ul>
		<LI><a href="http://www.iss.uqam.ca/pages/pdf/CHpress_release.pdf">The Chaoulli judgement and private healthcare insurance: seven proposals to address the Supreme Court\'s decision</a>  (The Working Group on Quebec\'s Healthcare System November 21, 2005) - (PDF)
		<BR>Over 30 academics, physicians and other healthcare professionals, forming The Working Group, put forward seven proposals which for a concerted response to the Chaoulli judgement by addressing the unacceptable waiting times singled out by the Court, while keeping Quebec\'s  public healthcare system intact.
		<LI><a href="www.ledevoir.com/2005/11/17/95307.html">Privatisation des soins de sant&#233 au Qu&#233bec - Il n\'y a pas d\'«ordre» de la Cour supr&#234me</a> (Le Devoir - jeudi 17 novembre 2005)
		<BR>Quebec professors of law (Henri Brun, Facult&#233 de droit de l\'Universit&#233 Laval; Diane Demers, D&#233partement des sciences juridiques de l\'Universit&#233 du Qu&#233bec &#224 Montr&#233al; Patrice Garant, Facult&#233 de droit de l\'Universit&#233 Laval; Daniel Proulx, Facult&#233 de droit de l\'Universit&#233 de Sherbrooke; Andr&#233e Lajoie, Facult&#233 de droit de l\'Universit&#233 de Montr&#233al; Marie-Claude Pr&#233mont, Facult&#233 de droit de l\'universit&#233 McGill) comment on the decision in Chaoulli.
		<LI><a href="www.law.utoronto.ca/healthlaw">Access to Care, Access to Justice: The Legal Debate over Private Health Insurance in Canada</a>
		<BR>Conference held September 16, 2005 hosted by the Faculty of Law, University of Toronto
		<LI><a href="http://osgoode.yorku.ca/media2.nsf/0/fde21adcce43a21f85257098007668d1?OpenDocument">Chaoulli and the Restructuring of Health Care in Canada</a>
		<BR>One Day National Summit at Osgoode Hall Law School
		</ul>

		<h5>Government / Political</h5><ul>
		<li><a href="http://msssa4.msss.gouv.qc.ca/fr/document/publication.nsf/4b1768b3f849519c852568fd0061480d/e90f534d23147785852571150053f04e?OpenDocument"><em>Garantir l\'acc&#232s</em></a> - Document de consultation par le Gouvernement du Qu&#233bec
		<li><a href="http://msssa4.msss.gouv.qc.ca/fr/document/publication.nsf/cf4a108863ca20ed8525680900713c29/5d64e6e0f5543b99852571240053333f?OpenDocument"><em>Guaranteeing Access</em></a> - White paper by the Quebec Government
		<LI><a href="http://www.hc-sc.gc.ca/ahc-asc/minist/health-sante/messages/2006_02_16_e.html">Federal Health Minister\'s reply to proposed health reforms in Quebec</a> (February 16, 2006)
		<BR>Health Minister Tony Clement\'s statement regarding Quebec\'s proposed health reforms
		<LI><a href="http://www.gov.ab.ca/acn/200602/19506B2146229-0A7D-942D-E9B71DD4FD88C882.html">Government of Alberta\'s New Health Policy Framework</a> (February 28, 2006)
		<BR>Government of Alberta Press Release
		<LI><a href="http://www.conservative.ca/EN/1091/33313">Conservative Party of Canada Platform: Harper pledges Patient Wait Times Guarantee</a> (02 December 2005)
		<LI><a href="http://www.liberal.ca/issue_e.aspx?itype=66">Liberal Party Platform: National Universal Health Care</a>
		<LI><a href="www.ndp.ca/page/1652">New Democratic Party Platform: Layton Outlines Chaoulli Response Law To Protect Public Medicare</a> (6 Oct 2005)
		</ul>

		<h5>Media</h5><ul>
		<LI><a href="http://www.iht.com/articles/2006/02/20/news/canada.php">Canada taking small steps toward private health care</a> (International Herald Tribune - February 21, 2006)
		<LI><a href="http://www.theglobeandmail.com/servlet/Page/document/v4/sub/MarketingPage?user_URL=http://www.theglobeandmail.com%2Fservlet%2Fstory%2FLAC.20060217.EHEALTH17%2FTPStory%2F%3Fquery%3D&ord=1141190951932&brand=theglobeandmail&force_login=true">Quebec\'s sensible health-care saw-off</a> (The Globe and Mail - February 17, 2006)
		<LI><a href="http://www.theglobeandmail.com/servlet/story/RTGAM.20060228.wspect0228/BNStory/National/home">Different sides of the health care debate</a> (The Globe and Mail -  February 27, 2006)
		<LI><a href="http://www.theglobeandmail.com/servlet/story/RTGAM.20060228.walta0228/BNStory/National">Alberta lays out "Third Way" framework</a> (The Globe and Mail - February 28, 2006)
		<LI><a href="http://www.theglobeandmail.com/servlet/story/RTGAM.20060228.wsim0228/BNStory/National/home">Alberta\'s case study in how to cut wait times</a> (The Globe and Mail - February 28, 2006)
		<LI><a href="http://www.cbc.ca/news/background/healthcare/ruling_reaction.html">The ruling: In reaction</a> (CBC News Online -  February 16, 2006)
		<LI><a href="http://www.thestar.com/NASApp/cs/ContentServer?pagename=thestar/Layout/Article_Type1&c=Article&cid=1140130214235&call_pageid=970599109774&col=Columnist969907626796%20%20">Quebec\'s health plan a masterpiece in ambiguity: Medicare wins another round in continuing battle</a> (The Toronto Star - Feb. 17, 2006)
		<LI><a href="http://www.medicalpost.com/mpcontent/article.jsp?content=20060227_202627_5608">Quebec advances softly on private care: Response to Supreme Court ruling only covers three procedures: hip, knee and cataract surgeries</a> (Medical Post - February 28, 2006 - Volume 42 Issue 07)
		<LI><a href="www.ledevoir.com/2005/11/23/95839.html?268">Jugement de la Cour supr&#234me - Qu&#233bec ferait fausse route</a> (Le Devoir - PC Edition du mercredi 23 novembre 2005)
		<LI><a href="http://www.radio-canada.ca/nouvelles/Politique/2005/11/10/004-sante-prive-couillard.shtml">Syst&#232me de sant&#233: Feu vert aux deux vitesses</a> (Radio Canada)
		</ul>

		<h5>Other</h5><ul>
		<LI><a href="http://www.jacqueschaoulli.com">Dr. Chaoulli\'s Blog</a>
		</ul>
	';
echo '</div>';



?>