
<?php
require 'vendor/autoload.php';
use Goutte\Client;

require 'db.php';

//get the country id and link from db
$sql = "SELECT * FROM competition_seasons where cs_status !=79 and cs_standings_link!='' ";
$matches = $conn->query($sql);

$css_selector = "tbody tr.predict td a";
$fixtures_css_selector = "div.menu2 a";
$thing_to_scrape = "_text";


// prepare and bind
$stmt = $conn->prepare("INSERT INTO teams (t_name, t_c_id) VALUES (?, ?)");
$stmt->bind_param("si", $t_name, $t_c_id);


$stmt2 = $conn->prepare("INSERT INTO competition_standings (

cx_t_id, cx_season, cx_position, cx_points, cx_matches, cx_won, cx_draw, cx_loss, cx_goals_for, cx_goals_against, cx_com_id, cx_group) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt2->bind_param("isiiiiiiiiis", $cx_t_id, $cx_season, $cx_position, $cx_points, $cx_matches, $cx_won, $cx_draw, $cx_loss, $cx_goals_for, $cx_goals_against, $cx_com_id, $cx_group);


$client = new Client();

while($row = $matches->fetch_assoc()) {
  // if ($row['com_c_id'] > 1079){
try {
$crawler = $client->request('GET', $row['cs_standings_link']);
// $crawler = $client->request('GET', $row['cs_standings_link']);
// $competitionFixtureRaw = $crawler->filter($css_selector)->extract('href');

$standing = $crawler->filter('table.all tbody')->eq(0)->each(function ($tr, $i) { 
                  return $tr->filter('tr')->each (
                    function ($td, $i) { 
                    // if() 
                    return $td->filter('td')->each(function($t, $i){
                      return $t->text();
                    }); 
                    });
              });
                    // print_r($standing);
            $i = 1;
            foreach ($standing as $ke => $valu) {
              foreach ($valu as $key => $value) {
                if(!empty($value[7])) { 
                
                    $teamn = $value[1]; $cx_position = $value[0]; $cx_points = $value[7]; $cx_matches = $value[2]; $cx_won = $value[3]; $cx_draw = $value[4]; $cx_loss = $value[5]; $cx_goals_for = explode(":", $value[6])[0]; $cx_goals_against = explode(":", $value[6])[1];
                    $cx_season = $row['cs_name']; $cx_com_id = $row['cs_com_id'];  $cx_group=$row['cs_group'];     
                        $t_name = $value[1];

                        // $cx_com_id = $conn->query('SELECT * FROM competitions WHERE com_id ="'.$row['cx_com_id'].'"')->fetch_assoc()['t_c_id'];


                        $t_c_id = $conn->query('SELECT * FROM competitions WHERE com_id ="'.$row['cs_com_id'].'"')->fetch_assoc()['com_c_id'];
                        // $t_c_id = $row['com_c_id'];
                                  echo "<br>".$value[1].' P-> '. $value[2].' W-> '.$value[3].' D-> '.$value[4].' L-> '.$value[5].' G-> '.$value[6].' Pt-> '.$value[7]. ' <br> <br>';    
                      // try{
                      //   $stmt->execute();
                      //   }
                      //   catch(PDOException $e){
                      //     echo "Error: " . $e->getMessage();
                      //   }

                        $cx_t_id = $conn->query('SELECT * FROM teams WHERE t_name ="'.$t_name.'" AND t_c_id = "'.$t_c_id.'"')->fetch_assoc()['t_id'];
                        try {

                        $stmt2->execute();
                        echo '<br> inserted '.$t_name. ' /n <br />';
                             // $i++;}
                        }
                        catch(PDOException $e){
                          echo "Error: " . $e->getMessage();
                        }
                    }

                }
            }
            $conn->query('UPDATE competition_seasons SET cs_status=79 WHERE cs_id="'.$row['cs_id'].'"');
    } catch(Exception $e) { // I guess its InvalidArgumentException in this case         
    }      
  }//end while round
        
$conn = null;
echo 'bingo /<br />';