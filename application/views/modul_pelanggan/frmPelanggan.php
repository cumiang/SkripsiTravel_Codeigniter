<?php
$this->view("header.php");

if(empty($pelanggan)){
    $id = "";
    $nama = "";
    $ktp = "";
    $alamat = "";
    $telp = "";
    $email = "";
    $aksi = "c_pelanggan/CU_pelanggan/ADD/NULL";
}else{
    $id = $pelanggan->id_pelanggan;
    $nama =$pelanggan->nama_pelanggan;
    $ktp =$pelanggan->ktp;
    $alamat =$pelanggan->alamat;
    $telp = $pelanggan->telp;
    $email = $pelanggan->email;
    $aksi = "c_pelanggan/CU_pelanggan/EDIT/$id";
}

?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Tambah Data Pelanggan
        </div>
        <div class="panel-body">
            <?php
            echo form_open($aksi, array("class" => "bs-example form-horizontal"));
            ?>
            <fieldset>
                <legend>Input Baru</legend>
                <div class="form-group">
                    <label for="txtID" class="col-lg-2 control-label">ID Pelanggan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtID" placeholder="Kode Pelanggan" value="<?php echo $id;  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPelanggan" class="col-lg-2 control-label">Nama Pelanggan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtPelanggan" placeholder="Nama Pelanggan" value="<?php echo $nama;  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtKTP" class="col-lg-2 control-label">Nomor KTP</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtKTP" placeholder="nomor KTP" value="<?php echo $ktp;  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtAlamat" class="col-lg-2 control-label">Alamat</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtAlamat" placeholder="Alamat Rumah" value="<?php echo $alamat;  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtTelp" class="col-lg-2 control-label">No.Telpon</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtTelp" placeholder="Nomor Telpon" value="<?php echo $telp;  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtEmail" class="col-lg-2 control-label">E-mail</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtEmail" placeholder="Email" value="<?php echo $email;  ?>">
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