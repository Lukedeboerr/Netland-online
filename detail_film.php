<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
   
    <title>Netland Beheerderspaneel</title>
    <link rel="stylesheet" href="style.css">
</head>
  
<body>

<!--Start navbar-->

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
                <li><a class="active" href="index.php">Home</a></li>
                <li><a class="active" href="add_film.php">Add Film</a></li>
                <li><a class="active" href="add_serie.php">Add serie</a></li>
            </ul>
        </nav>
    </header>

<!--End of navbar-->

    <div class="container">
        <div class="row">
          
<!--Start of maintable-->              

            <table class="table table-hover" align="center" border="solid black 2px" width="300px" height="100px">
                <thead>
                <tbody align="center">
                    <?php
                        $user = "bit_academy";//userame databse
                        include_once('connection.php');//connection to database
                        $a = 1;
                        $stmt = $conn->prepare("SELECT * FROM Films WHERE  id=" . $_GET['id']);//Takes the id from previous page to give right values
                        $stmt->execute();
                        $films = $stmt->fetchAll();
                    foreach ($films as $film) { ?>

<!--Start table info-->

                            <h2 align="center"><?php echo $film['titel']; ?> </h2>
                <tr>
                        <th>Information</th>
                        <th>Information</th>    
                    </tr>
                    <tr>
                        <th>Datum van uitkomst</th>
                        <th> 
                        <p align="center"> <?php echo $film['datum']; ?> </p>
                      </th>  
                    </tr>
                    <tr>
                        <th>Land van uitkomst</th>
                        <th> <p align="center"> <?php echo $film['land']; ?> </p> </th>
                    </tr>
                    <tr>
                        <th>Duur</th>
                        <th> <p align="center"> <?php echo $film['duur']; ?> </p></th>
                    </tr>
                </thead>


<!--End of table info-->
  
                <tbody align="center">
                </tbody>
            </table>


<!--End of maintable-->

        </div>
    </div>
    
    <h3 align="center">Details<h3>
                        
                        <p align="center" id="yellow"> <?php echo $film['description']; ?> </p>
                    <?php } ?><!--Closing foreach loop on line 53-->
                                 
    <form action="edit_film.php" method="get">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>"><!--Makes it so when you go to editpage you get right id with it-->
        <input class="btn" type="submit" name="editpagefilms" value="Navigeren naar de editpagina"></input>
    </form>

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
    
</body>
</html>
