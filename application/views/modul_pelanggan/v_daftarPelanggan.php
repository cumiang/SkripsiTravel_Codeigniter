<?php
$this->view("header.php");
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Master Data Pelanggan
        </div>
        <div class="panel-body">
            <p><a href="<?php echo site_url('c_pelanggan/tampil_form_input/null'); ?>" type="button" class="btn btn-danger btn-sm">Tambah Pelanggan</a>
            </p>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($pelanggan)) {
                        exit();
                    } else {
                        $no = 1;
                        foreach ($pelanggan as $nilai):
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nilai->id_pelanggan; ?></td>
                                <td><?php echo $nilai->nama_pelanggan; ?></td>
                                <td><?php echo $nilai->alamat; ?></td>
                                <td><?php echo $nilai->telp; ?></td>
                                <td><?php echo $nilai->email; ?></td>
                                <td>
                                    <a href="<?php echo site_url('c_pelanggan/tampil_form_input/'.$nilai->id_pelanggan); ?>" type="button" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="<?php echo site_url('c_pelanggan/hapus_pelanggan/'.$nilai->id_pelanggan); ?>" type="button" class="btn btn-primary btn-xs">Hapus</a>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
$this->view("footer.php");
?>