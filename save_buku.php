<?php
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $genre = $_POST['genre'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $input = $_POST['input'];

    include 'connection.php';
    if ($input == 'submit') {
        $sqlq = "INSERT INTO buku (judul,penulis,penerbit,genre,deskripsi,stok) VALUES ('$judul','$penulis','$penerbit','$genre','$deskripsi','$stok')";
        $save = mysqli_query($con, $sqlq);
        echo "data input berhasil";
        echo '
            <button>
            <a href="input_buku.php">
                BACK TO MENU
            </a>
            </button>
        ';

    } elseif ($input == 'update') {
        $id_buku = $_POST['id_buku'];
        $sqlq = "UPDATE buku SET 
                    judul = '$judul',
                    penulis = '$penulis',
                    penerbit = '$penerbit',
                    genre = '$genre',
                    deskripsi = '$deskripsi',
                    stok = $stok
                    WHERE id_buku = $id_buku";
        $save = mysqli_query($con, $sqlq);
        echo "data update berhasil";
        echo '
            <button>
            <a href="data_buku.php">
                BACK TO MENU
            </a>
            </button>
        ';
    }
    
?>