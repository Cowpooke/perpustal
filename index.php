<?php
    ob_start();
    session_start();
    include 'connection.php';
    if (isset($_SESSION['username'])) {
        header("Location: dashboard.php");
    }
    include "css.php";
?>

<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Perpustal</a>
      <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="register.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Sign Up</a>
        </li>
        </ul>
    </div>
  </div>
</nav>
<!--
<h2>HOME</h2>
<a href="login.php">Login</a>
<a href="register.php">register</a>
-->