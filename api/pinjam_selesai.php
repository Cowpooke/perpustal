<?php
    $id_pinjam = $_GET['id'];
    include 'connection.php';
    $sqlq = "UPDATE peminjaman SET status = 'tidak' WHERE id_peminjaman = $id_pinjam";
    $result = mysqli_query($con, $sqlq);
    echo "PEMINJAMAN SELESAI!";
    echo '
        <button>
            <a href="data_peminjaman.php">
                BACK
            </a>
        </button><br>
        ';
?>