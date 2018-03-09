<?php

//some of this taken from group project
session_set_cookie_params(6000, '/');
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
$allServices = getAllServices();
$allVenues = getAllVenues();

switch ($action) {
//main action
    case 'main':
        include ('mainPage.php');
        break;
//registration
    case 'register':
        $errorMessage = "";
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

        if (empty($firstName) || empty($lastName) || empty($address) || empty($city) ||
                empty($zip) || empty($phone) || $email === NULL || $email === FALSE || empty($password)) {
            $errorMessage = "invalid Data";
            include('registration.php');
        } else {
            insertUser($firstName, $lastName, $email, $address, $city, $zip, $phone, hashPassword($password));
            $_SESSION['user'] = getUserByEmail($email);
            header("Location: ?action=userProfile");
        }


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
        var_dump($email);
        if ($email != NULL && emailExists($email)) {
            $storedPassword = getHashedPassword($email);
        } else {
            $errorMessage = "Invalid email";
            $stored_password = "";
            include('userLogin.php');
            exit();
        }

        if (password_verify($password, $storedPassword)) {
            $_SESSION['user'] = getUserByEmail($email);
            header("Location: ?action=userProfile");
            exit();
        } else {
            $errorMessage = "Invalid password ";
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
            $userID = $_SESSION['user']['userID'];

            if (idExistInUserSelection($userID)) {
                $allTogether = getUserVenueServiceByUserID($userID);
                //$count1 = count($allTogether[]);
                
                //var_dump(count($allTogether['Fox Center']));
                var_dump($allTogether);
            }
            include('userProfile.php');

            exit();
        }

        break;

    case 'selectVenue':
        $fName = $_SESSION['user']['fName'];
        $lName = $_SESSION['user']['lName'];
        $userID = $_SESSION['user']['userID'];

        $venueID = filter_input(INPUT_POST, 'venue');
        $venueName = getVenueNameByID($venueID);
        $_SESSION['venue'] = $venueID;
        $venueServices = joinTables($venueID);
        include ('showServiceOptions.php');
        //header("Location: ?action=selectServices");
        break;

    case'selectServices':
        
        var_dump($venueServices);
        $fName = $_SESSION['user']['fName'];
        $lName = $_SESSION['user']['lName'];
        $userID = $_SESSION['user']['userID'];
deleteIDUserSelection($userID, $_SESSION['venue']);
        // $venueServices = joinTables($_SESSION['venue']);

        $service = filter_input(INPUT_POST, 'services', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        $servicesSelected = convertServices($service);


        if (!empty($servicesSelected)) {
            foreach ($service as $serv) {
                insertIntoSelection($_SESSION['user']['userID'], $_SESSION['venue'], $serv);
            }
        }
        header("Location: ?action=userProfile");
        break;

    case'showOptions';
        include ('showVenueOptions.php');
        break;
//    case 'userProfileAfterOptions':
//        $venueID = filter_input(INPUT_POST, 'venue');
//        $venueName = getVenueNameByID($venueID);
//        $service = filter_input(INPUT_POST, 'services', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
//        $servicesSelected = convertServices($service);
//        
//        $fName = $_SESSION['user']['fName'];
//        $lName = $_SESSION['user']['lName'];
//        $userID = $_SESSION['user']['userID'];
//
//        if (!empty($servicesSelected)) {
//            foreach ($service as $serv) {
//                insertIntoSelection($userID, $venueID, $serv);
//            }
//        }
//        
//        include('userProfileOptions.php');
//        break;
//    case 'selectVenue':
//        $venueID = filter_input(INPUT_POST, 'venue');
//        $venueName = getVenueNameByID($venueID);
//        $service = filter_input(INPUT_POST, 'services', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
//        $servicesSelected = convertServices($service);
//
//        $fName = $_SESSION['user']['fName'];
//        $lName = $_SESSION['user']['lName'];
//        $userID = $_SESSION['user']['userID'];
//
//        if (!empty($servicesSelected)) {
//            foreach ($service as $serv) {
//                insertIntoSelection($userID, $venueID, $serv);
//            }
//        }
//
//        include('userProfile.php');
//        break;
//visitor views  
    case 'visitorShow':

        include ('visitorShow.php');
        break;

    case'logout':
        session_unset();
        header("Location: .");
        exit();
        break;
}; //end of switch

function convertServices($services) {
    $serviceName = array();

    foreach ($services as $serv) {
        $serviceName[] = getServiceTypeByID($serv);
    }
    return $serviceName;
}
