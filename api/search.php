
<form action="" method="get">
    <input type="text" name="judul">
    <button class=" btn btn-primary button-submit" type="submit" name="submit" value="submit">
        cari
    </button>
</form>

<?php
    include 'connection.php';
    if (isset($_GET['submit'])) {
        $keyword = $_GET['judul'];
        $query = "SELECT * FROM buku WHERE judul LIKE '%$keyword%'";
        $execute = mysqli_query($con, $query);
        
        $num = 1;
        while ($td = mysqli_fetch_assoc($execute)) {
        echo "
            <table>
                <thead>
                    <tr>
                    <th></th>
                    <th>id buku</th>
                    <th>judul</th>
                    <th>penulis</th>
                    <th>penerbit</th>
                    </tr>
                </thead>
                <tbody>";
        
            echo "<tr>
                    <td>{$num}</td>
                    <td>{$td['id_buku']}</td>
                    <td><a href='buku.php?id={$td['id_buku']}'>{$td['judul']}</a></td>
                    <td>{$td['penulis']}</td>
                    <td>{$td['penerbit']}</td>
                </tr>";
        $num++;
        };
        echo "
                </tbody>
            </table>";
    };
?>
<br>