<?php
include "functions.php";

if (empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['password'])) {
    header('Location: ../index.php');
}
else {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $created_Date = date('Y-m-d H:m:s');

    if (!isEmailExists($email)) {
        $result = signUp($name, $email, $password, $created_Date);
        echo json_encode($result);
        /*if ($result) {
            echo json_encode($result);
        }*/
    }
    else echo json_encode("Email already exists");
}
