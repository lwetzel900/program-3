<?php
session_start();
require_once('../database.php');
require_once ('../valid.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'adminView';
    }
}
switch ($action) {

    case 'adminView':
        $errorMessage = "";
        include ('adminHome.php');
        exit();
        break;
    case 'admin':
        $password = filter_input(INPUT_POST, 'password');
        if (!empty($password) && adminPassword($password)) {
            header("Location: ?action=adminWork");
            exit();
        } else {
            $errorMessage = "Stop Playing";
            include ('adminHome.php');
            exit();
        }
        break;
    case 'adminWork':
        $galleryImages = getAllImages();
        include ('adminWork.php');
        break;
//admin user view
    case 'userUpdate':
        $allUsers = getAllUsers();
        include('manageUser.php');
        break;
    case 'deleteUser':
        $userID = filter_input(INPUT_POST, 'userID');
        deleteUser($userID);
        header("Location: ?action=userUpdate");
        break;
//venue views
    case 'venueUpdate':
        $allVenues = getAllVenues();
        include('venueUpdate.php');
        break;
    case 'deleteVenue':
        $venueID = filter_input(INPUT_POST, 'venueID');
        deleteVenue($venueID);
        header("Location: ?action=venueUpdate");
        break;
    case 'venueAdd':
        $vName = filter_input(INPUT_POST, 'name');
        $vCity = filter_input(INPUT_POST, 'city');
        $vState = filter_input(INPUT_POST, 'state');
        //$vPic = filter_input(INPUT_POST, 'pic');
        $vPic = "default";
        insertVenue($vName, $vCity, $vState, $vPic);
        header("Location: ?action=venueUpdate");
        break;
//service views
    case 'servicesUpdate':
        $allServices = getAllServices();
        include('serviceUpdate.php');
        break;
    case 'deleteService':
        $serviceID = filter_input(INPUT_POST, 'serviceID');
        deleteService($serviceID);
        header("Location: ?action=servicesUpdate");
        break;
    case 'serviceAdd':
        $sType = filter_input(INPUT_POST, 'type');
        $sDescript = filter_input(INPUT_POST, 'description');
        //$sPic = filter_input(INPUT_POST, 'pic');
        $sPic = "default";
        insertServices($sType, $sDescript, $sPic);
        header("Location: ?action=servicesUpdate");
        break;
//image views and actions
    case 'uploadImage':
        //taken from moodle
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            //$file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            //$file_type = $_FILES['image']['type'];
            //$temp = $_FILES['image']['name'];
            $temp = explode('.', $file_name);
            $temp = end($temp);
            $file_ext = strtolower($temp);

            var_dump($_FILES);

            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "images/gallery/" . $file_name);
                $imageURL = "images/gallery/" . $file_name;
                insertImage($imageURL);
                echo "Success";
            } else {
                var_dump($errors);
            }
        }
        header("Location: ?action=adminWork");
        break;
    case 'deleteImage';
        $imageID = filter_input(INPUT_POST, 'imageID');
        $imageLocation = filter_input(INPUT_POST, 'imageLocation');
        deleteFromImages($imageID);
        unlink($imageLocation);
        header("Location: ?action=adminWork");
        break;
    case'logout':
        session_unset();
        header("Location: .");
        exit();
        break;
}
