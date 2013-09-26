<?php
$this->view("header.php");
if (empty($rental)) {
    $id = "";
    $nama = "";
    $jenis = "";
    $kendaraan = "";
    $dd = "";
    $harga_sewa = 0;
    $harga_sopir = 0;
    $muat = "";
    $mesin = "";
    $fasilitas = "";
    $info = "";
    $gambar = base_url() . "GALERI/DEFAULT.PNG";
    $aksi = "c_rental/CU_rental/ADD/NULL";
} else {
    $id = $rental->id_rental;
    $nama = $rental->nama_rental;
    $jenis = $rental->jenis_kendaraan;
    $kendaraan = $rental->nama_kendaraan;
    $dd = $rental->no_polisi;
    $harga_sewa = $rental->harga_rental;
    $harga_sopir = $rental->harga_sopir;
    $muat = $rental->kapasitas_muat;
    $mesin = $rental->kapasitas_mesin;
    $fasilitas = $rental->fasilitas;
    $info = $rental->info_tambahan;
    if (empty($rental->gambar)) {
        $gambar = base_url() . "GALERI/DEFAULT.PNG";
    } else {
        $gambar = base_url() . "GALERI/" . $rental->gambar;
    }
    $aksi = "c_rental/CU_rental/EDIT/$id";
}
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Tambah Data Rental
        </div>
        <div class="panel-body">
            <?php
            echo form_open_multipart($aksi, array("class" => "bs-example form-horizontal"));
            ?>
            <fieldset>
                <legend>Input Baru</legend>
                <div class="form-group">
                    <label for="txtID" class="col-lg-2 control-label">ID Rental</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtID" placeholder="Kode Rental" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtRental" class="col-lg-2 control-label">Nama Rental</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtRental" placeholder="Nama Rental" value="<?php echo $nama; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cmbJenis" class="col-lg-2 control-label">Jenis Kendaraan</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="cmbJenis">
                            <option value="<?php echo $jenis; ?>" selected><?php echo $jenis; ?></option>
                            <option value="Mini Bus">Mini Bus</option>
                            <option value="APV">APV</option>
                            <option value="Mobil Kota">Mobil Kota</option>
                            <option value="Mobil Wisata">Mobil Wisata</option>
                        </select>
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtKendaraan" class="col-lg-2 control-label">Nama Kendaraan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtKendaraan" placeholder="nama Kendaraan" value="<?php echo $kendaraan; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtDD" class="col-lg-2 control-label">No. Polisi</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtDD" placeholder="nomor DD polisi" value="<?php echo $dd; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtHargaSewa" class="col-lg-2 control-label">Harga Sewa per Hari</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtHargaSewa" placeholder="Harga sewa mobil per hari" value="<?php echo $harga_sewa; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtHargaSopir" class="col-lg-2 control-label">Harga Sopir</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtHargaSopir" placeholder="Harga termasuk dengan sopir" value="<?php echo $harga_sopir; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtMuat" class="col-lg-2 control-label">Kapasitas Muat (orang)</label>
                    <div class="col-lg-10">
                        <input type="number" class="form-control" name="txtMuat" placeholder="kapasitas muat mobil" value="<?php echo $muat; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtMesin" class="col-lg-2 control-label">Kapasitas Mesin (cc)</label>
                    <div class="col-lg-10">
                        <input type="number" class="form-control" name="txtMesin" placeholder="kapasitas mesin mobil" value="<?php echo $mesin; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtFasilitas" class="col-lg-2 control-label">Fasilitas Dalam Mobil</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtFasilitas" placeholder="Fasilitas dalam mobil" value="<?php echo $fasilitas; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtInfo" class="col-lg-2 control-label">Info Tentang Mobil Rental</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="10" name="txtInfo"><?php echo $info; ?></textarea>
                        <span class="help-block">Informasi Tambahan Tentang Mobil yang di rentalkan</span>                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="upload" class="col-lg-2 control-label">Upload Gambar</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="upload_rental">
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