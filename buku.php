<?php
$id   = $_GET['id'];

include "connection.php";
$sql = "SELECT * FROM buku WHERE id_buku = $id";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("fail");
}

$td = mysqli_fetch_assoc($result);

echo "Judul : {$td['judul']} <br>";
echo "Penulis : {$td['penulis']} <br>";
echo "Penerbit : {$td['penerbit']} <br>";
echo "Genre : {$td['genre']} <br>";
echo "Deskripsi : {$td['deskripsi']} <br>";
echo "Stok : {$td['stok']} <br>";

if ($result == null){

} else {
    $genre = $td['genre'];
    echo "Buku Serupa : <br>";
    $rekomendasi = "SELECT * FROM buku WHERE GENRE = '$genre' AND id_buku != $id ORDER BY RAND() LIMIT 5;";
    $hasil = mysqli_query($con, $rekomendasi);
    while ($req = mysqli_fetch_assoc($hasil)) {
        echo "Judul : {$req['judul']} <br>";
        echo "Penulis : {$req['penulis']} <br>";
        echo "Penerbit : {$req['penerbit']} <br>";
        echo "Genre : {$req['genre']} <br>";
        echo "Deskripsi : {$req['deskripsi']} <br>";
    };
};
?>
<form action="kode_peminjaman.php" method="post">
    <input type="text" name="id_buku" value="<?= $td['id_buku'];  ?>" hidden>
    <button type="submit" value="submit" name="input">
        pinjam
    </button>
</form>