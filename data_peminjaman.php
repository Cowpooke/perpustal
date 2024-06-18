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
<table class="table">
    <thead>
        <tr>
            <th>NO</th>
            <th>Username</th>
            <th>id buku</th>
            <th>judul</th>
            <th>tgl_pinjam</th>
            <th>tgl_kembali</th>
            <th>status</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
<?php
    $sqlq = "SELECT buku.id_buku,id_peminjaman,judul,tgl_pinjam,tgl_kembali,status,username
    FROM buku JOIN peminjaman ON
    buku.id_buku = peminjaman.id_buku WHERE status = 'aktif' OR status = 'pending' ";
    $resultq = mysqli_query($con, $sqlq);
    
    $num = 1;
    while ($td = mysqli_fetch_assoc($resultq)){
    echo "<tr>
        <td>{$num}</td>
        <td>{$td['username']}</td>
        <td>{$td['id_buku']}</td>
        <td>{$td['judul']}</td>
        <td>{$td['tgl_pinjam']}</td>
        <td>{$td['tgl_kembali']}</td>
        <td>{$td['status']}</td>
        <td>";
        if($td['status'] == 'pending') {
            echo "<a href='pinjam_konfirmasi.php?id={$td['id_peminjaman']}'>Konfirmasi</a>";
        } elseif($td['status'] == 'aktif') {
            echo "<a href='pinjam_selesai.php?id={$td['id_peminjaman']}'>Selesai</a>";
        }
        echo "</td>
        </tr>";
        $num++;
    }
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


