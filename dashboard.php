<?php include_once("css.php"); ?>
<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4">Collapsed content</h5>
    <span class="text-muted">Toggleable via the navbar brand.</span>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
<?php  
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
                echo "<h2 class='msg'>selamat datang, $user anda login sebagai $role </h2>";
                if($row['role'] == "admin") {
                    echo '
                        <a href="data_buku.php">
                            data buku<br>
                        </a>
                        <a href="cari_buku.php">
                            cari buku<br>
                        </a>
                        <a href="peminjaman.php">
                            peminjaman<br>
                        </a>     
                        ';
                } elseif ($row['role'] == "member") {
                    echo '
                        <a href="cari_buku.php">
                            cari buku<br>
                        </a>
                        <a href="peminjaman.php">
                            peminjaman<br>
                        </a>
                        </a>
                        <a href="profil.php">
                            profil<br>
                        </a>
                    ';
                    include "search.php";
                };
?>
        <a href="logout.php">
                Logout
        </a>
</html>