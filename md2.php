<?php
require 'vendor/autoload.php';
use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Symfony\Component\DomCrawler\Crawler;

//GET MATCH DETAILS
require 'db.php';
$j=1;
  // $url = "https://www.soccervista.com/Inter-Lazio-2943952-2943952.html";
  $url = "https://www.soccervista.com/Real_Madrid-Juventus-2736499-2736499.html";  
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
$dmatches = $conn->query('SELECT * FROM matches WHERE m_status !=34 ORDER BY m_awayteam ASC LIMIT 1');

while ($row = $dmatches->fetch_assoc()) {
  
          $crawler1 = $client->request('GET', $url);
          // $crawler1 = $client->request('GET', $row['m_sv_link']);
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
                $homescore1 = '-';
                $awayscore1 = '-';
                $homescore2 = '-';
                $awayscore2 = '-';
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

        //match events
        try{
          $homeV = $crawler1->filterXPath("//table/tr/td[@colspan='3']/preceding-sibling::td[@colspan='2']")->each(function($ev, $i){
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
            $dTime = intval($eventInfo[0]);
            $dPlayer = $eventInfo[2]." ".$eventInfo[3];
            $et = "Assist";
            $goalType = "REGUlAR";
            // print_r($eventInfo);
            if(!empty($value["eventType"][0])){
              // $evty = explode(" ", $value[0]);
              $evtype = $value["eventType"][0];

            switch ($evtype) {case "/assets/imgs/g.gif":
                    $et = "Goal";

                    if($dEventTypeInfo=='penalty'){
                      if ($eventInfo[3] =='shootout'){
                        $dPlayer = $eventInfo[5]." ".$eventInfo[6]." ".$eventInfo[7];
                      if ($eventInfo[4]=="scored"){
                        $dEventTypeInfo1 = "PENALTY_SHOOTOUT";}
                        else {
                        $dEventTypeInfo1 = "Missed Penalty Shootout";
                        $et = "Missed";
                        }
                      } else{
                        $dPlayer = $eventInfo[3]." ".$eventInfo[4]." ".$eventInfo[5];
                      $dEventTypeInfo1 = "PENALTY";
                      }
                    } else{
                    $dPlayer = $eventInfo[2]." ".$eventInfo[3];
                      $dEventTypeInfo1 = "REGULAR_GOAL";

                    }

                    break;
                case "/assets/imgs/sub.gif":
                    $et = "Sub";
                      $dPlayer = $eventInfo[3]." ".$eventInfo[4]." ".$eventInfo[5];
                    if($dEventTypeInfo=='in'){
                      $dEventTypeInfo1 = "IN";
                      $subType = "in";
                    } else{
                      $subType = "out";
                      $dEventTypeInfo1 = "OUT";

                    }
                    break;
                case "/assets/imgs/rc.gif":
                    $et = "booking";
                    $dEventTypeInfo1 ="RED_CARD";
                    break;
                case "/assets/imgs/yc.gif":
                    $et = "booking";
                    $dEventTypeInfo1="YELLOW_CARD";
                    break;
                default:
                    $dEventTypeInfo = $eventInfo[1];
                      $dPlayer = $eventInfo[2]." ".$eventInfo[3]." ".$eventInfo[4];
                    $et = "Assist";

            }
          }
            if($et=="Assist"){
             if ($eventInfo[2]=="Goal"){
                        $et = "Goal";
                        $dPlayer = $eventInfo[3]." ".$eventInfo[4]." ".$eventInfo[5];
                        $dEventTypeInfo1 = "EXTRATIME_GOAL";

                      }
                      if ($eventInfo[2]=="penalty"){
                        $et = "Goal";
                        $dPlayer = $eventInfo[4]." ".$eventInfo[5]." ".$eventInfo[6];
                        $dEventTypeInfo1 = "EXTRATIME_PENALTY_GOAL";

                      }

          }
            if($et=="Assist"){
             if ($eventInfo[2]=="Goal"){
                        $et = "Goal";
                        $dPlayer = $eventInfo[3]." ".$eventInfo[4]." ".$eventInfo[5];
                        $dEventTypeInfo1 = "EXTRATIME_GOAL";

              }
              elseif ($eventInfo[2]=="penalty"){
                $et = "Goal";
                $dPlayer = $eventInfo[4]." ".$eventInfo[5]." ".$eventInfo[6];
                $dEventTypeInfo1 = "EXTRATIME_PENALTY_GOAL";

              } else{


              }


            }

            if($et=="Goal"){
              $mg_t_id = $m_hometeam; 
              $mg_type = $dEventTypeInfo1;
              $mg_time = $dTime;
              $mg_m_id = $row['m_id'];
                $mg_p_id= $conn->query('SELECT * FROM players WHERE p_name ="'.$dPlayer.'"')->fetch_assoc()['p_id'];;
              //if no player found
              if(!$mg_p_id){
                $p_name = $dPlayer;
                try{$insertNewPlayer->execute();} catch(Exception $e) {
                  print_r($e->errorInfo);
                }

                $mg_p_id= $conn->query('SELECT * FROM players WHERE p_name ="'.$dPlayer.'"')->fetch_assoc()['p_id'];;
              }
              $assisted= $conn->query('SELECT mg_p_id FROM match_goals WHERE mg_m_id="'.$m_hometeam.'" AND mg_time="'.$dTime.'"')->fetch_assoc()['mg_id'];
              //If ddnt find assist
              if(!$assisted){
                try{$insertGoal->execute();} catch(Exception $e) {
                  print_r($e->errorInfo);
                }
              } else{
                $conn->query('UPDATE match_goals SET mg_p_id="'.$mg_p_id.'" WHERE mg_id="'.$assisted.'"');
              }
            }//end Goal


            if($et=="Assist"){
              $mg_assist= $conn->query('SELECT * FROM players WHERE p_name ="'.$dPlayer.'"')->fetch_assoc()['p_id'];;
              $mg_t_id = $m_hometeam; 
              $mg_type = $dEventTypeInfo1;
              $mg_time = $dTime;
              $mg_m_id = $row['m_id'];
              try{$insertAssit->execute();} catch(Exception $e) {
                  print_r($e->errorInfo);
                }

            }//end Assit


            if($et=="Sub"){
              if($dEventTypeInfo1=="IN"){
                $ms_m_id = $row['m_id'];
                $ms_p_in_id = $conn->query('SELECT * FROM players WHERE p_name ="'.$dPlayer.'"')->fetch_assoc()['p_id'];
                if(!$ms_p_in_id){
                $p_name = $dPlayer;
                try{$insertNewPlayer->execute();} catch(Exception $e) {
                  print_r($e->errorInfo);
                }
                $ms_p_in_id = $conn->query('SELECT * FROM players WHERE p_name ="'.$dPlayer.'"')->fetch_assoc()['p_id'];
              }
              $ms_time = $dTime;
              $ms_t_id = $m_hometeam;
              try{$insertSub->execute();} catch(Exception $e) {
                  print_r($e->errorInfo);
                }
              }// EnD IN

              if($dEventTypeInfo1=="OUT"){
                $ms_m_id = $row['m_id'];
                try{
                $ms_p_out_id = 
                // $getPlayerInfo->execute()
                $conn->query('SELECT * FROM players WHERE p_name ="'.$dPlayer.'"')->fetch_assoc()['p_id'];} catch(Exception $e) {
                    print_r($e->error);
                  }
                if(!$ms_p_out_id){
                  $p_name = $dPlayer;
                  try{$insertNewPlayer->execute();} catch(Exception $e) {
                    print_r($e->errorInfo);
                  }
                $ms_p_out_id = $conn->query($getPlayerInfo)->fetch_assoc()['p_id'];
                }
              $ms_time = $dTime;
              $ms_t_id = $m_hometeam;
              $ms_id = $conn->query('SELECT ms_id FROM match_subs WHERE ms_time="'.$ms_time.'" AND ms_t_id="'.$ms_t_id.'" ORDER BY ms_id DESC')->fetch_assoc()['ms_id'];
              try{$conn->query('UPDATE match_subs SET ms_p_out_id="'.$ms_p_out_id.'" WHERE ms_id="'.$ms_id.'"');} catch(Exception $e) {
                  print_r($e->errorInfo);
                }
              }


            } // end Sub ...

            if($et="booking"){
              $mk_p_id =$conn->query($getPlayerInfo)->fetch_assoc()['p_id'];
              if(!$mk_p_id){
                $p_name = $dPlayer;
                  try{$insertNewPlayer->execute();} catch(Exception $e) {
                    print_r($e->errorInfo);
                  }
              $mk_p_id =$conn->query($getPlayerInfo)->fetch_assoc()['p_id'];
              }                 
              $mk_t_id = $m_hometeam;
              $mk_m_id = $row['m_id'];   
              $mk_time = $dTime;
              $mk_type = $dEventTypeInfo1;
              try{
                $insertBooking->execute();} catch(Exception $e) {
                    print_r($e->errorInfo);
                  }

            }
          
          echo "<br>Time: ".$dTime." ". $dPlayer." - ".$dEventTypeInfo1." Event type:".$et."<br>";
          }
        }catch(Exception $e){
          echo "<br> no eventsH <br>";
        }


        try{
                  $awayEvs = $crawler1->filterXPath("//table/tr/td[@colspan='4']/following-sibling::td[@colspan='2']")->each(function($ev, $i){
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
                      if ($eventInfo[3] =='shootout'){
                        $dPlayer = $eventInfo[5]." ".$eventInfo[6]." ".$eventInfo[7];
                      if ($eventInfo[4]=="scored"){
                        $dEventTypeInfo1 = "PENALTY_SHOOTOUT";}
                        else {
                        $dEventTypeInfo1 = "Missed Penalty Shootout";
                        $et = "Missed";
                        }
                      } else{
                        $dPlayer = $eventInfo[3]." ".$eventInfo[4]." ".$eventInfo[5];
                      $dEventTypeInfo1 = "PENALTY";
                      }
                    } else{
                    $dPlayer = $eventInfo[2]." ".$eventInfo[3];
                      $dEventTypeInfo1 = "REGULAR_GOAL";

                    }

                    break;
                case "/assets/imgs/sub.gif":
                    $et = "Sub";
                      $dPlayer = $eventInfo[3]." ".$eventInfo[4]." ".$eventInfo[5];
                    if($dEventTypeInfo=='in'){
                      $dEventTypeInfo1 = "IN";
                      $subType = "in";
                    } else{
                      $subType = "out";
                      $dEventTypeInfo1 = "OUT";

                    }
                    break;
                case "/assets/imgs/rc.gif":
                    $et = "booking";
                    $dEventTypeInfo1 ="RED_CARD";
                    break;
                case "/assets/imgs/yc.gif":
                    $et = "booking";
                    $dEventTypeInfo1="YELLOW_CARD";
                    break;
                default:
                    $dEventTypeInfo = $eventInfo[1];
                      $dPlayer = $eventInfo[2]." ".$eventInfo[3]." ".$eventInfo[4];
                    $et = "Assist";

            }
          }
            if($et=="Assist"){
             if ($eventInfo[2]=="Goal"){
                        $et = "Goal";
                        $dPlayer = $eventInfo[3]." ".$eventInfo[4]." ".$eventInfo[5];
                        $dEventTypeInfo1 = "EXTRATIME_GOAL";

                      }
                      if ($eventInfo[2]=="penalty"){
                        $et = "Goal";
                        $dPlayer = $eventInfo[4]." ".$eventInfo[5]." ".$eventInfo[6];
                        $dEventTypeInfo1 = "EXTRATIME_PENALTY_GOAL";

                      }


            }
          
            # code...
          echo "<br>Time: ".$dTime." ". $dPlayer."-".$dEventTypeInfo1." Event type:".$et."<br>";
          if($et=='sub'){
            if ($dEventTypeInfo1=='OUT'){
            // $conn->query('INSERT INTO match_subs VALUES("", "", $ms_m_id, '.$ms_p_out_id.', "0" '. $ms_time.', '.$ms_t_id.')') or die($conn->error);
          }else{
          $inpM = $conn->query('SELECT MAX(ms_id) AS ms_id FROM match_subs WHERE ms_time="'.$ms_time.'" AND ms_t_id="'.$ms_t_id.'"')or die($conn->error);
             $m_id=$inpM->fetch_assoc()['ms_id'];
            // $conn->query('UPDATE match_subs SET ms_p_in_id="'.$ms_p_in_id.'" WHERE ms_id="'.$m_id.'"' ) or die($conn->error);
          }

          if ($et =='goal'){
            $conn->query('INSERT INTO match_goals VALUES("", "", '.$mg_m_id.', '.$mg_p_id.', '.$mg_t_id.', '.$mg_assist.', '.$mg_type.', '.$mg_time.')' ) OR DIE($conn->error);
          }

          }
          if($et=='Assist'){

          }

          if($et=='card'){

          }
          if($et=='Missed'){

          }
          }
        }catch(Exception $e){
          echo "<br> no eventsH <br>";
        }


        
        
        $formation = $crawler1->filter('td.lineups[colspan=2]')->eq(0)->each(function
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
                  $playerPost =$vae[0]['pos'][$i];
                  $playername=  explode(":", $vae[1]['name'][$i])[1];
                  if($playerPost=="Substitute player"){
                    echo "\n".$playername." sub <br>";
                  }
                  else{
                    if($playerPost=="Coach"){
                      echo "\n".$playername." Coacheh <br>";
                    } 
                    else{
                      if($playerPost=="Injured"){
                        echo "\n".$playername." Injry <br>";
                      }else{
                        echo "\n".$playername." lineup <br>";
                      }//player not Injured
                    }//else player not Coach
                  }//else player not sub 
                  }
                }


$formationA = $crawler1->filter('td.lineups[colspan=2]')->eq(1)->each(function
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
                  $playerPost =$vae[0]['pos'][$i];
                  $playername=  explode(":", $vae[1]['name'][$i])[1];
                  if($playerPost=="Substitute player"){
                    echo "\n".$playername." sub <br>";
                  }
                  else{
                    if($playerPost=="Coach"){
                      echo "\n".$playername." Coacheh <br>";
                    } 
                    else{
                      if($playerPost=="Injured"){
                        echo "\n".$playername." Injry <br>";
                      }else{
                        echo "\n".$playername." lineup <br>";
                      }//player not Injured
                    }//else player not Coach
                  }//else player not sub 
                  }
                }

         try{ 
            $m_hteam_coach = explode(":",$crawler1->filterXPath("//i[.='Coach']/following-sibling::text()[1]")->eq(0)->text())[1];  
             echo "\n ".$m_hteam_coach."\n ";     

             $m_ateam_coach = explode(":",$crawler1->filterXPath("//i[.='Coach']/following-sibling::text()[1]")->eq(1)->text())[1];       
             echo "\n ".$m_ateam_coach."\n "; 
          }catch(Exception $e){
            $m_hteam_coach = NULL;
            $m_ateam_coach = NULL;
          }    
 ///AT THIS POINT UPDATE THE MATCH 
        $mUpdateSql ='UPDATE matches SET m_time="'.$m_time.'" ,m_date="'.$m_date.'" ,m_hometeam="'.$m_hometeam.'" ,m_awayteam="'.$m_awayteam.'" ,m_round="'.$m_round.'" ,m_hscore_fh="'.$homescore1.'" ,m_hscore_sh="'.$homescore2.'" ,m_hscore_et1="'.$homescore3.'" ,m_hscore_et2="'.$homescore4.'" ,m_hscore_ft="'.$homescore.'" ,m_hscore_pk="'.$m_hscore_pk.'" ,m_ascore_fh="'.$awayscore1.'" ,m_ascore_sh="'.$awayscore2.'" ,m_ascoreft="'.$awayscore.'" ,m_ascore_et1="'.$awayscore3.'" ,m_ascore_et2="'.$awayscore4.'" ,m_ascore_pk="'.$m_ascore_pk.'" ,m_extra_time="'.$m_extra_time.'" ,m_penalties="'.$m_penalties.'" ,m_ateam_coach="'.$m_ateam_coach.'", m_hteam_coach="'.$m_hteam_coach.'" ,m_live_status="'.$m_live_status.'" , m_group="'.$m_group.'", m_attendance="'.$attendance.'" ,m_venue="'.$stadium.'", m_hformation="'.$homfom.'" ,m_aformation="'.$awayfom.'" WHERE m_id="'.$row['m_id'].'"';
        $mUpdate =$conn->query($mUpdateSql) or die($conn->error);


                 $update_fixtured = $conn->query("UPDATE matches set m_status='34' WHERE m_id='".$row['m_id']."'");
              if($update_fixtured){
                echo 'Updated '.$row['m_id'].'<br />';
              }
          }// if row !=nu;;

       
?>