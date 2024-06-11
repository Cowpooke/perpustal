<?php
    session_start();
    include 'connection.php';
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    } 
    if (isset($_POST['submit'])) {
        $user = $_SESSION['username'];
        $id_buku = $_POST['id_buku'];

        $check = "select * from buku where id_buku = $id_buku";
        $result = mysqli_query($con, $check);
        $data = mysqli_fetch_assoc($result);
        $stock_update = $data['stok'] - 1;
        
        $q_update = "UPDATE buku SET stok = $stock_update WHERE id_buku = $id_buku";
        $result = mysqli_query($con, $q_update);

        $tgl_pinjam = date('Y-m-d');
        $tgl_kembali = date('Y-m-d', strtotime($tgl_pinjam. ' + 5 days'));
        $queryInsert = "INSERT INTO peminjaman (id_buku, tgl_pinjam, tgl_kembali) VALUES ($id_buku, $tgl_pinjam, $tgl_kembali)";

        if (mysqli_query($con, $queryInsert)) {
        $lastID = mysqli_insert_id($con);

        $queryRetrieve = "SELECT * FROM peminjaman WHERE id = $lastID";
        $result = mysqli_query($con, $queryRetrieve);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo "<h3>Newly Added User:</h3>";
            echo "<p>ID: " . $row['id'] . "</p>";
        } else {
            echo "Error retrieving data: " . mysqli_error($con);
        }
        } else {
        echo "Error inserting data: " . mysqli_error($con);
        }
    }

?>