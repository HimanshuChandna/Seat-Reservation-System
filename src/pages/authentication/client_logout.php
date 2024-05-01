<?php

    session_start();
    header("Location: ../index.php");
    unset($_SESSION['res_id']);
    exit;

?>