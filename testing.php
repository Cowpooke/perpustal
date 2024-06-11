<?php
    $tgl_pinjam = date('Y-m-d');

    echo $tgl_pinjam.'<br>';
    echo date('Y-m-d', strtotime($tgl_pinjam. ' + 5 days'));
?>