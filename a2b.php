<?php
require 'vendor/autoload.php';
use Goutte\Client;
require 'db.php';
// GET FIXTURES, TOP SCORERS AND RESULTS LINK INTO COMPETITION SEASON
//get the country id and link from db
$cid = 557;
$sql = 'SELECT * FROM competition_seasons WHERE cs_com_id="'.$cid.'"';
$countries = $conn->query($sql);
 $topscorers =NULL;
$client = new Client();
    while($row = $countries->fetch_assoc()) {
        $crawler = $client->request('GET', $row['cs_standings_link']);
         try{
          $getGroups = $crawler->filter('h1')->eq(1)->text();
          var_dump($getGroups);
          $cs_grp = explode("|", $getGroups)[1];
            // UPDATE COMPETITION TO REFLECT GROUP/STAGE
                   $compName = $conn->query('SELECT com_name FROM competitions WHERE com_id="'.$row['cs_com_id'].'"')->fetch_assoc()['com_name'];
                     print_r($compName);
                     echo "<br>".$cs_grp."<br>";
                     $cs_group = str_replace($compName, "", $cs_grp);
                     //UPDATE THE GROUPS IN SEASONS TABLE
            
                     $conn->query('UPDATE competition_seasons SET cs_group="'.$cs_group.'" WHERE cs_id="'.$row['cs_id'].'"');
              
                    echo "<br> done  for ". $cs_group.' <br>';
                  

             } catch(Exception $e) { // I guess its InvalidArgumentException in this case         
                
              } 

            }
                $conn->close();
            
echo 'also done and dusted';