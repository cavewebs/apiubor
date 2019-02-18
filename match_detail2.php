
<?php
require 'vendor/autoload.php';
// use Goutte\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use JonnyW\PhantomJs\Client;

//GET MATCH DETAILS
require 'db.php';
$j=1;
  $url = "https://www.livescore.cz/gameinfo2.php?id=2782174";    

    $client = Client::getInstance();
$client->getEngine()->setPath('/usr/bin/phantomjs');    
    $client->getEngine()->addOption('--ignore-ssl-errors=true');

    /** 
     * @see JonnyW\PhantomJs\Http\Request
     **/
    $request = $client->getMessageFactory()->createRequest($url, 'GET');

    /** 
     * @see JonnyW\PhantomJs\Http\Response 
     **/
    $response = $client->getMessageFactory()->createResponse();

    // Send the request
    $client->send($request, $response);

    if($response->getStatus() === 200) {

        // Dump the requested page content
        echo $response->getContent();
    }

     echo $response->getContent();
        print_r($response->getHeaders());
        print_r($response->getStatus());
        print_r($response->getConsole());


?>