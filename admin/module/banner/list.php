<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/koneksi.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/helper.php");


$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id DESC");

echo "<h2>Daftar Banner</h2>";
echo "<div id='frame-tambah'>
    <a href='" . BASE_URL . "admin/index.php?module=banner&action=form' class='tombol-action'>+ Tambah Banner</a>
</div>";

echo "<table class='table-list'>
<tr class='baris-title'>
    <th class='kolom-nomor'>No</th>
    <th class='kiri'>Banner</th>
    <th class='tengah'>Status</th>
    <th class='tengah'>Action</th>
</tr>";

$no = 1;
while($row = mysqli_fetch_assoc($queryBanner)) {
    echo "<tr>
        <td class='kolom-nomor'>$no</td>
        <td class='kiri'><img src='" . BASE_URL . "images/slide/$row[gambar]' class='banner-thumb'></td>
        <td class='tengah'>$row[status]</td>
        <td class='tengah'>
            <a class='tombol-action' href='" . BASE_URL . "admin/index.php?module=banner&action=form&banner_id=$row[banner_id]'>Edit</a>
            <a class='tombol-action' href='" . BASE_URL . "admin/module/banner/action.php?button=Delete&banner_id=$row[banner_id]'>Delete</a>
        </td>
    </tr>";
    $no++;
}

echo "</table>";
?>
