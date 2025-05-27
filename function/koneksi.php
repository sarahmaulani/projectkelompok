<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_topangmas";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi GAGAL: " . mysqli_connect_error());
}
?>
