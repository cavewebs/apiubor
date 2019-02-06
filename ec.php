
<?php
require 'vendor/autoload.php';
use Goutte\Client;

require 'db.php';

$client = new Client();

$tot_todo = $conn->query("SELECT MAX(com_id) as highestId FROM competitions WHERE com_status != '6'")->fetch_assoc() or die($conn->error);
echo $tot_todo['highestId'].'<br> -----------------------<br>'; 
$j=135;
while ($j <= $tot_todo['highestId']){
	//get the country id and link from db
$matches = $conn->query("SELECT * FROM competitions WHERE com_id='".$j."' AND com_status !='6'") or die($conn->error);

 while ($row =  $matches->fetch_assoc()) {
                echo 'the com being processed is: '.$row['com_id'].'<br />';  

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
					$stmt = $conn->prepare("INSERT INTO matches (m_date, m_hometeam, m_awayteam, m_round, m_com_id, m_sv_link, m_livescore_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
      				$stmt->bind_param("diiiisi", $m_date, $m_hometeam, $m_awayteam, $m_round, $m_com_id, $m_sv_link, $m_livescore_id);
      				    $stmt->execute();

					if ($stmt){
                    echo "Just inserted :".$m_livescore_id.'<br />';
                } else {
                	echo 'bye';
                	
                }
      				}
      				
      $update_fixtured = $conn->query("UPDATE competitions set com_status='6' WHERE com_id='".$row['com_id']."'");
      if($update_fixtured){
      	echo 'Updated '.$row['com_id'].'<br />';
      
      }//while row
}
$j++;
}
?>
