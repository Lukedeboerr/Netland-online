<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
   <link rel="stylesheet" href="style.css">
    <title>Netlands Beheerderspaneel</title>
    <script src="https://kit.fontawesome.com/08626bfbba.js" crossorigin="anonymous"></script>
</head>

<body>

<!--Begin of the navbar-->

<header>
        <nav>
            <div class="logo-container">
                <img src="Netland.jpg" class="logo">
                <labal class="logo-txt">Netland</labal>
            </div>
            <input type="checkbox" id="check">
            <label for="check" class="hamburger-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="nav-list">
                <li><a class="active" href="#">About</a></li>
                <li><a class="active" href="add_film.php">Add Film</a></li>
                <li><a class="active" href="add_serie.php">Add serie</a></li>
            </ul>
        </nav>
    </header>

<!--Ending of the navbar-->

<!--Left side of pictures-->

<div class="w3-content w3-section" style="max-width:500px">
      <img class="mySlides" id="mySlides" src="Lucifer.jpg" style="width:20%">
      <img class="mySlides" id="mySlides" src="penoza.jpg" style="width:20%">
      <img class="mySlides" id="mySlides" src="breakingbad.jpg" style="width:20%">
    </div>

<!--End left side of pictures-->

<!--Begin right side pictures-->

    <div class="w3-content w3-section" style="max-width:500px">
      <img class="mySlides" id="mySlides2" src="cars.jpg" style="width:20%">
      <img class="mySlides" id="mySlides2" src="johnwick.jpg" style="width:20%">
      <img class="mySlides" id="mySlides2" src="dory.jpg" style="width:20%">
    </div>

<!--End right side of pictures-->

<!--Begin of script-->

    <script>
    var myIndex = 0;
    carousel();
    
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");//selecting the class by name
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 2000); // Change image every 2 seconds
    }
    </script>

<!--End of script-->

    <div class="container">
        <div class="row">
            <h1>Welkom op het Netlands beheerders paneel</h1>
            <h2>Series</h2>

<!--Start of the first table from maine page-->

            <table class="table table-hover" align="center" border="solid black 2px" width="300px" height="300px">
                <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Rating</th>
                            <th>Details</th>
                        </tr>
                </thead>
                <tbody align="center">
                <?php 
                           include_once('connection.php');//connection to database
                           $a = 1;
                           $stmt = $conn->prepare(
                               $Selseries = "SELECT * FROM series"
                           );
                           $stmt->execute();
                           $series = $stmt->fetchAll();
                           foreach ($series as $serie) {  
                                ?>
                    <tr> 
                        <td>   
                                <?php
                                echo $row1 = $serie['title']; 
                                ?>
                        </td>
                        <td>
                                <?php echo $row2 = $serie['rating']; ?>
                        </td>
                        <td>
                        <a href="detail_serie.php?id=<?php echo $serie['id']; ?>">Bekijk Details</a>
                           </td>                
                    </tr>
                                <?php } ?> <!--This php is to close the foreach loop from line 59 -->
                            </table>

<!--End of first table and start of second table from main page-->

                    <table class="table table-hover" align="center" border="solid black 2px" width="300px" height="300px">
                <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Duur</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <h2>Films</h2>
                <tbody align="center">
                    <?php 
                           include_once('connection.php');
                           $a = 1;
                           $stmt = $conn->prepare(
                               $SelFilms = "SELECT * FROM films"
                           );
                           $stmt->execute();
                           $films = $stmt->fetchAll();
                           foreach ($films as $film) {  
                                ?>
                    <tr>
                        <td>
                                <?php echo $film['titel']; ?>
                        </td>
                        <td>
                                <?php echo $film['duur']; ?>
                        </td>
                        <td>
                        <a href="detail_film.php?id=<?php echo $film['id']; ?>">Bekijk Details</a>
                           </td>
                           </tr>
                                <?php } ?> <!--This php is to close the foreach loop from line 97-->
                            </tbody>
               </table>
                           </br></br></br></br>
                        </br></br></br></br></br>

<!--End of last table from main page-->

<!--Start of footer-->

<footer>
<div class="footer" >
<div class="row">
<a href=""><i class="fa fa-facebook"></i></a>
<a href="h"><i class="fa fa-instagram"></i></a>
<a href=""><i class="fa fa-youtube"></i></a>
<a href=""><i class="fa fa-twitter"></i></a>
</div>
 
<div class="row">
<ul>
<li><a href="">Neem contact op</a></li>
<li><a href="">Onze Service</a></li>
<li><a href="">PrivacyBeleid</a></li>
<li><a href="">Algemene voorwaarden</a></li>
</ul>
</div>

<div class="row">
NETLAND Copyright © 2023 Netland - All rights reserved || Designed By: Luke de Boer
</div>
</div>
</footer>
        </div>
    </div>

    <!--End of footer-->

</div>
    </div>
</body>
  
</html>
