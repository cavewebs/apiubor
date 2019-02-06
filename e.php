
<?php
require 'vendor/autoload.php';
use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);

//GET MATCH DETAILS
require 'db.php';
$j=1;
      
$client = new Client();
try {
    //begin the transaction
    $conns->beginTransaction();
$matches = $conn->query("SELECT m_sv_link, m_id FROM matches WHERE m_status !='79'") or die($conn->error);
while($row =  $matches->fetch_assoc()){
if($row !=NULL){
  if($j<50){
                echo 'the Match being processed is: '.$row['m_id'].'<br />';  

          $crawler = $client->request('GET', $row['m_sv_link']);
          $competitionMatch = $crawler->filter('table#gamec')->each(function ($tr, $i) { 
                  return $tr->filter('td[colspan=4]')->each (
                    function ($td, $i) 
                  { 
                     
                    return trim($td->text()); 
                    });
                
              });
              foreach ($competitionMatch as $key => $value) { 
                // print_r($competitionMatch);
                $ms_date = $value[0];
                $m_time = explode(" ", $value[1])[0];
                $m_date = strtotime($ms_date);
                echo "old date is: ".$ms_date."While new date is ".$m_date." to convert it i will get: ".date("d-m-Y", $m_date);
                echo "<br>".$m_time;
              // $conns->commit();
              $update_fixtured = $conn->query('UPDATE matches set m_status="79", m_date = "'.$m_date.'", m_time = "'.$m_time.'" WHERE m_id = "'.$row['m_id'].'"') or die($conn->error);
              if($update_fixtured){
                echo '<p>Updated '.$row['m_id'].' with date: '.$m_date.' and time: '.$m_time. '<br /></p>';
              
              }
            }
          }
        }
            }// for each
          }// if row !=nu;;
      
      
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
echo "we Made it, We are rich, No like really rich";

?>