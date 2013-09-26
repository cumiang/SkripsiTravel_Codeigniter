<?php
$this->view("header.php");
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Master Data Tiket Penerbangan
        </div>
        <div class="panel-body">
            <p><a href="<?php echo site_url('c_tiket/tampil_form_input/null'); ?>" type="button" class="btn btn-danger btn-sm">Tambah Tiket</a>
            </p>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Tiket</th>
                        <th>Maskapai</th>
                        <th>Asal-Tujuan</th>
                        <th>Jadwal</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($tiket)) {
                        exit();
                    } else {
                        $no = 1;
                        foreach ($tiket as $nilai):
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nilai->id_tiket; ?></td>
                                <td><?php echo $nilai->maskapai; ?></td>
                                <td><?php echo $nilai->asal."-".$nilai->tujuan; ?></td>
                                <td><?php echo $nilai->jadwal; ?></td>
                                <td><?php echo "Rp.".$nilai->harga; ?></td>
                                <td><?php echo $nilai->status; ?></td>
                                <td>
                                    <a href="<?php echo site_url('c_tiket/tampil_form_input/'.$nilai->id_tiket); ?>" type="button" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="<?php echo site_url('c_tiket/hapus_tiket/'.$nilai->id_tiket); ?>" type="button" class="btn btn-primary btn-xs">Hapus</a>
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