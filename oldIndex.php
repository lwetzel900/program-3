<?php

//some of this taken from group project
session_set_cookie_params(6000, '/');
session_start();
require_once('model/database.php');
require_once ('model/valid.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        // profile will check to see if the user is logged in and send
        // them to the profile if they are and the login page if not.
        $action = 'main';
    }
}
$allServices = getAllServices();
$allVenues = getAllVenues();

switch ($action) {
//main action
    case 'main':
        include ('mainPage.php');
        exit();
        break;

    case 'visitorShow':
        include ('visitorShow.php');
        break;
}; //end of switch
