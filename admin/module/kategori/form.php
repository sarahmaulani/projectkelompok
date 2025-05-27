<?php

$kategori = "";
$status = "on";
$button = "Add";

if(isset($_GET['kategori_id'])) {
    $kategori_id = $_GET['kategori_id'];
    $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
    $row = mysqli_fetch_assoc($query);

    if($row){
        $kategori = $row['kategori'];
        $status = $row['status'];
        $button = "Update";
    }
}
?>

<form action="<?php echo BASE_URL."admin/module/kategori/action.php"; ?>" method="POST">

    <input type="hidden" name="kategori_id" value="<?php echo isset($kategori_id) ? $kategori_id : ""; ?>">

    <label>Kategori</label>
    <input type="text" name="kategori" value="<?php echo $kategori; ?>">

    <label>Status</label>
    <select name="status">
        <option value="on" <?php if($status == "on") echo "selected"; ?>>On</option>
        <option value="off" <?php if($status == "off") echo "selected"; ?>>Off</option>
    </select>

    <input type="submit" name="button" value="<?php echo $button; ?>">
</form>


