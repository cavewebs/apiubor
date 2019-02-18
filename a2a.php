<?php
require 'vendor/autoload.php';
use Goutte\Client;
require 'db.php';
// GET FIXTURES, TOP SCORERS AND RESULTS LINK INTO COMPETITION SEASON

        $comp_id =1712;
$sql = 'SELECT * FROM competition_seasons WHERE cs_id <9363 AND cs_id>9350';
$countries = $conn->query($sql);
 $topscorers =NULL;
$client = new Client();
$stmt2 = $conn->prepare("INSERT INTO competition_seasons (cs_name, cs_com_id,  cs_standings_link, cs_fixture_link, cs_results_link, cs_topscorers_link, cs_group) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt2->bind_param("sisssss", $cs_name, $cs_com_id, $cs_standings_link, $cs_fixture_link, $cs_results_link, $cs_topscorers_link, $cs_group);

    while($row = $countries->fetch_assoc()) {
        $crawler = $client->request('GET', $row['cs_standings_link']);
      
     
         try{
          $othergroups =$crawler->selectLink('Other groups')->link()->getUri();
          
          if ($othergroups){
             $query = "//ul/li/a[.='Other groups']/following-sibling::ul[1]/li/a";
          $getGroups = $crawler->filterXPath($query)->extract(array('_text', 'href'));;
            // UPDATE COMPETITION TO REFLECT GROUP/STAGE
              $conn->query('UPDATE competitions SET com_type="STAGES" WHERE com_id="'.$row['cs_com_id'].'"') or die($conn->error);
              echo "<p>";
              // var_dump($getGroups);
              echo "</p>";
            // //will hold the list
            // $countryCompetitions=[];
            foreach ($getGroups as $key => $value) {
                // echo($value);
              echo "<br> <br>";
                $cs_grp = strip_tags($value[0]) ;
                $cs_name = $row['cs_name'];
                $cs_com_id = $row['cs_com_id'];
                $com_link = 'https://soccervista.com'.$value[1];
                //GET THE LINK A $cs_grp = strip_tags($value[0]) ;
                   $compName = $conn->query('SELECT com_name FROM competitions WHERE com_id="'.$row['cs_com_id'].'"')->fetch_assoc()['com_name'];
                     print_r($compName);
                     echo "<br>".$cs_grp."<br>";
                     $cs_group = str_replace($compName, "", $cs_grp);
                     //ND PREPARE TO GET FIXTURES AND RESULTS LINK
                $crawler1 = $client->request('GET', $com_link);

                $cs_results_link = $crawler1->selectLink('Results')->link()->getUri();
                try{
                    $cs_topscorers_link =$crawler1->selectLink('Top scorers')->link()->getUri();
                } catch(Exception $e) { // I guess its InvalidArgumentException in this case
                // Node list is empty
                  $cs_topscorers_link = NULL;
                }
                $cs_standings_link = $com_link;                            
                $cs_fixture_link = $crawler1->selectLink('Fixtures')->link()->getUri();
                $cs_standings_link = $crawler1->selectLink('Summary')->link()->getUri();
                    $stmt2->execute();
                    echo "<br> done  for ". $cs_group.' <br>';
                }//End INSERTING THE NEW LINKS
              

            }           
           } catch(Exception $e) { // I guess its InvalidArgumentException in this case
            // Node list is empty
            $othergroups = NULL;
          }
        $conn->query('UPDATE competition_seasons SET cs_status=11 WHERE cs_id="'.$row['cs_id'].'"');
        } 


        $comp_id =1713;
$sql = 'SELECT * FROM competition_seasons WHERE cs_id ="'.$comp_id.'"';
$countries = $conn->query($sql);
 $topscorers =NULL;
$client = new Client();
$stmt2 = $conn->prepare("INSERT INTO competition_seasons (cs_name, cs_com_id,  cs_standings_link, cs_fixture_link, cs_results_link, cs_topscorers_link, cs_group) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt2->bind_param("sisssss", $cs_name, $cs_com_id, $cs_standings_link, $cs_fixture_link, $cs_results_link, $cs_topscorers_link, $cs_group);

    while($row = $countries->fetch_assoc()) {
        $crawler = $client->request('GET', $row['cs_standings_link']);
      
     
         try{
          $othergroups =$crawler->selectLink('Other groups')->link()->getUri();
          
          if ($othergroups){
             $query = "//ul/li/a[.='Other groups']/following-sibling::ul[1]/li/a";
          $getGroups = $crawler->filterXPath($query)->extract(array('_text', 'href'));;
            // UPDATE COMPETITION TO REFLECT GROUP/STAGE
              $conn->query('UPDATE competitions SET com_type="STAGES" WHERE com_id="'.$row['cs_com_id'].'"') or die($conn->error);
              echo "<p>";
              // var_dump($getGroups);
              echo "</p>";
            // //will hold the list
            // $countryCompetitions=[];
            foreach ($getGroups as $key => $value) {
                // echo($value);
              echo "<br> <br>";
                $cs_grp = strip_tags($value[0]) ;
                $cs_name = $row['cs_name'];
                $cs_com_id = $row['cs_com_id'];
                $com_link = 'https://soccervista.com'.$value[1];
                //GET THE LINK A $cs_grp = strip_tags($value[0]) ;
                   $compName = $conn->query('SELECT com_name FROM competitions WHERE com_id="'.$row['cs_com_id'].'"')->fetch_assoc()['com_name'];
                     print_r($compName);
                     echo "<br>".$cs_grp."<br>";
                     $cs_group = str_replace($compName, "", $cs_grp);
                     //ND PREPARE TO GET FIXTURES AND RESULTS LINK
                $crawler1 = $client->request('GET', $com_link);

                $cs_results_link = $crawler1->selectLink('Results')->link()->getUri();
                try{
                    $cs_topscorers_link =$crawler1->selectLink('Top scorers')->link()->getUri();
                } catch(Exception $e) { // I guess its InvalidArgumentException in this case
                // Node list is empty
                  $cs_topscorers_link = NULL;
                }
                $cs_standings_link = $com_link;                            
                $cs_fixture_link = $crawler1->selectLink('Fixtures')->link()->getUri();
                $cs_standings_link = $crawler1->selectLink('Summary')->link()->getUri();
                    $stmt2->execute();
                    echo "<br> done  for ". $cs_group.' <br>';
                }//End INSERTING THE NEW LINKS
              

            }           
           } catch(Exception $e) { // I guess its InvalidArgumentException in this case
            // Node list is empty
            $othergroups = NULL;
          }
        $conn->query('UPDATE competition_seasons SET cs_status=11 WHERE cs_id="'.$row['cs_id'].'"');
        } 


$comp_id =309;
$sql = 'SELECT * FROM competition_seasons WHERE cs_id ="'.$comp_id.'"';
$countries = $conn->query($sql);
 $topscorers =NULL;
$client = new Client();
$stmt2 = $conn->prepare("INSERT INTO competition_seasons (cs_name, cs_com_id,  cs_standings_link, cs_fixture_link, cs_results_link, cs_topscorers_link, cs_group) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt2->bind_param("sisssss", $cs_name, $cs_com_id, $cs_standings_link, $cs_fixture_link, $cs_results_link, $cs_topscorers_link, $cs_group);

    while($row = $countries->fetch_assoc()) {
        $crawler = $client->request('GET', $row['cs_standings_link']);
      
     
         try{
          $othergroups =$crawler->selectLink('Other groups')->link()->getUri();
          
          if ($othergroups){
             $query = "//ul/li/a[.='Other groups']/following-sibling::ul[1]/li/a";
          $getGroups = $crawler->filterXPath($query)->extract(array('_text', 'href'));;
            // UPDATE COMPETITION TO REFLECT GROUP/STAGE
              $conn->query('UPDATE competitions SET com_type="STAGES" WHERE com_id="'.$row['cs_com_id'].'"') or die($conn->error);
              echo "<p>";
              // var_dump($getGroups);
              echo "</p>";
            // //will hold the list
            // $countryCompetitions=[];
            foreach ($getGroups as $key => $value) {
                // echo($value);
              echo "<br> <br>";
                $cs_grp = strip_tags($value[0]) ;
                $cs_name = $row['cs_name'];
                $cs_com_id = $row['cs_com_id'];
                $com_link = 'https://soccervista.com'.$value[1];
                //GET THE LINK A $cs_grp = strip_tags($value[0]) ;
                   $compName = $conn->query('SELECT com_name FROM competitions WHERE com_id="'.$row['cs_com_id'].'"')->fetch_assoc()['com_name'];
                     print_r($compName);
                     echo "<br>".$cs_grp."<br>";
                     $cs_group = str_replace($compName, "", $cs_grp);
                     //ND PREPARE TO GET FIXTURES AND RESULTS LINK
                $crawler1 = $client->request('GET', $com_link);

                $cs_results_link = $crawler1->selectLink('Results')->link()->getUri();
                try{
                    $cs_topscorers_link =$crawler1->selectLink('Top scorers')->link()->getUri();
                } catch(Exception $e) { // I guess its InvalidArgumentException in this case
                // Node list is empty
                  $cs_topscorers_link = NULL;
                }
                $cs_standings_link = $com_link;                            
                $cs_fixture_link = $crawler1->selectLink('Fixtures')->link()->getUri();
                $cs_standings_link = $crawler1->selectLink('Summary')->link()->getUri();
                    $stmt2->execute();
                    echo "<br> done  for ". $cs_group.' <br>';
                }//End INSERTING THE NEW LINKS
              

            }           
           } catch(Exception $e) { // I guess its InvalidArgumentException in this case
            // Node list is empty
            $othergroups = NULL;
          }
        $conn->query('UPDATE competition_seasons SET cs_status=11 WHERE cs_id="'.$row['cs_id'].'"');
        } 
        $conn->close();
            
echo 'also done and dusted';