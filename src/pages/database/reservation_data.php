<?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        require "../database/db_connect.php";
        session_start();
        $fullname = $_POST["fullname"];
        $mobile_number = $_POST["mobile-number"];
        $email = $_POST["email"];
        $no_of_persons = $_POST["persons"];
        $date = $_POST["date"];
        $time_start = $_POST["start_time"];
        $time_end = $_POST["end_time"];
        $timestamp = date('Y/m/d H:i:s', time());
        $user_id = $_SESSION["user_id"];

        $sql = "INSERT INTO USER_RESERVATIONS VALUES('$user_id','$fullname',
        '$mobile_number','$email','$no_of_persons','$date','$time_start','$time_end','$user_id','$timestamp')";

        if($conn->query($sql) === TRUE){
            echo "Booking Created Successfully!";
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
        }

    };

?>