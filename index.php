<?php
//some of this taken from group project
//session_start();
require_once('database.php');

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
        $email = filter_input(INPUT_POST, 'email');
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone = filter_input(INPUT_POST, 'phone');
        $password = filter_input(INPUT_POST, 'password');
        insertUser($firstName, $lastName, $email, $address, $city, $zip, $phone, $password);
        exit();
        break;
    //user views
    case 'user':
        include ('user_home.php');
        break;
//admin views
    case 'admin':
        include ('admin_home.php');
        break;
};
