<?php
require 'vendor/autoload.php';
use Goutte\Client;
require 'db.php';
// GET FIXTURES, TOP SCORERS AND RESULTS LINK INTO COMPETITION SEASON
//get the country id and link from db
$sql = "SELECT * FROM competition_seasons WHERE cs_status <5";
$countries = $conn->query($sql);
 $topscorers =NULL;
$client = new Client();

    while($row = $countries->fetch_assoc()) {
        $crawler = $client->request('GET', $row['cs_standings_link']);
      
      //country urls
          $results = $crawler->selectLink('Results')->link()->getUri();

          $fixtures = $crawler->selectLink('Fixtures')->link()->getUri();
          // if ($crawler->selectLink('Top scorers')->link()->getUri()){
         try{
          $topscorers =$crawler->selectLink('Top scorers')->link()->getUri();
          } catch(Exception $e) { // I guess its InvalidArgumentException in this case
          // Node list is empty
            $topscorers = NULL;
          }
          //   $ = ;
          // }              
                $stmt = $conn->prepare("UPDATE competition_seasons SET cs_fixture_link = '$fixtures', cs_results_link = '$results', cs_topscorers_link = '$topscorers' WHERE cs_id = ".$row['cs_id']);
              // execute the query
          $stmt->execute();
              $conn->query('UPDATE competition_seasons SET cs_status=5 WHERE cs_id="'.$row['cs_id'].'"');
              } 
                $conn->close();
            
echo 'also done and dusted';