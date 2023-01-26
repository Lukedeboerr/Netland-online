<?php
include_once('connection.php');//connection to database

if (isset($_POST["titel"])) {
    $title = $_POST["titel"];
    $duur = $_POST["duur"];
    $datum = $_POST["datum"];
    $land = $_POST["land"];
    $description = $_POST["description"];

//Start of sql statement to be able to insert new film

    try {
        $stmt = $conn->query("INSERT INTO films (titel, duur, datum, land, description)
    VALUES ('$title', '$duur', '$datum', '$land', '$description')");//Inserting put in values in to database
    } catch (PDOException $e) {
        echo "Inserting records failed" . $e->getMessage();//If there was a error
    }

//End of sql statement

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
                <img src="Netland.jpg" class="logo">
                <labal class="logo-txt">Netland</labal>
            </div>
            <input type="checkbox" id="check">
            <label for="check" class="hamburger-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="nav-list">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a class="active" href="add_serie.php">Add serie</a></li>
            </ul>
        </nav>
    </header>

<!--End of navbar-->

<!--Start of main form-->

<form method="post" class="maintable">
        <h1>Title:
</br>
            <input type="text" name="titel" class="paddingedit" value=""></h1>
        <br>
        <table class="table1" align="center">
            <tr>
                <th>Informatie</th>
                <th>Informatie</th>
            </tr>
            <tr>
                <td>Duur</td>
                <td><input type="text" name="duur" class="paddingedit" value=""></td>
            </tr>
            <tr>
                <td>Datum van uitkomst</td>
                <td><input type="text" name="datum" class="paddingedit" value=""></td>
            </tr>
            <tr>
                <td>Land</td>
                <td><input type="text" name="land" class="paddingedit" value=""></td>
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