<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $roles = $_POST['role'];
    $password = md5($_POST['password']);

    include "connection.php";
    $check = mysqli_fetch_array(mysqli_query($con,"select * from users where username = '$username'"));
    if ($check !== null){
        $msg = "username is already exists";
        echo "<h2>".$msg."</h2>";
        echo '<meta http-equiv="refresh" content="0;url=register.php">';
    } else {
        $sql = "insert into users 
            (username, email, password, role)
            values
            ('$username','$email','$password','$roles')";
        $result = mysqli_query($con,$sql);
        echo "<h2>Data Saved</h2>";
        echo '<meta http-equiv="refresh" content="0;url=login.php">';
    }    
?>