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
                <img src="Pictures/Netland.jpg" class="logo">
                <labal class="logo-txt"></labal>
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
                $user = "bit_academy"; // Gebruikersnaam database
                include_once('Database/connection.php'); // Verbinding maken met de database
                $a = 1;

                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $film_id = $_GET['id'];
    
                    $stmt = $conn->prepare("SELECT * FROM Films WHERE id = :film_id");
                    $stmt->bindParam(':film_id', $film_id, PDO::PARAM_INT);
                    $stmt->execute();
                    $films = $stmt->fetchAll();

                    foreach ($films as $film) {
                        // Hier kun je de rest van je code uitvoeren om filmgegevens weer te geven
                        // ...
                    }
                } else {
                    // Verwerk hier het geval waarin $_GET['id'] geen geldige waarde heeft
                }
                ?>

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
                    
                                 
    <form action="edit_film.php" method="get">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>"><!--Makes it so when you go to editpage you get right id with it-->
        <input class="btn" type="submit" name="editpagefilms" value="Navigeren naar de editpagina"></input>
    </form>

    
</body>
</html>
