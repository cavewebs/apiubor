
<?php
require 'vendor/autoload.php';
use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Symfony\Component\DomCrawler\Crawler;

//GET MATCH DETAILS
require 'db.php';
$j=1;
  $url = "https://www.soccervista.com/Lille-Paris_Saint_Germain-1989781-1989781.html";    
  // $url = "https://www.soccervista.com/Tottenham_Hotspur-Borussia_Dortmund-2947299-2947299.html";  
  // $url = "https://www.livescore.cz/gameinfo2.php?switch=new&id=2782197";  
$htmz = <<<'MDDDD'
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head>
  <title>Lille and Paris Saint-Germain at Ligue 1 soccer league. - Friday 7th August 2015</title>
  <meta content='width=device-width' name='viewport'>
  <meta content="Soccer result and predictions for Lille against Paris Saint-Germaingame at Ligue 1 soccer league. Played on Friday 7th August 2015 Tables, statistics, under over goals and picks. Football teams - , or " name="description">
  <meta content="Lille,Paris Saint-Germain , Ligue 1,soccer bets" name="keywords">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
  <link charset="utf-8" type="text/css" href="assets/css/mainandcalendarv10.css" rel="stylesheet" >
      <script type="application/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
   <script type="text/javascript" charset="iso-8859-1" src="calendar/dateditv1.js"></script>
   
  </head>
  <body><div align="center">
      <div id="header">
       <h1><a href="https://www.soccervista.com" name="soccer">SoccerVista - football betting</a></h1>
      <h3>soccer results and prediction for Lille against Paris Saint-Germain games from Ligue 1 soccer league.</h3>
     
      <ul>
      <li>
      <a href="https://www.soccervista.com">
  Main page
  </a>
      </li>

      <li>
      <a href="https://www.soccervista.com/bet.php">
  Bet of the day
  </a>
      </li>
      <li>
      <a href="https://www.soccervista.com/picks_by_email.php">
  Picks by email
  </a>
      </li>
          <li>
      <a href="https://www.livescore.cz/">
  Livescore
  </a>
      </li>
           <li>
      <a href="https://www.soccervista.com/statistics.php">
  Statistics
  </a>
      </li>
                 <li>
      <a href="https://www.soccervista.com/bookmakers.php">
  Bookmakers
  </a>
      </li>

                 <li>
      <a href="https://www.soccervista.com/contactform.php">
  Contact
  </a>
      </li>

          <li>
              <a href="https://www.soccervista.com/faq.php">
                  FAQ
              </a>
          </li>

      </ul>
      <p id="layoutdims">

      </p>
      </div></div>
      

  <div id="wrap">
  <div id="col1">
      <!--
              <br><div align="center"><A href="https://imstore.bet365affiliates.com/Tracker.aspx?AffiliateId=3319&AffiliateCode=grm_2761&CID=194&DID=84&TID=1&PID=149&LNG=1" target="_blank"><img src="https://imstore.bet365affiliates.com/?AffiliateCode=grm_2761&amp;CID=194&amp;DID=84&amp;TID=1&amp;PID=149&amp;LNG=1" border="0" /></A><br><br><br>

        -->
          <br><div align="center"><iframe src="https://imstore.bet365affiliates.com/grm_2761-507-84-6-149-1-3319.aspx" width="728" height="90" frameborder="0" scrolling="no"></iframe><br><br><br>



  </div>
  <br><br><iframe  src="https://www.soccervista.com/bonus.html" width="740" height="125" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe><br><br><p><span class="flag France"></span>France - <a href="France-Ligue_1-2015_2016-840461.html">Ligue 1</a></p><p>&nbsp; </p> <table width="100%"  id="gamec"><tr><td width="10%" ></td><td width="30%"></td><td width="10%"></td><td width="10%"></td><td width="30%"></td><td width="10%" ></td></tr><tr><td colspan="2"><h1  id="gamecss"><a href="team.php?teamid=8639">Lille</a></h1></td><td colspan="2" class="score">0:1</td><td colspan="2"><h1  id="gamecss"><a href="team.php?teamid=9847">Paris Saint-Germain</a></h1></td></tr><tr><td  colspan="6" class="stred">halftime  (0:0)</td></tr><tr><td colspan="6" id="gamecss">&raquo;Game details</td></tr><tr><td colspan="2" class="detail2">Date </td><td colspan="4">Friday 7th August 2015</td></tr> 
  <tr><td colspan="2" class="detail2">Time </td><td colspan="4">20:30 CEST</td></tr> 
  <tr><td colspan="2" class="detail2">Venue name</td><td colspan="4">Stade Pierre-Mauroy</td></tr> 
  <tr><td colspan="2" class="detail2">Spectators</td><td colspan="4">39601</td></tr> 
  <tr><td colspan="2" class="detail2">Referee</td><td colspan="4">Fredy Fautrel from France</td></tr> 
  <tr><td colspan="2" class="detail2">Round</td><td colspan="4">1</td></tr> 
  <tr><td colspan="6"  id="gamecss">&raquo;Action</tr><tr><td colspan="4"></td><td colspan="2">89' &nbsp;<img src="/assets/imgs/sub.gif"> in Jean-Kevin Augustin</td></tr> 
  <tr><td colspan="4"></td><td colspan="2">89' &nbsp;<img src="/assets/imgs/sub.gif"> out Lucas Moura</td></tr> 
  <tr><td></td><td colspan="2">88' &nbsp;<img src="/assets/imgs/yc.gif"> Benjamin Pavard</td><td colspan="3"></td></tr> 
  <tr><td></td><td colspan="2">84' &nbsp;<img src="/assets/imgs/yc.gif"> Sofiane Boufal</td><td colspan="3"></td></tr> 
  <tr><td colspan="4"></td><td colspan="2">73' &nbsp;<img src="/assets/imgs/sub.gif"> in Benjamin Stambouli</td></tr> 
  <tr><td colspan="4"></td><td colspan="2">73' &nbsp;<img src="/assets/imgs/sub.gif"> out Marco Verratti</td></tr> 
  <tr><td></td><td colspan="2">68' &nbsp;<img src="/assets/imgs/sub.gif"> out Rio Mavuba</td><td colspan="3"></td></tr> 
  <tr><td></td><td colspan="2">68' &nbsp;<img src="/assets/imgs/sub.gif"> in Mounir Obbadi</td><td colspan="3"></td></tr> 
  <tr><td></td><td colspan="2">61' &nbsp;<img src="/assets/imgs/sub.gif"> in Gadji Tallo</td><td colspan="3"></td></tr> 
  <tr><td></td><td colspan="2">61' &nbsp;<img src="/assets/imgs/sub.gif"> out Sehrou Guirassy</td><td colspan="3"></td></tr> 
  <tr><td colspan="4"></td><td colspan="2">60' &nbsp;<img src="/assets/imgs/yc.gif"> Serge Aurier</td></tr> 
  <tr><td colspan="4"></td><td colspan="2">57' &nbsp;Assist Blaise Matuidi</td></tr> 
  <tr><td colspan="4"></td><td colspan="2">57' &nbsp;<img src="/assets/imgs/g.gif"> Lucas Moura</td></tr> 
  <tr><td colspan="4"></td><td colspan="2">55' &nbsp;<img src="/assets/imgs/yc.gif"> Thiago Motta</td></tr> 
  <tr><td></td><td colspan="2">49' &nbsp;<img src="/assets/imgs/yc.gif"> Djibril Sidibe</td><td colspan="3"></td></tr> 
  <tr><td colspan="4"></td><td colspan="2">46' &nbsp;<img src="/assets/imgs/sub.gif"> in Thiago Motta</td></tr> 
  <tr><td colspan="4"></td><td colspan="2">46' &nbsp;<img src="/assets/imgs/sub.gif"> out Javier Pastore</td></tr> 
  <tr><td></td><td colspan="2">46' &nbsp;<img src="/assets/imgs/sub.gif"> out Ibrahim Amadou</td><td colspan="3"></td></tr> 
  <tr><td></td><td colspan="2">46' &nbsp;<img src="/assets/imgs/sub.gif"> in Ryan Mendes</td><td colspan="3"></td></tr> 
  <tr><td colspan="4"></td><td colspan="2">28' &nbsp;<img src="/assets/imgs/yc.gif">&nbsp;<img src="/assets/imgs/rc.gif"> Adrien Rabiot</td></tr> 
  <tr><td colspan="4"></td><td colspan="2">23' &nbsp;<img src="/assets/imgs/yc.gif"> Adrien Rabiot</td></tr> 
  <tr><td colspan="6"   id="gamecss">&raquo;Lineups</td></tr><tr><tr><td></td><td>4-2-3-1</td><td colspan="2" class="detail2">Formation<br><br></td><td colspan="2">4-3-3</td></tr> 
  <td  class="lineups"></td><td colspan="2" class="lineups"><i>Goalkeeper</i>: Vincent Enyeama<br><br><i>Defence</i>: Benjamin Pavard<br><i>Defence</i>: Djibril Sidibe<br><i>Defence</i>: Ibrahim Amadou<br><i>Defence</i>: Renato Civelli<br><br><i>Midfield</i>: Sebastien Corchia<br><i>Midfield</i>: Rio Mavuba<br><i>Midfield</i>: Florent Balmont<br><i>Midfield</i>: Eric Bautheac<br><i>Midfield</i>: Sofiane Boufal<br><br><i>Forward</i>: Sehrou Guirassy<br><br><i>Substitute player</i>: Youssouf Kone<br><i>Substitute player</i>: Gadji Tallo<br><i>Substitute player</i>: Steeve Elana<br><i>Substitute player</i>: Sylvio Ronny Rodelin<br><i>Substitute player</i>: Ryan Mendes<br><i>Substitute player</i>: Soualiho Meite<br><i>Substitute player</i>: Mounir Obbadi<br><br><i>Injured</i>: Adama Soumaoro<br><i>Injured</i>: Franck Beria<br><br><i>Coach</i>: Herve Renard<br></td><td  class="lineups"></td><td colspan="2"  class="lineups"><i>Goalkeeper</i>: Kevin Trapp<br><br><i>Defence</i>: Thiago Silva<br><i>Defence</i>: Serge Aurier<br><i>Defence</i>: Maxwell<br><i>Defence</i>: David Luiz<br><br><i>Midfield</i>: Blaise Matuidi<br><i>Midfield</i>: Adrien Rabiot<br><i>Midfield</i>: Marco Verratti<br><br><i>Forward</i>: Lucas Moura<br><i>Forward</i>: Javier Pastore<br><i>Forward</i>: Edinson Cavani<br><br><i>Substitute player</i>: Gregory van der Wiel<br><i>Substitute player</i>: Marquinhos<br><i>Substitute player</i>: Jean-Kevin Augustin<br><i>Substitute player</i>: Salvatore Sirigu<br><i>Substitute player</i>: Ezequiel Lavezzi<br><i>Substitute player</i>: Thiago Motta<br><i>Substitute player</i>: Benjamin Stambouli<br><br><i>Injured</i>: Zlatan Ibrahimovic<br><br><i>Coach</i>: Laurent Blanc<br></td></tr><tr><td colspan="6" id="gamecss">&raquo;Compare teams </td></tr><tr><td colspan="3" class="teamhead">Lille</td><td colspan="3" class="teamhead">Paris Saint-Germain</td></tr><tr><td colspan="3" align='center'><strong>WON</strong> in last <strong>1</strong> Ligue 1's games.</td><td colspan="3" align='center'><strong>WON</strong> in last <strong>1</strong> Ligue 1's games.</td></tr><tr><td colspan="3" align='center'><strong>NOT LOST</strong> in last <strong>10</strong> Ligue 1's games.</td><td colspan="3" align='center'><strong>NOT LOST</strong> in last <strong>7</strong> Ligue 1's games.</td></tr><tr><td colspan="6"><hr></td></tr><tr><td></td><td align='center'><a href="" target="_blank" id="gamecss">Lille web</a></td><td colspan="2"  align='center'>Websites</td><td colspan="2" align='center'><a href="http://www.psg.fr/" target="_blank"  id="gamecss">Paris Saint-Germain web</a></td></tr> 
  <tr><td></td><td align='center'>5.</td><td colspan="2"  align='center'>League position</td><td colspan="2" align='center'>1.</td></tr> 
  <tr><td></td><td align='center'><span  class="wdl won"></span><span   class="wdl draw"></span><span  class="wdl won"></span><span   class="wdl draw"></span><span  class="wdl won"></span> &nbsp; 11pts.</td><td colspan="2"  align='center'>Last five games</td><td colspan="2" align='center'><span  class="wdl won"></span><span   class="wdl draw"></span><span  class="wdl won"></span><span  class="wdl won"></span><span  class="wdl won"></span>&nbsp; 13pts. </td></tr> 
  <tr><td></td><td align='center'><span   class="wdl draw"></span><span   class="wdl draw"></span><span   class="wdl won"></span><span   class="wdl won"></span><span   class="wdl won"></span> &nbsp; 11pts.</td><td colspan="2"  align='center'>last 5 home/away only</td><td colspan="2" align='center'><span  class="wdl draw"></span><span   class="wdl won"></span><span   class="wdl won"></span><span   class="wdl won"></span><span   class="wdl lost"></span>&nbsp; 10pts. </td></tr> 
  <tr><td colspan="6"   id="gamecss">&raquo;Head to Head matches</td></tr><tr><tr  bgcolor="#FFCC99"><td width="70">02nd Nov 18</td> <td colspan="2">  France - Ligue 1</td><td colspan="2"><b>Paris Saint-Germain</b> : Lille</td><td class="h2h"> <a href="/Paris_Saint_Germain-Lille-2774015-2774015.html"> 2:1</a></td></tr><tr  bgcolor="#FFCC99"><td width="70">03rd Feb 18</td> <td colspan="2">  France - Ligue 1</td><td colspan="2">Lille : <b>Paris Saint-Germain</b></td><td class="h2h"> <a href="/Lille-Paris_Saint_Germain-2525320-2525320.html"> 0:3</a></td></tr><tr  bgcolor="#FFCC99"><td width="70">09th Dec 17</td> <td colspan="2">  France - Ligue 1</td><td colspan="2"><b>Paris Saint-Germain</b> : Lille</td><td class="h2h"> <a href="/Paris_Saint_Germain-Lille-2525256-2525256.html"> 3:1</a></td></tr><tr  bgcolor="#FFCC99"><td width="70">07th Feb 17</td> <td colspan="2">  France - Ligue 1</td><td colspan="2"><b>Paris Saint-Germain</b> : Lille</td><td class="h2h"> <a href="/Paris_Saint_Germain-Lille-2241562-2241562.html"> 2:1</a></td></tr><tr  bgcolor="#FFCC99"><td width="70">14th Dec 16</td> <td colspan="2">  France - League Cup</td><td colspan="2"><b>Paris Saint-Germain</b> : Lille</td><td class="h2h"> <a href="/Paris_Saint_Germain-Lille-2375389-2375389.html"> 3:1</a></td></tr><tr  bgcolor="#FFCC99"><td width="70">28th Oct 16</td> <td colspan="2">  France - Ligue 1</td><td colspan="2">Lille : <b>Paris Saint-Germain</b></td><td class="h2h"> <a href="/Lille-Paris_Saint_Germain-2241430-2241430.html"> 0:1</a></td></tr><tr  bgcolor="#FFCC99"><td width="70">23rd Apr 16</td> <td colspan="2">  France - League Cup</td><td colspan="2"><b>Paris Saint-Germain</b> : Lille</td><td class="h2h"> <a href="/Paris_Saint_Germain-Lille-2177433-2177433.html"> 2:1</a></td></tr><tr  bgcolor="#FFCC99"><td width="70">13th Feb 16</td> <td colspan="2">  France - Ligue 1</td><td colspan="2">Paris Saint-Germain : Lille</td><td class="h2h"> <a href="/Paris_Saint_Germain-Lille-1990137-1990137.html"> 0:0</a></td></tr><tr  bgcolor="#FFCC99"><td width="70">07th Aug 15</td> <td colspan="2">  France - Ligue 1</td><td colspan="2">Lille : <b>Paris Saint-Germain</b></td><td class="h2h"> <a href="/Lille-Paris_Saint_Germain-1989781-1989781.html"> 0:1</a></td></tr><tr><td colspan="6"   id="gamecss">&raquo;Latest games</td></tr></table><table class="homeonly"  align="left"><tr><td colspan="6" class="teamhead">Lille</td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>01.2.</td><td  align=right><b>Lille</b></td><td  align=center width=50>4:0</td><td>Nice</td><td><span class="wdl won"></span></td><td><a href="Lille-Nice-2774122-2774122.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Lille</b>-Nice game" border="0"></a> </td></tr><tr class="predict2"><td>25.1.</td><td  align=right>Marseille</td><td  align=center width=50>1:2</td><td><b>Lille</b></td><td><span class="wdl won"></span></td><td><a href="Marseille-Lille-2774112-2774112.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Marseille-<b>Lille</b> game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Coupe_de_France-2018_2019-857745.html"> France - Coupe de France 2018/2019</a></td></tr><tr class="predict2"><td>22.1.</td><td  align=right>Sete</td><td  align=center width=50>0:1</td><td><b>Lille</b></td><td><span class="wdl won"></span></td><td><a href="Sete-Lille-2961407-2961407.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Sete-<b>Lille</b> game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>18.1.</td><td  align=right><b>Lille</b></td><td  align=center width=50>2:1</td><td>Amiens</td><td><span class="wdl won"></span></td><td><a href="Lille-Amiens-2774102-2774102.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Lille</b>-Amiens game" border="0"></a> </td></tr><tr class="predict2"><td>11.1.</td><td  align=right>Caen</td><td  align=center width=50>1:3</td><td><b>Lille</b></td><td><span class="wdl won"></span></td><td><a href="Caen-Lille-2774090-2774090.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Caen-<b>Lille</b> game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Coupe_de_France-2018_2019-857745.html"> France - Coupe de France 2018/2019</a></td></tr><tr class="predict2"><td>07.1.</td><td  align=right><b>Lille</b></td><td  align=center width=50>1:0</td><td>Sochaux</td><td><span class="wdl won"></span></td><td><a href="Lille-Sochaux-2944728-2944728.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Lille</b>-Sochaux game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>22.12.</td><td  align=right>Lille</td><td  align=center width=50>1:2</td><td><b>Toulouse</b></td><td><span class="wdl lost"></span></td><td><a href="Lille-Toulouse-2774081-2774081.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Lille-<b>Toulouse</b> game" border="0"></a> </td></tr><tr class="predict2"><td>16.12.</td><td  align=right>Nimes</td><td  align=center width=50>2:3</td><td><b>Lille</b></td><td><span class="wdl won"></span></td><td><a href="Nimes-Lille-2774077-2774077.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Nimes-<b>Lille</b> game" border="0"></a> </td></tr><tr class="predict2"><td>09.12.</td><td  align=right>Lille</td><td  align=center width=50>1:1</td><td>Reims</td><td><span  class="wdl draw"></span></td><td><a href="Lille-Reims-2774061-2774061.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Lille-Reims game" border="0"></a> </td></tr><tr class="predict2"><td>04.12.</td><td  align=right>Montpellier</td><td  align=center width=50>0:1</td><td><b>Lille</b></td><td><span class="wdl won"></span></td><td><a href="Montpellier-Lille-2774054-2774054.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Montpellier-<b>Lille</b> game" border="0"></a> </td></tr><tr class="predict2"><td>01.12.</td><td  align=right>Lille</td><td  align=center width=50>2:2</td><td>Lyon</td><td><span  class="wdl draw"></span></td><td><a href="Lille-Lyon-2774042-2774042.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Lille-Lyon game" border="0"></a> </td></tr><tr class="predict2"><td>25.11.</td><td  align=right><b>Nice</b></td><td  align=center width=50>2:0</td><td>Lille</td><td><span class="wdl lost"></span></td><td><a href="Nice-Lille-2774035-2774035.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Nice</b>-Lille game" border="0"></a> </td></tr><tr class="predict2"><td>09.11.</td><td  align=right>Lille</td><td  align=center width=50>0:0</td><td>Strasbourg</td><td><span  class="wdl draw"></span></td><td><a href="Lille-Strasbourg-2774022-2774022.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Lille-Strasbourg game" border="0"></a> </td></tr><tr class="predict2"><td>02.11.</td><td  align=right><b>Paris Saint-Germain</b></td><td  align=center width=50>2:1</td><td>Lille</td><td><span class="wdl lost"></span></td><td><a href="Paris_Saint_Germain-Lille-2774015-2774015.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Paris Saint-Germain</b>-Lille game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-League_Cup-2018_2019-856513.html"> France - League Cup 2018/2019</a></td></tr><tr class="predict2"><td>30.10.</td><td  align=right><b>Strasbourg</b></td><td  align=center width=50>2:0</td><td>Lille</td><td><span class="wdl lost"></span></td><td><a href="Strasbourg-Lille-2888324-2888324.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Strasbourg</b>-Lille game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>27.10.</td><td  align=right><b>Lille</b></td><td  align=center width=50>1:0</td><td>Caen</td><td><span class="wdl won"></span></td><td><a href="Lille-Caen-2774003-2774003.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Lille</b>-Caen game" border="0"></a> </td></tr><tr class="predict2"><td>20.10.</td><td  align=right>Dijon</td><td  align=center width=50>1:2</td><td><b>Lille</b></td><td><span class="wdl won"></span></td><td><a href="Dijon-Lille-2773990-2773990.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Dijon-<b>Lille</b> game" border="0"></a> </td></tr><tr class="predict2"><td>06.10.</td><td  align=right><b>Lille</b></td><td  align=center width=50>3:1</td><td>Saint-Etienne</td><td><span class="wdl won"></span></td><td><a href="Lille-Saint_Etienne-2773983-2773983.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Lille</b>-Saint-Etienne game" border="0"></a> </td></tr></table><table  class="homeonly" align="right"><tr><td colspan="6" class="teamhead">Paris Saint-Germain</td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>03.2.</td><td  align=right><b>Lyon</b></td><td  align=center width=50>2:1</td><td>Paris Saint-Germain</td><td><img src="/imgs/lost.gif" width="14" height="14"></td><td><a href="Lyon-Paris_Saint_Germain-2774128-2774128.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Lyon</b>-Paris Saint-Germain game" border="0"></a> </td></tr><tr class="predict2"><td>27.1.</td><td  align=right><b>Paris Saint-Germain</b></td><td  align=center width=50>4:1</td><td>Rennes</td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Paris_Saint_Germain-Rennes-2774116-2774116.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Paris Saint-Germain</b>-Rennes game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Coupe_de_France-2018_2019-857745.html"> France - Coupe de France 2018/2019</a></td></tr><tr class="predict2"><td>23.1.</td><td  align=right><b>Paris Saint-Germain</b></td><td  align=center width=50>2:0</td><td>Strasbourg</td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Paris_Saint_Germain-Strasbourg-2961408-2961408.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Paris Saint-Germain</b>-Strasbourg game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>19.1.</td><td  align=right><b>Paris Saint-Germain</b></td><td  align=center width=50>9:0</td><td>Guingamp</td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Paris_Saint_Germain-Guingamp-2774105-2774105.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Paris Saint-Germain</b>-Guingamp game" border="0"></a> </td></tr><tr class="predict2"><td>12.1.</td><td  align=right>Amiens</td><td  align=center width=50>0:3</td><td><b>Paris Saint-Germain</b></td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Amiens-Paris_Saint_Germain-2774089-2774089.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Amiens-<b>Paris Saint-Germain</b> game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-League_Cup-2018_2019-856513.html"> France - League Cup 2018/2019</a></td></tr><tr class="predict2"><td>09.1.</td><td  align=right>Paris Saint-Germain</td><td  align=center width=50>1:2</td><td><b>Guingamp</b></td><td><img src="/imgs/lost.gif" width="14" height="14"></td><td><a href="Paris_Saint_Germain-Guingamp-2949349-2949349.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Paris Saint-Germain-<b>Guingamp</b> game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Coupe_de_France-2018_2019-857745.html"> France - Coupe de France 2018/2019</a></td></tr><tr class="predict2"><td>06.1.</td><td  align=right>Garde Saint-Ivy Pontivy</td><td  align=center width=50>0:4</td><td><b>Paris Saint-Germain</b></td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Garde_Saint_Ivy_Pontivy-Paris_Saint_Germain-2944737-2944737.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Garde Saint-Ivy Pontivy-<b>Paris Saint-Germain</b> game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>22.12.</td><td  align=right><b>Paris Saint-Germain</b></td><td  align=center width=50>1:0</td><td>Nantes</td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Paris_Saint_Germain-Nantes-2774084-2774084.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Paris Saint-Germain</b>-Nantes game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-League_Cup-2018_2019-856513.html"> France - League Cup 2018/2019</a></td></tr><tr class="predict2"><td>18.12.</td><td  align=right>Orleans</td><td  align=center width=50>1:2</td><td><b>Paris Saint-Germain</b></td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Orleans-Paris_Saint_Germain-2929498-2929498.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Orleans-<b>Paris Saint-Germain</b> game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="International-Champions_League_Grp__C-2018_2019-857031.html"> International - Champions League Grp. C 2018/2019</a></td></tr><tr class="predict2"><td>11.12.</td><td  align=right>FK Crvena Zvezda</td><td  align=center width=50>1:4</td><td><b>Paris Saint-Germain</b></td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="FK_Crvena_Zvezda-Paris_Saint_Germain-2876522-2876522.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about FK Crvena Zvezda-<b>Paris Saint-Germain</b> game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>05.12.</td><td  align=right>Strasbourg</td><td  align=center width=50>1:1</td><td>Paris Saint-Germain</td><td><img src="/imgs/draw.gif" width="14" height="14"></td><td><a href="Strasbourg-Paris_Saint_Germain-2774058-2774058.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Strasbourg-Paris Saint-Germain game" border="0"></a> </td></tr><tr class="predict2"><td>02.12.</td><td  align=right>Bordeaux</td><td  align=center width=50>2:2</td><td>Paris Saint-Germain</td><td><img src="/imgs/draw.gif" width="14" height="14"></td><td><a href="Bordeaux-Paris_Saint_Germain-2774040-2774040.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about Bordeaux-Paris Saint-Germain game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="International-Champions_League_Grp__C-2018_2019-857031.html"> International - Champions League Grp. C 2018/2019</a></td></tr><tr class="predict2"><td>28.11.</td><td  align=right><b>Paris Saint-Germain</b></td><td  align=center width=50>2:1</td><td>Liverpool</td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Paris_Saint_Germain-Liverpool-2876519-2876519.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Paris Saint-Germain</b>-Liverpool game" border="0"></a> </td></tr><tr><td class="soutez" colspan="6"><a href="France-Ligue_1-2018_2019-855880.html"> France - Ligue 1 2018/2019</a></td></tr><tr class="predict2"><td>24.11.</td><td  align=right><b>Paris Saint-Germain</b></td><td  align=center width=50>1:0</td><td>Toulouse</td><td><img src="/imgs/won.gif" width="14" height="14"></td><td><a href="Paris_Saint_Germain-Toulouse-2774036-2774036.html"><img src="/imgs/detail44.gif" width="14" height="14" alt="More details about <b>Paris Saint-Germain</b>-Toulouse game" border="0"></a> </td></tr></table><br clear="LEFT"><br><br> <div align="center"><a href="https://www.soccervista.com/go/click.php?id=30&fr=50"><img src="https://www.soccervista.com/assets/imgs/adv/bahforgif.gif" style="border:none; width:722px;  height:91px;" ></a></div><br><h2>Tables</h2><div align="center">Main table plus home and away only tables.</div><table class="all"><thead><tr class="head"><td width="40" class="head">#</td><td>team</td><td width="40">G</td><td width="40">W</td><td width="40">D</td><td width="40">L</td><td  width="48">goals</td><td width="45" class="head2">points</td></tr></thead><tbody><tr class="away"><td class="championsleague">1</td><td>Paris Saint-Germain</td><td>38</td><td>30</td><td>6</td><td>2</td><td>102:19</td><td><strong>96</strong></td></tr><tr class="twom"><td class="championsleague">2</td><td>Lyon</td><td>38</td><td>19</td><td>8</td><td>11</td><td>67:43</td><td><strong>65</strong></td></tr><tr class="onem"><td class="championsleagueQ">3</td><td>Monaco</td><td>38</td><td>17</td><td>14</td><td>7</td><td>57:50</td><td><strong>65</strong></td></tr><tr class="twom"><td class="uefacupQ">4</td><td>Nice</td><td>38</td><td>18</td><td>9</td><td>11</td><td>58:41</td><td><strong>63</strong></td></tr><tr class="home"><td class="rank">5</td><td>Lille</td><td>38</td><td>15</td><td>15</td><td>8</td><td>39:27</td><td><strong>60</strong></td></tr><tr class="twom"><td class="rank">6</td><td>Saint-Etienne</td><td>38</td><td>17</td><td>7</td><td>14</td><td>42:37</td><td><strong>58</strong></td></tr><tr class="onem"><td class="rank">7</td><td>Caen</td><td>38</td><td>16</td><td>6</td><td>16</td><td>39:52</td><td><strong>54</strong></td></tr><tr class="twom"><td class="rank">8</td><td>Rennes</td><td>38</td><td>13</td><td>13</td><td>12</td><td>52:54</td><td><strong>52</strong></td></tr><tr class="onem"><td class="rank">9</td><td>Angers</td><td>38</td><td>13</td><td>11</td><td>14</td><td>40:38</td><td><strong>50</strong></td></tr><tr class="twom"><td class="rank">10</td><td>SC Bastia</td><td>38</td><td>14</td><td>8</td><td>16</td><td>36:42</td><td><strong>50</strong></td></tr><tr class="onem"><td class="rank">11</td><td>Bordeaux</td><td>38</td><td>12</td><td>14</td><td>12</td><td>50:57</td><td><strong>50</strong></td></tr><tr class="twom"><td class="rank">12</td><td>Montpellier</td><td>38</td><td>14</td><td>7</td><td>17</td><td>49:47</td><td><strong>49</strong></td></tr><tr class="onem"><td class="rank">13</td><td>Marseille</td><td>38</td><td>10</td><td>18</td><td>10</td><td>48:42</td><td><strong>48</strong></td></tr><tr class="twom"><td class="rank">14</td><td>Nantes</td><td>38</td><td>12</td><td>12</td><td>14</td><td>33:44</td><td><strong>48</strong></td></tr><tr class="onem"><td class="rank">15</td><td>Lorient</td><td>38</td><td>11</td><td>13</td><td>14</td><td>47:58</td><td><strong>46</strong></td></tr><tr class="twom"><td class="rank">16</td><td>Guingamp</td><td>38</td><td>11</td><td>11</td><td>16</td><td>47:56</td><td><strong>44</strong></td></tr><tr class="onem"><td class="rank">17</td><td>Toulouse</td><td>38</td><td>9</td><td>13</td><td>16</td><td>45:55</td><td><strong>40</strong></td></tr><tr class="twom"><td class="relegation">18</td><td>Reims</td><td>38</td><td>10</td><td>9</td><td>19</td><td>44:57</td><td><strong>39</strong></td></tr><tr class="onem"><td class="relegation">19</td><td>GFC Ajaccio</td><td>38</td><td>8</td><td>13</td><td>17</td><td>37:58</td><td><strong>37</strong></td></tr><tr class="twom"><td class="relegation">20</td><td>Troyes</td><td>38</td><td>3</td><td>9</td><td>26</td><td>28:83</td><td><strong>18</strong></td></tr><tr class="foottable"><td class="foottable" colspan="8">&nbsp;<img src="imgs/table_championsleague.gif" alt="champions league" /> champions league &nbsp;&nbsp;<img src="imgs/table_championsleagueQ.gif" alt="champions league qualification" /> champions league qualification &nbsp;&nbsp;<img src="imgs/table_uefacupQ.gif" alt="uefa qualification" /> uefa qualification &nbsp;&nbsp;<img src="imgs/table_relegation.gif" alt="relegation" /> relegation &nbsp;</td></tr></tbody></table><br><table  class="homeonly" align="left"<thead><tr class="head"><td class="head" colspan="7">Home</td><td class="head2">&nbsp;</td></tr></thead><tbody><tr class="away"><td class="rank">1</td><td width="50%">Paris Saint-Germain</td><td>19</td><td>15</td><td>3</td><td>1</td><td>59:12</td><td>48</td></tr><tr class="twom"><td class="rank">2</td><td width="50%">Lyon</td><td>19</td><td>12</td><td>4</td><td>3</td><td>42:16</td><td>40</td></tr><tr class="onem"><td class="rank">3</td><td width="50%">Nice</td><td>19</td><td>12</td><td>2</td><td>5</td><td>32:16</td><td>38</td></tr><tr class="twom"><td class="rank">4</td><td width="50%">Monaco</td><td>19</td><td>10</td><td>6</td><td>3</td><td>30:19</td><td>36</td></tr><tr class="onem"><td class="rank">5</td><td width="50%">SC Bastia</td><td>19</td><td>11</td><td>2</td><td>6</td><td>23:14</td><td>35</td></tr><tr class="twom"><td class="rank">6</td><td width="50%">Saint-Etienne</td><td>19</td><td>10</td><td>4</td><td>5</td><td>25:15</td><td>34</td></tr><tr class="home"><td class="rank">7</td><td width="50%">Lille</td><td>19</td><td>9</td><td>6</td><td>4</td><td>21:11</td><td>33</td></tr><tr class="twom"><td class="rank">8</td><td width="50%">Bordeaux</td><td>19</td><td>8</td><td>7</td><td>4</td><td>27:20</td><td>31</td></tr><tr class="onem"><td class="rank">9</td><td width="50%">Caen</td><td>19</td><td>9</td><td>3</td><td>7</td><td>19:23</td><td>30</td></tr><tr class="twom"><td class="rank">10</td><td width="50%">Nantes</td><td>19</td><td>8</td><td>5</td><td>6</td><td>20:20</td><td>29</td></tr><tr class="onem"><td class="rank">11</td><td width="50%">Lorient</td><td>19</td><td>7</td><td>7</td><td>5</td><td>26:21</td><td>28</td></tr><tr class="twom"><td class="rank">12</td><td width="50%">Montpellier</td><td>19</td><td>9</td><td>0</td><td>10</td><td>26:23</td><td>27</td></tr><tr class="onem"><td class="rank">13</td><td width="50%">Reims</td><td>19</td><td>7</td><td>5</td><td>7</td><td>28:23</td><td>26</td></tr><tr class="twom"><td class="rank">14</td><td width="50%">Angers</td><td>19</td><td>6</td><td>8</td><td>5</td><td>20:15</td><td>26</td></tr><tr class="onem"><td class="rank">15</td><td width="50%">Toulouse</td><td>19</td><td>6</td><td>7</td><td>6</td><td>29:21</td><td>25</td></tr><tr class="twom"><td class="rank">16</td><td width="50%">Rennes</td><td>19</td><td>6</td><td>7</td><td>6</td><td>25:25</td><td>25</td></tr><tr class="onem"><td class="rank">17</td><td width="50%">Guingamp</td><td>19</td><td>6</td><td>7</td><td>6</td><td>31:28</td><td>25</td></tr><tr class="twom"><td class="rank">18</td><td width="50%">GFC Ajaccio</td><td>19</td><td>5</td><td>7</td><td>7</td><td>23:32</td><td>22</td></tr><tr class="onem"><td class="rank">19</td><td width="50%">Marseille</td><td>19</td><td>3</td><td>11</td><td>5</td><td>27:24</td><td>20</td></tr><tr class="twom"><td class="rank">20</td><td width="50%">Troyes</td><td>19</td><td>1</td><td>7</td><td>11</td><td>13:36</td><td>10</td></tr></tbody></table><table class="homeonly" align="right"><thead><tr class="head"><td class="head" colspan="7">Away</td><td class="head2">&nbsp;</td></tr></thead><tbody><tr class="away"><td class="rank">1</td><td width="50%">Paris Saint-Germain</td><td>19</td><td>15</td><td>3</td><td>1</td><td>43:7</td><td>48</td></tr><tr class="twom"><td class="rank">2</td><td width="50%">Monaco</td><td>19</td><td>7</td><td>8</td><td>4</td><td>27:31</td><td>29</td></tr><tr class="onem"><td class="rank">3</td><td width="50%">Marseille</td><td>19</td><td>7</td><td>7</td><td>5</td><td>21:18</td><td>28</td></tr><tr class="twom"><td class="rank">4</td><td width="50%">Rennes</td><td>19</td><td>7</td><td>6</td><td>6</td><td>27:29</td><td>27</td></tr><tr class="home"><td class="rank">5</td><td width="50%">Lille</td><td>19</td><td>6</td><td>9</td><td>4</td><td>18:16</td><td>27</td></tr><tr class="twom"><td class="rank">6</td><td width="50%">Nice</td><td>19</td><td>6</td><td>7</td><td>6</td><td>26:25</td><td>25</td></tr><tr class="onem"><td class="rank">7</td><td width="50%">Lyon</td><td>19</td><td>7</td><td>4</td><td>8</td><td>25:27</td><td>25</td></tr><tr class="twom"><td class="rank">8</td><td width="50%">Saint-Etienne</td><td>19</td><td>7</td><td>3</td><td>9</td><td>17:22</td><td>24</td></tr><tr class="onem"><td class="rank">9</td><td width="50%">Angers</td><td>19</td><td>7</td><td>3</td><td>9</td><td>20:23</td><td>24</td></tr><tr class="twom"><td class="rank">10</td><td width="50%">Caen</td><td>19</td><td>7</td><td>3</td><td>9</td><td>20:29</td><td>24</td></tr><tr class="onem"><td class="rank">11</td><td width="50%">Montpellier</td><td>19</td><td>5</td><td>7</td><td>7</td><td>23:24</td><td>22</td></tr><tr class="twom"><td class="rank">12</td><td width="50%">Nantes</td><td>19</td><td>4</td><td>7</td><td>8</td><td>13:24</td><td>19</td></tr><tr class="onem"><td class="rank">13</td><td width="50%">Bordeaux</td><td>19</td><td>4</td><td>7</td><td>8</td><td>23:37</td><td>19</td></tr><tr class="twom"><td class="rank">14</td><td width="50%">Guingamp</td><td>19</td><td>5</td><td>4</td><td>10</td><td>16:28</td><td>19</td></tr><tr class="onem"><td class="rank">15</td><td width="50%">Lorient</td><td>19</td><td>4</td><td>6</td><td>9</td><td>21:37</td><td>18</td></tr><tr class="twom"><td class="rank">16</td><td width="50%">Toulouse</td><td>19</td><td>3</td><td>6</td><td>10</td><td>16:34</td><td>15</td></tr><tr class="onem"><td class="rank">17</td><td width="50%">SC Bastia</td><td>19</td><td>3</td><td>6</td><td>10</td><td>13:28</td><td>15</td></tr><tr class="twom"><td class="rank">18</td><td width="50%">GFC Ajaccio</td><td>19</td><td>3</td><td>6</td><td>10</td><td>14:26</td><td>15</td></tr><tr class="onem"><td class="rank">19</td><td width="50%">Reims</td><td>19</td><td>3</td><td>4</td><td>12</td><td>16:34</td><td>13</td></tr><tr class="twom"><td class="rank">20</td><td width="50%">Troyes</td><td>19</td><td>2</td><td>2</td><td>15</td><td>15:47</td><td>8</td></tr></tbody></table><BR CLEAR=LEFT><br/><h2>Last5 Tables</h2><div align="center">Tables including only last five games played.</div><table class="all"><thead><tr class="head"><td width="40" class="head">#</td><td>team</td><td width="40">G</td><td width="40">W</td><td width="40">D</td><td width="40">L</td><td  width="48">goals</td><td width="45" class="head2">points</td></tr></thead><tbody><tr class="away"><td class="rank">1</td><td>Paris Saint-Germain</td><td>5</td><td>4</td><td>1</td><td>0</td><td>19:1</td><td>13</td></tr><tr class="twom"><td class="rank">2</td><td>Montpellier</td><td>5</td><td>4</td><td>0</td><td>1</td><td>11:5</td><td>12</td></tr><tr class="home"><td class="rank">3</td><td>Lille</td><td>5</td><td>3</td><td>2</td><td>0</td><td>6:2</td><td>11</td></tr><tr class="twom"><td class="rank">4</td><td>Nice</td><td>5</td><td>3</td><td>1</td><td>1</td><td>8:4</td><td>10</td></tr><tr class="onem"><td class="rank">5</td><td>Monaco</td><td>5</td><td>3</td><td>1</td><td>1</td><td>9:10</td><td>10</td></tr><tr class="twom"><td class="rank">6</td><td>Lyon</td><td>5</td><td>3</td><td>1</td><td>1</td><td>13:9</td><td>10</td></tr><tr class="onem"><td class="rank">7</td><td>Toulouse</td><td>5</td><td>2</td><td>2</td><td>1</td><td>7:6</td><td>8</td></tr><tr class="twom"><td class="rank">8</td><td>Marseille</td><td>5</td><td>2</td><td>2</td><td>1</td><td>5:4</td><td>8</td></tr><tr class="onem"><td class="rank">9</td><td>Caen</td><td>5</td><td>2</td><td>2</td><td>1</td><td>4:8</td><td>8</td></tr><tr class="twom"><td class="rank">10</td><td>Saint-Etienne</td><td>5</td><td>2</td><td>1</td><td>2</td><td>3:3</td><td>7</td></tr><tr class="onem"><td class="rank">11</td><td>Bordeaux</td><td>5</td><td>2</td><td>1</td><td>2</td><td>9:7</td><td>7</td></tr><tr class="twom"><td class="rank">12</td><td>SC Bastia</td><td>5</td><td>2</td><td>1</td><td>2</td><td>5:5</td><td>7</td></tr><tr class="onem"><td class="rank">13</td><td>Guingamp</td><td>5</td><td>1</td><td>2</td><td>2</td><td>8:7</td><td>5</td></tr><tr class="twom"><td class="rank">14</td><td>Troyes</td><td>5</td><td>1</td><td>1</td><td>3</td><td>6:11</td><td>4</td></tr><tr class="onem"><td class="rank">15</td><td>Nantes</td><td>5</td><td>1</td><td>1</td><td>3</td><td>3:9</td><td>4</td></tr><tr class="twom"><td class="rank">16</td><td>Lorient</td><td>5</td><td>1</td><td>1</td><td>3</td><td>2:7</td><td>4</td></tr><tr class="onem"><td class="rank">17</td><td>Angers</td><td>5</td><td>1</td><td>1</td><td>3</td><td>5:6</td><td>4</td></tr><tr class="twom"><td class="rank">18</td><td>Reims</td><td>5</td><td>1</td><td>0</td><td>4</td><td>7:9</td><td>3</td></tr><tr class="onem"><td class="rank">19</td><td>GFC Ajaccio</td><td>5</td><td>1</td><td>0</td><td>4</td><td>6:13</td><td>3</td></tr><tr class="twom"><td class="rank">20</td><td>Rennes</td><td>5</td><td>0</td><td>1</td><td>4</td><td>2:12</td><td>1</td></tr></tbody></table><br><table align="left" width=49%><thead><tr class="head"><td class="head" colspan="7">Home</td><td class="head2">&nbsp;</td></tr></thead><tbody><tr class="onem"><td class="rank">1</td><td>Nice</td><td>5</td><td>5</td><td>0</td><td>0</td><td>12:1</td><td>15</td></tr><tr class="twom"><td class="rank">2</td><td>Lyon</td><td>5</td><td>4</td><td>1</td><td>0</td><td>16:4</td><td>13</td></tr><tr class="onem"><td class="rank">3</td><td>Toulouse</td><td>5</td><td>4</td><td>0</td><td>1</td><td>13:3</td><td>12</td></tr><tr class="away"><td class="rank">4</td><td>Paris Saint-Germain</td><td>5</td><td>4</td><td>0</td><td>1</td><td>18:3</td><td>12</td></tr><tr class="home"><td class="rank">5</td><td>Lille</td><td>5</td><td>3</td><td>2</td><td>0</td><td>7:1</td><td>11</td></tr><tr class="twom"><td class="rank">6</td><td>Saint-Etienne</td><td>5</td><td>3</td><td>1</td><td>1</td><td>6:1</td><td>10</td></tr><tr class="onem"><td class="rank">7</td><td>Monaco</td><td>5</td><td>3</td><td>1</td><td>1</td><td>10:7</td><td>10</td></tr><tr class="twom"><td class="rank">8</td><td>Montpellier</td><td>5</td><td>3</td><td>0</td><td>2</td><td>9:5</td><td>9</td></tr><tr class="onem"><td class="rank">9</td><td>Reims</td><td>5</td><td>3</td><td>0</td><td>2</td><td>12:7</td><td>9</td></tr><tr class="twom"><td class="rank">10</td><td>Caen</td><td>5</td><td>2</td><td>2</td><td>1</td><td>6:5</td><td>8</td></tr><tr class="onem"><td class="rank">11</td><td>SC Bastia</td><td>5</td><td>2</td><td>1</td><td>2</td><td>4:4</td><td>7</td></tr><tr class="twom"><td class="rank">12</td><td>Nantes</td><td>5</td><td>2</td><td>0</td><td>3</td><td>4:7</td><td>6</td></tr><tr class="onem"><td class="rank">13</td><td>Bordeaux</td><td>5</td><td>1</td><td>3</td><td>1</td><td>7:6</td><td>6</td></tr><tr class="twom"><td class="rank">14</td><td>Marseille</td><td>5</td><td>1</td><td>3</td><td>1</td><td>5:7</td><td>6</td></tr><tr class="onem"><td class="rank">15</td><td>GFC Ajaccio</td><td>5</td><td>2</td><td>0</td><td>3</td><td>6:12</td><td>6</td></tr><tr class="twom"><td class="rank">16</td><td>Rennes</td><td>5</td><td>1</td><td>2</td><td>2</td><td>7:9</td><td>5</td></tr><tr class="onem"><td class="rank">17</td><td>Guingamp</td><td>5</td><td>1</td><td>2</td><td>2</td><td>7:8</td><td>5</td></tr><tr class="twom"><td class="rank">18</td><td>Lorient</td><td>5</td><td>1</td><td>2</td><td>2</td><td>4:6</td><td>5</td></tr><tr class="onem"><td class="rank">19</td><td>Angers</td><td>5</td><td>1</td><td>2</td><td>2</td><td>7:5</td><td>5</td></tr><tr class="twom"><td class="rank">20</td><td>Troyes</td><td>5</td><td>1</td><td>1</td><td>3</td><td>5:16</td><td>4</td></tr></tbody></table><table align="right" width=49%><thead><tr class="head"><td class="head" colspan="7">Away</td><td class="head2">&nbsp;</td></tr></thead><tbody><tr class="home"><td class="rank">1</td><td>Lille</td><td>5</td><td>5</td><td>0</td><td>0</td><td>11:3</td><td>15</td></tr><tr class="away"><td class="rank">2</td><td>Paris Saint-Germain</td><td>5</td><td>3</td><td>1</td><td>1</td><td>17:3</td><td>10</td></tr><tr class="onem"><td class="rank">3</td><td>Lyon</td><td>5</td><td>3</td><td>1</td><td>1</td><td>11:9</td><td>10</td></tr><tr class="twom"><td class="rank">4</td><td>Montpellier</td><td>5</td><td>2</td><td>1</td><td>2</td><td>7:9</td><td>7</td></tr><tr class="onem"><td class="rank">5</td><td>Saint-Etienne</td><td>5</td><td>2</td><td>1</td><td>2</td><td>3:4</td><td>7</td></tr><tr class="twom"><td class="rank">6</td><td>Nice</td><td>5</td><td>2</td><td>1</td><td>2</td><td>7:8</td><td>7</td></tr><tr class="onem"><td class="rank">7</td><td>Bordeaux</td><td>5</td><td>2</td><td>1</td><td>2</td><td>6:8</td><td>7</td></tr><tr class="twom"><td class="rank">8</td><td>Guingamp</td><td>5</td><td>2</td><td>1</td><td>2</td><td>7:8</td><td>7</td></tr><tr class="onem"><td class="rank">9</td><td>Angers</td><td>5</td><td>2</td><td>1</td><td>2</td><td>4:4</td><td>7</td></tr><tr class="twom"><td class="rank">10</td><td>Toulouse</td><td>5</td><td>1</td><td>3</td><td>1</td><td>5:5</td><td>6</td></tr><tr class="onem"><td class="rank">11</td><td>Rennes</td><td>5</td><td>2</td><td>0</td><td>3</td><td>7:12</td><td>6</td></tr><tr class="twom"><td class="rank">12</td><td>Monaco</td><td>5</td><td>1</td><td>2</td><td>2</td><td>7:13</td><td>5</td></tr><tr class="onem"><td class="rank">13</td><td>Marseille</td><td>5</td><td>1</td><td>2</td><td>2</td><td>5:6</td><td>5</td></tr><tr class="twom"><td class="rank">14</td><td>SC Bastia</td><td>5</td><td>1</td><td>2</td><td>2</td><td>5:9</td><td>5</td></tr><tr class="onem"><td class="rank">15</td><td>Lorient</td><td>5</td><td>1</td><td>1</td><td>3</td><td>3:11</td><td>4</td></tr><tr class="twom"><td class="rank">16</td><td>Caen</td><td>5</td><td>1</td><td>1</td><td>3</td><td>3:11</td><td>4</td></tr><tr class="onem"><td class="rank">17</td><td>Nantes</td><td>5</td><td>0</td><td>2</td><td>3</td><td>2:9</td><td>2</td></tr><tr class="twom"><td class="rank">18</td><td>GFC Ajaccio</td><td>5</td><td>0</td><td>2</td><td>3</td><td>2:7</td><td>2</td></tr><tr class="onem"><td class="rank">19</td><td>Reims</td><td>5</td><td>0</td><td>1</td><td>4</td><td>4:10</td><td>1</td></tr><tr class="twom"><td class="rank">20</td><td>Troyes</td><td>5</td><td>0</td><td>0</td><td>5</td><td>3:10</td><td>0</td></tr></tbody></table><BR CLEAR=LEFT>
  <P><img src="pics/r18.png" border="0" width="35" height="35" alt="Legal Age"
          align="left" border="0"><font size="2">&nbsp;&nbsp;&nbsp;<b>Adults only.</b> Don't let gambling become a problem in your life.  Check our <A href="responsible.php">responsible gambling</a> page for more info.</font>
      </div>

  <div id="col3">
  <div id="navcontainer"><br><ul id="navlist2"><li><strong>Top Leagues</strong></li><li><a href="/England-Premier_League-2018_2019-855968.html"><span class="flag England"></span>&nbsp;England</a></li><li><a href="/France-Ligue_1-2018_2019-855880.html"><span class="flag France"></span>&nbsp;France</a></li><li><a href="/Germany-1__Bundesliga-2018_2019-856299.html"><span class="flag Germany"></span>&nbsp;Germany</a></li><li><a href="/International-Champions_League_Final_Stage-2018_2019-857028.html"><span class="flag International"></span>&nbsp;International</a></li><li><a href="/Italy-Serie_A-2018_2019-856689.html"><span class="flag Italy"></span>&nbsp;Italy</a></li><li><a href="/Netherlands-Eredivisie-2018_2019-855942.html"><span class="flag Netherlands"></span>&nbsp;Netherlands</a></li><li><a href="/Portugal-Primeira_Liga-2018_2019-856425.html"><span class="flag Portugal"></span>&nbsp;Portugal</a></li><li><a href="/Russia-Premier_League-2018_2019-856116.html"><span class="flag Russia"></span>&nbsp;Russia</a></li><li><a href="/Spain-Primera_Division-2018_2019-856644.html"><span class="flag Spain"></span>&nbsp;Spain</a></li></ul><br><div align='center'> <iframe allowtransparency="true" src="https://ads2.williamhill.com/ad.aspx?bid=1487417097&pid=63881137" width="120" height="600" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe></div></div><br><ul id='navlist2'><li><strong>Good Leagues</strong></li><li><a href="/Argentina-Superliga-2018_2019-856590.html">Argentina</a></li><li><a href="/Australia-A_League-2018_2019-856507.html">Australia</a></li><li><a href="/Austria-Bundesliga-2018_2019-856035.html">Austria</a></li><li><a href="/Belgium-First_Division_A-2018_2019-855945.html">Belgium</a></li><li><a href="/Bulgaria-First_Professional_League-2018_2019-855897.html">Bulgaria</a></li><li><a href="/Croatia-1__Division-2018_2019-855983.html">Croatia</a></li><li><a href="/Czech_Republic-1__Liga-2018_2019-856080.html">Czech Republic</a></li><li><a href="/Denmark-Superligaen-2018_2019-855774.html">Denmark</a></li><li><a href="/Finland-Veikkausliiga-2019-859640.html">Finland</a></li><li><a href="/Greece-Super_League-2018_2019-856849.html">Greece</a></li><li><a href="/Hungary-NB_I-2018_2019-856359.html">Hungary</a></li><li><a href="/International-AFC_Champions_League_Grp__A-2019-859018.html">International</a></li><li><a href="/Ireland-Premier_Division-2019-859246.html">Ireland</a></li><li><a href="/Israel-Ligat_HaAl-2018_2019-856085.html">Israel</a></li><li><a href="/Mexico-Liga_MX_Apertura_Playoff-2018_2019-858703.html">Mexico</a></li><li><a href="/N__Ireland-Premiership-2018_2019-856303.html">N. Ireland</a></li><li><a href="/Norway-Eliteserien-2019-859240.html">Norway</a></li><li><a href="/Poland-Ekstraklasa-2018_2019-855843.html">Poland</a></li><li><a href="/Romania-Liga_I-2018_2019-856422.html">Romania</a></li><li><a href="/Scotland-Premiership-2018_2019-856011.html">Scotland</a></li><li><a href="/Slovakia-Super_Liga-2018_2019-856068.html">Slovakia</a></li><li><a href="/Slovenia-Prva_Liga-2018_2019-856096.html">Slovenia</a></li><li><a href="/Sweden-Allsvenskan-2019-859156.html">Sweden</a></li><li><a href="/Switzerland-Super_League-2018_2019-856007.html">Switzerland</a></li><li><a href="/Turkey-Super_Lig-2018_2019-856448.html">Turkey</a></li><li><a href="/Ukraine-Premier_League-2018_2019-855918.html">Ukraine</a></li><li><a href="/USA-Major_League_Soccer-2019-859266.html">USA</a></li><li>
  </li></ul><br><div align='center'><script type='text/javascript' src="https://wlbetathome.adsrv.eacdn.com/S.ashx?btag=a_32345b_34941c_&affid=16050&siteid=32345&adid=34941&c=" ></script></div><br><ul id='navlist2'><li><strong>Others</strong></li><li><a href="/Albania-Kategoria_Superiore-2018_2019-856641.html">Albania</a></li><li><a href="/Algeria-Ligue_1-2018_2019-856828.html">Algeria</a></li><li><a href="/Andorra-1__Division-2018_2019-856350.html">Andorra</a></li><li><a href="/Armenia-Premier_League-2018_2019-856692.html">Armenia</a></li><li><a href="/Azerbaijan-Premier_League-2018_2019-856693.html">Azerbaijan</a></li><li><a href="/Bahrain-Premier_League-2018_2019-857274.html">Bahrain</a></li><li><a href="/Belarus-Super_Cup-2018-859670.html">Belarus</a></li><li><a href="/Bolivia-Primera_Division___Apertura-2019-859506.html">Bolivia</a></li><li><a href="/Bosnia_Herzegovina-Premier_League-2018_2019-856272.html">Bosnia-Herzegovina</a></li><li><a href="/Botswana-Premier_League-2018_2019-856856.html">Botswana</a></li><li><a href="/Brazil-Cup-2019-859164.html">Brazil</a></li><li><a href="/Cameroon-Elite_One_Grp__A-2019-859727.html">Cameroon</a></li><li><a href="/Chile-Primera_Division-2019-859697.html">Chile</a></li><li><a href="/China-Super_Cup-2018-859316.html">China</a></li><li><a href="/Colombia-Primera_A_Apertura-2019-859540.html">Colombia</a></li><li><a href="/Costa_Rica-Primera_Division_Apertura_Championship_Final-2018_2019-859160.html">Costa Rica</a></li><li><a href="/Cuba-Liga_Nacional_Grupo_Occidental-2019-859262.html">Cuba</a></li><li><a href="/Cyprus-1__Division-2018_2019-856418.html">Cyprus</a></li><li><a href="/DR_Congo-Super_League-2018_2019-857099.html">DR Congo</a></li><li><a href="/Ecuador-Serie_A-2019-859498.html">Ecuador</a></li><li><a href="/Egypt-Premier_League-2018_2019-856445.html">Egypt</a></li><li><a href="/El_Salvador-Primera_Division___Apertura_Final_Stage-2018_2019-858701.html">El Salvador</a></li><li><a href="/Estonia-Meistriliiga-2019-859648.html">Estonia</a></li><li><a href="/Faroe_Islands-Premier_League-2019-859610.html">Faroe Islands</a></li><li><a href="/Georgia-Erovnuli_Liga-2019-859499.html">Georgia</a></li><li><a href="/Gibraltar-Premier_Division-2018_2019-856848.html">Gibraltar</a></li><li><a href="/Guatemala-Liga_Nacional_Apertura_Final_Stage-2018_2019-858702.html">Guatemala</a></li><li><a href="/Honduras-Liga_Nacional___Apertura_Final_Stage-2018_2019-858564.html">Honduras</a></li><li><a href="/Hong_Kong-Premier_League-2018_2019-856705.html">Hong Kong</a></li><li><a href="/India-I_League-2018_2019-857765.html">India</a></li><li><a href="/Indonesia-Liga_1-2018-854758.html">Indonesia</a></li><li><a href="/Iran-Persian_Gulf_Pro_League-2018_2019-856438.html">Iran</a></li><li><a href="/Iraq-Premier_League-2018_2019-857091.html">Iraq</a></li><li><a href="/Ivory_Coast-Ligue_1-2018_2019-857115.html">Ivory Coast</a></li><li><a href="/Jamaica-Premier_League-2018_2019-857275.html">Jamaica</a></li><li><a href="/Japan-J__League-2019-859530.html">Japan</a></li><li><a href="/Jordan-Premier_League-2018_2019-856841.html">Jordan</a></li><li><a href="/Kazakhstan-Super_Cup-2018-859658.html">Kazakhstan</a></li><li><a href="/Kenya-Premier_League-2018_2019-857954.html">Kenya</a></li><li><a href="/Kosovo-Superliga-2018_2019-856791.html">Kosovo</a></li><li><a href="/Kuwait-Premier_League-2018_2019-857004.html">Kuwait</a></li><li><a href="/Lebanon-Premier_League-2018_2019-857026.html">Lebanon</a></li><li><a href="/Luxembourg-National_Division-2018_2019-856363.html">Luxembourg</a></li><li><a href="/Macedonia-Prva_Liga-2018_2019-856787.html">Macedonia</a></li><li><a href="/Malaysia-Super_Liga-2019-859534.html">Malaysia</a></li><li><a href="/Malta-Premier_League-2018_2019-856436.html">Malta</a></li><li><a href="/Montenegro-1__CFL-2018_2019-856275.html">Montenegro</a></li><li><a href="/Morocco-Botola_Pro-2018_2019-856518.html">Morocco</a></li><li><a href="/New_Zealand-Premiership-2018_2019-857556.html">New Zealand</a></li><li><a href="/Nigeria-NPFL_Grp__A-2019-859521.html">Nigeria</a></li><li><a href="/Oman-Professional_League-2018_2019-856842.html">Oman</a></li><li><a href="/Paraguay-Division_Profesional___Apertura-2019-859264.html">Paraguay</a></li><li><a href="/Peru-Primera_Division___Apertura-2019-859660.html">Peru</a></li><li><a href="/Qatar-Qatar_Stars_League-2018_2019-856450.html">Qatar</a></li><li><a href="/San_Marino-Campionato_Second_Stage_Grp__1-2018_2019-858623.html">San Marino</a></li><li><a href="/Saudi_Arabia-Premier_League-2018_2019-855958.html">Saudi Arabia</a></li><li><a href="/Serbia-Super_Liga-2018_2019-856048.html">Serbia</a></li><li><a href="/Singapore-S_League-2019-859715.html">Singapore</a></li><li><a href="/South_Africa-Premier_Soccer_League-2018_2019-856782.html">South Africa</a></li><li><a href="/South_Korea-K_League_1-2019-859605.html">South Korea</a></li><li><a href="/Syria-Premier_League-2018_2019-856909.html">Syria</a></li><li><a href="/Thailand-Thai_League-2019-859606.html">Thailand</a></li><li><a href="/Tunisia-Ligue_I-2018_2019-856517.html">Tunisia</a></li><li><a href="/UAE-Arabian_Gulf_League-2018_2019-855697.html">UAE</a></li><li><a href="/Venezuela-Primera_Division___Apertura-2019-859538.html">Venezuela</a></li><li><a href="/Vietnam-V_League-2019-859500.html">Vietnam</a></li><li><a href="/Wales-Premier_League-2018_2019-856274.html">Wales</a></li></ul></div>

  </div>
  </div>

     <div id="footer">
   

  <a href="https://www.toplist.cz/" target="_top"  rel="nofollow"><img
  src="https://toplist.cz/dot.asp?id=60209" border="0" alt="TOPlist" width="1" height="1"></a>
  <p>0.0127</p>
   
  </div>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-155637-2', 'soccervista.com');
    ga('send', 'pageview');

  </script>
  <script>
    $(document).ready(function(){
      $('tr.twom, tr.onem, tr.headupe', 'table.main').click(function (e) {
        var $a = $('a', this);
        if ($a.length > 0 && !e.target.isSameNode($a.get(0))) {
          $a.get(0).click();
        }
      });
    });
    $(document).ready(function($) {
          $(".clickable").click(function(e) {
              e.preventDefault();
              window.location = $(this).data("url");
          });
      });
  </script>
  </body>
  </html>
MDDDD;
  $crawler = new Crawler($htmz);



// $client = new Client();

          // $crawler = $client->request('GET', $url);
          // $crawler = $crawler->addHtmlContent($htmz);


          $matchDate = $crawler->filter('table#gamec')->each(function ($tr, $i) { 
                  return $tr->filter('td[colspan=4]')->each (
                    function ($td, $i) 
                  { 
                     
                    return trim($td->text()); 
                    });
                
              });
              foreach ($matchDate as $key => $mdate) { 
                // print_r($competitionMatch);
                $ms_date = $mdate[0];
                $m_time = explode(" ", $mdate[1])[0];
                $m_date = strtotime($ms_date);
                echo "Match date is: ".$ms_date."While new date is ".$m_date." to convert it i will get: ".date("d-m-Y", $m_date);
                // echo "<br>".$m_time;
              // $conns->commit();                        
          }
          



          $matchSore = $crawler->filter(".score")->extract(array('_text'));
                   
                $homescore = explode(":",$matchSore[0])[0];
                $awayscore = explode(":",$matchSore[0])[1];
                echo "<p> Home : ".$homescore." AND AWAY:".$awayscore."</p>";
                
          try{
          $half1 = $crawler->filter('td.stred')->text(); 
                    
                $score1 = explode("(",$half1)[1];
                $homescore1 = intval(explode(":",$score1)[0]);
                $awayscore1 = intval(explode(":",$score1)[1]);
                echo "<p> First Half ".$homescore1." :".$awayscore1."</p>";
        }catch(Exception $e){
          echo "Not started <br/>";
        }

          // $ref = $crawler->filter('td.detail2')->text(); 

          try{
          $query = "//table/tr/td[.='Referee']/following-sibling::td[1]";
          $theref = $crawler->filterXPath($query)->text();
          $dr = explode("from", $theref);
          $rc = $dr[1];
          $reff = $dr[0];
          echo "Ref:". $reff." Country ".$rc;
        }catch(Exception $e){
          echo "no ref";
        }

        try{
          $query = "//table/tr/td[.='Spectators']/following-sibling::td[1]";
          $attendance = $crawler->filterXPath($query)->text();
          
          echo "<br>attendance:". $attendance;
        }catch(Exception $e){
          echo "<br> no attendance <br>";
        }

        try{
          $query = "//table/tr/td[.='Venue name']/following-sibling::td[1]";
          $stadium = $crawler->filterXPath($query)->text();
          
          echo "<br>stadium:". $stadium;
        }catch(Exception $e){
          echo "<br> no stadium <br>";
        }


        // try{
        //   // $eventsH = $crawler->filterXPath($query)->each(function ($tr, $i) { 
        //           $homeEvs = $crawler->filterXPath("//table/tr/td[@colspan='3']/preceding-sibling::td[@colspan='2']")->each(function($ev, $i){
        //             $ev = $ev->text();
        //             return $ev->filterXPath("//preceding-sibling::td[@colspan='2']")->each (
        //             function ($td, $i) 
        //           { 
        //                 return trim($td->text());  
                          
        //             });
        //           });
        //   // echo($homeEvs);
        //   foreach ($homeEvs as $value) {
        //     # code...
        //   echo "<br>Events:". $value."<br>";
        //   }
        // }catch(Exception $e){
        //   echo "<br> no eventsH <br>";
        // }

        
        try{
                  $homeV = $crawler->filterXPath("//table/tr/td[@colspan='3']/preceding-sibling::td[@colspan='2']")->each(function($ev, $i){
                    $eve =  $ev->text();
                    $evtpy =  $ev->filterXpath('//img')->extract('src');
                    return array("event"=>$eve, "eventType"=>$evtpy);
                    // return $eve;
                  });
          // print_r($homeV);
                  echo "<br>Home Events: ";
          foreach ($homeV as $key => $value) {
            $dEvent = $value["event"];
            $eventInfo = explode(" ", $dEvent);
            $dEventTypeInfo1 = '';
            $dEventTypeInfo = $eventInfo[2];
            $dTime = $eventInfo[0];
            $dPlayer = $eventInfo[2]." ".$eventInfo[3];
            $et = "Assist";
            $goalType = "REGUlAR";
            // print_r($eventInfo);
            if(!empty($value["eventType"][0])){
              // $evty = explode(" ", $value[0]);
              $evtype = $value["eventType"][0];

            switch ($evtype) {
                case "/assets/imgs/g.gif":
                    $et = "Goal";

                    if($dEventTypeInfo=='penalty'){
                      $dPlayer = $eventInfo[3]." ".$eventInfo[4];
                      $dEventTypeInfo1 = "PENALTY";
                    } else{
                    $dPlayer = $eventInfo[2]." ".$eventInfo[3];

                    }

                    break;
                case "/assets/imgs/sub.gif":
                    $et = "Sub";
                      $dPlayer = $eventInfo[3]." ".$eventInfo[4];
                    if($dEventTypeInfo=='in'){
                      $dEventTypeInfo1 = "in";
                      $subType = "in";
                    } else{
                      $subType = "out";
                      $dEventTypeInfo1 = "out";

                    }
                    break;
                case "/assets/imgs/rc.gif":
                    $et = "RED_CARD";
                    break;
                case "/assets/imgs/yc.gif":
                    $et = "YELLOW_CARD";
                    break;
                default:
                    $dEventTypeInfo = $eventInfo[1];
                      $dPlayer = $eventInfo[2]." ".$eventInfo[3];
                    $et = "Assist";
            }
          }
            # code...
          echo "<br>Time: ".$dTime." ". $dPlayer." - ".$dEventTypeInfo1." Event type:".$et."<br>";
          }
        }catch(Exception $e){
          echo "<br> no eventsH <br>";
        }





        try{
                  $awayEvs = $crawler->filterXPath("//table/tr/td[@colspan='4']/following-sibling::td[@colspan='2']")->each(function($ev, $i){
                   $eve =  $ev->text();
                    $evtpy =  $ev->filterXpath('//img')->extract('src');
                    return array("event"=>$eve, "eventType"=>$evtpy);
                    // return $eve;
                  });
          // print_r($homeV);
                  echo "<br>AWAY Events: ";
          foreach ($awayEvs as $key => $value) {
            $dEvent = $value["event"];
            $eventInfo = explode(" ", $dEvent);
            $dEventTypeInfo1 = '';
            $dEventTypeInfo = $eventInfo[2];
            $dTime = $eventInfo[0];
            $dPlayer = $eventInfo[2]." ".$eventInfo[3];
            $et = "Assist";
            $goalType = "REGUlAR";
            // print_r($eventInfo);
            if(!empty($value["eventType"][0])){
              // $evty = explode(" ", $value[0]);
              $evtype = $value["eventType"][0];

            switch ($evtype) {
                case "/assets/imgs/g.gif":
                    $et = "Goal";

                    if($dEventTypeInfo=='penalty'){
                      $dPlayer = $eventInfo[3]." ".$eventInfo[4];
                      $dEventTypeInfo1 = "PENALTY";
                    } else{
                    $dPlayer = $eventInfo[2]." ".$eventInfo[3];

                    }

                    break;
                case "/assets/imgs/sub.gif":
                    $et = "Sub";
                      $dPlayer = $eventInfo[3]." ".$eventInfo[4];
                    if($dEventTypeInfo=='in'){
                      $dEventTypeInfo1 = "in";
                      $subType = "in";
                    } else{
                      $subType = "out";
                      $dEventTypeInfo1 = "out";

                    }
                    break;
                case "/assets/imgs/rc.gif":
                    $et = "RED_CARD";
                    break;
                case "/assets/imgs/yc.gif":
                    $et = "YELLOW_CARD";
                    break;
                default:
                    $dEventTypeInfo = $eventInfo[1];
                      $dPlayer = $eventInfo[2]." ".$eventInfo[3];
                    $et = "Assist";
            }
          }
            # code...
          echo "<br>Time: ".$dTime." ". $dPlayer."-".$dEventTypeInfo1." Event type:".$et."<br>";
          }
        }catch(Exception $e){
          echo "<br> no eventsH <br>";
        }


        
//HOME FORMATION

        try{
          $query = "//table/tr/td[.='Formation']/preceding-sibling::td[1]";
          $homfom = $crawler->filterXPath($query)->text();
          echo "<br>Home Formation:". $homfom." <br> ";
        }catch(Exception $e){
          echo "no formation";
        }

//// AWAY Formation
        try{
          $query = "//table/tr/td[.='Formation']/following-sibling::td[1]";
          $awayfom = $crawler->filterXPath($query)->text();
          echo "<br>AWAY Formation:". $awayfom." <br> ";
        }catch(Exception $e){
          echo "no formation";
        }
        
        $formation = $crawler->filter('td.lineups[colspan=2]')->eq(0)->each(function
  ($node) {
              $playa[] = ["pos"=> $node->filter('i')->each(function($ps) {
                // $ps->text()];
                return trim($ps->text());
                })];
            $playa[] = ["name"=>  $node->filterXPath("//i/following-sibling::text()[1]")->each(function($pn){
                return trim($pn->text());
                })];
             
               return $playa;
            });;

      echo "<br>Home Team<br>";
        // $pp=[];echo
                foreach ($formation as $ey => $vae) {
                 
                    for ($i=0; $i<count($vae[0]['pos']); $i++) {
                  echo "<br> ".$vae[0]['pos'][$i].'  '. explode(":", $vae[1]['name'][$i])[1];
                     
                  }
                }
$formationA = $crawler->filter('td.lineups[colspan=2]')->eq(1)->each(function
  ($node) {
              $playa[] = ["pos"=> $node->filter('i')->each(function($ps) {
                // $ps->text()];
                return trim($ps->text());
                })];
            $playa[] = ["name"=>  $node->filterXPath("//i/following-sibling::text()[1]")->each(function($pn){
                return trim($pn->text());
                })];
             
               return $playa;
            });;

      echo "<br><br><br>Away Team<br>";
        // $pp=[];echo
                foreach ($formationA as $ey => $vae) {
                 
                   for ($i=0; $i<count($vae[0]['pos']); $i++) {
                  echo "<br> ".$vae[0]['pos'][$i].'  '. explode(":", $vae[1]['name'][$i])[1];
                  }
                }

       
?>