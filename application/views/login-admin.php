<!DOCTYPE html>
<html>
    <head>
        <title>HALAMAN LOGIN ADMIN</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    </head>
    <style type="text/css">
        /* Override some defaults */
        body {
            padding-top: 150px; 
            background-image: url('<?php echo base_url(); ?>assets/img/back.jpg');
            background-size: 1400px 700px;
        }

    </style>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">        
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">ADMIN LOGIN AKBAR TRAVEL</h3>
                        </div>
                        <div class="panel-body" align="center">
                            <?php
                            echo form_open_multipart("c_login/login", array("class" => "bs-example form-horizontal"));
                            ?>
                            <div class="form-group">
                                <label for="txtID" class="col-lg-2 control-label">User</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="user" placeholder="Nama User">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtID" class="col-lg-2 control-label">Sandi</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" name="pass" placeholder="Password">
                                </div>
                            </div>                                
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-1">
                                    
                                    <?php
                                    echo form_submit("submit", "Masuk", "class = 'btn btn-primary'");
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>

    </body>
</html>
