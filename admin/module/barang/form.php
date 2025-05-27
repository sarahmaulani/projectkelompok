<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/koneksi.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/helper.php");

$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

$nama_barang = "";
$kategori_id = "";
$harga = "";
$stok = "";
$gambar = "";
$status = "on";
$button = "Tambah";

if ($barang_id) {
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
    $row = mysqli_fetch_assoc($query);

    $nama_barang = $row['nama_barang'];
    $kategori_id = $row['kategori_id'];
    $harga = $row['harga'];
    $stok = $row['stok'];
    $gambar = $row['gambar'];
    $status = $row['status'];
    $button = "Update";
}
?>

<form action="module/barang/action.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="barang_id" value="<?= $barang_id ?>">

    <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="<?= $nama_barang ?>" required />
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" required>
            <?php
            $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
            while ($rowKategori = mysqli_fetch_assoc($queryKategori)) {
                $selected = ($kategori_id == $rowKategori['kategori_id']) ? "selected" : "";
                echo "<option value='{$rowKategori['kategori_id']}' $selected>{$rowKategori['kategori']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" value="<?= $harga ?>" required />
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" value="<?= $stok ?>" required />
    </div>

    <div class="form-group">
        <label>Gambar <?= ($gambar != "") ? "(Kosongkan jika tidak diubah)" : "" ?></label>
        <input type="file" name="gambar" />
        <?php if ($gambar != "") echo "<img src='../images/barang/$gambar' width='100' />"; ?>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status">
            <option value="on" <?= ($status == 'on') ? 'selected' : '' ?>>On</option>
            <option value="off" <?= ($status == 'off') ? 'selected' : '' ?>>Off</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="button" value="<?= $button ?>" />
    </div>
</form>
