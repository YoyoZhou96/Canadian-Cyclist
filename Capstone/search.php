<!--HTML Layout coded by Dharani Pandya -->
<!--PHP data fetching coded by Yao Zhou-->

<?php 
    $year1 = '';
    $type1 = ''; 
    if (isset($_GET["year1"])) {
        $year1 = $_GET["year1"];
    }
    if (isset($_GET["type1"])) {
        $type1 = $_GET["type1"];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Form for Bicycle</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
  <style>
    *{
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
            font-family: Arial, Helvetica, sans-serif;
        }
       
        h1 {
            text-align: center;
        } 
    
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
       .option-fonts{
            font-family: Arial, Helvetica, sans-serif;
        }
        .banner{
            width: 100%;
            display: block;
        }
        .banner > .banner-image{
            width: 100%;
            display: block;
        }
        .form-group{
          padding: 10px;
          padding-left: 30px;
        }
        .form-control
        {
            padding: 5px;
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
        }
        #button {
            height: 50px;
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
        label{
          width: 200px;
          float: left;
        }
</style>
</head>

<body>
    
    <header>
    <h1>Canadian Cyclists</h1>
    <div class="banner">
        <img class="banner-image" src="header_photo.jpg" alt="Race photo" height="100px">
    </div>   
    </header>
    <h1>Search Bicycles by Subtypes</h1>
    <!-- Subtype to Checkboxes: modified by Yao Zhou-->
    <form class="form-group" action="searchResults.php" method="GET">
        <input type="hidden" name="year" value="<?php echo htmlspecialchars($year1);?>" />
        <input type="hidden" name="type" value="<?php echo htmlspecialchars($type1);?>"/>
        <!-- <div>
            <label for="subtype[]">Sub Type:</label>
            <input type="checkbox" value="" name="subtype[]">None
            <input type="checkbox" value="CG" name="subtype[]">Cruiser Geared
            <input type="checkbox" value="CSS" name="subtype[]">Cruiser Single Speed
            <input type="checkbox" value="H" name="subtype[]">Hybrid
            <input type="checkbox" value="HC" name="subtype[]">Comfort
            <input type="checkbox" value="HP" name="subtype[]">Performance
            <input type="checkbox" value="HU" name="subtype[]">Urban
            <input type="checkbox" value="MDH" name="subtype[]">Downhill/Freeride
            <input type="checkbox" value="ME" name="subtype[]"> Enduro/All Mountain
            <input type="checkbox" value="MFAT" name="subtype[]">Fat Bike
            <input type="checkbox" value="MJ" name="subtype[]">Juvenile/Kids
            <input type="checkbox" value="MX" name="subtype[]">Cross Country
            <input type="checkbox" value="M29" name="subtype[]">29" Wheel
            <input type="checkbox" value="M650" name="subtype[]">27.5" Wheel
            <input type="checkbox" value="RE" name="subtype[]">Endurance
            <input type="checkbox" value="RG" name="subtype[]">Gravel
            <input type="checkbox" value="RJ" name="subtype[]">Juvenile/Kids
            <input type="checkbox" value="RR" name="subtype[]">Race/Performance
            <input type="checkbox" value="RT" name="subtype[]">Touring
            <input type="checkbox" value="RTR" name="subtype[]">Triathlon
            <input type="checkbox" value="RTT" name="subtype[]">Time Trial
            <input type="checkbox" value="HTA " name="subtype[]">Hybrid Tandem
            <input type="checkbox" value="MTA " name="subtype[]">Mountain Tandem
            <input type="checkbox" value="RTA" name="subtype[]">Road Tandem
            <input type="checkbox" value="WS" name="subtype[]">Women Special
        </div><br> -->

    <form class="form-group" action="searchResults.php" method="GET">
        <div>
            <label for="subtype">Sub Type:</label>
            <select name="subtype" id="subtype">
                <optgroup label="Cyclo-cross">
                  <option class="option-fonts" value="">None</option>
                  <option class="option-fonts" value="WS">WS</option>
                </optgroup>
                <optgroup label="Cargo">
                    <option class="option-fonts" value="">None</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
                <optgroup label="Cruiser">
                  <option class="option-fonts" value="CG">Cruiser Geared</option>
                  <option class="option-fonts" value="CSS">Cruiser Single Speed</option>
                  <option class="option-fonts" value="WS">WS</option>
                </optgroup>
                <optgroup label="Folding">
                    <option class="option-fonts" value="">None</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
                  <optgroup label="Hybrid">
                    <option class="option-fonts" value="HC">Comfort</option>
                    <option class="option-fonts" value="HP">Performance</option>
                    <option class="option-fonts" value="HU">Urban</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
                  <optgroup label="Mountain">
                    <option class="option-fonts" value="MDH">Downhill</option>
                    <option class="option-fonts" value="ME">All Mountain</option>
                    <option class="option-fonts" value="MFAT">Fat Bike</option>
                    <option class="option-fonts" value="MJ">Kids</option>
                    <option class="option-fonts" value="MX">Cross Country</option>
                    <option class="option-fonts" value="M29">29" Wheel</option>
                    <option class="option-fonts" value="M650">27.5" Wheel</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
                  <optgroup label="Recumbent">
                    <option class="option-fonts" value="">None</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
                  <optgroup label="Road">
                    <option class="option-fonts" value="RE">Endurance</option>
                    <option class="option-fonts" value="RG">Gravel</option>
                    <option class="option-fonts" value="RJ">Kids</option>
                    <option class="option-fonts" value="RR">Race</option>
                    <option class="option-fonts" value="RT">Touring</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
                  <optgroup label="Tandem">
                    <option class="option-fonts" value="HTA">Hybrid Tandem</option>
                    <option class="option-fonts" value="MTA">Mountain Tandem</option>
                    <option class="option-fonts" value="RTA">Road Tandem</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
                  <optgroup label="Track">
                    <option class="option-fonts" value="">None</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
                  <optgroup label="Trike">
                    <option class="option-fonts" value="">None</option>
                    <option class="option-fonts" value="WS">WS</option>
                  </optgroup>
              </select>
        </div><br>

        <div>
            <label for="electric">Exculde Electric?</label>
            <!--<input type="radio" value="y_n" id="electric_yes" name="electric">Include Electric
            <input type="radio" value="n" id="electric_no" name="electric">Exculde Electric-->
            <input type="checkbox" value="n" name="electric[]">
        </div><br>

        <div>
            <label for="material">Frame Material:</label>
            <select id="material" name="frame">
                <option class="option-fonts" selected disabled hidden>Choose Frame</option>
                <option class="option-fonts" value="">Any</option>
                <option class="option-fonts" value="composite">Carbon</option>
                <option class="option-fonts" value="AL">Alloy</option>
                <option class="option-fonts" value="Steel">Steel</option>
                <option class="option-fonts" value="Ti">Titanium</option>
            </select>
        </div><br>
        <div>
          <label for="size">Size:</label>
          <select id="size" name="size">
              <option class="option-fonts" selected disabled hidden>Choose Size</option>
              <option class="option-fonts" value="XXS">XXS</option>
              <option class="option-fonts" value="XS">XS</option>
              <option class="option-fonts" value="S">S</option>
              <option class="option-fonts" value="M">M</option>
              <option class="option-fonts" value="L">L</option>
              <option class="option-fonts" value="XL">XL</option>
              <option class="option-fonts" value="XXL">XXL</option>
              <option class="option-fonts" value="OS">OS</option>
          </select>
        </div><br>
        <div>
            <label for="sizeInInches" >Numeric Size (inches/cm):</label>
            <input type="text" id="numericSize" name="sizeInInches" placeholder="Please enter the number"/>
        </div><br>
        <div>
            <label for="front_suspension">Front Suspension:</label>
            <input type="radio" value="y" id="front_yes" name="front_suspension">Yes
            <input type="radio" value="n" id="front_no" name="front_suspension">No
        </div><br>
        <div>
            <label for="rear_suspension">Rear Suspension:</label>
            <input type="radio" value="y" id="rear_yes" name="rear_suspension">Yes
            <input type="radio" value="n" id="rear_no" name="rear_suspension">No

        </div><br>

        <div>
            <label for="price">Price Range:</label>
            <input type="text" id="price" name="lowprice" placeholder="$0"/>
            <input type="text" id="price" name="highprice"  placeholder="Please enter hignest price"/>

        </div><br>

        <div id="button">

            <input class="button" type="reset" id="reset" value="Reset"/>
            <input class="button" type="submit" id="showResult" value="Search"/>
        </div>

    </form>
    <footer><p>Copyright &copy; 2021 - Robust Routine</p></footer>
</body>

</html>
