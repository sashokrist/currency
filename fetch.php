<?php
use GuzzleHttp\Client;

        require './vendor/autoload.php';

        session_start();

        $endpoint = 'latest';
        $endpoint2 = 'symbols';

        $access_key = '68bb2282c3672aeb6eea7c46c9bcdc6f';

        $myClient = new GuzzleHttp\Client([
            'base_uri' => 'data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.''
        ]);
        //var_dump($myClient);
        $response = $myClient->request('GET');
        $decoded = json_decode($response->getBody()->getContents(), true);
        $_SESSION['decode'] = $decoded;
        //var_dump($_SESSION['decode']);

        $myClient2 = new GuzzleHttp\Client([
            'base_uri' => 'data.fixer.io/api/'.$endpoint2.'?access_key='.$access_key.''
        ]);
        
        $response2 = $myClient2->request('GET');
        $decoded2 = json_decode($response2->getBody()->getContents(), true);
        $_SESSION['decode2'] = $decoded2;
        //var_dump($_SESSION['decode2']);

       