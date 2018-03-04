<?php

//some of this taken from group project
$dsn = 'mysql:host=localhost;dbname=wedding';
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
function getAllUsers() {
    global $db;

    $query = "select * from users
                    (fName, lName, email, address, city, zip, phone) 
                    VALUES 
                    (:fNamePlace, :lNamePlace, :emailPlace, :addressPlace, :cityPlace, :zipPlace, :phonePlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':fNamePlace', $fName);
    $statement->bindValue(':lNamePlace', $lName);
    $statement->bindValue(':emailPlace', $email);
    $statement->bindValue(':addressPlace', $address);
    $statement->bindValue(':cityPlace', $city);
    $statement->bindValue(':zipPlace', $zip);
    $statement->bindValue(':phonePlace', $phone);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

//admin functions
function getAllVenues() {
    global $db;

    $query = "select * from venue
                    (name, city, state, venuePic) 
                    VALUES 
                    (:mamePlace, :cityPlace, :statePlace, :picPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':namePlace', $name);
    $statement->bindValue(':cityPlace', $city);
    $statement->bindValue(':statePlace', $state);
    $statement->bindValue(':picPlace', $venuePic);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}
function getAllServices() {
    global $db;

    $query = "select * from services
                    (serviceType, serviceDescription, servicePic) 
                    VALUES 
                    (:typePlace, :descriptPlace, :picPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':typePlace', $serviceType);
    $statement->bindValue(':descriptPlace', $serviceDescription);
    $statement->bindValue(':picPlace', $servicePic);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}
//images
function insertImage($image) {
    global $db;

    $query = "insert into images
                    (galleryImages) 
                    VALUES 
                    (:imagePlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':imagePlace', $image);

    $statement->execute();
    //$imageId = $db->lastInsertId();
    $statement->closeCursor();

    //return $imageId;
}
function getAllImages() {
    global $db;
    
    $query = "SELECT * FROM images";
    
    $statement = $db->prepare($query);
    
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}
function deleteFromImages($imageID) {
    global $db;
    
    $query = 'DELETE FROM images
              WHERE imageID = :imagePlace';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':imagePlace', $imageID);
    $statement->execute();
    $statement->closeCursor();
}


