<?php

//function hashPassword($password) {
//    $options = ['cost' => 12];
//    return password_hash($password, PASSWORD_DEFAULT, $options);
//}

function adminPassword($password) {
    $isGood = false;
    $adminPass = "Password123";
    if ($password == $adminPass) {
        $isGood = true;
    }

    return $isGood;
}
