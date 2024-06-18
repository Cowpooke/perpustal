<?php
    session_start();
    include 'connection.php';
        $username = $_SESSION['username'];
        $id_buku = $_POST['id_buku'];

        $check = "select * from buku where id_buku = $id_buku";
        $result = mysqli_query($con, $check);
        $data = mysqli_fetch_assoc($result);
        $stock_update = $data['stok'] - 1;
        
        $q_update = "UPDATE buku SET stok = $stock_update WHERE id_buku = $id_buku";
        $result = mysqli_query($con, $q_update);

        //$tgl_pinjam = date('Y-m-d');

        //$tgl_kembali = date('Y-m-d', strtotime($tgl_pinjam. ' + 5 days'));

        $queryInsert = "insert into peminjaman (username, id_buku, status) values ('$username', $id_buku, 'pending')";

        if (mysqli_query($con, $queryInsert)) {
        $lastID = mysqli_insert_id($con);

        $queryRetrieve = "SELECT * FROM peminjaman WHERE id_peminjaman = $lastID";
        $result = mysqli_query($con, $queryRetrieve);
        $row = mysqli_fetch_assoc($result);
        $id_peminjaman = $row['id_peminjaman'];
        echo "Kode Peminjaman : ".$id_peminjaman."<br>";
        echo "Tanggal dikembalikan : ".$tgl_kembali."<br>";
        echo "<a href='dashboard.php'>menu</a>";
        }

?>