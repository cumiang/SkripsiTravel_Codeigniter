<?php
$this->view("header.php");
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Master Data Paket Tour dan Wisata
        </div>
        <div class="panel-body">
            <p><a href="<?php echo site_url('c_tour/tampil_form_input/null'); ?>" type="button" class="btn btn-danger btn-sm">Tambah Tour</a>
            </p>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Tour</th>
                        <th>Nama Tour</th>
                        <th>Jenis Tour</th>
                        <th>Tujuan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($tour)) {
                        exit();
                    } else {
                        $no = 1;
                        foreach ($tour as $nilai):
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nilai->id_tour; ?></td>
                                <td><?php echo $nilai->nama_tour; ?></td>
                                <td><?php echo $nilai->jenis_tour; ?></td>
                                <td><?php echo $nilai->tujuan_tour; ?></td>
                                <td><?php echo "Rp.".$nilai->harga_tour; ?></td>
                                <td>
                                    <a href="<?php echo site_url('c_tour/tampil_form_input/'.$nilai->id_tour); ?>" type="button" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="<?php echo site_url('c_tour/hapus_tour/'.$nilai->id_tour); ?>" type="button" class="btn btn-primary btn-xs">Hapus</a>
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