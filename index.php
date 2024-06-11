<?php
    ob_start();
    include 'connection.php';
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: dashboard.php");
    }
?>
<h2>HOME</h2>
<a href="login.php">Login</a>
<a href="register.php">register</a>