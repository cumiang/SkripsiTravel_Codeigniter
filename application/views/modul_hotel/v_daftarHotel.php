<?php
$this->view("header.php");
?>

<div class="col-lg-9">        
    <div class="panel panel-default">
        <div class='panel-heading'>
            Master Data Hotel
        </div>
        <div class="panel-body">
            <p><a href="<?php echo site_url('c_hotel/tampil_form_input/null'); ?>" type="button" class="btn btn-danger btn-sm">Tambah Hotel</a>
            </p>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Hotel</th>
                        <th>Nama Hotel</th>
                        <th>Lokasi</th>
                        <th>Fasilitas</th>
                        <th>Harga Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($hotel)) {
                        exit();
                    } else {
                        $no = 1;
                        foreach ($hotel as $nilai):
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nilai->id_hotel; ?></td>
                                <td><?php echo $nilai->nama_hotel; ?></td>
                                <td><?php echo $nilai->lokasi_hotel; ?></td>
                                <td><?php echo $nilai->fasilitas; ?></td>
                                <td><?php echo $nilai->harga_paket; ?></td>
                                <td>
                                    <a href="<?php echo site_url('c_hotel/tampil_form_input/'.$nilai->id_hotel); ?>" type="button" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="<?php echo site_url('c_hotel/hapus_hotel/'.$nilai->id_hotel); ?>" type="button" class="btn btn-primary btn-xs">Hapus</a>
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