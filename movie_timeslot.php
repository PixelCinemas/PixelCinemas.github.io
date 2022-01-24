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
      $queryNP = "select * from cinema where movie_id =".$movie_id." and location = 'NorthPoint'";
      $resultNP = mysqli_fetch_assoc(mysqli_query($conn, $queryNP));      
      $queryWG = "select * from cinema where movie_id =".$movie_id." and location = 'WestGate'";
      $resultWG = mysqli_fetch_assoc(mysqli_query($conn, $queryWG));      
      $queryBM = "select * from cinema where movie_id =".$movie_id." and location = 'Bedok Mall'";
      $resultBM = mysqli_fetch_assoc(mysqli_query($conn, $queryBM));
      
      $date = date('jS');
      $month = substr(date("F"), 0, 3);
      $day = date("l");
      $today = $day."<br/>".$date." ".$month;
      
      $date = date('jS', strtotime("+1 day"));
      $month = substr(date("F", strtotime("+1 day")), 0, 3);
      $day = date("l", strtotime("+1 day"));
      $tomorrow = $day."<br/>".$date." ".$month;
      
      $date = date('jS', strtotime("+2 day"));
      $month = substr(date("F", strtotime("+2 day")), 0, 3);
      $day = date("l", strtotime("+2 day"));
      $dayafter = $day."<br/>".$date." ".$month;

      if (!is_null($resultNP['timing_11'])) {
        $timeNP11 = date('h:iA', strtotime($resultNP['timing_11']));
      } else {
        $timeNP11 = "";
      }        
      if (!is_null($resultNP['timing_12'])) {
        $timeNP12 = date('h:iA', strtotime($resultNP['timing_12']));
      } else {
        $timeNP12 = "";
      }      
      if (!is_null($resultNP['timing_13'])) {
        $timeNP13 = date('h:iA', strtotime($resultNP['timing_13']));
      } else {
        $timeNP13 = "";
      }

      if (!is_null($resultNP['timing_21'])) {
        $timeNP21 = date('h:iA', strtotime($resultNP['timing_21']));
      } else {
        $timeNP21 = "";
      }  
      if (!is_null($resultNP['timing_22'])) {
        $timeNP22 = date('h:iA', strtotime($resultNP['timing_22']));
      } else {
        $timeNP22 = "";
      }      
      if (!is_null($resultNP['timing_23'])) {
        $timeNP23 = date('h:iA', strtotime($resultNP['timing_23']));
      } else {
        $timeNP23 = "";
      }

      if (!is_null($resultNP['timing_31'])) {
        $timeNP31 = date('h:iA', strtotime($resultNP['timing_31']));
      } else {
        $timeNP31 = "";
      }  
      if (!is_null($resultNP['timing_32'])) {
        $timeNP32 = date('h:iA', strtotime($resultNP['timing_32']));
      } else {
        $timeNP32 = "";
      }      
      if (!is_null($resultNP['timing_33'])) {
        $timeNP33 = date('h:iA', strtotime($resultNP['timing_33']));
      } else {
        $timeNP33 = "";
      }

      if (!is_null($resultBM['timing_11'])) {
        $timeBM11 = date('h:iA', strtotime($resultBM['timing_11']));
      } else {
        $timeBM11 = "";
      }        
      if (!is_null($resultBM['timing_12'])) {
        $timeBM12 = date('h:iA', strtotime($resultBM['timing_12']));
      } else {
        $timeBM12 = "";
      }      
      if (!is_null($resultBM['timing_13'])) {
        $timeBM13 = date('h:iA', strtotime($resultBM['timing_13']));
      } else {
        $timeBM13 = "";
      }

      if (!is_null($resultBM['timing_21'])) {
        $timeBM21 = date('h:iA', strtotime($resultBM['timing_21']));
      } else {
        $timeBM21 = "";
      }  
      if (!is_null($resultBM['timing_22'])) {
        $timeBM22 = date('h:iA', strtotime($resultBM['timing_22']));
      } else {
        $timeBM22 = "";
      }      
      if (!is_null($resultBM['timing_23'])) {
        $timeBM23 = date('h:iA', strtotime($resultBM['timing_23']));
      } else {
        $timeBM23 = "";
      }

      if (!is_null($resultBM['timing_31'])) {
        $timeBM31 = date('h:iA', strtotime($resultBM['timing_31']));
      } else {
        $timeBM31 = "";
      }  
      if (!is_null($resultBM['timing_32'])) {
        $timeBM32 = date('h:iA', strtotime($resultBM['timing_32']));
      } else {
        $timeBM32 = "";
      }      
      if (!is_null($resultBM['timing_33'])) {
        $timeBM33 = date('h:iA', strtotime($resultBM['timing_33']));
      } else {
        $timeBM33 = "";
      }
      
      if (!is_null($resultWG['timing_11'])) {
        $timeWG11 = date('h:iA', strtotime($resultWG['timing_11']));
      } else {
        $timeWG11 = "";
      }        
      if (!is_null($resultWG['timing_12'])) {
        $timeWG12 = date('h:iA', strtotime($resultWG['timing_12']));
      } else {
        $timeWG12 = "";
      }      
      if (!is_null($resultWG['timing_13'])) {
        $timeWG13 = date('h:iA', strtotime($resultWG['timing_13']));
      } else {
        $timeWG13 = "";
      }

      if (!is_null($resultWG['timing_21'])) {
        $timeWG21 = date('h:iA', strtotime($resultWG['timing_21']));
      } else {
        $timeWG21 = "";
      }  
      if (!is_null($resultWG['timing_22'])) {
        $timeWG22 = date('h:iA', strtotime($resultWG['timing_22']));
      } else {
        $timeWG22 = "";
      }      
      if (!is_null($resultWG['timing_23'])) {
        $timeWG23 = date('h:iA', strtotime($resultWG['timing_23']));
      } else {
        $timeWG23 = "";
      }

      if (!is_null($resultWG['timing_31'])) {
        $timeWG31 = date('h:iA', strtotime($resultWG['timing_31']));
      } else {
        $timeWG31 = "";
      }  
      if (!is_null($resultWG['timing_32'])) {
        $timeWG32 = date('h:iA', strtotime($resultWG['timing_32']));
      } else {
        $timeWG32 = "";
      }      
      if (!is_null($resultWG['timing_33'])) {
        $timeWG33 = date('h:iA', strtotime($resultWG['timing_33']));
      } else {
        $timeWG33 = "";
      }
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
        <img src="Media/timeslot.svg" width = 200px align="right" style="margin-top: 300px; margin-right: 50px;">

      </div>

      <div class="content">
        <h3 style="font-size: x-large">Buy Tickets</h3>
        <hr
          style="
            border: none;
            height: 1px;
            background-color: #595959;
            margin-bottom: 30px;
          "
        />
        <div class="maincontent">
          <div class="row">
            <table style="margin-left: auto; margin-right: auto; color: white">
              <tr>
                <td rowspan="10">
                  <img
                    src="Media/map.svg"
                    style="max-height: 50vh; margin-right: 300px"
                  />
                </td>
                <td>
                  <button id="dayOneBtn" class="selectDayBtn" onclick="clickDay(this)">
                    <span style="white-space: nowrap"><?php echo $today?></span>
                  </button>
                </td>
                <td>
                  <button id="dayTwoBtn" class="unselectDayBtn" onclick="clickDay(this)">
                    <?php echo $tomorrow?>
                  </button>
                </td>
                <td>
                  <button id="dayThreeBtn" class="unselectDayBtn" onclick="clickDay(this)">
                    <?php echo $dayafter?>
                  </button>
                </td>
                <td style="font-family: Bahnschrift Light">
                  More timings <br />coming soon...
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <hr
                    style="border: none; height: 1px; background-color: black"
                  />
                </td>
              </tr>
              <tr>
                <td>PX Max<br />NorthPoint</td>
                <td align='center'>
                  <?php
                    if (!empty($timeNP11)) {
                      echo "
                        <button id='NP11' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP11."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeNP21)) {
                      echo "
                        <button id='NP21' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP21."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeNP31)) {
                      echo "
                        <button id='NP31' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP31."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
                <td align="center">
                  <?php
                    if (!empty($timeNP12)) {
                      echo "
                        <button id='NP12' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP12."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeNP22)) {
                      echo "
                        <button id='NP22' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP22."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeNP32)) {
                      echo "
                        <button id='NP32' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP32."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
                <td align="center">
                  <?php
                    if (!empty($timeNP13)) {
                      echo "
                        <button id='NP13' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP13."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeNP23)) {
                      echo "
                        <button id='NP23' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP23."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeNP33)) {
                      echo "
                        <button id='NP33' class='unselectTimeBtn' onclick='clickTime(1, this)'>
                        &nbsp;".$timeNP33."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <hr
                    style="border: none; height: 1px; background-color: black"
                  />
                </td>
              </tr>
              <tr>
                <td>PX Max<br />Bedok Mall</td>
                <td align='center'>
                  <?php
                    if (!empty($timeBM11)) {
                      echo "
                        <button id='BM11' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM11."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeBM21)) {
                      echo "
                        <button id='BM21' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM21."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeBM31)) {
                      echo "
                        <button id='BM31' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM31."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
                <td align="center">
                  <?php
                    if (!empty($timeBM12)) {
                      echo "
                        <button id='BM12' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM12."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeBM22)) {
                      echo "
                        <button id='BM22' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM22."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeBM32)) {
                      echo "
                        <button id='BM32' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM32."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
                <td align="center">
                  <?php
                    if (!empty($timeBM13)) {
                      echo "
                        <button id='BM13' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM13."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeBM23)) {
                      echo "
                        <button id='BM23' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM23."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeBM33)) {
                      echo "
                        <button id='BM33' class='unselectTimeBtn' onclick='clickTime(2, this)'>
                        &nbsp;".$timeBM33."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <hr
                    style="border: none; height: 1px; background-color: black"
                  />
                </td>
              </tr>
              <tr>
                <td>
                  PX <span style="color: #cf6679">Master</span><br />Westgate
                </td>
                <td align="center">
                  <button class="unselectTimeBtn" onclick="clickTime(4, this)">
                    &nbsp;12:30PM&nbsp;
                  </button>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <hr
                    style="border: none; height: 1px; background-color: black"
                  />
                </td>
              </tr>
              <tr>
                <td>PX Max<br />Westgate</td>
                <td align='center'>
                  <?php
                    if (!empty($timeWG11)) {
                      echo "
                        <button id='WG11' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG11."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeWG21)) {
                      echo "
                        <button id='WG21' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG21."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeWG31)) {
                      echo "
                        <button id='WG31' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG31."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
                <td align="center">
                  <?php
                    if (!empty($timeWG12)) {
                      echo "
                        <button id='WG12' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG12."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeWG22)) {
                      echo "
                        <button id='WG22' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG22."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeWG32)) {
                      echo "
                        <button id='WG32' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG32."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
                <td align="center">
                  <?php
                    if (!empty($timeWG13)) {
                      echo "
                        <button id='WG13' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG13."&nbsp;
                        </button>                        
                      ";
                    }
                    if (!empty($timeWG23)) {
                      echo "
                        <button id='WG23' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG23."&nbsp;
                        </button>
                      ";
                    }
                    if (!empty($timeWG33)) {
                      echo "
                        <button id='WG33' class='unselectTimeBtn' onclick='clickTime(3, this)'>
                        &nbsp;".$timeWG33."&nbsp;
                        </button>
                      ";
                    }
                  ?>
                </td>
              </tr>
            </table>            
            <form id="form" action="movie_seat.php" method="get">
              <input type="hidden" id="date" name="date" />
              <input type="hidden" id="time" name="time" />
              <input type="hidden" id="cinema" name="cinema" />
            </form>
            <table
              style="
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                margin-bottom: 50px;
              "
            >
              <tr>
                <td align="center">
                  <button
                    class="unselectBtn"
                    onclick="location.href = 'index.php';"
                  >
                    Cancel
                  </button>
                </td>
                <td id="nextBtn" style="display: none">
                  <button id="submitBtn" class="selectBtn" onclick="submitForm()">
                    &nbsp;&nbsp;&nbsp;Next&nbsp;&nbsp;&nbsp;
                  </button>
                </td>
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
