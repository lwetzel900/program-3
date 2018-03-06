<?php

//some of this taken from group project
$dsn = 'mysql:host=localhost;dbname=program3-lwetzel900';
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
//modified from group project
function getHashedPassword($email){
        global $db;
        //looks for the email
        $query = "SELECT password FROM users WHERE email = :emailPlace";
        $statement = $db->prepare($query);
        $statement->bindValue(':emailPlace', $email);
        
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        
        $hashedPassword = $results['password'];
        return $hashedPassword;
    }

function getUserByEmail($email) {
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

function getUserByID($userID) {
    global $db;
    // not returning the password becuase we probably shouldn't.
    $query = "SELECT fName, lName
                FROM users WHERE userID = :idPlace";
    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $userID);

    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();

    return $results;
}

function getAllUsers() {
    global $db;

    $query = "select * from users";

    $statement = $db->prepare($query);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

//checks all emails for duplicates
function emailExists($email){
        global $db;
        
        $query = "SELECT * FROM users WHERE email = :emailPlace";
        $statement = $db->prepare($query);
        $statement->bindValue(':emailPlace', $email);
        
        $statement->execute();
        $results = $statement->fetchAll();//returns results of select statement if anything
        $statement->closeCursor();
        
        if(empty($results)){//if results is empty than return flase
            $exists = false;
        }else {//if results has something return true
            $exists = true;
        }
        
        return $exists;
    }

//admin functions
function deleteUser($userID) {
    global $db;

    $query = 'DELETE FROM users
              WHERE userID = :idPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $userID);
    $statement->execute();
    $statement->closeCursor();
}

//venue functions
function getAllVenues() {
    global $db;

    $query = "select * from venue";
//                    (name, city, state, venuePic) 
//                    VALUES 
//                    (:mamePlace, :cityPlace, :statePlace, :picPlace)";

    $statement = $db->prepare($query);
//    $statement->bindValue(':namePlace', $name);
//    $statement->bindValue(':cityPlace', $city);
//    $statement->bindValue(':statePlace', $state);
//    $statement->bindValue(':picPlace', $venuePic);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function getVenueByID($venueID) {
    global $db;

    $query = "select name, city from venue
                        WHERE venueID = :idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $venueID);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function insertVenue($name, $city, $state, $venuePic) {
    global $db;

    $query = "insert into venue
                    (name, city, state, venuePic) 
                    VALUES 
                    (:namePlace, :cityPlace, :statePlace, :picPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':namePlace', $name);
    $statement->bindValue(':cityPlace', $city);
    $statement->bindValue(':statePlace', $state);
    $statement->bindValue(':picPlace', $venuePic);

    $statement->execute();
    //$imageId = $db->lastInsertId();
    $statement->closeCursor();

    //return $imageId;
}

function deleteVenue($venueID) {
    global $db;

    $query = 'DELETE FROM venue
              WHERE venueID = :idPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $venueID);
    $statement->execute();
    $statement->closeCursor();
}


//services functions
function getAllServices() {
    global $db;

    $query = "select * from services";
//                    (serviceType, serviceDescription, servicePic) 
//                    VALUES 
//                    (:typePlace, :descriptPlace, :picPlace)";

    $statement = $db->prepare($query);
//    $statement->bindValue(':typePlace', $serviceType);
//    $statement->bindValue(':descriptPlace', $serviceDescription);
//    $statement->bindValue(':picPlace', $servicePic);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function getServiceByID($serviceID) {
    global $db;

    $query = "select serviceType, serviceDescription from venue
                        WHERE serviceID = :idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $serviceID);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function insertServices($serviceType, $serviceDescription, $servicePic) {
    global $db;

    $query = "insert into services
                    (serviceType, serviceDescription, servicePic) 
                    VALUES 
                    (:typePlace, :descriptPlace, :picPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':typePlace', $serviceType);
    $statement->bindValue(':descriptPlace', $serviceDescription);
    $statement->bindValue(':picPlace', $servicePic);

    $statement->execute();
    //$imageId = $db->lastInsertId();
    $statement->closeCursor();

    //return $imageId;
}

function deleteService($serviceID) {
    global $db;

    $query = 'DELETE FROM services
              WHERE serviceID = :idPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $serviceID);
    $statement->execute();
    $statement->closeCursor();
}


//images functions
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

//user selection functions
function insertIntoSelection($userID, $venueID, $serviceID){
    global $db;
    
    $query = 'insert into userselection
                    (userID, venueID, serviceID) 
                    VALUES 
                    (:userPlace, :venuePlace, :servicePlace)';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':userPlace', $userID);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->bindValue(':servicePlace', $serviceID);

    $statement->execute();
    //$imageId = $db->lastInsertId();
    $statement->closeCursor();

    //return $imageId;
}

function insertServiceIntoSelection($userID, $serviceID){
    global $db;
    
    $query = 'insert into userselection
                    (serviceID ) 
                    WHERE userPlace = :$userID';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':userPlace', $userID);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->bindValue(':servicePlace', $serviceID);

    $statement->execute();
    //$imageId = $db->lastInsertId();
    $statement->closeCursor();

    //return $imageId;
}