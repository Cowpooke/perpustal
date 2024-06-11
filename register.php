<form action="save_user.php" method="POST">
    <h2>REGISTER</h2>
    USERNAME <br>
    <input type="text" name="username" required><br>
    EMAIL <br>
    <input type="email" name="email" required><br>
    PASSWORD <br>
    <input type="password" name="password" required><br>
    <input type="text" name="role" required hidden value="member">
    <button type="submit" name="input" value="SUBMIT">
        SUBMIT
    </button><br>
    <a href="index.php">Back to menu</a>
</form>        