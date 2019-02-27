<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td{
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        font-weight:bold;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .main{
        margin-top: 100px;
    }
</style>
<body>
<?php

use GuzzleHttp\Client;

require './vendor/autoload.php';

$endpoint = 'latest';
$endpoint2 = 'symbols';
$access_key = '68bb2282c3672aeb6eea7c46c9bcdc6f';

$myClient = new GuzzleHttp\Client([
    'base_uri' => 'data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.''
]);
//var_dump($myClient);
$response = $myClient->request('GET');
$decoded = json_decode($response->getBody()->getContents(), true);

$myClient2 = new GuzzleHttp\Client([
    'base_uri' => 'data.fixer.io/api/'.$endpoint2.'?access_key='.$access_key.''
]);

$response2 = $myClient2->request('GET');
$decoded2 = json_decode($response2->getBody()->getContents(), true); ?>

<div class="container">
    <header class="row justify-content-center">
        <h1><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i>
            Currency rates on <?php echo $decoded['date'] ?> <i class="fas fa-euro-sign"></i><i class="fas fa-euro-sign"></i><i class="fas fa-euro-sign"></i></h1>
    </header>
    <div class="row justify-content-center main">
        <div class="col-6 ">
            <table>
                <tr>
                    <th>Qty</th>
                    <th>Base</th>
                    <th>Rates</th>
                    <th>Currency</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $decoded['base'] ?></td>
                    <td><?php echo $decoded['rates']['BGN'] ?></td>
                    <td> <?php echo $decoded2['symbols']['BGN']; ?></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $decoded['base'] ?></td>
                    <td><?php echo $decoded['rates']['DKK'] ?></td>
                    <td> <?php echo $decoded2['symbols']['DKK']; ?></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $decoded['base'] ?></td>
                    <td><?php echo $decoded['rates']['USD'] ?></td>
                    <td> <?php echo $decoded2['symbols']['USD']; ?></td>
                </tr>
                <td>1</td>
                <td><?php echo $decoded['base'] ?></td>
                <td><?php echo $decoded['rates']['GBP'] ?></td>
                <td> <?php echo $decoded2['symbols']['GBP']; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-6 justify-content-center">
            <h1>History</h1>
            <form action="fecth.php" method="post">
                <div class="form-group">
                    <input type="date" name="date" class="form-control">
                    <input type="submit" value="Fetch" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>