<?php
include_once('Database/connection.php'); 

$id = $_GET['id'] ?? $_POST['id'];
if (!isset($_GET['id'])) {
    $id2 = $_POST['id'] - 1;
} else {
    $id2 = $_GET['id'] - 1;
}

// Deze PHP-code is om de ID op te halen voor later in de code

if (isset($_POST["id"])) {
    $titel = $_POST["titel"];
    $duur = $_POST["duur"];
    $datum = $_POST["datum"];
    $description = $_POST["description"];
    $land = $_POST["land"];
    try {
        $sql = "UPDATE films SET
        titel=:titel,
        duur=:duur,
        description=:description,
        datum=:datum,
        land=:land
        WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titel', $titel);
        $stmt->bindParam(':duur', $duur);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':datum', $datum);
        $stmt->bindParam(':land', $land);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // Deze PHP-code maakt het mogelijk om de waarden rechtstreeks bij te werken naar de database via de website

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
                <li><a class="active" href="add_serie.php">Add serie</a></li>
            </ul>
        </nav>
    </header>

<!--End of navbar-->

    <?php
    $showsTable = $conn->query('SELECT * FROM films')->fetchAll(); //Collects all from films out the database
    ?>

<!--Start form to edit table films in database-->

    <form action="edit_film.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <h1>Title:
</br>
        <input type="text" name="titel" class="paddingedit" value="<?= $showsTable[$id2]['titel'] ?>"></h1><!--The php takes id and value title of id-->
        <br>
        <table class="table1" align="center">
            <tr>
                <th>Informatie</th>
                <th>Informatie</th>
            </tr>
            <tr>
                <td>Duur</td>
                <td><input type="text" name="duur" class="paddingedit" value="<?= $showsTable[$id2]['duur'] ?>"></td>
            </tr>
            <tr>
                <td>Datum van uitkomst</td>
                <td><input type="text" name="datum" class="paddingedit" value="<?= $showsTable[$id2]['datum'] ?>"></td>
            </tr>
            <tr>
                <td>Land van uitkomst</td>
                <td><input type="text" name="land" class="paddingedit" value="<?= $showsTable[$id2]['land'] ?>"></td>
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

<!--End of form-->

</br>
</body>
</html>
