
<?php
require 'vendor/autoload.php';
use Goutte\Client;

require 'db.php';

//get the country id and link from db
$sql = "SELECT com_id, com_c_id, com_fixtures_link FROM competitions where com_id=179";
$matches = $conn->query($sql);

$css_selector = "tbody tr.predict td a";
$fixtures_css_selector = "div.menu2 a";
$thing_to_scrape = "_text";

try {

// prepare and bind
$stmt = $conn->prepare("INSERT INTO matchi (m_date, m_hometeam, m_awayteam, m_round, m_com_id, m_sv_link, m_livescore_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("diiiisi", $m_date, $m_hometeam, $m_awayteam, $m_round, $m_com_id, $m_sv_link, $m_livescore_id);

$client = new Client();

while($row = $matches->fetch_assoc()) {

$crawler = $client->request('GET', $row['com_fixtures_link']);
// $competitionFixtureRaw = $crawler->filter($css_selector)->extract('href');

$competitionFixtureRaw = $crawler->filter('tr.predict')->each(function ($tr, $i) { 
        return $tr->filter('td')->each (
          function ($td, $i) 
        { 
            if($i==9) 
              { return $td->filter('a')->extract('href')[0]; } 
                else 
                  {
                    return trim($td->text()); 
                  }
          });
      
    });
      foreach ($competitionFixtureRaw as $key => $value) {           
         //get team Id from Teams table
          $sql1 = "SELECT t_id FROM teams WHERE t_name = '".$value[3]."' AND t_c_id = '".$row['com_c_id']."'";
          $sql2 = "SELECT t_id FROM teams WHERE t_name = '".$value[5]."' AND t_c_id = '".$row['com_c_id']."'";
          $ht_q = $conn->query($sql1)->fetch_assoc() or die($conn->error);
          $at_q = $conn->query($sql2)->fetch_assoc() or die($conn->error);

          $m_date = strtotime($value[0]);
          $m_hometeam = $ht_q['t_id'];          
          $m_awayteam = $at_q['t_id'];
          $m_round = $value[1];
          $m_com_id = $row['com_id'];
          $m_sv_link = 'https://soccervista.com'.$value[9];
          $m_livescore_id = explode("-", $m_sv_link)[2];
          $stmt->execute();
          echo 'm_awayteam: '. $m_hometeam.'-----  ';
          echo 'updated '.$m_livescore_id. ' /n\ ';


      }

        }
         }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
echo 'bingo /<br />';