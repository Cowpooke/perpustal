<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "perpus_db";

    $con = @mysqli_connect($host,$user,$pass,$dbName);
    if (!$con)
        die ("fail to connect");

    //---------------------Users Table-----------------------------
    $sqlTableUsers = "create table if not exists users (
                        username varchar(50) not null,
                        email varchar(40) not null,
                        password varchar(40) not null,
                        role varchar(20) not null,
                        PRIMARY KEY (username)
                        )";
    mysqli_query($con,$sqlTableUsers) or die("can't create table");

    //---------------------Users Table-----------------------------
    $sqlTableBuku = "CREATE TABLE if not exists buku ( 
                        id_buku INT(10) AUTO_INCREMENT PRIMARY KEY,
                        judul VARCHAR(20) NOT NULL,
                        penerbit VARCHAR(20) NOT NULL,
                        genre VARCHAR(20) NOT NULL,
                        penulis VARCHAR(20) NOT NULL,
                        deskripsi TEXT NOT NULL,
                        stok INT(10) NOT NULL
                    )";
    mysqli_query($con,$sqlTableBuku) or die("can't create table");

    //---------------------Users Table-----------------------------
    $sqlTablePeminjaman = "CREATE TABLE if not exists peminjaman (
                            id_peminjaman INT(10) AUTO_INCREMENT PRIMARY KEY,
                            tgl_pinjam DATE NOT NULL,
                            tgl_kembali DATE NOT NULL,
                            username VARCHAR(20) NOT NULL,
                            id_buku INT(10) NOT NULL,
                            status enum('aktif','pending','tidak'),
                            FOREIGN KEY (username) REFERENCES users(username),
                            FOREIGN KEY (id_buku) REFERENCES buku(id_buku)
                        )";
    mysqli_query($con,$sqlTablePeminjaman) or die("can't create table");

?>