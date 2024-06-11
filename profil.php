<?php  
    include 'connection.php';
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$user'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $role = $row['role'];
                $email = $row['email'];
                echo "<h2>Profil</h2>";
                echo "Username : $user <br>";
                echo "email : $email <br>";
                echo "role : $role <br>";
?>

<a href="logout.php">Logout</a>
<a href="dashboard.php">BACK TO MENU</a>