<?php
include 'top_bar.php';
include 'connection.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} 
$user = $_SESSION['username'];
$sql = "SELECT role FROM users WHERE username='$user'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];
            if($row['role'] == "admin") {?>
            <div class="container-fluid">
            <form action="save_buku.php" method="post">

                <label for="judul">Judul</label><br>
                <input type="text" name="judul"><br>

                <label for="penulis">penulis</label><br>
                <input type="text" name="penulis"><br>

                <label for="penerbit">penerbit</label><br>
                <input type="text" name="penerbit"><br>

                <label for="genre">genre</label><br>
                <input type="text" name="genre"><br>

                <label for="deskripsi">deskripsi</label><br>
                <textarea name="deskripsi"></textarea><br>

                <label for="stok">stok</label><br>
                <input type="number" name="stok"><br>

                <button type="submit" class="btn btn-primary" value="submit" name="input">SUBMIT</button>
            </form>
            </div>
            

            <?php
            } elseif ($row['role'] == "member") {
                echo '
                    role ini tidak diijinkan
                ';
                echo '
                    <button>
                        <a href="dashboard.php">
                            BACK TO MENU
                        </a>
                    </button><br>
                ';
            };
include 'bottom_bar.php';

?>