<?php
    $id   = $_GET['id'];

    include "connection.php";
    $sql = "DELETE * FROM buku WHERE id_buku = '$id'";
    $result = mysqli_query($con, $sql);
    if (!$result){
        die("fail");   
    }
    echo '<meta http-equiv="refresh" content="0;url=data_buku.php">';
?>
