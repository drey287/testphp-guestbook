<?php
include "config/DB.php";
include "libraries/Database.php";

// create DB object
$db = new Database();


if(isset($_POST['submit'])) {
    //assign vars
    $name =   mysqli_real_escape_string($db->link, $_POST['name']);
    $email =   mysqli_real_escape_string($db->link, $_POST['email']);
    $message = mysqli_real_escape_string($db->link, $_POST['message']);

    echo $name;
    if ($name == '' || $email == ''  || $message == '' ) {
        // Set error
        $error = "Please fill out all required fealds";
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    else {
        $query = "INSERT INTO `guestboox`(`user`, `email-user`, `message`) VALUES ('$name','$email','$message')";

        $insert_row = $db->insert($query);
    }
}
































