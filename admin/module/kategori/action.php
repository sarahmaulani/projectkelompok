<?php
include_once("../../../koneksi.php");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}


$kategori = $_POST['kategori'];
$status = $_POST['status'];
$button = $_POST['button'];

if($button == "Add"){
    mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");
}else if($button == "Update"){
    $kategori_id = $_POST['kategori_id'];
    mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori', status='$status' WHERE kategori_id='$kategori_id'");
}

header("location: ../../index.php?module=kategori&action=list");
?>
