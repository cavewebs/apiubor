<?php
require 'vendor/autoload.php';
use Goutte\Client;
require 'db.php';
//Populate TOP SCORERS 
//get the country id and link from db
$sql = "SELECT * FROM competition_season";
$countries = $conn->query($sql);
 
$stmt2 = $conn->prepare("INSERT INTO competition_topscorers (ct_com_id, ct_t_id, ct_season, ct_goals, ct_p_id, ct_first_scorer, ct_penalties, ct_missed_penalties) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt2->bind_param("iisiiiii", $ct_com_id, $ct_t_id, $ct_season, $ct_goals, $ct_p_id, $ct_first_scorer, $ct_penalties, $ct_missed_penalties);

$client = new Client();
    //         $crawler = $client->request('GET', $row['c_link']);     
            
$htmz = <<<EDD
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head>
  <title>Top goalscorers for England Premier League league. Season 2018/2019</title>
  <meta content='width=device-width' name='viewport'>
  <meta content="Top goal scorers for England  league. Season 2018/2019" name="description">
  <meta content="England,Premier League , goalscorer, Mohamed Salah" name="keywords">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
  <link charset="utf-8" type="text/css" href="assets/css/mainandcalendarv10.css" rel="stylesheet" >
      <script type="application/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
   <script type="text/javascript" charset="iso-8859-1" src="calendar/dateditv1.js"></script>
   
  </head>
  <body><div align="center">
      <div id="header">
       <h1><a href="https://www.soccervista.com" name="soccer">SoccerVista - football betting</a></h1>
      <h3>Top goal scorer for England Premier League soccer league is Mohamed Salah from Liverpool</h3>
     
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
  <br><br><h1><img src="../flags/England.gif" alt="England Premier League 2018/2019" width="54" height="32" />  England | Premier League | 2018/2019</h1><div class="menu2"><ul><li><a href="/England-Premier_League-2018_2019-855968.html">Summary</a></li><li><a href="#">Season</a><ul><li><a href="/England-Premier_League-2018_2019-855968.html">2018/2019</a></li><li><a href="/England-Premier_League-2017_2018-850080.html">2017/2018</a></li><li><a href="/England-Premier_League-2016_2017-844714.html">2016/2017</a></li><li><a href="/England-Premier_League-2015_2016-840449.html">2015/2016</a></li></ul></li><li><a href="/results-Premier_League-2018_2019-855968.html">Results</a></li><li><a href="/fixtures-Premier_League-2018_2019-855968.html">Fixtures</a></li><li><a href="/topscorer-Premier_League-2018_2019-855968.html">Top scorers</a></li><li><a href="/cards-Premier_League-2018_2019-855968.html">Cards</a></li><li class="longer"><a href="#"   class="longer">Other leagues from England</a><ul><li><a href="/England-Premier_League-2018_2019-855968.html">Premier League</a></li><li><a href="/England-FA_Cup-2018_2019-858019.html">FA Cup</a></li><li><a href="/England-Championship-2018_2019-856081.html">Championship</a></li><li><a href="/England-EFL_Cup-2018_2019-856025.html">EFL Cup</a></li><li><a href="/England-League_1-2018_2019-856082.html">League 1</a></li><li><a href="/England-League_2-2018_2019-856084.html">League 2</a></li><li><a href="/England-EFL_Trophy_Final_Stage-2018_2019-858589.html">EFL Trophy Final Stage</a></li><li><a href="/England-EFL_Trophy_Northern_Grp__A-2018_2019-856826.html">EFL Trophy Northern </a></li><li><a href="/England-EFL_Trophy_Southern_Grp__A-2018_2019-856575.html">EFL Trophy Southern </a></li><li><a href="/England-National_League-2018_2019-856372.html">National League</a></li><li><a href="/England-Isthmian_Premier_Division-2018_2019-856542.html">Isthmian Premier Division</a></li><li><a href="/England-Northern_Premier_Division-2018_2019-856543.html">Northern Premier Division</a></li><li><a href="/England-Southern_Premier_Division_Central-2018_2019-856696.html">Southern Premier Division Central</a></li><li><a href="/England-Southern_Premier_Division_South-2018_2019-856697.html">Southern Premier Division South</a></li><li><a href="/England-FA_Trophy-2018_2019-858714.html">FA Trophy</a></li><li><a href="/England-Premier_League_2_Division_1-2018_2019-856755.html">Premier League 2 Division 1</a></li><li><a href="/England-Premier_League_2_Division_2-2018_2019-856756.html">Premier League 2 Division 2</a></li></ul></li></ul></div><h2>Best goalscorers</h2><div align="center"> <table class="upcoming"><thead><tr class="headupc"><td width="6%">Rank</td><td width="25%">Name</td><td width="25%">Team</td><td width="20%">Goals</td><td width="8%">First scorer</td><td width="8%">Penalties</td><td width="8%">Missed penalties</td></tr></thead><tbody><tr class="predict"><td>1</td><td class="yel"><span  class="flag Egypt"></span>&nbsp;Mohamed Salah</td><td>Liverpool</td><td  class="yel">16</td><td>9</td><td>3</td><td>0</td></tr><tr class="predict"><td>2</td><td class="yel"><span  class="flag Gabon"></span>&nbsp;Pierre-Emerick Aubameyang</td><td>Arsenal</td><td  class="yel">15</td><td>4</td><td>2</td><td>0</td></tr><tr class="predict"><td>3</td><td class="yel"><span  class="flag Argentina"></span>&nbsp;Sergio Aguero</td><td>Manchester City</td><td  class="yel">14</td><td>6</td><td>0</td><td>0</td></tr><tr class="predict"><td>3</td><td class="yel"><span  class="flag England"></span>&nbsp;Harry Kane</td><td>Tottenham Hotspur</td><td  class="yel">14</td><td>6</td><td>3</td><td>0</td></tr><tr class="predict"><td>5</td><td class="yel"><span  class="flag Belgium"></span>&nbsp;Eden Hazard</td><td>Chelsea</td><td  class="yel">12</td><td>4</td><td>4</td><td>0</td></tr><tr class="predict"><td>6</td><td class="yel"><span  class="flag Senegal"></span>&nbsp;Sadio Mane</td><td>Liverpool</td><td  class="yel">11</td><td>4</td><td>0</td><td>0</td></tr><tr class="predict"><td>7</td><td class="yel"><span  class="flag England"></span>&nbsp;Glenn Murray</td><td>Brighton & Hove Albion</td><td  class="yel">10</td><td>6</td><td>3</td><td>0</td></tr><tr class="predict"><td>7</td><td class="yel"><span  class="flag England"></span>&nbsp;Callum Wilson</td><td>AFC Bournemouth</td><td  class="yel">10</td><td>4</td><td>1</td><td>1</td></tr><tr class="predict"><td>7</td><td class="yel"><span  class="flag South_Korea"></span>&nbsp;Heung-Min Son</td><td>Tottenham Hotspur</td><td  class="yel">10</td><td>2</td><td>0</td><td>0</td></tr><tr class="predict"><td>7</td><td class="yel"><span  class="flag England"></span>&nbsp;Raheem Sterling</td><td>Manchester City</td><td  class="yel">10</td><td>3</td><td>0</td><td>0</td></tr><tr class="predict"><td>7</td><td class="yel"><span  class="flag Serbia"></span>&nbsp;Aleksandar Mitrovic</td><td>Fulham</td><td  class="yel">10</td><td>1</td><td>0</td><td>0</td></tr><tr class="predict"><td>7</td><td class="yel"><span  class="flag Brazil"></span>&nbsp;Richarlison</td><td>Everton</td><td  class="yel">10</td><td>5</td><td>0</td><td>0</td></tr><tr class="predict"><td>13</td><td class="yel"><span  class="flag Iceland"></span>&nbsp;Gylfi Sigurdsson</td><td>Everton</td><td  class="yel">9</td><td>2</td><td>2</td><td>2</td></tr><tr class="predict"><td>13</td><td class="yel"><span  class="flag France"></span>&nbsp;Alexandre Lacazette</td><td>Arsenal</td><td  class="yel">9</td><td>3</td><td>0</td><td>0</td></tr><tr class="predict"><td>13</td><td class="yel"><span  class="flag Brazil"></span>&nbsp;Roberto Firmino</td><td>Liverpool</td><td  class="yel">9</td><td>0</td><td>1</td><td>0</td></tr><tr class="predict"><td>13</td><td class="yel"><span  class="flag France"></span>&nbsp;Paul Pogba</td><td>Manchester United</td><td  class="yel">9</td><td>4</td><td>4</td><td>2</td></tr><tr class="predict"><td>13</td><td class="yel"><span  class="flag Mexico"></span>&nbsp;Raul Jimenez</td><td>Wolverhampton Wanderers</td><td  class="yel">9</td><td>2</td><td>1</td><td>0</td></tr><tr class="predict"><td>13</td><td class="yel"><span  class="flag England"></span>&nbsp;Marcus Rashford</td><td>Manchester United</td><td  class="yel">9</td><td>3</td><td>0</td><td>0</td></tr><tr class="predict"><td>19</td><td class="yel"><span  class="flag Belgium"></span>&nbsp;Romelu Lukaku</td><td>Manchester United</td><td  class="yel">8</td><td>3</td><td>0</td><td>0</td></tr><tr class="predict"><td>19</td><td class="yel"><span  class="flag Norway"></span>&nbsp;Joshua King</td><td>AFC Bournemouth</td><td  class="yel">8</td><td>1</td><td>3</td><td>0</td></tr><tr class="predict"><td>19</td><td class="yel"><span  class="flag Brazil"></span>&nbsp;Felipe Anderson</td><td>West Ham United</td><td  class="yel">8</td><td>1</td><td>0</td><td>0</td></tr><tr class="predict"><td>19</td><td class="yel"><span  class="flag France"></span>&nbsp;Anthony Martial</td><td>Manchester United</td><td  class="yel">8</td><td>0</td><td>1</td><td>0</td></tr><tr class="predict"><td>19</td><td class="yel"><span  class="flag Germany"></span>&nbsp;Leroy Sane</td><td>Manchester City</td><td  class="yel">8</td><td>2</td><td>0</td><td>0</td></tr><tr class="predict"><td>24</td><td class="yel"><span  class="flag Austria"></span>&nbsp;Marko Arnautovic</td><td>West Ham United</td><td  class="yel">7</td><td>3</td><td>1</td><td>0</td></tr><tr class="predict"><td>24</td><td class="yel"><span  class="flag Spain"></span>&nbsp;Pedro Rodriguez</td><td>Chelsea</td><td  class="yel">7</td><td>5</td><td>0</td><td>0</td></tr><tr class="predict"><td>24</td><td class="yel"><span  class="flag Serbia"></span>&nbsp;Luka Milivojevic</td><td>Crystal Palace</td><td  class="yel">7</td><td>3</td><td>6</td><td>1</td></tr><tr class="predict"><td>24</td><td class="yel"><span  class="flag England"></span>&nbsp;Danny Ings</td><td>Southampton</td><td  class="yel">7</td><td>2</td><td>3</td><td>0</td></tr><tr class="predict"><td>24</td><td class="yel"><span  class="flag England"></span>&nbsp;Jamie Vardy</td><td>Leicester City</td><td  class="yel">7</td><td>4</td><td>3</td><td>0</td></tr><tr class="predict"><td>29</td><td class="yel"><span  class="flag Spain"></span>&nbsp;David Silva</td><td>Manchester City</td><td  class="yel">6</td><td>3</td><td>0</td><td>0</td></tr><tr class="predict"><td>29</td><td class="yel"><span  class="flag Venezuela"></span>&nbsp;Jose Salomon Rondon</td><td>Newcastle United</td><td  class="yel">6</td><td>4</td><td>0</td><td>0</td></tr><tr class="predict"><td>29</td><td class="yel"><span  class="flag England"></span>&nbsp;Ashley Barnes</td><td>Burnley</td><td  class="yel">6</td><td>1</td><td>1</td><td>0</td></tr><tr class="predict"><td>29</td><td class="yel"><span  class="flag Switzerland"></span>&nbsp;Xherdan Shaqiri</td><td>Liverpool</td><td  class="yel">6</td><td>0</td><td>0</td><td>0</td></tr><tr class="predict"><td>29</td><td class="yel"><span  class="flag Germany"></span>&nbsp;Andre Schuerrle</td><td>Fulham</td><td  class="yel">6</td><td>3</td><td>0</td><td>0</td></tr><tr class="predict"><td>29</td><td class="yel"><span  class="flag Argentina"></span>&nbsp;Roberto Pereyra</td><td>Watford</td><td  class="yel">6</td><td>4</td><td>0</td><td>0</td></tr><tr class="predict"><td>29</td><td class="yel"><span  class="flag Brazil"></span>&nbsp;Lucas Moura</td><td>Tottenham Hotspur</td><td  class="yel">6</td><td>1</td><td>0</td><td>0</td></tr><tr class="predict"><td>29</td><td class="yel"><span  class="flag Wales"></span>&nbsp;David Brooks</td><td>AFC Bournemouth</td><td  class="yel">6</td><td>3</td><td>0</td><td>0</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag England"></span>&nbsp;Troy Deeney</td><td>Watford</td><td  class="yel">5</td><td>2</td><td>1</td><td>0</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag Spain"></span>&nbsp;Alvaro Morata</td><td>Chelsea</td><td  class="yel">5</td><td>2</td><td>0</td><td>0</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag Scotland"></span>&nbsp;Ryan Fraser</td><td>AFC Bournemouth</td><td  class="yel">5</td><td>2</td><td>0</td><td>0</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag Algeria"></span>&nbsp;Riyad Mahrez</td><td>Manchester City</td><td  class="yel">5</td><td>1</td><td>0</td><td>1</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag England"></span>&nbsp;Dele Alli</td><td>Tottenham Hotspur</td><td  class="yel">5</td><td>1</td><td>0</td><td>0</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag Portugal"></span>&nbsp;Bernardo Silva</td><td>Manchester City</td><td  class="yel">5</td><td>2</td><td>0</td><td>0</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag England"></span>&nbsp;James Maddison</td><td>Leicester City</td><td  class="yel">5</td><td>0</td><td>1</td><td>1</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag Portugal"></span>&nbsp;Diogo Jota</td><td>Wolverhampton Wanderers</td><td  class="yel">5</td><td>2</td><td>0</td><td>0</td></tr><tr class="predict"><td>37</td><td class="yel"><span  class="flag Brazil"></span>&nbsp;Gabriel Jesus</td><td>Manchester City</td><td  class="yel">5</td><td>2</td><td>1</td><td>0</td></tr><tr class="predict"><td>46</td><td class="yel"><span  class="flag Mexico"></span>&nbsp;Javier Hernandez</td><td>West Ham United</td><td  class="yel">4</td><td>1</td><td>0</td><td>0</td></tr><tr class="predict"><td>46</td><td class="yel"><span  class="flag Armenia"></span>&nbsp;Henrikh Mkhitaryan</td><td>Arsenal</td><td  class="yel">4</td><td>0</td><td>0</td><td>0</td></tr><tr class="predict"><td>46</td><td class="yel"><span  class="flag Denmark"></span>&nbsp;Christian Eriksen</td><td>Tottenham Hotspur</td><td  class="yel">4</td><td>2</td><td>0</td><td>0</td></tr><tr class="predict"><td>46</td><td class="yel"><span  class="flag England"></span>&nbsp;Andros Townsend</td><td>Crystal Palace</td><td  class="yel">4</td><td>1</td><td>0</td><td>0</td></tr><tr class="predict"><td>46</td><td class="yel"><span  class="flag New_Zealand"></span>&nbsp;Chris Wood</td><td>Burnley</td><td  class="yel">4</td><td>1</td><td>0</td><td>0</td></tr></tbody></table></div><br><br><div id="4e834c5a1718f962902306"></div> 
  <script type="text/javascript" charset="utf-8" src="https://media.affiliatelounge.com/data/betsson/ad_js/520.js?divID=4e834c5a1718f962902306&_url=https://record.affiliatelounge.com/_Ldskjuqg6f64D-6FLzgocwuoX25Ao5QE/1"></script><br><br>
  <P><img src="pics/r18.png" border="0" width="35" height="35" alt="Legal Age"
          align="left" border="0"><font size="2">&nbsp;&nbsp;&nbsp;<b>Adults only.</b> Don't let gambling become a problem in your life.  Check our <A href="responsible.php">responsible gambling</a> page for more info.</font>
      </div>

  <div id="col3">
  <div id="navcontainer"><br><ul id="navlist2"><li><strong>Top Leagues</strong></li><li><a href="/England-Premier_League-2018_2019-855968.html"><span class="flag England"></span>&nbsp;England</a></li><li><a href="/France-Ligue_1-2018_2019-855880.html"><span class="flag France"></span>&nbsp;France</a></li><li><a href="/Germany-1__Bundesliga-2018_2019-856299.html"><span class="flag Germany"></span>&nbsp;Germany</a></li><li><a href="/International-Champions_League_Final_Stage-2018_2019-857028.html"><span class="flag International"></span>&nbsp;International</a></li><li><a href="/Italy-Serie_A-2018_2019-856689.html"><span class="flag Italy"></span>&nbsp;Italy</a></li><li><a href="/Netherlands-Eredivisie-2018_2019-855942.html"><span class="flag Netherlands"></span>&nbsp;Netherlands</a></li><li><a href="/Portugal-Primeira_Liga-2018_2019-856425.html"><span class="flag Portugal"></span>&nbsp;Portugal</a></li><li><a href="/Russia-Premier_League-2018_2019-856116.html"><span class="flag Russia"></span>&nbsp;Russia</a></li><li><a href="/Spain-Primera_Division-2018_2019-856644.html"><span class="flag Spain"></span>&nbsp;Spain</a></li></ul><br><div align='center'> <iframe allowtransparency="true" src="https://ads2.williamhill.com/ad.aspx?bid=1487417097&pid=63881137" width="120" height="600" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe></div></div><br><ul id='navlist2'><li><strong>Good Leagues</strong></li><li><a href="/Argentina-Superliga-2018_2019-856590.html">Argentina</a></li><li><a href="/Australia-A_League-2018_2019-856507.html">Australia</a></li><li><a href="/Austria-Bundesliga-2018_2019-856035.html">Austria</a></li><li><a href="/Belgium-First_Division_A-2018_2019-855945.html">Belgium</a></li><li><a href="/Bulgaria-First_Professional_League-2018_2019-855897.html">Bulgaria</a></li><li><a href="/Croatia-1__Division-2018_2019-855983.html">Croatia</a></li><li><a href="/Czech_Republic-1__Liga-2018_2019-856080.html">Czech Republic</a></li><li><a href="/Denmark-Superligaen-2018_2019-855774.html">Denmark</a></li><li><a href="/Finland-Veikkausliiga-2019-859640.html">Finland</a></li><li><a href="/Greece-Super_League-2018_2019-856849.html">Greece</a></li><li><a href="/Hungary-NB_I-2018_2019-856359.html">Hungary</a></li><li><a href="/International-AFC_Champions_League_Grp__A-2019-859018.html">International</a></li><li><a href="/Ireland-Premier_Division-2019-859246.html">Ireland</a></li><li><a href="/Israel-Ligat_HaAl-2018_2019-856085.html">Israel</a></li><li><a href="/Mexico-Liga_MX_Apertura_Playoff-2018_2019-858703.html">Mexico</a></li><li><a href="/N__Ireland-Premiership-2018_2019-856303.html">N. Ireland</a></li><li><a href="/Norway-Eliteserien-2019-859240.html">Norway</a></li><li><a href="/Poland-Ekstraklasa-2018_2019-855843.html">Poland</a></li><li><a href="/Romania-Liga_I-2018_2019-856422.html">Romania</a></li><li><a href="/Scotland-Premiership-2018_2019-856011.html">Scotland</a></li><li><a href="/Slovakia-Super_Liga-2018_2019-856068.html">Slovakia</a></li><li><a href="/Slovenia-Prva_Liga-2018_2019-856096.html">Slovenia</a></li><li><a href="/Sweden-Allsvenskan-2019-859156.html">Sweden</a></li><li><a href="/Switzerland-Super_League-2018_2019-856007.html">Switzerland</a></li><li><a href="/Turkey-Super_Lig-2018_2019-856448.html">Turkey</a></li><li><a href="/Ukraine-Premier_League-2018_2019-855918.html">Ukraine</a></li><li><a href="/USA-Major_League_Soccer-2019-859266.html">USA</a></li><li>
  </li></ul><br><div align='center'><script type='text/javascript' src="https://wlbetathome.adsrv.eacdn.com/S.ashx?btag=a_32345b_34941c_&affid=16050&siteid=32345&adid=34941&c=" ></script></div><br><ul id='navlist2'><li><strong>Others</strong></li><li><a href="/Albania-Kategoria_Superiore-2018_2019-856641.html">Albania</a></li><li><a href="/Algeria-Ligue_1-2018_2019-856828.html">Algeria</a></li><li><a href="/Andorra-1__Division-2018_2019-856350.html">Andorra</a></li><li><a href="/Armenia-Premier_League-2018_2019-856692.html">Armenia</a></li><li><a href="/Azerbaijan-Premier_League-2018_2019-856693.html">Azerbaijan</a></li><li><a href="/Bahrain-Premier_League-2018_2019-857274.html">Bahrain</a></li><li><a href="/Belarus-Super_Cup-2018-859670.html">Belarus</a></li><li><a href="/Bolivia-Primera_Division___Apertura-2019-859506.html">Bolivia</a></li><li><a href="/Bosnia_Herzegovina-Premier_League-2018_2019-856272.html">Bosnia-Herzegovina</a></li><li><a href="/Botswana-Premier_League-2018_2019-856856.html">Botswana</a></li><li><a href="/Brazil-Cup-2019-859164.html">Brazil</a></li><li><a href="/Cameroon-Elite_One_Grp__A-2019-859727.html">Cameroon</a></li><li><a href="/Chile-Primera_Division-2019-859697.html">Chile</a></li><li><a href="/China-Super_Cup-2018-859316.html">China</a></li><li><a href="/Colombia-Primera_A_Apertura-2019-859540.html">Colombia</a></li><li><a href="/Costa_Rica-Primera_Division_Apertura_Championship_Final-2018_2019-859160.html">Costa Rica</a></li><li><a href="/Cuba-Liga_Nacional_Grupo_Occidental-2019-859262.html">Cuba</a></li><li><a href="/Cyprus-1__Division-2018_2019-856418.html">Cyprus</a></li><li><a href="/DR_Congo-Super_League-2018_2019-857099.html">DR Congo</a></li><li><a href="/Ecuador-Serie_A-2019-859498.html">Ecuador</a></li><li><a href="/Egypt-Premier_League-2018_2019-856445.html">Egypt</a></li><li><a href="/El_Salvador-Primera_Division___Apertura_Final_Stage-2018_2019-858701.html">El Salvador</a></li><li><a href="/Estonia-Meistriliiga-2019-859648.html">Estonia</a></li><li><a href="/Faroe_Islands-Premier_League-2019-859610.html">Faroe Islands</a></li><li><a href="/Georgia-Erovnuli_Liga-2019-859499.html">Georgia</a></li><li><a href="/Gibraltar-Premier_Division-2018_2019-856848.html">Gibraltar</a></li><li><a href="/Guatemala-Liga_Nacional_Apertura_Final_Stage-2018_2019-858702.html">Guatemala</a></li><li><a href="/Honduras-Liga_Nacional___Apertura_Final_Stage-2018_2019-858564.html">Honduras</a></li><li><a href="/Hong_Kong-Premier_League-2018_2019-856705.html">Hong Kong</a></li><li><a href="/India-I_League-2018_2019-857765.html">India</a></li><li><a href="/Indonesia-Liga_1-2018-854758.html">Indonesia</a></li><li><a href="/Iran-Persian_Gulf_Pro_League-2018_2019-856438.html">Iran</a></li><li><a href="/Iraq-Premier_League-2018_2019-857091.html">Iraq</a></li><li><a href="/Ivory_Coast-Ligue_1-2018_2019-857115.html">Ivory Coast</a></li><li><a href="/Jamaica-Premier_League-2018_2019-857275.html">Jamaica</a></li><li><a href="/Japan-J__League-2019-859530.html">Japan</a></li><li><a href="/Jordan-Premier_League-2018_2019-856841.html">Jordan</a></li><li><a href="/Kazakhstan-Super_Cup-2018-859658.html">Kazakhstan</a></li><li><a href="/Kenya-Premier_League-2018_2019-857954.html">Kenya</a></li><li><a href="/Kosovo-Superliga-2018_2019-856791.html">Kosovo</a></li><li><a href="/Kuwait-Premier_League-2018_2019-857004.html">Kuwait</a></li><li><a href="/Lebanon-Premier_League-2018_2019-857026.html">Lebanon</a></li><li><a href="/Lithuania-Super_Cup-2018-859809.html">Lithuania</a></li><li><a href="/Luxembourg-National_Division-2018_2019-856363.html">Luxembourg</a></li><li><a href="/Macedonia-Prva_Liga-2018_2019-856787.html">Macedonia</a></li><li><a href="/Malaysia-Super_Liga-2019-859534.html">Malaysia</a></li><li><a href="/Malta-Premier_League-2018_2019-856436.html">Malta</a></li><li><a href="/Montenegro-1__CFL-2018_2019-856275.html">Montenegro</a></li><li><a href="/Morocco-Botola_Pro-2018_2019-856518.html">Morocco</a></li><li><a href="/New_Zealand-Premiership-2018_2019-857556.html">New Zealand</a></li><li><a href="/Nigeria-NPFL_Grp__A-2019-859521.html">Nigeria</a></li><li><a href="/Oman-Professional_League-2018_2019-856842.html">Oman</a></li><li><a href="/Paraguay-Division_Profesional___Apertura-2019-859264.html">Paraguay</a></li><li><a href="/Peru-Primera_Division___Apertura-2019-859660.html">Peru</a></li><li><a href="/Qatar-Qatar_Stars_League-2018_2019-856450.html">Qatar</a></li><li><a href="/San_Marino-Campionato_Second_Stage_Grp__1-2018_2019-858623.html">San Marino</a></li><li><a href="/Saudi_Arabia-Premier_League-2018_2019-855958.html">Saudi Arabia</a></li><li><a href="/Serbia-Super_Liga-2018_2019-856048.html">Serbia</a></li><li><a href="/Singapore-S_League-2019-859715.html">Singapore</a></li><li><a href="/South_Africa-Premier_Soccer_League-2018_2019-856782.html">South Africa</a></li><li><a href="/South_Korea-K_League_1-2019-859605.html">South Korea</a></li><li><a href="/Syria-Premier_League-2018_2019-856909.html">Syria</a></li><li><a href="/Thailand-Thai_League-2019-859606.html">Thailand</a></li><li><a href="/Tunisia-Ligue_I-2018_2019-856517.html">Tunisia</a></li><li><a href="/UAE-Arabian_Gulf_League-2018_2019-855697.html">UAE</a></li><li><a href="/Venezuela-Primera_Division___Apertura-2019-859538.html">Venezuela</a></li><li><a href="/Vietnam-V_League-2019-859500.html">Vietnam</a></li><li><a href="/Wales-Premier_League-2018_2019-856274.html">Wales</a></li></ul></div>

  </div>
  </div>

     <div id="footer">
   

  <a href="https://www.toplist.cz/" target="_top"  rel="nofollow"><img
  src="https://toplist.cz/dot.asp?id=60209" border="0" alt="TOPlist" width="1" height="1"></a>
  <p>0.0004</p>
   
  </div>
  </body>
  </html>
EDD;
  
use Symfony\Component\DomCrawler\Crawler;
$crawler = new Crawler($htmz);
while($row = $countries->fetch_assoc()) {
          $topscorers = $crawler->filter('tr.predict')->each(function ($tr, $i) { 
                  return $tr->filter('td')->each (
                    function ($td, $i) {  
                    return $td->text(); 
                    });
              });
    foreach ($topscorers as $key => $value) {
      $teamn = $value[2]; $playan = $value[1]; $ct_goals = $value[3]; $ct_first_scorer = $value[4]; $ct_penalties = $value[5]; $ct_missed_penalties = $value[6];
          echo $value[1].' -> '. $value[2].' -> '.$value[3]. ' goals <br>';    
            $ct_t_id = $conn->query('SELECT FROM teams WHERE t_name ="'.$teamn.'" AND t_c_id="'.$row['t_c_id'].'"')->fetch_assoc()['t_id'];

            $ct_p_id = $conn->query('SELECT FROM players WHERE p_name ="'.$playan.'" AND p_t_id="'.$team.'"')->fetch_assoc()['p_id'];
            
          $ct_com_id = $row['cs_com_id'];
          $ct_season = $row['cs_season'];
    }

    
  
          $stmt->execute();
              } 
                $conn->close();
            
echo 'also done and dusted';