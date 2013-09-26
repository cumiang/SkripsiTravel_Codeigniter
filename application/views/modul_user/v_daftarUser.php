<?php
$this->view("header.php");
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Master Data User
        </div>
        <div class="panel-body">
            <p><a href="<?php echo site_url('c_user/tampil_form_input/null'); ?>" type="button" class="btn btn-danger btn-sm">Tambah User</a>
            </p>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode User</th>
                        <th>Nama User</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($user)) {
                        exit();
                    } else {
                        $no = 1;
                        foreach ($user as $nilai):
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nilai->id_user; ?></td>
                                <td><?php echo $nilai->nama_user; ?></td>
                                <td><?php echo $nilai->level; ?></td>
                                <td>
                                    <a href="<?php echo site_url('c_user/tampil_form_input/'.$nilai->id_user); ?>" type="button" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="<?php echo site_url('c_user/hapus_user/'.$nilai->id_user); ?>" type="button" class="btn btn-primary btn-xs">Hapus</a>
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