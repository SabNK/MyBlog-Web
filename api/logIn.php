<?php

include "functions.php";

if (empty($_REQUEST['email']) || empty($_REQUEST['password'])) {
    header('Location: ../index.php');
}
else {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if (isEmailExists($email)) {
        $result = logIn($email, $password);
        echo json_encode($result);
        /*if ($result) {
            echo json_encode($result);
        }
        else {
            echo json_encode($result);
        }*/
    }
    else {
        echo json_encode("Email does not exist");
    }
}
