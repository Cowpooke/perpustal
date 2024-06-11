<h2>LOGIN</h2>
<form action="" method="POST">
    <label for="username">username</label><br>
    <input type="text" class="input-text" name="username" placeholder="Username" required><br>
    <label for="password">password</label><br>
    <input type="password" class="input-text" name="password" placeholder="Password" required><br>
    <button class="button-submit" type="submit" name="submit" value="submit">
        SIGN IN
    </button>
</form>
<p>Belum punya akun?<a href="register.php">daftar</a></p>
<?php
    ob_start();
    include 'connection.php';
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: dashboard.php");
    }

    if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
        } else {
            echo "invalid password or username";
        }
    }
?>