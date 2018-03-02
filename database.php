<?php
$dsn = 'mysql:host=localhost;dbname=teambwebsite1';
    $username = 'root';
    $password = '';

    try {
        $db= new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        //Displays the exception and keeps on rolling, uncomment the exit if you want it to halt instead
        exit();
    }
    
    

