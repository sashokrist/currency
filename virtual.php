<?php 
use GuzzleHttp\Client;

require './vendor/autoload.php';

//session_start();

    $myClient3 = new GuzzleHttp\Client([
        'base_uri' => 'https://api.coinlore.com/api/ticker/?id=90'
    
    ]);
    //var_dump($myClient);
    $response = $myClient3->request('GET');    
    $bitcoin = json_decode($response->getBody()->getContents(), true);
    $_SESSION['bitcoin'] = $bitcoin;

    $myClient4 = new GuzzleHttp\Client([
        'base_uri' => 'https://api.coinlore.com/api/ticker/?id=80'
    
    ]);
    //var_dump($myClient);
    $response2 = $myClient4->request('GET');    
    $ethereum = json_decode($response2->getBody()->getContents(), true);
    $_SESSION['ethereum'] = $ethereum;
    //var_dump($_SESSION['ethereum']);


