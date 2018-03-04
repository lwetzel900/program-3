<?php

//some of this taken from group project
$dsn = 'mysql:host=localhost;dbname=teambwebsite1';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    //Displays the exception and keeps on rolling, uncomment the exit if you want it to halt instead
    exit();
}
//user database functions
//insert user into table

function insertUser($fName, $lName, $email, $address, $city, $zip, $phone, $password) {
    global $db;

    $query = "insert into users
                    (fName, lName, email, address, city, zip, phone, password) 
                    VALUES 
                    (:fNamePlace, :lNamePlace, :emailPlace, :addressPlace, :cityPlace, :zipPlace, :phonePlace, :passwordPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':fNamePlace', $fName);
    $statement->bindValue(':lNamePlace', $lName);
    $statement->bindValue(':emailPlace', $email);
    $statement->bindValue(':addressPlace', $address);
    $statement->bindValue(':cityPlace', $city);
    $statement->bindValue(':zipPlace', $zip);
    $statement->bindValue(':phonePlace', $phone);
    $statement->bindValue(':passwordPlace', $password);

    $statement->execute();
    $userId = $db->lastInsertId();
    $statement->closeCursor();

    return $userId;
}

function getUserByID($email) {
    global $db;
    // not returning the password becuase we probably shouldn't.
    $query = "SELECT userID, fName, lName, email 
                FROM users WHERE email = :emailPlace";
    $statement = $db->prepare($query);
    $statement->bindValue(':emailPlace', $email);

    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();

    return $results;
}

//admin functions

