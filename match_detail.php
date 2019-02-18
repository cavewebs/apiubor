
<?php
require 'vendor/autoload.php';
use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);

//GET MATCH DETAILS
require 'db.php';
$j=1;
  $url = "https://www.livescore.cz/gameinfo2.php?switch=old&id=2782174";    
$client = new Client();
// try {
//     //begin the transaction
//     $conns->beginTransaction();
// $matches = $conn->query("SELECT m_sv_link, m_id, m_date, m_time FROM matches WHERE m_status =79") or die($conn->error);
// while($row =  $matches->fetch_assoc()){
// if($row !=NULL){
//                 echo 'the Match being processed is: '.$row['m_id'].'<br />';  

          $crawler = $client->request('GET', $url);
          // $matchDate = $crawler->filter('table#gamec')->each(function ($tr, $i) { 
          //         return $tr->filter('td[colspan=4]')->each (
          //           function ($td, $i) 
          //         { 
                     
          //           return trim($td->text()); 
          //           });
                
          //     });
          //     foreach ($matchDate as $key => $mdate) { 
          //       // print_r($competitionMatch);
          //       $ms_date = $mdate[0];
          //       $m_time = explode(" ", $mdate[1])[0];
          //       $m_date = strtotime($ms_date);
          //       echo "Match date is: ".$ms_date."While new date is ".$m_date." to convert it i will get: ".date("d-m-Y", $m_date);
          //       // echo "<br>".$m_time;
          //     // $conns->commit();                        
          // }
          $domElement = $crawler->filter('.participant-name')->each(function ($node, $i){
    $l = $node;
    return $l; })
                ;
    echo "dumping'''"; print_r($domElement);
    echo "<br/>"; // I guess its InvalidArgumentException in this case
    // Node list is empty


          $matchSore = $crawler->filter(".match-detail")->extract(array('_text'));
          var_dump($matchSore); 
                   
              foreach ($matchSore as $mscore) { 
                // print_r($competitionMatch);
                $homescore = explode(":",$mscore[0])[0];
                $awayscore = explode(":",$mscore[0])[1];
                echo "<p> Home Score Fulltime: ".$homescore." AND AWAY Score is ".$awayscore."</p>";
                // echo "<br>".$m_time;              
                // $conns->commit();            
          }

          $half1 = $crawler->filter('.score-board')->each(function ($tr, $i) { 
                  return $tr->filter('div')->each (
                    function ($td, $i) 
                  { 
                    return trim($td->text()); 
                    });
                
              });
              foreach ($half1 as $key => $half1) { 
                // print_r($competitionMatch);
                $score1 = explode("(",$half1[0])[1];
                $homescore1 = intval(explode(":",$score1)[0]);
                $awayscore1 = intval(explode(":",$score1)[1]);
                echo "<p> First Half ".$homescore1." :".$awayscore1."</p>";
                // echo "<br>".$m_time;              
                // $conns->commit();            
          }
          var_dump($half1);

          $matchInfo = $crawler->filter('div.lineup-list')->each(function ($tr, $i) { 
                  return $tr->filter('div.lineup-type')->each (
                    function ($td, $i) 
                  { 
                        return trim($td->text());  
                          
                    });
                
              });
                        foreach ($matchInfo as $hal) { 

          print_r($matchInfo);
        }

        // $tr = $crawler->filter('div.section lineup-section')->each(function ($div, $i){
        //   return $div->filter('div.lineup')->each(
        //     function ($dd, $i)
        //     {return trim($dd->text());
        //     });
        // });
        $tr = $crawler->filter('.incident guest')->each(function ($node, $i) {
          return $node->filter('.elapsed')->each( function($t, $i)
          {
            print_r( $t->text()."\n");
          });

              
            });


        // $reducedSubsetCrawler = $crawler->reduce(function (client $crawler, $i) {
        //   // Just return `false` if you want to remove an element from a set:
        //       return preg_match('/^Lineups/', $crawler->text());
        // });
        // var_dump($reducedSubsetCrawler);
        // // }
        //     }// for each
        //   }// if row !=nu;;
      
      
// catch(PDOException $e)
//     {
//     echo "Error: " . $e->getMessage();
//     }
// $conn = null;
// echo "we Made it, We are rich, No like really rich";

?>