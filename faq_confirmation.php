<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pixel Cinema</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="pixel.css">
    <?php

      $name = $_POST['name'];
      $email = $_POST['email'];
      $enquiries = $_POST['enquiries'];

      if(empty($name) || empty($email)){
          echo "Please enter your name and email";
          exit;
      }

      $to      = 'f32ee@localhost';
      $subject = 'Enquiry from: '.$name;
      $message = $enquiries;
      $headers = 'From: f32ee@localhost' . "\r\n" .
      'Reply-To: f32ee@localhost' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers,
      '-ff32ee@localhost');
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
    <div class="wrapper" style="max-height: 100vh;">
      <div class="bg-image">
        <div class="topnav">
          <img class="logo" src="Media/logo.svg" alt="logo">
            <a class="active" href="index.php">Home</a>
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
      </div>

      <div class="content">
      <div class="maincontent" style="min-height: 70vh;">
        <table align="center">
          <tr>
            <td align="center">
              <h3 style="font-size:x-large; margin-top: 50px; ">Your Enquiry Has Been Received.</h3>
            </td>
          </tr>
          <tr>
            <td align="center">
              <p>We will get back to you shortly.<br/>We apologise for any inconvenience caused.</p>
            </td>
          </tr>
          <tr>
            <td align="center">
              <input type="button" class='unselectBtn' style="margin-right: 0px;" value="Back" id='submitBtn' onclick="location.href = 'contactus.php'"/>
            </td>
          </tr>
        </table>
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
