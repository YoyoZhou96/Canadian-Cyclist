<!--Data Connection Coded by Shan He-->
<!--MySQL Data Fetching Coded by Yao Zhou-->

<?php

// Username is root
$user = 'root';
$password = ''; 
  
// Database name is capstone
$database = 'capstone'; 
  
// Server is localhost with
// port number 3306
$servername='localhost:3306';

$connection = new mysqli($servername,$user, 
$password, $database);

// Checking for connections

if ($connection->connect_error) {
    die('Connect Error (' . 
    $connection->connect_errno . ') '. 
    $connection->connect_error);
}
// else {
//     echo "Success" . $connection->error;
// }


//SQL query to select data from database

// $id = 0;

if (isset($_GET["productid"])) {
    $id = $_GET["productid"];
}

$id1 = $id[0];
$id2 = $id[1];


$sql1 = "SELECT year, model, type, sub_type, make, model, electric, sizes, frame_rear_shock, fork, front_suspension, rear_suspension, crank,
rear_cogs, front_derailleur, rear_derailleur, shifters, brakeset, brakelevers, hubs_front_or_rear, rims_or_wheelset, pedals, tires, features_accessories, price, website FROM full_cycle_2020_rev1 
WHERE productid = $id1";

$sql2 = "SELECT year, model, type, sub_type, make, model, electric, sizes, frame_rear_shock, fork, front_suspension, rear_suspension, crank,
rear_cogs, front_derailleur, rear_derailleur, shifters, brakeset, brakelevers, hubs_front_or_rear, rims_or_wheelset, pedals, tires, features_accessories, price, website FROM full_cycle_2020_rev1 
WHERE productid = $id2";

$result1 = $connection->query($sql1);
$rows1=$result1->fetch_assoc();

$result2 = $connection->query($sql2);
$rows2=$result2->fetch_assoc();


$connection->close(); 
?>

<!-- HTML Layout coded by Dharani Pandya -->
<!--PHP data fetching and displaying coded by Yao Zhou, Shan He -->
<!--Css Styling modified by Shan He, Yao Zhou-->

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail's of Bicycle</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html{
            background-color: white;
        }

        body {

            background-color: white;
            width: 1250px;
            margin: 0 auto;
            border: 1px solid black;
            font-family: "Times New Roman", Times, serif;
        }

        h1 {
            text-align: center;
        }

        h2,
        h3,
        h4 {
            padding: 15px;
        }

        .price {
            float: right;
            text-align: center;
        }

        .banner {
            width: 100%;
            display: block;
        }

        .banner>.banner-image {
            width: 100%;
            display: block;
        }
        input{
            border: none;
        }
        .form-group{
            padding: 15px;
        }
        label{
           width: 50px;

        }
        .form-control
        {
            padding: 5px;
        }
        label{
            float: left;
            width: 200px;
            text-align: left;
        }
        input{
            width: 550px;
            padding-left: 5px; 
        }
        section{
            width: 525px;
            float: right;
            
        }
        aside{
            width: 215px;
            float: right;
            
        }
        .column {
        float: left;
        width: 45%;
        padding: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }
        footer{
          height: 30px;
          text-align: center;
          font-size: 14px;
          background-color: red;
          color: white;
          padding: 5px;
          padding-top: 15px;
        }

    </style>
</head>

<body class="container">
    <header>
        <h1>Canadian Cyclists</h1>
        <div class="banner">
            <img class="banner-image" src="header_photo.jpg" alt="Race photo" height="100px">
        </div>
    </header>

    <h1>Compare selected Bicycles</h1>
<!-- 
    <input onclick="history.go(-1)" type="button" value="Return"> -->
    <form method = "POST">
    <div class= "row">
        <div class = "column" class="form-group">
        <h3 class="price"> Price $<?php print_r($rows1['price']);?></h3>
        <h4><i class="fas fa-bicycle"></i> <?php print_r($rows1['type']);?> | Model: <?php print_r($rows1['model']);?></h4>
            <label for="year">Year</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['year']);?>" name="" id=""><br>
            <label for="subtype">Sub Type</label>
            <input class="form-control"type="text" value="<?php print_r($rows1['sub_type']);?>" name="" id=""><br>
            <label for="make">Make</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['make']);?>" name="" id=""><br>
            <label for="model">Model</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['model']);?>" name="" id=""><br>
            <label for="electric">Electric</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['electric']);?>" name="" id=""><br>
            <label for="sizes">Sizes</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['sizes']);?>" name="" id=""><br>
            <label for="frame">Frame and rear shock</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['frame_rear_shock']);?>" name="" id=""><br>
            <label for="fork">Fork</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['fork']);?>" name="" id=""><br>
            <label for="front_suspension">Front Suspension</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['front_suspension']);?>"><br>
            <label for="rear_suspension">Rear Suspension</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['rear_suspension']);?>"><br>
            <label for="crank">Crank</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['crank']);?>"><br>
            <label for="rear_cogs">Rear Cogs</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['rear_cogs']);?>"><br>
            <label for="front_derailleur">Front Derailleur</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['front_derailleur']);?>"><br>
            <label for="rear_derailleur">Rear Derailleur</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['rear_derailleur']);?>"><br>
            <label for="shifters">Shifters</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['shifters']);?>"><br>
            <label for="brake set">Brake Set</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['brakeset']);?>"><br>
            <label for="brake_levers">Brake Levers</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['brakelevers']);?>"><br>
            <label for="hubs">Hubs(Front/Rear)</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['hubs_front_or_rear']);?>"><br>
            <label for="rims">Rims/Wheelset</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['rims_or_wheelset']);?>"><br>
            <label for="pedals">Pedals</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['pedals']);?>"><br>
            <label for="tires">Tires</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['tires']);?>"><br>
            <label for="features_and_accessories">Features & Accessories</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['features_accessories']);?>"><br>
            <label for="website">Website</label>
            <input class="form-control" type="text" value="<?php print_r($rows1['website']);?>"><br>
        </div>

        <div class = "column" class="form-group">
        <h3 class="price"> Price $<?php print_r($rows2['price']);?></h3>
        <h4><i class="fas fa-bicycle"></i> <?php print_r($rows2['type']);?> | Model: <?php print_r($rows2['model']);?> </h4>
            <label for="year">Year</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['year']);?>" name="" id=""><br>
            <label for="subtype">Sub Type</label>
            <input class="form-control"type="text" value="<?php print_r($rows2['sub_type']);?>" name="" id=""><br>
            <label for="make">Make</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['make']);?>" name="" id=""><br>
            <label for="model">Model</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['model']);?>" name="" id=""><br>
            <label for="electric">Electric</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['electric']);?>" name="" id=""><br>
            <label for="sizes">Sizes</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['sizes']);?>" name="" id=""><br>
            <label for="frame">Frame and rear shock</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['frame_rear_shock']);?>" name="" id=""><br>
            <label for="fork">Fork</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['fork']);?>" name="" id=""><br>
            <label for="front_suspension">Front Suspension</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['front_suspension']);?>"><br>
            <label for="rear_suspension">Rear Suspension</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['rear_suspension']);?>"><br>
            <label for="crank">Crank</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['crank']);?>"><br>
            <label for="rear_cogs">Rear Cogs</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['rear_cogs']);?>"><br>
            <label for="front_derailleur">Front Derailleur</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['front_derailleur']);?>"><br>
            <label for="rear_derailleur">Rear Derailleur</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['rear_derailleur']);?>"><br>
            <label for="shifters">Shifters</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['shifters']);?>"><br>
            <label for="brake set">Brake Set</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['brakeset']);?>"><br>
            <label for="brake_levers">Brake Levers</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['brakelevers']);?>"><br>
            <label for="hubs">Hubs(Front/Rear)</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['hubs_front_or_rear']);?>"><br>
            <label for="rims">Rims/Wheelset</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['rims_or_wheelset']);?>"><br>
            <label for="pedals">Pedals</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['pedals']);?>"><br>
            <label for="tires">Tires</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['tires']);?>"><br>
            <label for="features_and_accessories">Features & Accessories</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['features_accessories']);?>"><br>
            <label for="website">Website</label>
            <input class="form-control" type="text" value="<?php print_r($rows2['website']);?>"><br>
        </div>
    </div>
    </form>

    <footer>&copy; 2021 Robust Routine</footer>
</body>

</html>
