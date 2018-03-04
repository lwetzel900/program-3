<?php

//some of this taken from group project
//session_start();
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
    case 'adminView':
        $errorMessage = "";
        include ('admin_home.php');
        exit();
        break;
    case 'admin':
        $password = filter_input(INPUT_POST, 'password');
        if (!empty($password) && adminPassword($password)) {
            include ('adminWork.php');
            exit();
        } else {
            $errorMessage = "Stop Playing";
            include ('admin_home.php');
            exit();
        }
        break;
    case 'adminWork':
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = $_FILES['image']['name'];
            $temp = explode('.', $temp);
            $temp = end($temp);
            $file_ext = strtolower($temp);

            var_dump($_FILES);

            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "existingDir/" . $file_name);
                echo "Success";
            } else {
                var_dump($errors);
            }
        }
        break;
};

//taken from group project
function hashPassword($password) {
    $options = ['cost' => 12];
    return password_hash($password, PASSWORD_DEFAULT, $options);
}
