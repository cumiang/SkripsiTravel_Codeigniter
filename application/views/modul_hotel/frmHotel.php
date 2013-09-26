<?php
$this->view("header.php");

if (empty($hotel)) {
    $id = "";
    $nama = "";
    $lokasi = "";
    $alamat = "";
    $fasilitas = "";
    $harga = 0;
    $info = "";
    $gambar = base_url() . "GALERI/DEFAULT.PNG";
    $aksi = "c_hotel/CU_hotel/ADD/NULL";
} else {
    $id = $hotel->id_hotel;
    $nama = $hotel->nama_hotel;
    $lokasi = $hotel->lokasi_hotel;
    $alamat = $hotel->alamat_hotel;
    $fasilitas = $hotel->fasilitas;
    $harga = $hotel->harga_paket;
    $info = $hotel->info_tambahan;
    if (empty($hotel->gambar)) {
        $gambar = base_url() . "GALERI/DEFAULT.PNG";
    } else {
        $gambar = base_url() . "GALERI/" . $hotel->gambar;
    }
    $aksi = "c_hotel/CU_hotel/EDIT/$id";
}
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Tambah Data Hotel
        </div>
        <div class="panel-body">
            <?php
            echo form_open_multipart($aksi, array("class" => "bs-example form-horizontal"));
            ?>
            <fieldset>
                <legend>Input Baru</legend>
                <div class="form-group">
                    <label for="txtID" class="col-lg-2 control-label">ID Hotel</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtID" placeholder="Kode Hotel" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtHotel" class="col-lg-2 control-label">Nama Hotel</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtHotel" placeholder="Nama Hotel" value="<?php echo $nama; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtLokasi" class="col-lg-2 control-label">Lokasi Hotel</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtLokasi" placeholder="nama lokasi tempat" value="<?php echo $lokasi; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtAlamat" class="col-lg-2 control-label">Alamat</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtAlamat" placeholder="Alamat Rumah" value="<?php echo $alamat; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtFasilitas" class="col-lg-2 control-label">Fasilitas Hotel</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtFasilitas" placeholder="fasilitas Hotel" value="<?php echo $fasilitas; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtHarga" class="col-lg-2 control-label">Harga Paket</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtHarga" placeholder="Harga per Paket" value="<?php echo $harga; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtInfo" class="col-lg-2 control-label">Info Tentang Paket dan Hotel</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="10" name="txtInfo"><?php echo $info; ?></textarea>
                        <span class="help-block">Informasi Tambahan Tentang Paket yang ditawarkan</span>                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="upload" class="col-lg-2 control-label">Upload Gambar</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="userfile">
                        </br>
                        <img src="<?php echo $gambar; ?>" class="img-rounded">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <?php
                        echo form_submit("submit", "Simpan", "class = 'btn btn-primary'");
                        ?>
                        <button class="btn btn-default" type="reset">Batal</button> 
                    </div>
                </div>
            </fieldset>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>


<?php
$this->view("footer.php");
?>