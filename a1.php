<?php
require 'vendor/autoload.php';
use Goutte\Client;
require 'db.php';

//get the country id and link from db
$sql = "SELECT c_id, c_link FROM countries";
$countries = $conn->query($sql);
// geting individual leagues within each country
$css_selector = "li.longer a";
$thing_to_scrape = "_text";

$client = new Client();
// prepare and bind
$stmt = $conn->prepare("INSERT INTO competitions (com_name, com_c_id, com_link) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $com_name, $com_cid, $com_link);


$stmt2 = $conn->prepare("INSERT INTO competition_season (cs_name, cs_com_id,  cs_standings_link) VALUES (?, ?, ?)");
$stmt2->bind_param("sis", $cs_name, $cs_com_id, $cs_standings_link);

    while($row = $countries->fetch_assoc()) {
            $crawler = $client->request('GET', $row['c_link']);
      
      //country urls
          $getCountry = $crawler->filter($css_selector)->extract(array('_text', 'href'));

            // //will hold the list
            // $countryCompetitions=[];
            foreach ($getCountry as $key => $value) {

                $com_name = strip_tags($value[0]) ;
                $com_cid = $row['c_id'];
                $com_link = 'https://soccervista.com'.$value[1];
              if($key==0){

              }else{
                echo "doing for ". $com_name.' <br>';
                $stmt->execute();
                // $stmt->close();
              
                //lets add fixtures and standing links to db
                $comp_query  = $conn->query('SELECT * FROM competitions WHERE com_c_id ="'.$com_cid.'" AND com_name ="'.$com_name.'"') OR die ($conn->error);
                  $com = $comp_query->fetch_assoc();
                  var_dump($com);
                  $crawler1 = $client->request('GET', $com['com_link']);
                  $seasons = $crawler1->filter('.menu2 ul li')->eq(1)->each(function ($tr, $i) { 
                     return $tr->filter('ul li a')->each (
                            function ($td, $i) 
                          { 
                            return $td->extract(array('_text', 'href')); 
                            });
                      });
                foreach ($seasons as $k => $v) {
                    foreach ($v as $ke=> $va) {
                      print_r($va);
                      $cs_com_id = $com['com_id'];
                      $cs_name = $va[0][0];
                      $cs_standings_link = 'https://soccervista.com'.$va[0][1];
                      try{
                      if ($stmt2->execute()){
                      echo "<br> and season ".$cs_name." link".$cs_standings_link."</br>";                        
                      } ;
                       }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
                    }
                  }
              }
              } 
            }
            
          // }
                $conn->close();
echo 'also done and dusted';