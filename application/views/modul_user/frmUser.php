<?php
$this->view("header.php");

if(empty($user)){
    $id = "";
    $nama = "";
    $pass = "";
    $level = "";
    $aksi = "c_user/CU_user/ADD/NULL";
}else{
    $id = $user->id_user;
    $nama =$user->nama_user;
    $pass =$user->password;
    $level =$user->level;
    $aksi = "c_user/CU_user/EDIT/$id";
}

?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Tambah Data User
        </div>
        <div class="panel-body">
            <?php
            echo form_open($aksi, array("class" => "bs-example form-horizontal"));
            ?>
            <fieldset>
                <legend>Input Baru</legend>
                <div class="form-group">
                    <label for="txtID" class="col-lg-2 control-label">ID User</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtID" placeholder="Kode User" value="<?php echo $id;  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtUser" class="col-lg-2 control-label">Nama User</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtUser" placeholder="Nama User" value="<?php echo $nama;  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPass" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="txtPass" placeholder="Password" value="<?php echo $pass;  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cmbLevel" class="col-lg-2 control-label">Level</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="cmbLevel">
                            <option value="<?php echo $level;  ?>" selected><?php echo $level;  ?></option>
                            <option value="Admin">Admin</option>
                            <option value="Member">Member</option>
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