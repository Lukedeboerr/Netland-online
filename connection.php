<?php

$conn = "";
  
try {
    $server = "localhost";
    $db = "netland";
    $user = "bit_academy";
    $pass = "bit_academy";

   
    $conn = new PDO(
        "mysql:host=$server; dbname=netland",
        $user,
        $pass
    );
      
    $conn->setAttribute(
        PDO::ATTR_ERRMODE, 
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    echo "Connection failed: " 
        . $e->getMessage();
}
  
//Connection to the database

?>
