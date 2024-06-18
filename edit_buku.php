<?php
    $id_buku = $_GET['id'];
    include 'connection.php';
    $sqlq = "SELECT * FROM BUKU WHERE id_buku = $id_buku";
    $result = mysqli_query($con, $sqlq);
    $td = mysqli_fetch_assoc($result);
    session_start();
    include 'connection.php';
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    } 
    $user = $_SESSION['username'];
    $sql = "SELECT role FROM users WHERE username='$user'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
        if($row['role'] == "admin") {
?>
<form action="save_buku.php" method="post">
    <h2>EDIT BUKU</h2><br>

    <label for="id_buku">id buku</label>
    <input type="text" name="id_buku" readonly value="<?= $td['id_buku'] ?>">

    <label for="judul">Judul</label><br>
    <input type="text" name="judul" required value="<?= $td['judul'] ?>"><br>

    <label for="penulis">penulis</label><br>
    <input type="text" name="penulis" required value="<?= $td['penulis'] ?>"><br>

    <label for="penerbit">penerbit</label><br>
    <input type="text" name="penerbit" required value="<?= $td['penerbit'] ?>"><br>

    <label for="genre">genre</label><br>
    <input type="text" name="genre" required value="<?= $td['genre'] ?>"><br>

    <label for="deskripsi">deskripsi</label><br>
    <textarea name="deskripsi" required value="<?= $td['deskripsi'] ?>"><?= $td['deskripsi'] ?></textarea><br>

    <label for="stok">stok</label><br>
    <input type="number" name="stok" required value="<?= $td['stok'] ?>"><br>

    <button type="submit" value="update" name="input">SUBMIT</button>

</form>
<button>
    <a href="data_buku.php">
        BACK TO MENU
    </a>
</button><br>
<?php 
        } elseif ($row['role'] == "member") {
            echo '
                role ini tidak diijinkan <br>
            ';
            echo '
                <button>
                    <a href="dashboard.php">
                        BACK TO MENU
                    </a>
                </button><br>
            ';
        };


?>