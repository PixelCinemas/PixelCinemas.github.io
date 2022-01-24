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
    <script src="timeslot.js"></script>
    <?php
      session_start();
      $user_id=session_id();
      $_SESSION['site'] = "movie_timeslot";
      $_SESSION['user_id'] = $user_id;
      $_SESSION['movie_id'] = $_GET['movie_id'];
      $movie_id = $_SESSION['movie_id'];


      //var_dump($_SESSION);

      $conn = mysqli_connect('localhost', 'f32ee', 'f32ee', 'f32ee');
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $query = "select * from movie where id = ".$movie_id;
      $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
     
    ?>
    <style>
      .bg-image {
        background-image: /*linear-gradient(to right,rgba(41,41,41,1), rgba(41,41,41,0.4)),*/ url("Media/<?php echo $result['background']?>");
        min-height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
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
        margin: 4px 4px;
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
        width: 200px;
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
        right: 15px;
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
      .select-items div,
      .select-selected {
        color: #ffffff;
        padding: 8px 16px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(255, 255, 255, 0.1)
          transparent;
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

      .select-items div:hover,
      .same-as-selected {
        background-color: rgba(0, 0, 0, 0.4);
      }

      table.roundedCorners {
        border: 20px solid #3b3838;
        border-radius: 13px;
        border-spacing: 10px;
      }
      table.roundedCorners td,
      table.roundedCorners th {
        border-bottom: 1px solid #3b3838;
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
          <img class="logo" src="Media/logo.svg" alt="logo" />
          <a href="index.php">Home</a>
          <a href="cinema.html">Cinema</a>
          <a href="promotion.php">Promotions</a>
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

        <div class="headercontent">
          <div class="movie-text" style="margin-top: <?php echo $result['marginTop']?>">
            <!-- <a
              href="index.html"
              style="
                background-color: transparent;
                border: solid 2px white;
                margin-left: 0px;
                margin-bottom: 20px;
              "
              ><img
                class="imgbtn"
                src="Media/trailericon.png"
                alt="trailericon"
              />Trailer</a
            > -->
            <img
              src="Media/<?php echo $result['logo']?>"
              alt="movietitle"
              style="margin-left: -15px; margin-bottom: 20px; max-width: 500px; max-height: 300px; height:auto; width:auto;"
            />

            <h5>
              <table>
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td><?php echo $result['duration']?> mins&emsp;|&emsp;</td>
                        <td class="textbox" style=";"><?php echo $result['certificate']?></td>
                        <td>&emsp;|&emsp;<?php echo $result['genre']?>&emsp;|</td>
                        <td>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <a href=<?php echo $result['trailer']?> target='blank' style='background-color: transparent; border: solid 2px white; '><img class='imgbtn'src='Media/trailericon.png' alt='trailericon'>Trailer</a>
                  </td>
                  
                </tr>
              </table>  
            </h5>

            <p>
              <?php echo $result['description']?>
            </p>

            <table>
              <tr style="color: #cf6679">
                <td>Casts:</td>
                <td style="padding: 0 30px 0 0">Director:</td>
                <td style="padding: 0 30px 0 0">Distributor:</td>
              </tr>
              <tr style="font-family: Bahnschrift Light; font-size: small">
                <td rowspan="3" style="width: 40%; padding: 0 30px 0 0">
                  <?php echo $result['cast']?>
                </td>
                <td><?php echo $result['director']?></td>
                <td><?php echo $result['distributor']?></td>
              </tr>
              <tr style="color: #cf6679">
                <td>Release:</td>
                <td>Language:</td>
              </tr>
              <tr style="font-family: Bahnschrift Light; font-size: small">
                <td><?php echo $result['release']?></td>
                <td><?php echo $result['language']?></td>
              </tr>
            </table>
          </div>
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
          <a href="contactus.php">TERMS OF USE &emsp; | &emsp; </a>
          <a href="contactus.php">PRIVACY POLICY</a>
        </p>
        <br />
        © COPYRIGHT 2020 PIXEL CINEMA. ALL RIGHTS RESERVED. <br />
        CO. REG. NO.: 194700158G
      </footer>
    </div>
  </body>
</html>
