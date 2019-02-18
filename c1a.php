
<?php
require 'vendor/autoload.php';
use Goutte\Client;

require 'db.php';

//get the country id and link from db
$sql = "SELECT * FROM competition_season WHERE cs_group !='NO_GROUP' AND cs_com_id =398 AND cs_status!=0";
$matches = $conn->query($sql);

$css_selector = "tbody tr.predict td a";
$fixtures_css_selector = "div.menu2 a";
$thing_to_scrape = "_text";


$client = new Client();
try {
while($row = $matches->fetch_assoc()) {

   $compName = $conn->query('SELECT com_name FROM competitions WHERE com_id="'.$row['cs_com_id'].'"')->fetch_assoc()['com_name'];
 print_r($compName);
 echo "<br>";
     $groupName = str_replace($compName, "", $row['cs_group']);
  
            $conn->query('UPDATE competition_standings SET cx_group="'.$groupName.'" WHERE cx_com_id="'.$row['cs_com_id'].'" AND cx_season ="'.$row['cs_name'].'"');
        }
       }
      catch(PDOException $e){
        echo "Error: " . $e->getMessage();
      }
$conn = null;
echo 'bingo /<br />';