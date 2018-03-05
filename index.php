<?php

//some of this taken from group project
session_start();
require_once('database.php');
require_once ('valid.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        // profile will check to see if the user is logged in and send
        // them to the profile if they are and the login page if not.
        $action = 'main';
    }
}

switch ($action) {
//main action
    case 'main':
        include ('mainPage.php');
        break;
//registration
    case 'register':
        $firstName = "";
        $lastName = "";
        $email = "";
        $address = "";
        $city = "";
        $zip = "";
        $phone = "";
        $password = "";
        include('registration.php');
        break;
    case 'addUser':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone = filter_input(INPUT_POST, 'phone');
        $password = filter_input(INPUT_POST, 'password');
        insertUser($firstName, $lastName, $email, $address, $city, $zip, $phone, hashPassword($password));
        //exit();
        $_SESSION['user'] = getUserByID($email);
        header("Location: ?action=userProfile");
        break;
    
//user views
    case 'viewUserLogin':
        $errorMessage = "";
        include('userLogin.php');
        exit();
        break;
    case 'userLogin':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        
        if(!empty($email) && emailExists($email)) {
            $storedPassword = getHashedPassword($email);
        }
        else{
            $errorMessage = "Invalid email";
            $stored_password = "";
            include('userLogin.php');
            exit();
        }
        
        if(password_verify($password, $storedPassword)){
            $_SESSION['user'] = getUserByID($email);
            header("Location: ?action=userProfile");
            exit();
        } else{
            $errorMessage = "Invalid username password combination";
            include('userLogin.php');
            exit();
        }
        break;
    
    case 'userProfile':
        If (empty($_SESSION['user'])) {
            header("Location: .");
            exit();
        } else {
            $fName = $_SESSION['user']['fName'];
            $lName = $_SESSION['user']['lName'];
            
            include('userProfile.php');
            exit();
        }
        break;
        case'showOptions';
            $allServices = getAllServices();
            $allVenues = getAllVenues();
            break;
        
    case 'selectService':
        break;
    
    case 'selectVebue':
        break;

    case'logout':
        session_unset();
        header("Location: .");
        exit();
        break;
};

////taken from group project
//function hashPassword($password) {
//    $options = ['cost' => 12];
//    return password_hash($password, PASSWORD_DEFAULT, $options);
//}
