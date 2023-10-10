<?php
include_once('Database/connection.php'); // Verbinding maken met de database

if (isset($_POST["title"])) {
    $title = $_POST["title"];
    $has_won_awards = $_POST["has_won_awards"];
    $seasons = $_POST["seasons"];
    $country = $_POST["country"];
    $language = $_POST["language"];
    $rating = $_POST["rating"];
    $description = $_POST["description"];

    // Start van de SQL-query met prepared statement om een nieuwe serie toe te voegen

    try {
        $stmt = $conn->prepare("INSERT INTO series (title, has_won_awards, seasons, country, language, rating, description) VALUES (:title, :has_won_awards, :seasons, :country, :language, :rating, :description)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':has_won_awards', $has_won_awards);
        $stmt->bindParam(':seasons', $seasons);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':description', $description);

        $stmt->execute(); // Uitvoeren van het prepared statement
    } catch (PDOException $e) {
        echo "Het toevoegen van gegevens is mislukt: " . $e->getMessage(); // Als er een fout optreedt
    }

    // Einde van de SQL-query

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!--Start of navbar-->

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
            </ul>
        </nav>
    </header>

<!--End of navbar-->

<!--Start of main form-->

<form action="add_serie.php" method="post">
        <h1>Title:<input type="text" name="title" class="paddingedit" value=""></h1>
        <br>
        <table class="table1" align="center">
            <tr>
                <th>Informatie</th>
                <th>Informatie</th>
            </tr>
            <tr>
                <td>Awards</td>
                <td><input type="number" name="has_won_awards" class="paddingedit" value=""></td>
            </tr>
            <tr>
                <td>Seasons</td>
                <td><input type="number" name="seasons" class="paddingedit" value=""></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country" class="paddingedit" value=""></td>
            </tr>
            <tr>
                <td>Language</td>
                <td><input type="text" name="language" class="paddingedit" value=""></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><input type="text" name="rating" class="paddingedit" value=""></td>
            </tr>
        </table>
        <p align="center">Omschrijving :</p>
             <div id="container">
             <textarea id="txt-box" rows="5" cols="60" name="description" value=""></textarea>
             </div>
        
</br>
        <div id="container">
        <input type="submit" value="Toevoegen" class="paddingedit">
        </div>
    </form>

<!--End of main form-->

</body>
</html>
