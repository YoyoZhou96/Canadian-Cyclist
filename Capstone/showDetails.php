<!--Data Connection Coded by Shan He-->
<!--MySQL Data Fetching Coded by Shan He, Yao Zhou-->

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
  


// SQL query to select data from database

$id = 0;

if (isset($_GET["detail_id"])) {
    $id = $_GET["detail_id"];
}
//echo $id;

$sql = "SELECT year, model, type, sub_type, make, model, electric, sizes, frame_rear_shock, fork, front_suspension, rear_suspension, crank,
rear_cogs, front_derailleur, rear_derailleur, shifters, brakeset, brakelevers, hubs_front_or_rear, rims_or_wheelset, pedals, tires, features_accessories, price, website FROM full_cycle_2020_rev1 
WHERE productid = $id";

$result = $connection->query($sql);

$rows=$result->fetch_assoc();

$connection->close(); 
?>

<!-- HTML Layout coded by Dharani Pandya -->
<!--PHP data fetching and displaying coded by Shan He -->

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
            width: 850px;
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

        .button {
          float: right;
          text-align:center;
          font-size: 15px;
          width: 150px;
          height: 40px;
          color: white;
          background-color: red;
          cursor: pointer;
          margin-top: 20px;
        }
        .button a{
            color: white;
            text-decoration: none;
            font-weight: bold;
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

    <h1>Details of selected Bicycle</h1>
    <h3 class="price"> Price $<?php print_r($rows['price']);?></h3>
    <h3>Model: <?php print_r($rows['model']);?></h3>
    <h4><i class="fas fa-bicycle"></i> <?php print_r($rows['type']);?> | <i class="fas fa-tools"></i> 
    <?php print_r($rows['frame_rear_shock']);?></h4>
    <h2>Specifications</h2>
    <form method = "POST">
    
        <div class="form-group">
            <label for="year">Year</label>
            <input class="form-control" type="text" value="<?php print_r($rows['year']);?>" name="" id=""><br>
            <label for="subtype">Sub Type</label>
            <input class="form-control"type="text" value="<?php print_r($rows['sub_type']);?>" name="" id=""><br>
            <label for="make">Make</label>
            <input class="form-control" type="text" value="<?php print_r($rows['make']);?>" name="" id=""><br>
            <label for="model">Model</label>
            <input class="form-control" type="text" value="<?php print_r($rows['model']);?>" name="" id=""><br>
            <label for="electric">Electric</label>
            <input class="form-control" type="text" value="<?php print_r($rows['electric']);?>" name="" id=""><br>
            <label for="sizes">Sizes</label>
            <input class="form-control" type="text" value="<?php print_r($rows['sizes']);?>" name="" id=""><br>
            <label for="frame">Frame and rear shock</label>
            <input class="form-control" type="text" value="<?php print_r($rows['frame_rear_shock']);?>" name="" id=""><br>
            <label for="fork">Fork</label>
            <input class="form-control" type="text" value="<?php print_r($rows['fork']);?>" name="" id=""><br>
            <label for="front_suspension">Front Suspension</label>
            <input class="form-control" type="text" value="<?php print_r($rows['front_suspension']);?>"><br>
            <label for="rear_suspension">Rear Suspension</label>
            <input class="form-control" type="text" value="<?php print_r($rows['rear_suspension']);?>"><br>
            <label for="crank">Crank</label>
            <input class="form-control" type="text" value="<?php print_r($rows['crank']);?>"><br>
            <label for="rear_cogs">Rear Cogs</label>
            <input class="form-control" type="text" value="<?php print_r($rows['rear_cogs']);?>"><br>
            <label for="front_derailleur">Front Derailleur</label>
            <input class="form-control" type="text" value="<?php print_r($rows['front_derailleur']);?>"><br>
            <label for="rear_derailleur">Rear Derailleur</label>
            <input class="form-control" type="text" value="<?php print_r($rows['rear_derailleur']);?>"><br>
            <label for="shifters">Shifters</label>
            <input class="form-control" type="text" value="<?php print_r($rows['shifters']);?>"><br>
            <label for="brake set">Brake Set</label>
            <input class="form-control" type="text" value="<?php print_r($rows['brakeset']);?>"><br>
            <label for="brake_levers">Brake Levers</label>
            <input class="form-control" type="text" value="<?php print_r($rows['brakelevers']);?>"><br>
            <label for="hubs">Hubs(Front/Rear)</label>
            <input class="form-control" type="text" value="<?php print_r($rows['hubs_front_or_rear']);?>"><br>
            <label for="rims">Rims/Wheelset</label>
            <input class="form-control" type="text" value="<?php print_r($rows['rims_or_wheelset']);?>"><br>
            <label for="pedals">Pedals</label>
            <input class="form-control" type="text" value="<?php print_r($rows['pedals']);?>"><br>
            <label for="tires">Tires</label>
            <input class="form-control" type="text" value="<?php print_r($rows['tires']);?>"><br>
            <label for="features_and_accessories">Features & Accessories</label>
            <input class="form-control" type="text" value="<?php print_r($rows['features_accessories']);?>"><br>
            <label for="website">Website</label>
            <input class="form-control" type="text" value="<?php print_r($rows['website']);?>"><br>

        </div>
    </form>

    <footer>

        <div class="line"></div>
        <p>Copyright &copy; 2021 - Robust Routine</p>

    </footer>
</body>

</html>
