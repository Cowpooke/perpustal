
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
        if($row['role'] == "admin") {
            echo "
                <table class='table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id buku</th>
                            <th>judul</th>
                            <th>penulis</th>
                            <th>penerbit</th>
                            <th>genre</th>
                            <th>opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                $sqlq = "SELECT * FROM BUKU";
                $result = mysqli_query($con, $sqlq);
                $num = 1;
                while ($td = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$num}</td>
                                <td>{$td['id_buku']}</td>
                                <td>{$td['judul']}</td>
                                <td>{$td['penulis']}</td>
                                <td>{$td['penerbit']}</td>
                                <td>{$td['genre']}</td>
                                <td>
                                    <a href='edit_buku.php?id={$td['id_buku']}'>Edit</a>
                                    <a href='delete_buku.php?id={$td['id_buku']}'
                                        onclick='return confirm(\"Are you sure want to delete {$td['judul']} [{$td['id_buku']}]? \") '
                                    >Delete</a>
                                ";
                                
                    echo "</td>
                        </tr>";
                    $num++;
                    }
            } elseif ($row['role'] == "member") {
                echo '
                    role ini tidak diijinkan <br>
                ';
                echo '
                <button>
                    <a href="dashboard.php">
                        BACK TO MENU
                    </a>
                </button><br>
            ';
                
            };

?>
    </tbody>
</table>

<?php include 'bottom_bar.php'; ?>