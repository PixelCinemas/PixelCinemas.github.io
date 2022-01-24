<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pixel Cinema</title>
    <meta charset="utf-8" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="pixel.css" />
    <style> 

    table {
    table-layout: fixed;
    }

    td {
      width: 300px;
      padding:  35px;
    }

    h5 {
      height:  60px;
    }

    </style>
  </head>

  <body>
    <div class="wrapper">
      <div>
        <div class="topnav">
          <img class="logo" src="Media/logo.svg" alt="logo" />
          <a href="index.php">Home</a>
          <a href="cinema.html">Cinema</a>
          <a class="active" href="promotion.php">Promotions</a>
          <a href="contactus.php">Contact Us</a>
          <div class="profile-container">
            <div class="search-container">
              <form action="/action_page.php">
                <input
                  type="text"
                  class="no-outline"
                  placeholder="Search"
                  name="search"
                />
                <button type="submit">
                  <i class="fa fa-search" style="color: white"></i>
                </button>
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
        <h3 style="font-size: x-large; margin-top: 50px">Promotions</h3>

        <?php //to add the active class onto the button that is clicked 
          $all = "myButtons";
          $tickets = "myButtons";
          $fnb = "myButtons";

          if(isset($_POST['tickets'])){  
            $tickets = 'myActiveButtons';
          } else if(isset($_POST['fnb'])){
            $fnb = 'myActiveButtons';
          } else {
            $all = 'myActiveButtons';
          }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
          <input class="<?php echo $all; ?>" type="submit" id="all" name="all" value="All">
          <input class="<?php echo $tickets; ?>" type="submit" id="tickets" name="tickets" value="Tickets">
          <input class="<?php echo $fnb; ?>" type="submit" id="fnb" name="fnb" value="Food & Beverages">
        </form>

        <div class="maincontent">
          <?php
            echo "<table>";
            $k=0;
            for ($rw=0;$rw<10;$rw++){
              echo "<tr>";
               //connection
              $conn = mysqli_connect('localhost', 'f32ee', 'f32ee', 'f32ee');
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                if(isset($_POST['tickets'])){
                  $sql = "SELECT * FROM promotions WHERE category = 'Tickets'";
                } else if(isset($_POST['fnb'])){
                  $sql = "SELECT * FROM promotions WHERE category = 'FoodBeverages'";
                } else{
                  $sql = "SELECT * FROM promotions";
                }

                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                $title = array();
                $image = array();
                $description = array();

                if ($resultCheck > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    array_push($title, $row["title"]);
                    array_push($image, $row["image_url"]);
                    array_push($description, $row["description"]);
                  }
                }
                
                for($colu=0; $colu<4; $colu++){
                  if($k <$resultCheck){
                    $promotitle = $title[$k];
                    $promoimage = $image[$k];
                    $promodescription = $description[$k];

                    echo "<td>";
                    echo "<img src='Media/" . $promoimage . "'style='width:300px; height:420px; margin-bottom: 30px; border-radius: 5%;'>";
                    echo "<p>" . $promotitle ."<br>"."</p>";
                    echo "<h5>" . $promodescription ."<br>"."</h5>";
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
        <p>
          <img
            src="Media/footerlogo.svg"
            alt="logo"
            style="width: 10%; height: 10%; margin-top: 20px"
          />
        </p>
        <br />
        <p>
          <a href="index.php">HOME &emsp; | &emsp; </a>
          <a href="contactus.php">FAQ &emsp; | &emsp; </a>
          <a href="contactus.php">CONTACT US &emsp; | &emsp; </a>
          <a href="contactus.html">TERMS OF USE &emsp; | &emsp; </a>
          <a href="contactus.html">PRIVACY POLICY</a>
        </p>
        <br />
        © COPYRIGHT 2020 PIXEL CINEMA. ALL RIGHTS RESERVED. <br />
        CO. REG. NO.: 194700158G
      </footer>
    </div>
  </body>
</html>
