<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/koneksi.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/helper.php");

$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori_id DESC");

echo "<h2>Daftar Kategori</h2>";
echo "<div id='frame-tambah'>
    <a href='" . BASE_URL . "admin/index.php?module=kategori&action=form' class='tombol-action'>+ Tambah Kategori</a>
</div>";

echo "<table class='table-list'>
<tr class='baris-title'>
    <th class='kolom-nomor'>No</th>
    <th class='kiri'>Kategori</th>
    <th class='tengah'>Status</th>
    <th class='tengah'>Action</th>
</tr>";

$no = 1;
while($row = mysqli_fetch_assoc($queryKategori)) {
    echo "<tr>
        <td class='kolom-nomor'>$no</td>
        <td class='kiri'>$row[kategori]</td>
        <td class='tengah'>$row[status]</td>
        <td class='tengah'>
            <a class='tombol-action' href='" . BASE_URL . "admin/index.php?module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
            <a class='tombol-action' href='" . BASE_URL . "admin/module/kategori/action.php?button=Delete&kategori_id=$row[kategori_id]'>Delete</a>
        </td>
    </tr>";
    $no++;
}

echo "</table>";
?>
