
<?php
require 'vendor/autoload.php';
use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Symfony\Component\DomCrawler\Crawler;

//GET MATCH DETAILS
require 'db.php';
$j=1;
  $url = "https://www.soccervista.com/Kano_Pillars-Abia_Warriors-2968881-2968881.html";    
$tr= "3. Lig Grp. 1";
$client = new Client();
           $crawler1 = $client->request('GET', $url);

            $grp = $crawler1->filter("p a")->eq(0)->text();
            echo "\n firslinlk". $grp."\n";
            $mGrp = str_replace(".", "", $grp);
            $m_group = str_replace($comName, "", $mGrp);
            if($m_group=="Finals" OR $m_group=="FINAL STAGES" OR $m_group=="FINALS" OR $m_group=="FINAL"){
              $m_group = "NO_GROUP";
            }


















//             $mGrp1 = str_replace(".", "", $tr);


//             echo $mGrp1;
//             echo "\n".str_replace("3 Lig ", "", $mGrp1);

// $m_time = "12:30";

// $d=strtotime("+ 2 Hours", strtotime($m_time));
// echo "\n ". $d;

// echo "\n". date("H:i", $d);

// echo "\n".time();



