<?php

// --- FILE: admin/module/barang/list.php ---
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/koneksi.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/helper.php");



$queryBarang = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY barang_id DESC");

echo "<h2>Daftar Barang</h2>";
echo "<div id='frame-tambah'>
    <a href='index.php?module=barang&action=form' class='tombol-action'>+ Tambah Barang</a>
</div>";

echo "<table class='table-list'>
<tr class='baris-title'>
    <th class='kolom-nomor'>No</th>
    <th class='kiri'>Nama Barang</th>
    <th class='tengah'>Harga</th>
    <th class='tengah'>Stok</th>
    <th class='tengah'>Status</th>
    <th class='tengah'>Action</th>
</tr>";

$no = 1;
while($row = mysqli_fetch_assoc($queryBarang)) {
    echo "<tr>
        <td class='kolom-nomor'>$no</td>
        <td class='kiri'>$row[nama_barang]</td>
        <td class='tengah'>".rupiah($row['harga'])."</td>
        <td class='tengah'>$row[stok]</td>
        <td class='tengah'>$row[status]</td>
        <td class='tengah'>
            <a class='tombol-action' href='index.php?module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
        </td>
    </tr>";
    $no++;
}

echo "</table>";



