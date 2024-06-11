<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    $username = $_SESSION['username'];
    include "connection.php";
    $sql = "SELECT buku.id_buku,id_peminjaman,judul,tgl_pinjam,tgl_kembali,status,username
                FROM buku JOIN peminjaman ON
                buku.id_buku = peminjaman.id_buku
                WHERE peminjaman.username = '$username'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    if ($data == null) {
        echo 'Status Peminjaman : Belum ada data';
    } else {
        if ($data['status'] == 'pending') {
            echo "Status peminjaman : ".$data['status'];
            echo 'kode peminjaman : '.$data['id_peminjaman'];
        } elseif ($data['status'] == 'aktif'){
            echo "Status peminjaman : ".$data['status'];
        }
    }
    
    
?>
 
<table>
    <thead>
        <tr>
            <th> </th>
            <th>id buku</th>
            <th>judul</th>
            <th>tgl_pinjam</th>
            <th>tgl_kembali</th>
            <th>status</th>
            <th>denda</th>
        </tr>
    </thead>
    <tbody>
<?php
    $result = mysqli_query($con, $sql);
    $num = 1;
    while ($td = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$num}</td>
                <td>{$td['id_buku']}</td>
                <td>{$td['judul']}</td>
                <td>{$td['tgl_pinjam']}</td>
                <td>{$td['tgl_kembali']}</td>
                <td>{$td['status']}</td>
                <td>";
    $date1 = new DateTime($td['tgl_kembali']);
    $date2 = new DateTime(date('Y-m-d'));

    $interval = $date1->diff($date2);
    $days_between = $interval->days;
    $value = floatval($days_between);
    if ($value > 0){
        $denda = 2000*$value;
        echo 'Rp.'.$denda;
    } else {
        echo 'Rp. 0';
    }
                      
    echo "</td>
        </tr>";
    $num++;
    }
?>
    </tbody>
</table>
<a class="button" href="dashboard.php">back</a>
