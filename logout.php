<?php
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['username']);
    sleep(2);
    header('location: ./index.php')
?>