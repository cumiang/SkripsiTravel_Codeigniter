<?php
$this->view("header.php");

if (empty($tiket)) {
    $id = "";
    $jenis = "";
    $maskapai = "";
    $asal = "";
    $tujuan = "";
    $jadwal = "";
    $harga = 0;
    $status = "";
    $aksi = "c_tiket/CU_tiket/ADD/NULL";
} else {
    $id = $tiket->id_tiket;
    $jenis = $tiket->jenis_tiket;
    $maskapai = $tiket->maskapai;
    $asal = $tiket->asal;
    $tujuan = $tiket->tujuan;
    $jadwal = $tiket->jadwal;
    $harga = $tiket->harga;
    $status = $tiket->status;
    $aksi = "c_tiket/CU_tiket/EDIT/$id";
}
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Tambah Data Tiket
        </div>
        <div class="panel-body">
            <?php
            echo form_open($aksi, array("class" => "bs-example form-horizontal"));
            ?>
            <fieldset>
                <legend>Input Baru</legend>
                <div class="form-group">
                    <label for="txtID" class="col-lg-2 control-label">Kode Booking</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtID" placeholder="Nomor Referensi Tiket" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cmbJenis" class="col-lg-2 control-label">Jenis Tiket</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="cmbJenis">
                            <option value="<?php echo $jenis; ?>" selected><?php echo $jenis; ?></option>
                            <option value="Normal">Normal</option>
                            <option value="Promo">Promo</option>
                            <option value="Diskon">Diskon</option>
                        </select>
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cmbMaskapai" class="col-lg-2 control-label">Jenis Maskapai Penerbangan</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="cmbMaskapai">
                            <option value="<?php echo $maskapai; ?>" selected><?php echo $maskapai; ?></option>
                            <option value="AirAsia">AirAsia</option>
                            <option value="CitiLink">CitiLink</option>
                            <option value="Garuda Indonesia">Garuda Indonesia</option>
                            <option value="Lion Air">Lion Air</option>
                            <option value="Mandala Airlines">Mandala Airlines</option>
                            <option value="Merpati">Merpati</option>
                            <option value="Sriwijaya Air">Sriwijaya Air</option>
                            <option value="Batavia Air">Batavia Air</option>
                        </select>
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtAsal" class="col-lg-2 control-label">Asal Penerbangan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtAsal" placeholder="Asal Keberangkatan" value="<?php echo $asal; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtTujuan" class="col-lg-2 control-label">Tujuan Penerbangan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtTujuan" placeholder="Tujuan Penerbangan" value="<?php echo $tujuan; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtJadwal" class="col-lg-2 control-label">Jadwal Berangkat</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtJadwal" placeholder="Jadwal Penerbangan" value="<?php echo $jadwal; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtHarga" class="col-lg-2 control-label">Harga Tiket</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtHarga" placeholder="Harga Tiket Penerbangan" value="<?php echo $harga; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cmbStatus" class="col-lg-2 control-label">Status Tiket</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="cmbStatus">
                            <option value="<?php echo $status; ?>" selected><?php echo $status; ?></option>
                            <option value="Valid">Valid</option>
                            <option value="Expire">Expire</option>
                        </select>
                        <br>
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