<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Currency Rates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
    body{
        width: 100%;
    }
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
require 'fetch.php';
require 'virtual.php';

//session_start();

$data = $_SESSION["bitcoin"];
$eth = $_SESSION["ethereum"];

if(isset($_REQUEST['date'])){

    $date = $_REQUEST['date'];
    $myClient3 = new GuzzleHttp\Client([
        'base_uri' => 'http://data.fixer.io/api/'.$date.'?access_key=68bb2282c3672aeb6eea7c46c9bcdc6f&symbols=BGN,GBP,USD,EUR,DKK'
    
    ]);
    //var_dump($myClient);
    $response = $myClient3->request('GET');    
    $decoded3 = json_decode($response->getBody()->getContents(), true);  
}

?>

<div class="container">
    <header class="row justify-content-center">
        <h1><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i>
            Currency rates on <?php echo $_SESSION["decode"]['date'] ?> <i class="fas fa-euro-sign"></i><i class="fas fa-euro-sign"></i><i class="fas fa-euro-sign"></i></h1>
    </header>
    <div class="row justify-content-center main">
        <div class="col-6 "> <hr>
        <h3>Currency</h3> <hr>
            <table>
                <tr>
                    <th>Qty</th>
                    <th>Base</th>
                    <th>Rates</th>
                    <th>Currency</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $_SESSION["decode"]['base'] ?></td>
                    <td><?php echo $_SESSION["decode"]['rates']['BGN'] ?></td>
                    <td> <?php echo $_SESSION["decode2"]['symbols']['BGN']; ?></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $_SESSION["decode"]['base'] ?></td>
                    <td><?php echo $_SESSION["decode"]['rates']['DKK'] ?></td>
                    <td> <?php echo $_SESSION["decode2"]['symbols']['DKK']; ?></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $_SESSION["decode"]['base'] ?></td>
                    <td><?php echo $_SESSION["decode"]['rates']['USD'] ?></td>
                    <td> <?php echo $_SESSION["decode2"]['symbols']['USD']; ?></td>
                </tr>
                <td>1</td>
                <td><?php echo $_SESSION["decode"]['base'] ?></td>
                <td><?php echo $_SESSION["decode"]['rates']['GBP'] ?></td>
                <td> <?php echo $_SESSION["decode2"]['symbols']['GBP']; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-6 justify-content-center">
            <h1>History of rates</h1>
            <form action="" method="post">
                <div class="form-group">
                    <input type="date" name="date" class="form-control">
                    <input type="submit" value="Fetch" class="form-control btn btn-primary">
                </div>
            </form>
            <?php if(isset($_REQUEST['date'])){  ?>
                <h3 class="his">History of rates for <?php echo $decoded3['date'] ?> </h3>
                <table>
                <tr>
                    <th>Qty</th>
                    <th>Base</th>
                    <th>Rates</th>
                    <th>Currency</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $decoded3['base'] ?></td>
                    <td><?php echo $decoded3['rates']['BGN'] ?></td>
                    <td> <?php echo $_SESSION["decode2"]['symbols']['BGN']; ?></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $decoded3['base'] ?></td>
                    <td><?php echo $decoded3['rates']['DKK'] ?></td>
                    <td> <?php echo $_SESSION["decode2"]['symbols']['DKK']; ?></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $decoded3['base'] ?></td>
                    <td><?php echo $decoded3['rates']['USD'] ?></td>
                    <td> <?php echo $_SESSION["decode2"]['symbols']['USD']; ?></td>
                </tr>
                <td>1</td>
                <td><?php echo $decoded3['base'] ?></td>
                <td><?php echo $decoded3['rates']['GBP'] ?></td>
                <td> <?php echo $_SESSION["decode2"]['symbols']['GBP']; ?></td>
                </tr>
            </table> 

            <?php } ?>
           
        </div>
    </div>
 
</div>
<div class="container">
    <div class="col-6">   <hr>
        <h3>Virtual Currency</h3> <hr>
        <table>
            <tr>
                <th>Qty</th>
                <th>Symbol</th>
                <th>Name</th>
                <th>Rates USD</th>
                <th>Change 24h</th>
            </tr>
            <tr>
                <td>1</td>
                <td><?php echo $data[0]['symbol']; ?></td>
                <td><?php echo $data[0]['name']; ?></td>
                <td><?php echo $data[0]['price_usd']; ?></td>
                <td><?php echo $data[0]['percent_change_24h']; ?></td>
            </tr>
            <tr>
                <td>1</td>
                <td><?php echo $eth[0]['symbol']; ?></td>
                <td><?php echo $eth[0]['name']; ?></td>
                <td><?php echo $eth[0]['price_usd']; ?></td>
                <td><?php echo $eth[0]['percent_change_24h']; ?></td>
            </tr>
            
        </table>
    </div>
</div>
</body>
</html>