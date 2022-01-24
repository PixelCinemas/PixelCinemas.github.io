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


      $isFromSeat = true;

      $movie_id = $_SESSION['movie_id'];
      $date = trim(preg_replace('/\s+/', ' ', $_SESSION['date']));
      $_SESSION['date'] = $date;
      $time = $_SESSION['time']; 
      $_SESSION['time'] = $time;
      $cinema = $_SESSION['cinema'];
      $seats = $_POST['seats'];
      $_SESSION['seats'] = $seats;
      $total = $_POST['total'];
      $_SESSION['total'] = $total; 
      date_default_timezone_set('Singapore');
      $timestamp = date('m/d/Y H:i:s a', time());

      $query = "insert into cart (user_id, movie_id, date, time, cinema, seats, total, paid, timestamp) values ('".
      $user_id.
      "', '".$movie_id.
      "', '".$date.
      "', '".$time.
      "', '".$cinema.
      "', '".$seats.
      "', '".$total.
      "', '0', '".$timestamp."')";
      //echo $query;
      if (!mysqli_query($conn, $query)) {
        echo "Error updating record: " . mysqli_error($conn);
      }
      
      $_SESSION['site'] = "movie_addedtocart";

      // echo $date;
      // echo $time;
      // echo $cinema;
      // echo $seats;
      // echo $total;
      // echo $_POST['user_id'];
      
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
      </div>

      <div class="content">

        <div class="maincontent" style="min-height: 70vh">

          <table align="center" style="margin-bottom:30px">
            <tr>
              <td align="center">
                <h3 style="font-size:x-large; margin-top: 50px; ">Order Added To Cart</h3>
                <h5> Your seats will be reserved for 30 minutes </h5>
              </td>
            </tr>
            <tr>
              <td align="center">
                <input type="button" class='unselectBtn' style="margin-right: 0px;" value="Go To Cart" id='submitBtn' onclick="location.href = 'movie_cart.php'"/>
              </td>
            </tr>
            <tr>
              <td align="center">
                <input type="button" class='unselectBtn' style="margin-right: 0px;" value="Back to Home" id='submitBtn' onclick="location.href = 'index.php'"/>
              </td>
            </tr>
          </table>        
          <h3 style="font-size:x-large; margin-top: 50px">Movies You May Like</h3>
          <hr style="border: none; height: 1px; background-color:#595959; margin-bottom: 30px;">
          <table width='100%' style='margin-left:auto; margin-right:auto;'>
          <?php
          $k=0;
          for ($j=0;$j<10;$j++){
            echo "<tr>";
            //connection
            $conn = mysqli_connect('localhost', 'f32ee', 'f32ee', 'f32ee');
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

                $sql = "SELECT * FROM movie";
                $result = mysqli_query($conn,$sql);
                $resultCheck = 4;
                $title = array();
                $poster = array();
                $runtime = array();
                $cert = array();

                if ($resultCheck > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      array_push($title, $row["title"]);
                      array_push($poster, $row["poster"]);
                      array_push($runtime, $row["duration"]);
                      array_push($cert, $row["certificate"]);
                    }
                }
                for($i=0; $i<4;$i++){
                  if($k <$resultCheck){
                    $movietitle = $title[$k];
                    $movieposter = $poster[$k];
                    $movieruntime = $runtime[$k];
                    $moviecert = $cert[$k];
                    echo "<td class='movielist'>";
                    echo "<img src='Media/" . $movieposter . "'style='width:225px; height:315px; margin-bottom: 20px; border-radius: 5%; '>";
                    echo "<p style='font-size: medium'>".$movietitle."</p>";
                    echo "<a href='movie_timeslot.php?movie_id=".($k+1)."' style='margin-bottom:30px'>View Details</a>";
                    echo "</td>";
                    $k++;        
                  }
                }
              echo "</tr>";
            }

          echo "</table>";

          ?>
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
