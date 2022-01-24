<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pixel Cinema</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="pixel.css">
    <script src="cart.js"></script>
    <?php
      session_start();
      $user_id = $_SESSION['user_id'];
    
      //var_dump($_SESSION);

      $emptyRow = false;
      
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

      if ($_POST['remove_id']) {
        $remove_id = $_POST['remove_id'];
        $query = "delete from cart where id = ".$remove_id;
        if (!mysqli_query($conn, $query)) {
          echo "Error updating record: " . mysqli_error($conn);
        }
      }
      
      $query = "select * from cart where user_id = '".$user_id."' && paid = 0";
      //echo $query;
      $result = mysqli_query($conn, $query);
      $totalAmt = 0.0;
    ?>

    <style>  
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

  <body>
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
      <h3 style="font-size:x-large; margin-top: 50px">Your Cart</h3>
      <hr style="border: none; height: 1px; background-color:#595959; margin-bottom: 30px;">
      <div class="maincontent">
        <div class="row">
          <table id="cart" class="roundedCorners" style="margin-left: auto; margin-right: auto; background-color:#3B3838">
            <tr style="color: #ffffff; font-size:large">
              <td style="width: 400px;">
                Movie Title
              </td>
              <td align="center" style="width: 220px;">
                Seat No.
              </td>
              <td align="center" style="width: 150px;">
                Amount
              </td>
              <td></td>
            </tr>
            <tr>
              <td colspan="4" align="center">
                <hr style="border: none; height: 1px; background-color:#595959; margin-bottom: 10px;">
              </td>
            </tr>

            <?php
              if (mysqli_num_rows($result)==0) {
                echo "
                  <tr style='font-family: Bahnschrift Light; color:#ffffff'\"'>
                    <td colspan='3' align='center'>
                      Your cart is empty
                    </td>
                  </tr>
                ";
                $emptyRow = true;
              } else {
                $emptyRow = false;
                while ($row = mysqli_fetch_assoc($result)) {
                  $totalAmt = $totalAmt + $row["total"];
                  $movie_title = mysqli_fetch_assoc(mysqli_query($conn, "select * from movie where id = ".$row["movie_id"]))['title'];
                  echo "
                    <tr id='ticket_adult' style='font-family: Bahnschrift Light; color:#ffffff'>
                      <td id='ticket_type'>".
                      $movie_title.
                      "</td>
                      <td id='ticket_price' align='center'>".
                      $row["seats"].
                      "</td>
                      <td id='ticket_qty' align='center'>$".
                      number_format((float)$row["total"], 2, '.', '').
                      "</td><td><input type='image' id='".
                      $row["id"].
                      "' src='Media/cancel.svg' style = 'width:20px;' onclick='removeCart(this)'/></td>
                    </tr>  
                  ";
                }
              } 
            ?>
            <tr><td></td></tr>
            <tr>
              <td colspan="4" align="center">
                <hr style="border: none; height: 1px; background-color:#595959; margin-bottom: 10px;">
              </td>
            </tr>
            <tr style="color: #ffffff;">
              <td>Total Cost:</td>
              <td colspan="1"></td>
              <td id="ticket_total" align="center"><?php echo "$".number_format((float)$totalAmt, 2, '.', ''); ?></td>
            </tr>
          </table>
          <form id="formPay" action="movie_paid.php" method="post">
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id ?>"/>
          </form>          
          <form id="formCancel" action="movie_cart.php" method="post">
            <input type="hidden" id="remove_id" name="remove_id"/>
          </form>

          <div align="right" style="margin-right: 357px; margin-top: 30px; margin-bottom: 100px">
            <table>
              <tr>
                <td>
                  <input type="button" class="unselectBtn" value="Back to Home" id='submitBtn' class='selectBtn' onclick="location.href = 'index.php'"/>
                </td>
                <td id="payBtn">
                  <?php
                    if (!$emptyRow) {
                      echo
                      "
                      <button id='submitBtn' class='selectBtn' onclick=\"window.location.href='movie_paid.php'\">
                        Proceed to Payment
                      </button> 
                      ";
                    }
                  ?>
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
