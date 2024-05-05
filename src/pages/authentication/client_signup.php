<?php

    require "../database/db_connect.php";

    print_r($_POST);
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ( ! preg_match("/[0-9]/", $password)){
        die("Passwords must contain at least one number");
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO RESTAURANT (email, password) VALUES('$email', '$password_hash')";

    if ($conn->query($sql) == TRUE) {
        header("Location: ../authentication/client_signup_success.php");
        exit;
    }
    else {
        echo "Error".$sql."<br>".$conn->error;
        
    }

?>