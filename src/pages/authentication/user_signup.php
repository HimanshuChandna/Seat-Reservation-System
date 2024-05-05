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

    $sql = "INSERT INTO USERS (email, password) VALUES('$email', '$password_hash')";

    if ($conn->query($sql) == TRUE) {
        header("Location: ../authentication/user_signup_success.php");
        exit;
    }
    else {
        echo "Error".$sql."<br>".$conn->error;
        
    }

    

    var_dump($password_hash);

?>