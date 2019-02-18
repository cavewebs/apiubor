<?php
require 'vendor/autoload.php';
use Goutte\Client;
require 'db.php';
//Populate TOP SCORERS 
//get the country id and link from db
$sql = "SELECT * FROM competition_season";
$countries = $conn->query($sql);
 
$stmt2 = $conn->prepare("INSERT INTO competition_topscorers (ct_com_id, ct_t_id, ct_season, ct_goals, ct_p_id, ct_first_scorer, ct_penalties, ct_missed_penalties, ct_group) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt2->bind_param("iisiiiiis", $ct_com_id, $ct_t_id, $ct_season, $ct_goals, $ct_p_id, $ct_first_scorer, $ct_penalties, $ct_missed_penalties, $ct_group);

$client = new Client();
    //         $crawler = $client->request('GET', $row['c_link']);     

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
          $ct_group = $row['cs_group'];
    }

    
  
          $stmt->execute();
              } 
                $conn->close();
            
echo 'also done and dusted';