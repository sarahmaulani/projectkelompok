<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/koneksi.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/helper.php");


$banner_id = $_POST['banner_id'];
$link = $_POST['link'];
$status = $_POST['status'];

// Cek jika ada gambar baru
if($_FILES["gambar"]["name"] != "") {
    $nama_file = $_FILES["gambar"]["name"];
    $tmp = $_FILES["gambar"]["tmp_name"];

    // Upload ke folder slide/
    move_uploaded_file($tmp, "../../images/slide/" . $nama_file);

    // Update data + gambar
    mysqli_query($koneksi, "UPDATE banner SET link='$link', gambar='$nama_file', status='$status' WHERE banner_id='$banner_id'");
} else {
    // Update data tanpa gambar
    mysqli_query($koneksi, "UPDATE banner SET link='$link', status='$status' WHERE banner_id='$banner_id'");
}
if ($button == "Add") {
    if ($fileName) {
        mysqli_query($koneksi, "INSERT INTO banner (gambar, link, status)
                                VALUES ('$fileName', '$link', '$status')");
    }
} else if ($button == "Update") {
    if ($fileName) {
        mysqli_query($koneksi, "UPDATE banner SET gambar='$fileName',
                                                 link='$link',
                                                 status='$status'
                                WHERE banner_id='$banner_id'");
    } else {
        mysqli_query($koneksi, "UPDATE banner SET link='$link',
                                                 status='$status'
                                WHERE banner_id='$banner_id'");
    }
} else if ($button == "Delete") {
    $banner_id = $_GET['banner_id'];
    mysqli_query($koneksi, "DELETE FROM banner WHERE banner_id='$banner_id'");
}

header("location:" . BASE_URL . "admin/index.php?module=banner&action=list");
?>
