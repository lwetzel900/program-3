<?php

require_once('database.php');

function hashPassword($password) {
    $options = ['cost' => 12];
    return password_hash($password, PASSWORD_DEFAULT, $options);
}

function adminPassword($password) {
    $isGood = false;
    $adminPass = "Password123";
    if ($password == $adminPass) {
        $isGood = true;
    }

    return $isGood;
}

function validation($errorMessage, $firstName,$lastName,$emailString,$email,
        $address, $city,$zip, $phone,$password) {
    
    $isGood = false;
    
    if (!isValidFirstName($firstName)) {
        $errorMessage = 'Invalid First Name';
        $isGood = false;
    } else {
        $errorMessage = '';
    }
    //check last name
    if (!isValidLastName($lastName)) {
        $lNameErr = 'Invalid Last Name';
        $isGood = false;
    } else {
        $errorMessage = '';
    }
    //check email
    if (!isValidEmail($email)) {
        $errorMessage = 'Invalid Email';
        $email = $email_string;
        $isGood = false;
    } else if (email_exist($email)) {
        //took this out of the email valid function so we could
        //show 2 different errors
        $errorMessage = 'Email is Already Registered';
        $isGood = false;
    } else {
        $errorMessage = '';
    }
    //check alias
    if (!isValidAlias($city)) {
        $errorMessage = 'Invalid City';
        $isGood = false;
    } else {
        $errorMessage = '';
    }
    //check password
    if (!isValidPassword($password)) {
        $errorMessage = 'Invalid Password';
        $isGood = false;
    } else {
        $errorMessage = '';
    }
//    //go to 
//    if ($isGood) {
//        $errorMessage = '';
//    }
    return $errorMessage;
}

//functions
function isValidFirstName($fName) {
    $isGood = false;
    if (preg_match("/^[a-zA-Z][a-zA-Z0-9]{0,24}$/"/* taken from course website */, $fName)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidLastName($lName) {
    $isGood = false;
    if (preg_match("/^[a-zA-Z][a-zA-Z0-9]{0,24}$/"/* taken from course website */, $lName)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidCity($city) {
    $isGood = false;
    if (preg_match("/^[a-zA-Z][a-zA-Z0-9]{0,24}$/"/* taken from course website */, $city)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidAlias($state) {
    $isGood = false;
    $strlength = strlen($state);
    // I'm not sure why I have to but it keeps escaping my ending bracket if I use [\/\\]
    // adding the extra \ makes it work but none of the regex testers agree...
    // My best guess, while it shouldn't be doing it in a character class its translating \\ into \ which is escaping the next character
    if (strlen($state) < 2 &&
            preg_match("/[\/\\\<\>:\"|\?*\.]/", $state) === 0 &&
            preg_match("/^\s/", $state) === 0 &&
            preg_match("/\s$/", $state) === 0) {
        $isGood = true;
    }
    return $isGood;
}

function isValidZip($zip) {
    $isGood = false;
    if (preg_match("/^[a-zA-Z][a-zA-Z0-9]{0,24}$/"/* taken from course website */, $zip)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidPhone($phone) {
    $isGood = false;
    if (preg_match("/^[a-zA-Z][a-zA-Z0-9]{0,24}$/"/* taken from course website */, $phone)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidEmail($email) {
    $isGood = false;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isGood = true;
    }
    return $isGood;
}

function isValidPassword($password) {
    /* 10 chars? */
    $isGood = false;
    $minAcceptableValue = 3;
    $minPasswordLength = 10;
    $counter = 0;

    if (hasOneUppercase($password)) {
        $counter++;
    }
    if (hasOneLowercase($password)) {
        $counter++;
    }
    if (hasOneDigit($password)) {
        $counter++;
    }
    if (hasOneSpecialChar($password)) {
        $counter++;
    }
    if ($counter >= $minAcceptableValue && strlen($password) >= $minPasswordLength) {
        return true;
    } else {
        return false;
    }
}

/* * ***************************************** */
/* password specific functions */
/* * ***************************************** */

function hasOneUppercase($password) {
    $isGood = false;
    //$checker = preg_match("/[A-Z]/"/* taken from course website */, $password);
    if (preg_match("/[A-Z]/"/* taken from course website */, $password) === 1) {
        $isGood = true;
    }
    return $isGood;
}

function hasOneLowercase($password) {
    $isValid = false;
    if (preg_match("/[a-z]/"/* taken from course website */, $password) === 1) {
        $isValid = true;
    }
    return $isValid;
}

function hasOneDigit($password) {
    $isValid = false;
    if (preg_match("/[0-9]/"/* taken from course website */, $password) === 1) {
        $isValid = true;
    }
    return $isValid;
}

function hasOneSpecialChar($password) {
    $isValid = false;
    if (preg_match("/[!@#$%^&*()[\]{}\|;:,<.>\/?\-=_+]/"/* taken from course website */, $password) === 1) {
        $isValid = true;
    }
    return $isValid;
}
