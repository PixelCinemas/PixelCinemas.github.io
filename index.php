<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pixel Cinema</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="pixel.css">
    <script src="scrollfixed.js"></script>

    <?php 
      $conn = mysqli_connect('localhost', 'f32ee', 'f32ee', 'f32ee');
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      //select the respective columns from table 
      $sql = "SELECT * FROM movie WHERE title = 'Mulan'";

      //put resulting data into variable called result
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $bg = $row["background"];
          $logo = $row["logo"];
          $duration = $row["duration"];
          $cert = $row["certificate"];
          $genre = $row["genre"];
          $description = $row["description"];
          $id = $row["id"];
          $trailer =$row["trailer"];
        }
      }
    ?>

    <style>
    .bg-image{
      background-image: url("Media/<?php echo $bg;?>");
      min-height: 100vh;
      background-position: center;
      background-repeat:  no-repeat;
      background-size: cover;
      position: relative;
    }

    .movielist{
      padding: 35px;
    }

    </style>
  </head>
  <body>
    <div class="wrapper">
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

            <div class="headercontent">
              <div class="movie-text">
                <img src="Media/<?php echo $logo;?>" alt="movietitle" width="522px" height="306px" style="margin-left:-15px;">  
                  <h5><table>
                    <tr>
                      <td><?php echo $duration;?> mins &nbsp; | &nbsp;</td>
                      <td class='textbox'><?php echo $cert;?></td>
                      <td> &nbsp; | &nbsp;<?php echo $genre;?></td>
                    </tr>
                  </table></h5>
                          
                  <p><?php echo $description;?></p>
                  <a href="movie_timeslot.php?movie_id=<?php echo $id;?>" style="background-color: #CF6679; border: solid 2px #CF6679; margin-left: 0px";><img class="imgbtn"src="Media/ticketicon.png" alt="ticketicon">Book Now</a>
                  <a href="<?php echo $trailer;?>" target="blank" style="background-color: transparent; border: solid 2px white; padding: 10px 25px;"><img class="imgbtn"src="Media/trailericon.png" alt="trailericon">Trailer</a>
              </div>
            </div>
        </div>

      <div class="content">
        <?php
          $nowshowing = "myButtons";
          $comingsoon = "myButtons";

          if(isset($_POST['comingsoon'])){  
            $comingsoon = 'myActiveButtons';
          } else {
            $nowshowing = 'myActiveButtons';
          }
        ?>

        <!--$_SERVER['PHP_SELF'] returns the filename of the currently executing script-->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"> 
          <input class="<?php echo $nowshowing; ?>" type="submit" id="nowshowing" name="nowshowing" value="Now Showing" onclick="scrollFix()">
          <input class="<?php echo $comingsoon; ?>" type="submit" id="comingsoon" name="comingsoon" value="Coming Soon" onclick="scrollFix()">
        </form>

        <div class="maincontent">
          <div class="row">
            <div class="column">
            <?php
              echo "<table>";
              $i=0;
              for ($rw=0;$rw<10;$rw++){
                echo "<tr>";

                if(isset($_POST['comingsoon'])){
                  $sql = "SELECT * from movie WHERE `release` > CURDATE()";
                } else {
                  $sql = "SELECT * from movie WHERE `release` <= CURDATE()";
                }
                  $result = mysqli_query($conn,$sql);
                  $resultCheck = mysqli_num_rows($result);
                  $title = array();
                  $poster = array();
                  $runtime = array();
                  $cert = array();
                  $id = array();

                  if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      array_push($title, $row["title"]);
                      array_push($poster, $row["poster"]);
                      array_push($runtime, $row["duration"]);
                      array_push($cert, $row["certificate"]);
                      array_push($id, $row["id"]);
                    }
                  }
                  for($colu=0; $colu<4; $colu++){
                    if($i <$resultCheck){
                      $movietitle = $title[$i];
                      $movieposter = $poster[$i];
                      $movieruntime = $runtime[$i];
                      $moviecert = $cert[$i];
                      $movieid = $id[$i];
                      echo "<td class='movielist'>";
                      echo "<img src='Media/" . $movieposter . "'style='width:300px; height:420px; margin-bottom: 20px; border-radius: 5%;'>";
                      echo "<p>" . $movietitle ."<br>"."</p>";
                      echo "<h5><table><tr>";
                      echo "<td>" . $movieruntime ."mins &nbsp; | &nbsp;". "</td>";
                      echo "<td class='textbox'>" . $moviecert . "</td>";
                      echo "<td> &nbsp; | &nbsp; Action </td> ";
                      echo "</tr></table></h5>";
                      
                      if(isset($_POST['comingsoon'])){         
                        echo "<a href='movie_comingsoon.php?movie_id=".$movieid."'>View More</a>";      
                      } else {
                        echo "<a href='movie_timeslot.php?movie_id=".$movieid."'>View More</a>";
                      }
                      echo "</td>";
                      $i++;        
                    }
                  }  
                echo "</tr>";
              }
              echo "</table>";
            ?>
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
