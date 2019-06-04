<?php
include "../auth/db.php";
function signUp ($user, $email, $password, $created_Date) {
    global $con;
    $USER_NAME = mysqli_real_escape_string($con, $user);
    $EMAIL = mysqli_real_escape_string($con, $email);
    $PASSWORD = password_hash($password, PASSWORD_ARGON2ID);

    $query = "INSERT INTO `users`(`name`, `email`, `password`, `created_date`)";
    $query .= "VALUES ('$USER_NAME', '$EMAIL', '$PASSWORD','$created_Date')";

    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query Failed!' . mysqli_error());
        return 'Query Failed!';
    }
    else {
        return $result;

    }
}

function logIn ($email, $password) {
    global $con;
    $EMAIL = mysqli_real_escape_string($con, $email);
    $query = "SELECT * FROM users WHERE email = '$EMAIL'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $user = mysqli_fetch_array($result);
            $PASSWORD = $user['password'];
            if (password_verify($password, $PASSWORD)) {
                return true;
            }
            else return false;
        }
        else echo "nouser";
    }
    else {
        die('Query Failed!' . mysqli_error());
        return 'Query Failed!';
    }
}

function isEmailExists ($email) {
    global $con;
    $EMAIL = mysqli_real_escape_string($con, $email);
    $query = "SELECT email FROM users WHERE email = '$EMAIL'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $rows = mysqli_num_rows($result);
        if ($rows >= 1)
            return true;
        else false;
    }
    else {
        die('Query Failed!' . mysqli_error());
        return 'Query Failed!';
    }
}