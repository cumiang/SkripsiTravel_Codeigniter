<?php
$this->view("header.php");

if (empty($tour)) {
    $id = "";
    $nama = "";
    $jenis = "";
    $tujuan = "";
    $durasi = "";
    $harga = "";
    $info = "";
    $gambar = base_url() . "GALERI/DEFAULT.PNG";    
    $aksi = "c_tour/CU_tour/ADD/NULL";
} else {
    $id = $tour->id_tour;
    $nama = $tour->nama_tour;
    $jenis = $tour->jenis_tour;
    $tujuan = $tour->tujuan_tour;
    $durasi = $tour->durasi_tour;
    $harga = $tour->harga_tour;
    $info = $tour->info_kegiatan;
    if (empty($tour->gambar)) {
        $gambar = base_url() . "GALERI/DEFAULT.PNG";
    } else {
        $gambar = base_url() . "GALERI/" . $tour->gambar;
    }

    $aksi = "c_tour/CU_tour/EDIT/$id";
}
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Tambah Data Tour
        </div>
        <div class="panel-body">
            <?php
            echo form_open_multipart($aksi, array("class" => "bs-example form-horizontal"));
            ?>
            <fieldset>
                <legend>Input Baru</legend>
                <div class="form-group">
                    <label for="txtID" class="col-lg-2 control-label">ID Tour</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtID" placeholder="Kode Tour" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtTour" class="col-lg-2 control-label">Nama Tour</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtTour" placeholder="Nama Tour" value="<?php echo $nama; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cmbJenis" class="col-lg-2 control-label">Jenis Wisata</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="cmbJenis">
                            <option value="<?php echo $jenis; ?>" selected><?php echo $jenis; ?></option>
                            <option value="Wisata Alam">Wisata Alam</option>
                            <option value="Wisata Tempat">Wisata Tempat</option>
                            <option value="Wisata Budaya">Wisata Budaya</option>
                            <option value="Wisata Bahari">Wisata Bahari</option>
                            <option value="Wisata Keagamaan">Wisata Keagamaan</option>
                        </select>
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtTujuan" class="col-lg-2 control-label">Tujuan WIsata</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtTujuan" placeholder="Tujuan WIsata" value="<?php echo $tujuan; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtDurasi" class="col-lg-2 control-label">Durasi</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtDurasi" placeholder="Batas Hari Kunjungan" value="<?php echo $durasi; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtHarga" class="col-lg-2 control-label">Harga Paket</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtHarga" placeholder="Harga Paket Wisata" value="<?php echo $harga; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtInfo" class="col-lg-2 control-label">Info / Rundown Kegiatan</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="10" name="txtInfo"><?php echo $info; ?></textarea>
                        <span class="help-block">Rincian Semua Kegiatan dan acara yang akan dilakukan sesuai durasi wisata.</span>                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="upload" class="col-lg-2 control-label">Upload Gambar</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="upload_tour">
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