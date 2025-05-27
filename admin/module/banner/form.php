<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/koneksi.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/helper.php");


$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : false;
$gambar = "";
$link = "";
$status = "on";
$button = "Add";

if ($banner_id) {
    $query = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
    $row = mysqli_fetch_assoc($query);

    $gambar = $row['gambar'];
    $link = $row['link'];
    $status = $row['status'];
    $button = "Update";
}
?>

<h2><?php echo $button; ?> Banner</h2>
<form action="<?php echo BASE_URL. "admin/module/banner/action.php"; ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="banner_id" value="<?php echo $banner_id; ?>">

    <div class="element-form">
        <label>Gambar</label>
        <input type="file" name="gambar">
        <?php if ($gambar) {
            echo "<br/><img src='" . BASE_URL . "../images/barang/$gambar' class='banner-thumb'>";
        } ?>
    </div>

    <div class="element-form">
        <label>Link</label>
        <input type="text" name="link" value="<?php echo $link; ?>">
    </div>

    <div class="element-form">
        <label>Status</label>
        <input type="radio" name="status" value="on" <?php if ($status == "on") echo "checked"; ?>> On
        <input type="radio" name="status" value="off" <?php if ($status == "off") echo "checked"; ?>> Off
    </div>

    <div class="element-form">
        <input type="submit" name="button" value="<?php echo $button; ?>" class="tombol-action">
    </div>
</form>
