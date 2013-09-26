<?php
$this->view("header.php");
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Master Data Paket Rental Mobil
        </div>
        <div class="panel-body">
            <p><a href="<?php echo site_url('c_rental/tampil_form_input/null'); ?>" type="button" class="btn btn-danger btn-sm">Tambah Rental</a>
            </p>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Rental</th>
                        <th>Nama Rental</th>
                        <th>Jenis Kendaraan</th>
                        <th>Kapasitas</th>
                        <th>Harga Sewa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($rental)) {
                        exit();
                    } else {
                        $no = 1;
                        foreach ($rental as $nilai):
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nilai->id_rental; ?></td>
                                <td><?php echo $nilai->nama_rental; ?></td>
                                <td><?php echo $nilai->jenis_kendaraan; ?></td>
                                <td><span><?php echo $nilai->kapasitas_muat." Org ".$nilai->kapasitas_mesin." cc"; ?></span></td>
                                <td><?php echo "Rp.".$nilai->harga_rental; ?></td>
                                <td>
                                    <a href="<?php echo site_url('c_rental/tampil_form_input/'.$nilai->id_rental); ?>" type="button" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="<?php echo site_url('c_rental/hapus_rental/'.$nilai->id_rental); ?>" type="button" class="btn btn-primary btn-xs">Hapus</a>
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