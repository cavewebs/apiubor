
<?php
require 'vendor/autoload.php';
// use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Symfony\Component\DomCrawler\Crawler;
use Nesk\Puphpeteer\Puppeteer;
use Nesk\Puphpeteer\Puppeteer;
use Nesk\Rialto\Data\JsFunction;
use Nesk\Puphpeteer\Resources\ElementHandle;
use Sunra\PhpSimple\HtmlDomParser;

// use Symfony\Component\Panther\Client;
// $client = \Symfony\Component\Panther\Client::createChromeClient();

//GET MATCH DETAILS
require 'db.php';
$j=1;
  // $url = "https://www.soccervista.com/Chelsea-Tottenham_Hotspur-2949344-2949344.html";    
  // $url = "https://www.soccervista.com/Tottenham_Hotspur-Borussia_Dortmund-2947299-2947299.html";  
  $url = "https://www.livescore.cz/gameinfo2.php?switch=new&id=2782197";  
// $client = new Client::createChromeClient();
// $client->createChromeClient();

$dmatches = $conn->query('SELECT * FROM matches WHERE m_status !=34 ORDER BY m_id ASC LIMIT 1');

while ($row = $dmatches->fetch_assoc()) {
$puppeteer = new Puppeteer;
$browser = $puppeteer->launch();

$page = $browser->newPage();
$page->goto($url);
$page->screenshot(['path' => 'example.png']);

$browser->close();
}
?>