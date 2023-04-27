<?php
    $host = "localhost";
    $dbname = "todolist";
    $username = "root";
    $password = "";

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die ("Could not connect to the database $dbname :" . $e->getMessage());
    }

?>
