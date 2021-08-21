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
  
// SQL query to select data from database
$year = "";
$type = "";
$sub_type = "";
$front_suspension = "";
$rear_suspension = "";
$electric = "";
$electric_y = "";
$frame_select = "";
$frame = "";
$frame_any = "";
$size = "";
$sizeInInches = "";
$lowprice = "";
$highprice = "";

if (isset($_GET["year"])) {
    $year = $_GET["year"];
}
if (isset($_GET["type"])) {
    $type = $_GET["type"];
}
if (isset($_GET["subtype"])) {
    $sub_type = $_GET["subtype"];
}
if (isset($_GET["electric"])){
    $electric = implode(" ", $_GET["electric"]);
}else {
    $electric_y = "null";
}
if (isset($_GET["frame"])) {
    $frame_select = $_GET["frame"];
}
if ($frame_select = "null"){
    $frame_any = $frame_select;
}else{
    $frame = $frame_select;
}
if (isset($_GET["size"])) {
    $size = $_GET["size"];
}
if (isset($_GET["sizeInInches"])) {
    $sizeInInches = $_GET["sizeInInches"];
}
if (isset($_GET["front_suspension"])){
    $front_suspension = $_GET["front_suspension"];
}
if (isset($_GET["rear_suspension"])){
    $rear_suspension = $_GET["rear_suspension"];
}
if (isset($_GET["lowprice"])) {
    $lowprice = $_GET["lowprice"];
}
if (isset($_GET["highprice"])) {
    $highprice = $_GET["highprice"];
}

$sql = "SELECT productid, model, make, year, type, sub_type, electric, frame_rear_shock, sizes, front_suspension, rear_suspension, price FROM full_cycle_2020_rev1 
WHERE year = $year AND type = '$type' AND sub_type = '$sub_type' AND (electric = '$electric' OR electric != '$electric_y' ) AND (frame_rear_shock like '%$frame%' OR frame_rear_shock != '$frame_any') AND sizes like '%$size%' AND sizes like '%{$sizeInInches}%' AND front_suspension = '$front_suspension' AND rear_suspension = '$rear_suspension' HAVING price >= '$lowprice' AND  price <= '$highprice'";

$result = $connection->query($sql);
$connection->close(); 
?>

<!-- HTML Layout and css styling coded by Dharani Pandya -->
<!--PHP data fetching and displaying coded by Shan He, Yao Zhou -->
<!-- Error Detecting and Error notifications coded by Yao Zhou -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <title>Search Results</title>
    <style>
        button {
            float: right;
            text-align: center;
        }
        #compare {
            width: 200px;
            height: 60px;
            background-color: red;
            color: white;
            font-size: 17px;
            font-weight: bold;
        }
        .button {
          float: left;
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

        #error {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
        /* #compare {
            border:none;
            font-size: 25px;
            font-weight: bold;
            background-color: #E4F5D4;
            text-align: center;
        }
        #compare:hover {
            background-color: lightgray;
        } */
        button {
            float: right;
            text-align: center;
        }

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
            width: 150px;
            padding-left: 5px; 
        }
        /* section{
            width: 525px;
            float: right;
            
        } */
        aside{
            width: 215px;
            float: right;
            
        }
        #chk{
            width: 50px;
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

<body>
    <section id="page">
    <header>
        <h1>Canadian Cyclists</h1>
        <div class="banner">
            <img class="banner-image" src="header_photo.jpg" alt="Race photo" height="100px">
        </div>   
    </header>
    <h1>List of Cycles based on your search 
    <br>
    <button class="button"type="button" ><a href="index.html">New Search</a></button>    <br>
    <form style="text-align : right; padding-right: 10px;"  id='compare_form' action='compare.php' method='GET'>
       <button><input type='submit' id='compare' value='Compare 2 Cycles'/> 
       </button></form>
       <br><br><br>
    </h1>
        <?php
            if ($result->num_rows != 0) {
                while($rows=$result->fetch_assoc()) {
        ?>
        
        <h2><?php echo $rows['type'];?> | <?php echo $rows['model'];?></h2> 

        <form style="text-align : right; padding-right: 10px;" action='showDetails.php' method='GET'>
        <input id = "detail_id" name= "detail_id" type="text" value="<?php echo $rows['productid'];?>" hidden>    
        <input id ="chk" type="checkbox" value="<?php echo $rows['productid'];?>" name="productid[]" form="compare_form"><button>
        <input type='submit' id='showDetails' value='showDetails'/> </button>
        </form>
                
        <h4><i class="fas fa-bicycle"></i><?php echo $rows['make'];?> <?php echo $rows['year'];?></h4>
        <h3 class="price">$<?php echo $rows['price'];?></h3>
        
        <h4><i class="fas fa-tools"></i><?php echo $rows['frame_rear_shock'];?></h4><hr> 

        <?php
                }
            }
        ?>

        <div id="error">
        <?php
            // No results found in data
            if ($result->num_rows === 0) {
                echo "Sorry! No records found.";            
            }
        ?>
        </div>

        <footer>&copy; 2021 Robust Routine</footer>
    </section>
</body>

</html>
