<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pixel Cinema</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scrollfixed.js"></script>
    <link rel="stylesheet" href="pixel.css">
    <style> 

    .bg-image{
      background-image: linear-gradient(to bottom, #000000 5%, #292929 50%);
      min-height: 850px;
      background-position: center;
      background-repeat:  no-repeat;
      background-size: cover;
      position: relative;
    }

    .headercontent{
      width: 1000px;
      text-align: center;
      padding: 20px;
      margin: auto;
    }

    .movie-text {
      text-align: center;
      color: white;
      margin-left: 25px;
      margin-top: 100px;
    }

    .center {
      margin-left: auto;
      margin-right: auto;
    }

    table, td {
      text-align: center;
    }

    td {
      width: 500px;
    }

    .headercontent input[type=text], input[type=email],  select, textarea {
      width: 100%;
      padding: 15px;
      background-color: transparent;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
      font-family: Bahnschrift, Helvetica, sans-serif;
      font-weight: lighter;
      color: white;
    }

    input:focus::placeholder, textarea:focus::placeholder {
      color: transparent;
    }

    input:focus, textarea:focus{
      color: white;
    }

    .sendbtn {
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
      width: 150px;
    }

    .content .search-container {     
      border: solid 1px white;
      border-radius: 6px;
      background-color: transparent;
      width:  75%;
      margin: auto;
      text-align: left;
      padding: 10px;
      margin-bottom: 35px;
    }

    .content input[type=text]{
      padding: 6px;
      font-size: 14px;      
      color: white;
      background-color: transparent;
      border: none;
    }
 
    .content .search-container button {
      float: left;
      padding: 6px 10px;
      border: none;
      background-color: transparent;
      cursor: pointer;
    }

    .content .filterbtn-container input[type=submit]{     
      margin: 15px;
    }

    .container{
      border: 1px solid white;
      border-radius: 8px;
      width:  80%;
      padding: 20px 20px 0px 20px;
      margin: auto;
      text-align: left;
      margin-top: 20px;
      margin-bottom:  25px;
    }

    .accordion{
      color: white;
      cursor:  pointer;      
      transition: 0.4s;
    }

     .active, .accordion:hover {
      color: #CF6679;
    }

    /* Unicode character for "plus" sign (+) */
    .accordion:after {
      content: '\2795'; 
      font-size: 13px;
      color: #777;
      float: right;
      margin-left: 5px;
    }

    /* Unicode character for "minus" sign (-) */
    .accordion.active:after {
      content: "\2796"; 
    }

    /* Style the element that is used for the panel class */
    .panel {
      padding: 0 18px;
      background-color: tranparent;
      color: white;
      max-height: 0;
      overflow: hidden;
      transition: 0.4s ease-in-out;
      opacity: 0;
    }

    .panel.show {
      opacity: 1;
      max-height: 500px; /* Whatever you like, as long as its more than the height of the content (on all screen sizes) */
      padding: 10px;
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
            <a class="active" href="contactus.php">Contact Us</a>
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

        <div class="headercontent">
          <div class="movie-text">
            <h1> Contact Us </h1>
            <br>
            <img src="Media/map.svg" alt="pixelmap" width="650px" style="margin-bottom: 20px;">
                
            <div><table class="center">
              <tr style="color: #CF6679;">
                <td> Westgate PX: </td> 
                <td> NorthPoint PX: </td>
                <td> Bedok Mall PX: </td>
              </tr>
              <tr>
                <td> 61234567</td> 
                <td> 61234567 </td>
                <td> 61234567 </td>
              </tr>
            </table></div>
            <br>
            <form action="faq_confirmation.php" method="POST">
              <table class="center">
                <tr>
                  <td> 
                    <input 
                      type="text" 
                      name="name"
                      id="name"
                      size="30"
                      required
                      placeholder="Name"
                    />
                  </td> 
                  <td> 
                    <input 
                      type="email" 
                      name="email"
                      id="email"        
                      size="30"
                      required
                      placeholder="Email Address"
                    />
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <textarea 
                    name="enquiries" 
                    id= "enquiries" 
                    rows="6"
                    cols="60"
                    size="30"
                    required
                    placeholder="Message" 
                    ></textarea>
                  </td>
                </tr>
              </table>
                  

              <input class="sendbtn" type="submit" name="submit" value="Send" style="background-color:#CF6679; border: solid 2px #CF6679 ">
            </form>
          </div>
        </div>
      </div>

        <div class="content">
          <div class="movie-text">
            <h1> Frequently Asked Questions </h1>
            <br><br>

            <div class="search-container">
              <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <input type="text" class="no-outline" placeholder="Search FAQ.." name="search">
                <button type="submit" name="submit-search" onclick="scrollFix()"><i class="fa fa-search" style="color:white"></i></button>
              </form>
            </div>

            <?php
              $general = "myButtons";
              $ticketing = "myButtons";
              $promotions = "myButtons";
              $others= "myButtons";

              if(isset($_POST['ticketing'])){  
                $ticketing = 'myActiveButtons';
              } else if (isset($_POST['promotions'])){  
                $promotions = 'myActiveButtons';
              } else if (isset($_POST['others'])){  
                $others = 'myActiveButtons';
              } else {
                $general = 'myActiveButtons';
              }
            ?>

            <form class="filterbtn-container" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <input class="<?php echo $general; ?>" type="submit" id="general" name="general" value="General" onclick="scrollFix()">
              <input class="<?php echo $ticketing; ?>" type="submit" id="ticketing" name="ticketing" value="Ticketing" onclick="scrollFix()">
              <input class="<?php echo $promotions; ?>" type="submit" id="promotions" name="promotions" value="Promotions" onclick="scrollFix()">
              <input class="<?php echo $others; ?>" type="submit" id="others" name="others" value="Others" onclick="scrollFix()">
            </form>

            <?php
              //connection
              $conn = mysqli_connect('localhost', 'f32ee', 'f32ee', 'f32ee');
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }

              if (isset($_POST['submit-search'])){
                $search = mysqli_real_escape_string($conn, $_POST['search']); //escape weird characters if user enters them
                $sql = "SELECT * FROM faq WHERE question LIKE '%$search%'";

                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck >0){
                  while ($row = mysqli_fetch_assoc($result)){
                    echo "<div class='container'>";
                    echo "<p class='accordion'>". $row["question"] . "</p>";
                    echo "<div class='panel'>". $row["answer"] . "</div>";
                    echo "</div>";
                  }
                } else {
                    echo "There are no results matching your search.";
                }
              } else if(isset($_POST['ticketing'])) {
                $sql = "SELECT * FROM faq WHERE category = 'Tickets'";
                
              } else if(isset($_POST['promotions'])){
                $sql = "SELECT * FROM faq WHERE category = 'Promotions'";
                  
              } else if (isset($_POST['others'])){
                $sql = "SELECT * FROM faq WHERE category = 'Other'";
                  
              } else {
                $sql = "SELECT * FROM faq ";
              }
              $result = mysqli_query($conn,$sql);
              $resultCheck = mysqli_num_rows($result); //no of rows of results returned

              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<div class='container'>";
                  echo "<p class='accordion'>". $row["question"] . "</p>";
                  echo "<div class='panel'>". $row["answer"] . "</div>";
                  echo "</div>";
                }
              }
            ?>
            <br><br>         
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

 <!--this one toggles only one open at a time
Ref  - http://stackoverflow.com/questions/37745154/only-open-one-accordion-tab-at-one-time -->

<!--variable last will track the last active accordion-->
<script>
  var accord = document.getElementsByClassName("accordion");
  var i;
  var accordlast;
  for (i = 0; i < accord.length; i++) {
    accord[i].onclick = function() {
      if(accordlast){
        accordlast.classList.toggle("active",false); //remove active in class if false 
        accordlast.nextElementSibling.classList.toggle("show",false); //remove show in class for panel element
      }
      this.classList.toggle("active"); //add active to current accordian that is clicked 
      this.nextElementSibling.classList.toggle("show"); //show the current panel that is after the current accordian clicked 
      accordlast=this; //current becomes lastaccord
    }
  }
  </script>
</html>
