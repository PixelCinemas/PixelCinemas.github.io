<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pixel Cinema</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="pixel.css">
    <script src="seating.js"></script>
    <?php
      session_start();
      $user_id = $_SESSION['user_id'];
      $movie_id = $_SESSION['movie_id'];

      $date = trim(preg_replace('/\s+/', ' ', $_GET['date']));
      $_SESSION['date'] = $date;
      $time = substr(mb_convert_encoding($_GET['time'], "ISO-8859-1", "UTF-8"), 1, -1);
      $_SESSION['time'] = $time;
      $cinema = $_GET['cinema'];
      $_SESSION['cinema'] = $cinema;




      //var_dump($_SESSION);
      
      $_SESSION['site'] = "movie_seat"; 

      $conn = mysqli_connect('localhost', 'f32ee', 'f32ee', 'f32ee');
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      date_default_timezone_set('Singapore');
      $timestamp = date('m/d/Y H:i:s a', (time() - 60 * 30));

      $queryRemove = 
        "SELECT id FROM cart WHERE timestamp < '".$timestamp."' && paid = '0'";
      // echo $queryRemove;
      $resultRemove = mysqli_query($conn, $queryRemove);
      if (mysqli_num_rows($resultRemove)>0) {
        while ($rowRemove = mysqli_fetch_assoc($resultRemove)) {
          // $reserved = $reserved.",".$rowReserved['seats'];
          // echo $rowRemove['id'];
          $queryRemove = "delete from cart where id = '".$rowRemove['id']."'";
          if (!mysqli_query($conn, $queryRemove)) {
            echo "Error updating record: " . mysqli_error($conn);
          }
        }
      }


      
      
    ?>

    <style>
    .bg-image{
      background-image: /*linear-gradient(to right,rgba(41,41,41,1), rgba(41,41,41,0.4)),*/ url("Media/<?php echo $result['background']?>");
      min-height: 100vh;
      background-position: center;
      background-repeat:  no-repeat;
      background-size: cover;
      position: relative;
    }

    .title-button {
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin:  4px 4px;
      padding: 10px 30px;
      cursor: pointer;
      border-radius: 8px;
      font-weight: bold;
    }

    .custom-select {
      position: relative;
      font-weight: lighter;
      border-radius: 8px;
      border: solid 2px white;
      width:200px;
      margin-right: 20px;

    }

    .custom-select select {
      display: none; /*hide original SELECT element:*/
    }

    .select-selected {
      background-color: #292929;
      border-radius: 8px;
      cursor: pointer;
      
    }
    /*  
      text-align: left;
      text-decoration: none;  
      display: inline-block;
      margin:  5px 8px;
      padding: 15px 100px;
      
      */

    /*style the arrow inside the select element:*/
    .select-selected:after {
      position: absolute;
      content: "";
      border: 6px solid transparent;
      border-color: #fff transparent transparent transparent;
      right:  15px;
      top: 12px;
      width: 0;
      height: 0;

    }

    /*point the arrow upwards when the select box is open (active):*/
    .select-selected.select-arrow-active:after {
      border-color: transparent transparent #fff transparent;
      top: 3px;
    }

    /*style the items (options), including the selected item:*/
    .select-items div,.select-selected {
      color: #ffffff;
      padding: 8px 16px;
      border: 1px solid transparent;
      border-color: transparent transparent rgba(255, 255, 255, 0.1) transparent;
      cursor: pointer;
      font-size: 15px;
      user-select: none;
    }

    /*style items (options):*/
    .select-items {
      position: absolute;
      background-color: #292929;
      top: 100%;
      left: 0;
      right: 0;
      z-index: 99;
    }

    /*hide the items when the select box is closed:*/
    .select-hide {
      display: none;
    }

    .select-items div:hover, .same-as-selected {
      background-color: rgba(0, 0, 0, 0.4);
    }

    table.roundedCorners { 
      border: 20px solid #3B3838;
      border-radius: 13px; 
      border-spacing: 10px;
    }
    table.roundedCorners td, 
    table.roundedCorners th { 
      border-bottom: 1px solid #3B3838;
      padding: 10px; 
    }
    table.roundedCorners tr:last-child > td {
      border-bottom: none;
    }

    </style>
  </head>

  <body onload="initialise()">
    <div class="wrapper">
        <div class="bg-image">
            <div class="topnav">
              <img class="logo" src="Media/logo.svg" alt="logo">
                <a href="index.php">Home</a>
                <a href="cinema.html">Cinema</a>
                <a href="promotion.php">Promotions</a>
                <a href="contactus.php">Contact Us</a>
                <div class="profile-container">
                  <div class="search-container">
                    <form action="/action_page.php">
                      <input type="text" class="no-outline" placeholder="Search" name="search">
                      <button type="submit"><i class="fa fa-search" style="color:white"></i></button>
                    </form>
            </div>
            <a class="righticon" href="movie_cart.php"
              ><i
                class="fa fa-shopping-cart"
                style="font-size: 20px; float: right"
              ></i
            ></a>
          </div>
            </div>



      <div class="content">
      <h3 style="font-size:x-large; margin-top: 50px">Select Seats</h3>
      <hr style="border: none; height: 1px; background-color:#595959; margin-bottom: 30px;">
      <div class="maincontent">
        <div class="row">
          <table style="margin-left: auto; margin-right: auto; color: white">
   
                     
            <tr><td colspan='23' align="center" style="color: #ffffff; background-color:#595959; border-radius: 10px">Screen</td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr> 
            <?php
           
            $queryReserved = 
              "SELECT seats FROM cart WHERE DATE = '".$date.
              "' && movie_id = '".$movie_id.
              "' && TIME = '".$time.
              "' && cinema = '".$cinema.
              "' && paid = 0";
            $resultReserved = mysqli_query($conn, $queryReserved);
            if (mysqli_num_rows($resultReserved)>0) {
              $reserved = "";
              while ($rowReserved = mysqli_fetch_assoc($resultReserved)) {
                $reserved = $reserved.",".$rowReserved['seats'];
              }
            }

            // echo $queryReserved;
            // var_dump($reserved);

            $queryUnavail = 
              "SELECT seats FROM cart WHERE DATE = '".$date.
              "' && movie_id = '".$movie_id.
              "' && TIME = '".$time.
              "' && cinema = '".$cinema.
              "' && paid = 1";
            $resultUnavail = mysqli_query($conn, $queryUnavail);
            if (mysqli_num_rows($resultUnavail)>0) {
              $unavail = "";
              while ($rowUnavail = mysqli_fetch_assoc($resultUnavail)) {
                $unavail = $unavail.",".$rowUnavail['seats'];
              }
            }

            // echo "unavailable";
            // echo $unavail;

            $arrReserved = explode(',', $reserved);
            $arrUnavail = explode(',', $unavail);

            //echo $query;
            $arrRow = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"];
            $arrCol = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19"];
        
            for ($i = 0; $i < 4; $i++) {
              echo "<tr><td align='center'>".$arrRow[$i]."</td>";
              for ($j = 0; $j < 5; $j++) {
                $seatID = $arrRow[$i].$arrCol[$j];
                if (in_array($seatID, $arrReserved)){
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_reserved.svg' style = 'width:20px;'/></td>";                  
                } else if (in_array($seatID, $arrUnavail)) {
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_unavailable.svg' style = 'width:20px;'/></td>";                  
                } else {
                  echo "<td id=\"".$seatID."\"><input id=\"".$seatID."\" type='image' src='Media/seat.svg' style = 'width:20px;' onclick='seat(this)'/></td>";
                }              
              }
              echo "<td style='padding: 0 10px 0 0;></td>";
              for ($j = 0; $j < 10; $j++) {
                echo "<td><input type='image' src='Media/seat.svg' style = 'width:20px; display: none;'></td>";
              }
              echo "<td style='padding: 0 10px 0 0;></td>";
              for ($j = 0; $j < 6; $j++) {
                $seatID = $arrRow[$i].$arrCol[$j+13];
                if (in_array($seatID, $arrReserved)){
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_reserved.svg' style = 'width:20px;'/></td>";                  
                } else if (in_array($seatID, $arrUnavail)) {
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_unavailable.svg' style = 'width:20px;'/></td>";                  
                } else {
                  echo "<td id=\"".$seatID."\"><input id=\"".$seatID."\" type='image' src='Media/seat.svg' style = 'width:20px;' onclick='seat(this)'/></td>";
                }              
              }
              echo "<td align='center'>".$arrRow[$i]."</td></tr>";
            }           
            echo "<tr><td></td></tr>";
            echo "<tr><td></td></tr>";
            for ($i = 0; $i < 6; $i++) {
              echo "<tr><td align='center'>".$arrRow[$i+4]."</td>";
              for ($j = 0; $j < 5; $j++) {
                $seatID = $arrRow[$i+4].$arrCol[$j];
                if (in_array($seatID, $arrReserved)){
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_reserved.svg' style = 'width:20px;'/></td>";                  
                } else if (in_array($seatID, $arrUnavail)) {
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_unavailable.svg' style = 'width:20px;'/></td>";                  
                } else {
                  echo "<td id=\"".$seatID."\"><input id=\"".$seatID."\" type='image' src='Media/seat.svg' style = 'width:20px;' onclick='seat(this)'/></td>";
                }
              }
              echo "<td style='padding: 0 10px 0 0;></td>";
              for ($j = 0; $j < 10; $j++) {
                $seatID = $arrRow[$i+4].$arrCol[$j+4];
                if (in_array($seatID, $arrReserved)){
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_reserved.svg' style = 'width:20px;'/></td>";                  
                } else if (in_array($seatID, $arrUnavail)) {
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_unavailable.svg' style = 'width:20px;'/></td>";                  
                } else {
                  echo "<td id=\"".$seatID."\"><input id=\"".$seatID."\" type='image' src='Media/seat.svg' style = 'width:20px;' onclick='seat(this)'/></td>";
                }              }
              echo "<td style='padding: 0 10px 0 0;></td>";
              for ($j = 0; $j < 6; $j++) {
                $seatID = $arrRow[$i+4].$arrCol[$j+13];
                if (in_array($seatID, $arrReserved)){
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_reserved.svg' style = 'width:20px;'/></td>";                  
                } else if (in_array($seatID, $arrUnavail)) {
                  echo "<td id=\"".$seatID."\"><input type='image' src='Media/seat_unavailable.svg' style = 'width:20px;'/></td>";                  
                } else {
                  echo "<td id=\"".$seatID."\"><input id=\"".$seatID."\" type='image' src='Media/seat.svg' style = 'width:20px;' onclick='seat(this)'/></td>";
                }              }
              echo "<td align='center'>".$arrRow[$i+4]."</td></tr>";
            }    
            ?>
          <tr><td></td></tr>
          <tr><td></td></tr>
          <tr>
            <td colspan='23' align="center"><img src='Media/seat_legends.svg' style="height: 25px;" ></img></td>
          </tr>       

        </table>
        <h3 style="font-size:x-large; margin-top:20px">Ticket Price</h3>
          <table class="roundedCorners" style="margin-left: auto; margin-right: auto; background-color:#3B3838">
            <tr style="color: #ffffff; font-size:large">
              <td style="width: 400px;">
                Ticket Type
              </td>
              <td align="center" style="width: 220px;">
                Ticket Price (SGD)
              </td>
              <td align="center" style="width: 150px;">
                Quantity
              </td>
              <td align="center" style="width: 150px;">
                Amount
              </td>
            </tr>
            <tr>
              <td colspan="4" align="center">
                <hr style="border: none; height: 1px; background-color:#595959; margin-bottom: 10px;">
              </td>
            </tr>
            <tr id="none_selected" style="font-family: Bahnschrift Light; color:#ffffff">
              <td colspan="4" align="center">
                Select a seat to see the price.
              </td>
            </tr>
            <tr id="ticket_adult" style="font-family: Bahnschrift Light; color:#ffffff">
              <td id="ticket_type">Adult-Standard</td>
              <td id="ticket_price" align="center">$5.00</td>
              <td id="ticket_qty" align="center">3</td>
              <td id="ticket_amt" align="center">$0.00</td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr>
              <td colspan="4" align="center">
                <hr style="border: none; height: 1px; background-color:#595959; margin-bottom: 10px;">
              </td>
            </tr>
            <tr style="color: #ffffff;">
              <td>Total Cost:</td>
              <td colspan="2"></td>
              <td id="ticket_total" align="center">$0.00</td>
            </tr>
          </table>
          <form id="form" action="movie_addedtocart.php" method="post">
            <input type="hidden" id="seats" name="seats"/>
            <input type="hidden" id="total" name="total"/>
            <!-- <input type="hidden" id="site" name="site" value="movie_seat"/> -->
          </form>
          <div align="right" style="margin-right: 290px; margin-top: 30px; margin-bottom: 100px">
            <table>
              <tr>
                <td>
                  <button
                    class="unselectBtn"
                    onclick="window.history.go(-1); return false;"
                  >
                    Back
                  </button>               
                </td>
                <td id="payBtn">
                  <button id="submitBtn" class="selectBtn" onclick="submitForm()">
                    Add to Cart
                  </button>                
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <p><img src="Media/footerlogo.svg" alt="logo" style="width:10%; height:10%; margin-top:20px;"> </p><br>
        <p>
        <a href="index.php">HOME &emsp; | &emsp; </a>
        <a href="contactus.php">FAQ &emsp; | &emsp; </a>
        <a href="contactus.php">CONTACT US &emsp; | &emsp; </a>
        <a href="contactus.php">TERMS OF USE &emsp; | &emsp; </a>
        <a href="contactus.php">PRIVACY POLICY</a></p>
        <br>
        © COPYRIGHT 2020 PIXEL CINEMA. ALL RIGHTS RESERVED. <br />
        CO. REG. NO.: 194700158G
    </footer>
  </div>
  </body>
</html>
