
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
$int_tim = $conn->query('SELECT * FROM teams WHERE t_c_id ="1109" AND t_stat <"11"') or die($conn->error);
while($row =  $int_tim->fetch_assoc()){
if($row !=NULL){
               
$int_tim2 = $conn->query('SELECT * FROM matches WHERE m_hometeam ="'.$row['t_id'].'"') or die($conn->error);
while($row2 =  $int_tim2->fetch_assoc()){
    // var_dump($row2);

echo " I selected ". $row['t_name']." with ID ".$row2['m_hometeam'];
$int_tim3 = $conn->query('SELECT * FROM teams WHERE t_name ="'.$row['t_name'].'" AND t_c_id !=1109') or die($conn->error);
if($int_tim3){
while($row3 =  $int_tim3->fetch_assoc()){
  echo "<br>replacing it with ".$row3['t_id'];



                
              $update_fixtured = $conn->query('UPDATE matches set m_status="79", m_hometeam = "'.$row3['t_id'].'" WHERE m_id = "'.$row2['m_id'].'"') or die($conn->error);
              
              }
            }//row3
              // if($update_fixtured){
                // $conn->query('UPDATE teams SET t_stat="1" WHERE t_id ="'.$row['t_id'].'"') or die($conn->error);
                // echo '<p>Updated '.$row['m_id'].' with date: '.$m_date.' and time: '.$m_time. '<br /></p>';
          // }

           // if iint tim3
        }// row 2

        $conn->query('UPDATE teams SET t_stat="11" WHERE t_id ="'.$row['t_id'].'"') or die($conn->error);

      }//row != null 
            }// row
echo "we Made it, We are rich, No like really rich";
          }// try
      
      
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;

?>