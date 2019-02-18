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


$stmt2 = $conn->prepare("INSERT INTO competition_seasons (cs_name, cs_com_id,  cs_standings_link) VALUES (?, ?, ?)");
$stmt2->bind_param("sis", $cs_name, $cs_com_id, $cs_standings_link);

                $comp_query  = $conn->query('SELECT * FROM competitions WHERE com_id =731') OR die ($conn->error);
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
                      $cs_com_id = 731;
                      $cs_name = $va[0][0];
                      $cs_standings_link = 'https://soccervista.com'.$va[0][1];
                      try{
                      if ($stmt2->execute()){
                      echo "<br> and season ".$cs_name." link".$cs_standings_link."</br>";                        
                      } 
                       }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
                    }
                  }
             
            
          // }
                $conn->close();
echo 'also done and dusted';