<?php
include_once('Database/connection.php'); 

$id = $_GET['id'] ?? $_POST['id'];
if (!isset($_GET['id'])) {
    $id2 = $_POST['id'] - 1;
} else {
    $id2 = $_GET['id'] - 1;
}

// This PHP code is to get the ID for later in the code

if (isset($_POST["id"])) {
    $title = $_POST["title"];
    $rating = $_POST["rating"];
    $description = $_POST["description"];
    $awards = $_POST["awards"];
    $seasons = $_POST["seasons"];
    $country = $_POST["country"];
    $language = $_POST["language"];
    try {
        $sql = "UPDATE series SET
        title=:title,
        rating=:rating,
        description=:description,
        has_won_awards=:awards,
        seasons=:seasons,
        country=:country,
        language=:language
        WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':awards', $awards);
        $stmt->bindParam(':seasons', $seasons);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // This PHP code will make it possible to update the values directly in the database using the website

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Beheerderspaneel | Wijzigingsmenu - Series</title>
</head>
<body>

<!--Begin of navbar-->

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

    <?php
    $showsTable = $conn->query('SELECT * FROM series')->fetchAll(); //Collects all from series out the database
    ?>

<!--Start form to edit table series in database-->

    <form action="edit_serie.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <h1>Title:
</br>
        <input type="text" name="title" class="paddingedit" value="<?= $showsTable[$id2]['title'] ?>"></h1><!--The php takes id and value title of id-->
        <br>
        <table class="table1" align="center">
            <tr>
                <th>Informatie</th>
                <th>Informatie</th>
            </tr>
            <tr>
                <td>Awards</td>
                <td><input type="number" name="awards" class="paddingedit" value="<?= $showsTable[$id2]['has_won_awards'] ?>"></td>
            </tr>
            <tr>
                <td>Seasons</td>
                <td><input type="number" name="seasons" class="paddingedit" value="<?= $showsTable[$id2]['seasons'] ?>"></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country" class="paddingedit" value="<?= $showsTable[$id2]['country'] ?>"></td>
            </tr>
            <tr>
                <td>Language</td>
                <td><input type="text" name="language" class="paddingedit" value="<?= $showsTable[$id2]['language'] ?>"></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><input type="number" name="rating" class="paddingedit" value="<?= $showsTable[$id2]['rating'] ?>"></td>
            </tr>
            </table>
                <p align="center">Beschrijving :<p>
                <div id="container">
      <textarea id="txt-box" rows="5" cols="60" name="description" value="<?= $showsTable[$id2]['description'] ?>"><?= $showsTable[$id2]['description'] ?></textarea>
</div>
      <br/>
      <div id="container">
      <input type="submit" value="Wijzigen" class="paddingedit">
      </div>
    </form>

<!--End form-->

</br>
</body>
</html>