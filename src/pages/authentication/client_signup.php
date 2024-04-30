<?php

    require "../database/db_connect.php";

    print_r($_POST);
    // $name = $_POST["signupName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $repassword = $_POST["signupRePassword"];

    if ( ! preg_match("/[0-9]/", $password)){
        die("Passwords must contain at least one number");
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // $mysqli = require __DIR__. "../database/db_connect.php";

    $sql = "INSERT INTO RESTAURANT (email, password) VALUES('$email', '$password_hash')";

    if ($conn->query($sql) == TRUE) {
        // echo "Successfully created the record!";
        header("Location: ../authentication/client_signup_success.php");
        exit;
    }
    else {
        echo "Error".$sql."<br>".$conn->error;
        
    }

    

    var_dump($password_hash);

?>