
<?php
require 'vendor/autoload.php';
use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Symfony\Component\DomCrawler\Crawler;

//GET MATCH DETAILS
require 'db.php';
$j=1;
  $url = "https://www.soccervista.com/Chelsea-Tottenham_Hotspur-2949344-2949344.html";    
  // $url = "https://www.soccervista.com/Tottenham_Hotspur-Borussia_Dortmund-2947299-2947299.html";  
  // $url = "https://www.livescore.cz/gameinfo2.php?switch=new&id=2782197";  
$client = new Client();

          $crawler1 = $client->request('GET', $url);
          // $crawler1 = $crawler1->addHtmlContent($htmz);


          $matchDate = $crawler1->filter('table#gamec')->each(function ($tr, $i) { 
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
          



          $matchSore = $crawler1->filter(".score")->extract(array('_text'));
                   
                $homescore = explode(":",$matchSore[0])[0];
                $awayscore = explode(":",$matchSore[0])[1];
                echo "<p> Home : ".$homescore." AND AWAY:".$awayscore."</p>";
                
          try{
          $half1 = $crawler1->filter('td.stred')->text(); 
                    
                $score1 = explode("(",$half1)[1];
                $homescore1 = intval(explode(":",$score1)[0]);
                $awayscore1 = intval(explode(":",$score1)[1]);
                echo "<p> First Half ".$homescore1." :".$awayscore1."</p>";
        }catch(Exception $e){
          echo "Not started <br/>";
        }

          // $ref = $crawler1->filter('td.detail2')->text(); 

          try{
          $query = "//table/tr/td[.='Referee']/following-sibling::td[1]";
          $theref = $crawler1->filterXPath($query)->text();
          $dr = explode("from", $theref);
          $rc = $dr[1];
          $reff = $dr[0];
          echo "Ref:". $reff." Country ".$rc;
        }catch(Exception $e){
          echo "no ref";
        }

        try{
          $query = "//table/tr/td[.='Spectators']/following-sibling::td[1]";
          $attendance = $crawler1->filterXPath($query)->text();
          
          echo "<br>attendance:". $attendance;
        }catch(Exception $e){
          echo "<br> no attendance <br>";
        }

        try{
          $query = "//table/tr/td[.='Venue name']/following-sibling::td[1]";
          $stadium = $crawler1->filterXPath($query)->text();
          
          echo "<br>stadium:". $stadium;
        }catch(Exception $e){
          echo "<br> no stadium <br>";
        }

        
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
                        $dPlayer = $eventInfo[5]." ".$eventInfo[6];
                      if ($eventInfo[4]=="scored"){
                        $dEventTypeInfo1 = "PENALTY_SHOOTOUT";}
                        else {
                        $dEventTypeInfo1 = "Missed Penalty Shootout";
                        $et = "Missed";
                        }
                      } else{
                        $dPlayer = $eventInfo[3]." ".$eventInfo[4];
                      $dEventTypeInfo1 = "PENALTY";
                      }
                    } else{
                    $dPlayer = $eventInfo[2]." ".$eventInfo[3];
                      $dEventTypeInfo1 = "REGULAR_GOAL";

                    }

                    break;
                case "/assets/imgs/sub.gif":
                    $et = "Sub";
                      $dPlayer = $eventInfo[3]." ".$eventInfo[4];
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
                      $dPlayer = $eventInfo[2]." ".$eventInfo[3];
                    $et = "Assist";
            }
          }
            # code...
          echo "<br>Time: ".$dTime." ". $dPlayer."-".$dEventTypeInfo1." Event type:".$et."<br>";
          if($et=='sub'){
            if ($dEventTypeInfo1=='OUT'){
            $conn->query('INSERT INTO match_subs VALUES("", "", $ms_m_id, '.$ms_p_out_id.', "" '. $ms_time.', '.$ms_t_id).')';
          }else{
            $conn->query('UPDATE match_subs SET ')
          }

          }
          if($et=='Assist'){

          }

          if ($et =='goal'){

          }
          if($et=='card'){

          }
          if($et=='Missed'){

          }
          }
        }catch(Exception $e){
          echo "<br> no eventsH <br>";
        }


        
//HOME FORMATION

        try{
          $query = "//table/tr/td[.='Formation']/preceding-sibling::td[1]";
          $homfom = $crawler1->filterXPath($query)->text();
          echo "<br>Home Formation:". $homfom." <br> ";
        }catch(Exception $e){
          echo "no formation";
        }

//// AWAY Formation
        try{
          $query = "//table/tr/td[.='Formation']/following-sibling::td[1]";
          $awayfom = $crawler1->filterXPath($query)->text();
          echo "<br>AWAY Formation:". $awayfom." <br> ";
        }catch(Exception $e){
          echo "no formation";
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
                  echo "<br> ".$vae[0]['pos'][$i].'  '. explode(":", $vae[1]['name'][$i])[1];
                     
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
                  echo "<br> ".$vae[0]['pos'][$i].'  '. explode(":", $vae[1]['name'][$i])[1];
                  }
                }

       
?>