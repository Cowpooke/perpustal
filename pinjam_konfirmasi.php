<?php
    $id_pinjam = $_GET['id'];
    include 'connection.php';
    $tgl_pinjam = date('Y-m-d');
    $tgl_kembali = date('Y-m-d', strtotime($tgl_pinjam. ' + 5 days'));
    $sqlq = "UPDATE peminjaman SET 
                tgl_pinjam = '$tgl_pinjam',
                tgl_kembali = '$tgl_kembali' ,
                status = 'aktif' WHERE id_peminjaman = $id_pinjam";
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