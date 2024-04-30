<?php

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        require "../database/db_connect.php";

        $login_email = $_POST["email"];
        
        $sql = sprintf("SELECT * FROM users WHERE email = '%s'",$conn->real_escape_string($_POST['email']));

        $result = $conn->query($sql);

        $user = $result->fetch_assoc();

        // var_dump($user);

        if($user) {

           if( password_verify($_POST["password"], $user["password"])) {
                
                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["user_id"];
                header("location: ../seat_reserve.php");
                // die("Login Successful!");
                // exit;
           }

        }
        exit;

    }

?>
