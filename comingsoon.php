<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pixel Cinema</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="pixel.css">

    <style>
    .bg-image{
      background-image: /*linear-gradient(to right,rgba(41,41,41,1), rgba(41,41,41,0.4)),*/ url("Media/mulan.png");
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

    .movielist{
      padding: 35px;
    }


    /*.filterbtn {
      border: 2px solid white;
      color: white;
      text-align: center;
      background-color: transparent;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin:  4px 4px;
      padding: 10px 30px;
      cursor: pointer;
      border-radius: 8px;
      font-weight: bold;
      width: 200px;
    }

    .filterbtn.active{
      background-color: #CF6679;
      border: solid 2px #CF6679;
    }

    .filterbtn:hover {
      background-color: #CF6679;
      border: solid 2px #CF6679;
      color: white;
    }

    .filterbtn:focus {
      background-color: #CF6679;
      color: white;
    }*/

    </style>
  </head>

  <body>
    <div class="wrapper">
        <div class="bg-image">
            <div class="topnav">
              <img class="logo" src="Media/logo.svg" alt="logo">
                <a class="active" href="index.php">Home</a>
                <a href="cinema.html">Cinema</a>
                <a href="promotion.html">Promotions</a>
                <a href="contactus.html">Contact Us</a>
                <div class="profile-container">
                  <div class="search-container">
                    <form action="/action_page.php">
                      <input type="text" class="no-outline" placeholder="Search" name="search">
                      <button type="submit"><i class="fa fa-search" style="color:white"></i></button>
                    </form>
                  </div>
                    <a class="righticon" href="#"><i class="fa fa-user-circle-o" style="font-size:20px; float:right;"></i></a>
                </div>
            </div>

            <div class="headercontent">
              <div class="movie-text">
                <img src="Media/movietitlelogo.png" alt="movietitle" width="522px" height="306px" style="margin-left: -15px;">
                
                <h5><table>
                  <tr>
                    <td> 1 hr 45 mins&emsp;|&emsp;</td> 
                    <td class="textbox">PG13 </td>
                    <td> &emsp;|&emsp;Action </td>
                  </tr>
                </table></h5>
                
                <p>To keep her ailing father from serving in the Imperial Army, a fearless young woman disguises herself as a man and battles northern invaders in China.</p>
                  <a href="index.html" style="background-color: #CF6679; border: solid 2px #CF6679; margin-left: 0px";><img class="imgbtn"src="Media/ticketicon.png" alt="ticketicon">Book Now</a>
                  <a href="index.html" style="background-color: transparent; border: solid 2px white; padding: 10px 25px;"><img class="imgbtn"src="Media/trailericon.png" alt="trailericon">Trailer</a>
              </div>
            </div>
      </div>

      <div class="content">
        <?php include_once("moviecontent_template.php"); ?>


        <!--<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

          <input class="filterbtn active" type="submit" id="nowshowing" name="nowshowing" value="Now Showing">
          <input class="filterbtn" type="submit" id="comingsoon" name="comingsoon" value="Coming Soon">

        </form>-->

      <div class="maincontent">
        <div class="row">
          <div class="column">

            <?php

            echo "<table>";
            $k=0;
            for ($j=0;$j<10;$j++){
              echo "<tr>";
               //connection
              $conn = mysqli_connect('localhost', 'f32ee', 'f32ee', 'f32ee');
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                  $sql = "SELECT * FROM movies WHERE releaseDate > CURDATE()";
                  $result = mysqli_query($conn,$sql);
                  $resultCheck = mysqli_num_rows($result);
                  $title = array();
                  $image = array();
                  $runtime = array();
                  $cert = array();

                  if ($resultCheck > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
                        array_push($title, $row["title"]);
                        array_push($image, $row["image_url"]);
                        array_push($runtime, $row["runtime"]);
                        array_push($cert, $row["certificate"]);
                      }
                  }

                  for($i=0; $i<4;$i++){
                    if($k <$resultCheck){
                      $movietitle = $title[$k];
                      $movieimage = $image[$k];
                      $movieruntime = $runtime[$k];
                      $moviecert = $cert[$k];
                      echo "<td class='movielist'>";
                      echo "<img src='Media/" . $movieimage . "'style='width:300px; height:420px; margin-bottom: 20px; border-radius: 5%;'>";
                      echo "<p>" . $movietitle ."<br>"."</p>";
                      echo "<h5><table><tr>";
                      echo "<td>" . $movieruntime ."mins &nbsp; | &nbsp;". "</td>";
                      echo "<td class='textbox'>" . $moviecert . "</td>";
                      echo "<td> &nbsp; | &nbsp; Action </td> ";
                      echo "</tr></table></h5>";
                      echo "<a href='default.asp' target='_blank' style=''>View More</a>";
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
      </div>
    </div>

    <footer>
      <p><img src="Media/footerlogo.svg" alt="logo" style="width:10%; height:10%; margin-top:20px;"> </p><br>
        <p>
        <a href="index.html">HOME &emsp; | &emsp; </a>
        <a href="faq.html">FAQ &emsp; | &emsp; </a>
        <a href="promotions.html">CONTACT US &emsp; | &emsp; </a>
        <a href="contactus.html">TERMS OF USE &emsp; | &emsp; </a>
        <a href="contactus.html">PRIVACY POLICY</a></p>
        <br>
        © COPYRIGHT 2020 PIXEL CINEMA. ALL RIGHTS RESERVED. <br />
        CO. REG. NO.: 194700158G
    </footer>
  </div>
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":
getElementsByClassName returns an array-like object of all child elements which have all of the given class names.*/
x = document.getElementsByClassName("custom-select");
l = x.length; //no. of elements that are custom-select element 
for (i = 0; i < l; i++) {

//Get all elements in the document with the specified tag name (select), first index of select tag --> get the select element
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  
  //add class attribute with value from "select-selected" class for the new div
  a.setAttribute("class", "select-selected");
  
  //set the content of the new select element with the content of the options of orginal select element
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  
  //append every a into every end of the list of each x (any elements with the class "custom-select")
  x[i].appendChild(a);
  
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  
  //add class attribute with value from "select-items and select-hide" class for the new div that will contain the option elements
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

  </body>
</html>
