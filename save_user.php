<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $roles = $_POST['role'];
    $password = md5($_POST['password']);

    include "connection.php";
    $input = $_POST['input'];
    $check = mysqli_fetch_array(mysqli_query($con,"select * from users where username = '$username'"));
    if ($check !== null){
        $msg = "username is already exists";
    } elseif ($input == "SUBMIT") {
        $sql = "insert into users 
            (username, email, password, role)
            values
            ('$username','$email','$password','$roles')";
        $result = mysqli_query($con,$sql);
    }    

    if($check !== null){
        echo "<h2>".$msg."</h2>";
        header('Location:register.php');
    } else {
        echo "<h2>Data Saved</h2>";
        header('Location:index.php');
    }
?>