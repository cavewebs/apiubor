
<?php
require 'vendor/autoload.php';
use Browser\Casper;

  $url = "https://www.livescore.cz/gameinfo2.php?switch=new&id=1989781";  
  $casper = new Casper();

// forward options to phantomJS
// for example to ignore ssl errors
$casper->setOptions([
    'ignore-ssl-errors' => 'yes'
]);

// navigate to google web page
$casper->start('http://www.google.com');

// fill the search form and submit it with input's name
$casper->fillForm(
        'form[action="/search"]',
        array(
                'q' => 'search'
        ),
        true);

// or with javascript selectors:
$casper->fillFormSelectors(
        'form.form-class',
        array(
                'input#email-id' => 'user-email',
                'input#password-id'   =>  'user-password'
        ),true);

// wait for 5 seconds (have a coffee)
$casper->wait(5000);

// wait for text if needed for 3 seconds
$casper->waitForText('Yahoo', 3000);

// or wait for selector
$casper->waitForSelector('.gbqfb', 3000);

// make a screenshot of the google logo
$casper->captureSelector('#hplogo', '/tmp/logo.png');

// or take a screenshot of a custom area
$casper->capture(
    array(
        'top' => 0,
        'left' => 0,
        'width' => 800,
        'height' => 600
    ),
    '/tmp/custom-capture.png'
);

// click the first result
$casper->click('h3.r a');

// switch to the first iframe
$casper->switchToChildFrame(0);

// make some stuff inside the iframe
$casper->fillForm('#myForm', array(
    'search' => 'my search',
));

// go back to parent
$casper->switchToParentFrame();

// run the casper script
$casper->run();

// check the urls casper get through
var_dump($casper->getRequestedUrls());

// need to debug? just check the casper output
var_dump($casper->getOutput());
?>