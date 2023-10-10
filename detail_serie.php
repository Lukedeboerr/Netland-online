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
$username = "bit_academy"; // Gebruikersnaam database
include_once('Database/connection.php'); // Verbinding maken met de database
$a = 1;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $serie_id = $_GET['id'];
    
    $stmt = $conn->prepare("SELECT * FROM series WHERE id = :serie_id");
    $stmt->bindParam(':serie_id', $serie_id, PDO::PARAM_INT);
    $stmt->execute();
    $series = $stmt->fetchAll();

    foreach ($series as $serie) {
       
    }
} else { } ?>

<!--Start table info-->

                            <h2 align="center"><?php echo $serie['title']; ?> </h2>
                    <tr>
                        <th>Information</th>
                        <th>Information</th>  
                    </tr>
                    <tr>
                        <th>Awards</th>
                        <th> 
                        <p align="center"> <?php echo $serie['has_won_awards']; ?> </p>
                      </th>
                    </tr>
                    <tr>
                        <th>Seasons</th>
                        <th> <p align="center"> <?php echo $serie['seasons']; ?> </p> </th>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <th> <p align="center"> <?php echo $serie['country']; ?> </p></th>
                    </tr>
                    <tr>
                        <th>Language</th>
                        <th> <p align="center"> <?php echo $serie['language']; ?> </p></th>
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <th>  <p align="center"> <?php echo $serie['rating']; ?> </p></th>
                    </tr>
                </thead>

<!--End of table info-->

                        </table>

<!--End of main table-->

                         <h3 align="center">Details<h3>
                        <p id="yellow"> <?php echo $serie['description']; ?> </p>
                <br>
    <form action="edit_serie.php" method="get">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>"><!--Makes it so when you go to editpage you get right id with it-->
            <input class="btn" type="submit" name="editpageseries" value="Navigeren naar de editpagina"></input>
    </form>
</body>
</html>
