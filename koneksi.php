<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_topangmas");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
