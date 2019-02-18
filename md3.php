<?php
require 'vendor/autoload.php';
use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Symfony\Component\DomCrawler\Crawler;

//GET MATCH DETAILS
require 'db.php';
// date_default_timezone_set("Africa/Lagos");
$j=1;
  // $url = "https://www.soccervista.com/Inter-Lazio-2943952-2943952.html";
  $url = "https://www.soccervista.com/Adelaide_United-Western_Sydney_Wanderers_FC-2825477-2825477.html";  
  // $url = "https://www.livescore.cz/gameinfo2.php?switch=new&id=2782197";  
  
  // SET ALL EXTRATIME AND PENALTY SHOOTOUT GOALS TO NULL
  $homescore3   = NULL;
  $homescore4   = NULL;
  $m_hscore_pk  = NULL;
  $awayscore3   = NULL;
  $awayscore4   = NULL;
  $m_ascore_pk  = NULL;
  $m_extra_time = FALSE;
  $m_penalties  = FALSE;
  $m_winner = NULL;

$inserTeam = $conn->prepare("INSERT INTO teams (t_name, t_c_id) VALUES (?, ?)");
$inserTeam->bind_param("si", $t_name, $t_c_id);

$inserOfficial = $conn->prepare("INSERT INTO officials (o_name, o_c_id) VALUES (?, ?)");
$inserOfficial->bind_param("si", $o_name, $o_c_id);

$insertCoach = $conn->prepare("INSERT INTO coaches (cc_name) VALUES (?)");
$insertCoach->bind_param("s", $cc_name);

$insertCountry = $conn->prepare("INSERT INTO countries (c_name) VALUES (?)");
$insertCountry->bind_param("s", $c_name);


$insertLineup = $conn->prepare("INSERT INTO match_lineup (ml_m_id, ml_p_id, ml_p_role, ml_t_id) VALUES (?, ?, ?, ?)");
$insertLineup->bind_param("iisi", $ml_m_id, $ml_p_id, $ml_p_role, $ml_t_id);

$insertBench = $conn->prepare("INSERT INTO match_bench (mb_m_id, mb_p_id, mb_t_id) VALUES (?, ?, ?)");
$insertBench->bind_param("iii", $mb_m_id, $mb_p_id, $mb_t_id);

$insertSub = $conn->prepare("INSERT INTO match_subs (ms_m_id, ms_p_out_id, ms_p_in_id, ms_time, ms_t_id) VALUES (?, ?, ?, ?, ?)");
$insertSub->bind_param("iiiii", $ms_m_id, $ms_p_out_id, $ms_p_in_id, $ms_time, $ms_t_id);

$insertInjury = $conn->prepare("INSERT INTO match_injury (mi_m_id, mi_p_id, mi_t_id) VALUES (?, ?, ?)");
$insertInjury->bind_param("iii", $mi_m_id, $mi_p_id, $mi_t_id);

$insertNewPlayer = $conn->prepare("INSERT INTO players (p_name) VALUES (?)");
$insertNewPlayer->bind_param("s", $p_name);

$insertBooking = $conn->prepare("INSERT INTO match_bookings (mk_m_id, mk_p_id, mk_type, mk_time, mk_t_id) VALUES (?, ?, ?, ?, ?)");
$insertBooking->bind_param("iisii", $mk_m_id, $mk_p_id, $mk_type, $mk_time, $mk_t_id);


$insertRef = $conn->prepare("INSERT INTO match_officials (mo_m_id, mo_o_id) VALUES (?, ?)");
$insertRef->bind_param("ii", $mo_m_id, $mo_o_id);

$insertGoal = $conn->prepare("INSERT INTO match_goals (mg_m_id, mg_p_id, mg_t_id, mg_type, mg_time) VALUES (?, ?, ?, ?, ?)");
$insertGoal->bind_param("iiisi", $mg_m_id, $mg_p_id, $mg_t_id, $mg_type, $mg_time);

$insertAssit = $conn->prepare("INSERT INTO match_goals (mg_m_id, mg_assist, mg_t_id, mg_type, mg_time) VALUES (?, ?, ?, ?, ?)");
$insertAssit->bind_param("iiisi", $mg_m_id, $mg_assist, $mg_t_id, $mg_type, $mg_time);



$dPlayer=0;
$getPlayerInfo = 'SELECT * FROM players WHERE p_name ="'.$dPlayer.'"';
// $getPlayerInfo= $conn->prepare('SELECT * FROM players WHERE p_name = ?');
// $getPlayerInfo->bind_param("s", $dPlayer);              
$client = new Client(); 
$dmatches = $conn->query('SELECT * FROM matches WHERE m_status !=63 ORDER BY m_id ASC ');

while ($row = $dmatches->fetch_assoc()) {
  
          // $crawler1 = $client->request('GET', $url);
          $crawler1 = $client->request('GET', $row['m_sv_link']);
  echo $row['m_sv_link']."<br>";
          //GET COMPTN CONTRY ID
        $comCid = $conn->query('SELECT * FROM competitions WHERE com_id="'.$row['m_com_id'].'" LIMIT 1')->fetch_assoc()['com_c_id'];
        $comName = $conn->query('SELECT * FROM competitions WHERE com_id="'.$row['m_com_id'].'" LIMIT 1')->fetch_assoc()['com_name'];
                   echo "<br>".$comCid."<br>";

        //GET MATCH GROUP
          //should have gotten them while compiling from comp seasons
           try{
            $grp = $crawler1->filter("p a")->eq(0)->text();
            echo "\n firslinlk". $grp."\n";
            $mGrp = str_replace(".", "", $grp);
            $m_group = str_replace($comName, "", $mGrp);
            if($m_group=="Finals" OR $m_group=="FINAL STAGES" OR $m_group=="FINALS" OR $m_group=="FINAL"){
              $m_group = "NO_GROUP";
            } else{
              $m_group = "NO_GROUP";              
            }
            }catch(Exception $e){
            $m_group = "NO_GROUP";
            }


        //HOME TEAM
          try{

          $homeTeam = $crawler1->filter("h1#gamecss")->eq(0)->text();
          $sql1 = 'SELECT t_id FROM teams WHERE t_name ="'.trim($homeTeam, "\xC2\xA0\n").'" AND t_c_id = "' .$comCid.'"';
            // echo "<br>SQL1 =".$sql1.'<br>';
            $ht_q = $conn->query($sql1)->fetch_assoc() ;
;
            if($ht_q){$m_hometeam = $ht_q['t_id'];} else {
             $t_name = $homeTeam;
             $t_c_id = $comCid;
             $inserTeam->execute(); 
            
            $m_hometeam = $conn->query('SELECT t_id FROM teams WHERE t_name ="'.trim($homeTeam, "\xC2\xA0\n").'" AND t_c_id = "' .$comCid.'"')->fetch_assoc()['t_id'];
           }

          }catch(Exception $e){
          $homeTeam = "";
          }
          echo "<br>Home Team:".$homeTeam;

         //AWAY TEAM

          try{
          $awayTeam = $crawler1->filter("h1#gamecss")->eq(1)->text();
          $sql2 = 'SELECT t_id FROM teams WHERE t_name ="'.trim($awayTeam, "\xC2\xA0\n").'" AND t_c_id = "'.$comCid.'"';
                    // echo "<br>SQL2 =".$sql2.'<br>';
            $at_q = $conn->query($sql2)->fetch_assoc() ;
            if($at_q){$m_awayteam = $at_q['t_id'];} else {
              $t_name = $awayTeam;
              $t_c_id = $comCid;
              $inserTeam->execute();
              $m_awayteam = $conn->query('SELECT t_id FROM teams WHERE t_name ="'.trim($awayTeam, "\xC2\xA0\n").'" AND t_c_id = "' .$comCid.'"')->fetch_assoc()['t_id'];
            }

          }catch(Exception $e){
          $awayTeam = "";
          }
          echo "<br>Away Team:".$awayTeam;

        //MATCH DATE
          try {
          $query = "//table/tr/td[.='Date ']/following-sibling::td[1]";
          $ddate = $crawler1->filterXPath($query)->text();
                $m_date = strtotime($ddate);
          } catch(Exception $e){
          $m_date = "01-01-1970";
          }
                echo "<br>Date; ".$m_date;

        //MATCH TIME
         try {
          $m_time = explode(" ", $crawler1->filterXPath("//table/tr/td[.='Time ']/following-sibling::td[1]")->text())[0];
          
          } catch(Exception $e){
          $m_time = "00:00:00";
        }

        //LIVE SCSHEDULED OR CONCLUDED
        if (strtotime($ddate.$m_time) > time()){
            $m_live_status = "SCHEDULED";            
          } else {
            $d=strtotime("+ 2 Hours", strtotime($ddate.$m_time));
            if ($d >time()) {
              $m_live_status = "LIVE";
            } else{
              $m_live_status = "CONCLUDED";
            }
          }


          echo "<br> Live Status: ".$m_live_status." Time:". $m_time."\n";

           //MATCH Round
         try {
           $query = "//table/tr/td[.='Round']/following-sibling::td[1]";
           $m_round = $crawler1->filterXPath($query)->text();
          } catch(Exception $e){
          $m_round = NULL;
          }
          echo "\n <br> Round:". $m_round."\n";

          //MATCH SCORE
          try{
          $matchSore = $crawler1->filter(".score")->extract(array('_text'));
                   
                $homescore = explode(":",$matchSore[0])[0];
                $awayscore = explode(":",$matchSore[0])[1];
                $m_hscore_ft = $homescore;
                $m_ascoreft = $awayscore;
                 if($homescore>$awayscore){
                  $m_winner = "HOME_TEAM";
                }else{
                  if($homescore<$awayscore){
                    $m_winner = "AWAY_TEAM";
                  }
                  else{
                    $m_winner = "DRAW";
                  }
                }
                echo "<p> Home : ".$homescore." AND AWAY:".$awayscore."</p>";
          } catch(Exception $e){
              $m_hscore_ft = NULL;
              $m_ascoreft = NULL;
          }
                
          try{
          $half1 = $crawler1->filter('td.stred')->text(); 
                    
                $score1 = explode("(",$half1)[1];
                $homescore1 = intval(explode(":",$score1)[0]);
                $awayscore1 = intval(explode(":",$score1)[1]);
                $homescore2 = $homescore - $homescore1;
                $awayscore2 = $awayscore - $awayscore1;
                echo "<p> First Half ".$homescore1." :".$awayscore1."</p>";
          }catch(Exception $e){
                $homescore1 = NULL;
                $awayscore1 = NULL;
                $homescore2 = NULL;
                $awayscore2 = NULL;
                echo "Not started <br/>";
          }

          // $ref = $crawler1->filter('td.detail2')->text(); 

          try{
          $query = "//table/tr/td[.='Referee']/following-sibling::td[1]";
          $theref = $crawler1->filterXPath($query)->text();
          $dr = explode("from", $theref);
          $ref_contry =trim(trim($dr[1], "\xC2\xA0\n"));
          $ref_name = trim($dr[0], "\xC2\xA0\n");
          //get country id
          $refConID = $conn->query('SELECT c_id FROM countries WHERE c_name="'.$ref_contry.'"')->fetch_assoc()['c_id'];
          $c_name = $ref_contry;
          $o_name = $ref_name;

           if(!$refConID){
            $insertCountry->execute();
             $refConID = $conn->query('SELECT c_id FROM countries WHERE c_name="'.$ref_contry.'"')->fetch_assoc()['c_id'];
           }
           $mo_o_id = $conn->query('SELECT o_id FROM officials WHERE o_name="'.$ref_name.'" AND o_c_id="'.$refConID.'"')->fetch_assoc()['o_id'];
           if(!$mo_o_id){
            $o_c_id = $refConID;
            $inserOfficial->execute();
           $mo_o_id = $conn->query('SELECT o_id FROM officials WHERE o_name="'.$ref_name.'" AND o_c_id="'.$refConID.'"')->fetch_assoc()['o_id'];
           }
                     echo "Ref:". $ref_name."-ID ".$mo_o_id." from  Country ".$ref_contry."-ID ".$refConID;
            $mo_m_id = $row['m_id'];
            $insertRef->execute();


        }catch(Exception $e){
          echo "no ref";
          $ref_name=NULL;
          $ref_contry=NULL;
          $refConID = NULL;
          $refId =NULL;
        }

        try{
          $query = "//table/tr/td[.='Spectators']/following-sibling::td[1]";
          $attendance = $crawler1->filterXPath($query)->text();
          
          echo "<br>attendance:". $attendance;
        }catch(Exception $e){
          echo "<br> no attendance <br>";
          $attendance = NULL;
        }

        try{
          $query = "//table/tr/td[.='Venue name']/following-sibling::td[1]";
          $stadium = $crawler1->filterXPath($query)->text();
          
          echo "<br>stadium:". $stadium;
        }catch(Exception $e){
          echo "<br> no stadium <br>";
          $stadium=NULL;
        }

        //HOME FORMATION

        try{
          $query = "//table/tr/td[.='Formation']/preceding-sibling::td[1]";
          $homfom = $crawler1->filterXPath($query)->text();
          echo "<br>Home Formation:". $homfom." <br> ";
        }catch(Exception $e){
          echo "no formation";
          $homfom = NULL;
        }

       //// AWAY Formation
        try{
          $query = "//table/tr/td[.='Formation']/following-sibling::td[1]";
          $awayfom = $crawler1->filterXPath($query)->text();
          echo "<br>AWAY Formation:". $awayfom." <br> ";
        }catch(Exception $e){
          echo "no formation";
          $awayfom = NULL;
        }

         try{ 
            $cc_name = explode(":",$crawler1->filterXPath("//i[.='Coach']/following-sibling::text()[1]")->eq(0)->text())[1];  
             echo "\n ".$cc_name."\n <br>";
             $m_hteam_coach = $conn->query('SELECT cc_id FROM coaches WHERE cc_name="'.$cc_name.'"')->fetch_assoc()['cc_id'];
             if(!$m_hteam_coach){
                $insertCoach->execute();   
                $m_hteam_coach = $conn->query('SELECT cc_id FROM coaches WHERE cc_name="'.$cc_name.'"')->fetch_assoc()['cc_id'];
              }
             $cc_name = explode(":",$crawler1->filterXPath("//i[.='Coach']/following-sibling::text()[1]")->eq(1)->text())[1];       
             echo "\n ".$cc_name."\n "; 
             $m_ateam_coach =  $conn->query('SELECT cc_id FROM coaches WHERE cc_name="'.$cc_name.'"')->fetch_assoc()['cc_id'];
              if(!$m_ateam_coach){
                $insertCoach->execute();   
                $m_ateam_coach = $conn->query('SELECT cc_id FROM coaches WHERE cc_name="'.$cc_name.'"')->fetch_assoc()['cc_id'];
              }
          }catch(Exception $e){
            $m_hteam_coach = NULL;
            $m_ateam_coach = NULL;
          }    
 ///AT THIS POINT UPDATE THE MATCH 
        $mUpdateSql ='UPDATE matches SET m_time="'.$m_time.'" ,m_date="'.$m_date.'" ,m_hometeam="'.$m_hometeam.'" ,m_awayteam="'.$m_awayteam.'" ,m_round="'.$m_round.'" ,m_hscore_fh="'.$homescore1.'" ,m_hscore_sh="'.$homescore2.'" ,m_hscore_et1="'.$homescore3.'" ,m_hscore_et2="'.$homescore4.'" ,m_hscore_ft="'.$homescore.'" ,m_hscore_pk="'.$m_hscore_pk.'" ,m_ascore_fh="'.$awayscore1.'" ,m_ascore_sh="'.$awayscore2.'" ,m_ascoreft="'.$awayscore.'" ,m_ascore_et1="'.$awayscore3.'" ,m_ascore_et2="'.$awayscore4.'" ,m_ascore_pk="'.$m_ascore_pk.'" ,m_extra_time="'.$m_extra_time.'" ,m_penalties="'.$m_penalties.'" ,m_ateam_coach="'.$m_ateam_coach.'", m_hteam_coach="'.$m_hteam_coach.'" ,m_live_status="'.$m_live_status.'" , m_group="'.$m_group.'", m_attendance="'.$attendance.'" ,m_venue="'.$stadium.'", m_hformation="'.$homfom.'", m_winner="'.$m_winner.'", m_aformation="'.$awayfom.'" WHERE m_id="'.$row['m_id'].'"';
          
          $mUpdate =$conn->query($mUpdateSql) or die($conn->error);
                 $update_fixtured = $conn->query("UPDATE matches set m_status='63' WHERE m_id='".$row['m_id']."'");
              if($update_fixtured){
                echo 'Updated '.$row['m_id'].'<br />';
              }
          }// if row !=nu;;

       
?>