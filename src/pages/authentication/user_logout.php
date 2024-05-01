<?php

    session_start();
    header("Location: ../index.php");
    unset($_SESSION['user_id']);
    exit;

?>