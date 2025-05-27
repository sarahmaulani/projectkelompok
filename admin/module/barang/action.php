<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/koneksi.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/helper.php");


$nama_barang = $_POST['nama_barang'];
$kategori_id = $_POST['kategori_id'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$status = $_POST['status'];
$button = $_POST['button'];
$barang_id = $_POST['barang_id'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

if (!empty($gambar)) {
    move_uploaded_file($tmp, "../../images/barang/" . $gambar);
}


if ($button == "Tambah") {
    mysqli_query($koneksi, "INSERT INTO barang (kategori_id, nama_barang, gambar, harga, stok, status) 
                            VALUES ('$kategori_id', '$nama_barang', '$gambar', '$harga', '$stok', '$status')");
} else if ($button == "Update") {
    if ($gambar != "") {
        mysqli_query($koneksi, "UPDATE barang SET kategori_id='$kategori_id',
                                nama_barang='$nama_barang',
                                gambar='$gambar',
                                harga='$harga',
                                stok='$stok',
                                status='$status' WHERE barang_id='$barang_id'");
    } else {
        mysqli_query($koneksi, "UPDATE barang SET kategori_id='$kategori_id',
                                nama_barang='$nama_barang',
                                harga='$harga',
                                stok='$stok',
                                status='$status' WHERE barang_id='$barang_id'");
    }
}

header("Location: ../../index.php?module=barang&action=list");
exit;

