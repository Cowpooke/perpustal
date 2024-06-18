<?php
    $id_pinjam = $_GET['id'];
    include 'connection.php';
    $sqlq = "UPDATE peminjaman SET status = 'aktif' WHERE id_peminjaman = $id_pinjam";
    $result = mysqli_query($con, $sqlq);
    echo "PEMINJAMAN AKTIF!";
    echo '
        <button>
            <a href="data_peminjaman.php">
                BACK
            </a>
        </button><br>
        ';
?>