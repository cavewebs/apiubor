
<?php
require 'vendor/autoload.php';
use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'db.php';
$j=1;
      // prepare and bind
      $stmt = $conn->prepare("INSERT INTO matches (m_date, m_hometeam, m_awayteam, m_round, m_com_id, m_sv_link, m_livescore_id, m_season) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("diiiisis", $m_date, $m_hometeam, $m_awayteam, $m_round, $m_com_id, $m_sv_link, $m_livescore_id, $m_season);

$client = new Client();
try {
    // begin the transaction
    $conns->beginTransaction();
$matches = $conn->query("SELECT * FROM competition_seasons WHERE cs_md_status !='12' ORDER BY cs_name ASC ") or die($conn->error);
while($row =  $matches->fetch_assoc()){
                echo 'the com being processed is: '.$row['cs_id'].'<br />';  
    try{
          $crawler = $client->request('GET', $row['cs_results_link']);
          // $competitionFixtureRaw = $crawler->filter($css_selector)->extract('href');
          try{
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
          // print_r($competitionFixtureRaw);
                foreach ($competitionFixtureRaw as $key => $valu) { 
                   $comCid = $conn->query('SELECT * FROM competitions WHERE com_id="'.$row['cs_com_id'].'" LIMIT 1')->fetch_assoc()['com_c_id'];
                   echo "<br>".$comCid."<br>";
                   $value = array_map('trim', $valu);
                   // var_dump($value[3]);


               $sql1 = 'SELECT t_id FROM teams WHERE t_name ="'.trim($value[3], "\xC2\xA0\n").'" AND t_c_id = "' .$comCid.'"';
                    $sql2 = 'SELECT t_id FROM teams WHERE t_name ="'.trim($value[5], "\xC2\xA0\n").'" AND t_c_id = "'.$comCid.'"';
                    echo "<br>SQL1 =".$sql1.'<br>';
                    echo "<br>SQL2 =".$sql2.'<br>';
                    $ht_q = $conn->query($sql1)->fetch_assoc() ;
                    $at_q = $conn->query($sql2)->fetch_assoc() ;
                    echo "<br>htq = "; var_dump($ht_q);
                    echo "<br>Atq = "; var_dump($at_q);
                    $m_date = strtotime($value[0]);
                    if($ht_q){$m_hometeam = $ht_q['t_id'];} else {$m_hometeam =0; echo 'There was no result';}
                    if($at_q){$m_awayteam = $at_q['t_id'];} else {$m_awayteam =0; echo 'no result <br />';}
                    $m_round = $value[1];
                    $m_com_id = $row['cs_com_id'];
                    $m_s_link = "https://www.soccervista.com".$value[9];
                    $m_sv_link = mysqli_real_escape_string($conn, $m_s_link);
                    $m_livescore_id = intval(explode("-", $value[9])[2]);
                    $m_season = $row['cs_name'];
                    echo 'date: '.$m_date.'<br />'; 
                    echo 'hometeam: '.$value[3].'-'. $m_hometeam.'<br />'; 
                    echo 'Awayteam: '.$value[5].' -'. $m_awayteam.'<br />'; 
                    echo 'round: '.$m_round.'<br />'; 
                    echo 'competion Id: '.$m_com_id.'<br />'; 
                    echo 'The Link: '.$m_sv_link.'<br />'; 
                    echo 'Livescore Id: '.$m_livescore_id .'<br />';
                  $stmt->execute();

          if ($stmt){
                    echo "Just inserted :".$m_livescore_id.'<br />';
                } else {
                  echo 'bye';
                  
                }
              }
              // $conns->commit();
              $update_fixtured = $conn->query("UPDATE competition_seasons set cs_md_status='12' WHERE cs_id='".$row['cs_id']."'");
              if($update_fixtured){
                echo 'Updated '.$row['cs_id'].'<br />';
              
              }
          } catch(Exception $e){
          $eroo[] = "Sometin went rong: ". $e;
          }
        } catch(Exception $e){
          $eroo[] = "error occured: ".$e;
        }
      }
      } 
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
echo "we Made it, We are for D1 rich <br>";

?>