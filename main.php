<div id="kiri">
    <?php 
        echo kategori($kategori_id);
    ?>
</div>

<div id="kanan">

    <!-- Banner Slide -->
    <div id="slides">
        <?php 
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");
        while($rowBanner = mysqli_fetch_assoc($queryBanner)) {

            // Pastikan gambar banner tidak kosong
            if (!empty($rowBanner['gambar']) && file_exists("images/slide/".$rowBanner['gambar'])) {
                echo "<a href='" . BASE_URL . "{$rowBanner['link']}'>
                        <img src='" . BASE_URL . "images/slide/{$rowBanner['gambar']}' alt='Banner' />
                      </a>";
            }
        }
        ?>
    </div>	

    <!-- Frame Barang -->
    <div id="frame-barang">
        <ul>
            <?php
            $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

            if($kategori_id){
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");
            } else {
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
            }

            $no = 1;
            while($row = mysqli_fetch_assoc($query)) {
                $style = ($no == 3) ? "style='margin-right:0px'" : "";
                $gambarBarang = !empty($row['gambar']) ? BASE_URL . "images/barang/" . $row['gambar'] : BASE_URL . "images/no-image.jpg"; // fallback gambar

                echo "<li $style>
					<div class='keterangan-gambar'>
                            <p><a href='" . BASE_URL . "index.php?page=detail&barang_id={$row['barang_id']}'>{$row['nama_barang']} </a></p>
                            <p class='price' >" . rupiah($row['harga']) . "</p>
                        </div>
                        
                        <br> <a href='" . BASE_URL . "index.php?page=detail&barang_id={$row['barang_id']}' >
                            <img src='$gambarBarang' alt='{$row['nama_barang']}' />
							</br>
                        </a>
						<br> <center> <span>Stok : {$row['stok']}</span> </center>
                        
                        <div class='button-add-cart'>
                            <a href='" . BASE_URL . "tambah_keranjang.php?barang_id={$row['barang_id']}'>+ add to cart</a>
                        
							</div>
                      </li>";

                $no = ($no == 3) ? 1 : $no + 1;
            }
            ?>
        </ul>	
    </div>

</div>
