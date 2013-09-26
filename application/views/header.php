<!DOCTYPE html>
<html>
    <head>
        <title>AKBAR TOUR AND TRAVEL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootswatch.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="../" class="navbar-brand">Akbar Tours'n Travel</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Layanan Paket <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="">Paket Wisata</a></li>
                        <li><a tabindex="-1" href="#">Paket Rental Mobil</a></li>
                        <li><a tabindex="-1" href="#">Paket Hotel</a></li>
                        <li><a tabindex="-1" href="#">Paket Tiket Penerbangan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Kontak Kami</a>
                </li>
                <li>
                    <a href="#">Galeri Wisata</a>
                </li>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url("c_login/logout"); ?>">Logout</a></li>
                </ul>

        </div>
    </div>
</div>


<div class="container">

    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-3">
                <h1>AKBAR TRAVEL</h1>
                <p class="lead">Halaman Administrator</p>
            </div>
            <div class="col-lg-9">
                <div class="bsa well">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 id="type-blockquotes">Akbar Travel</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="<?php echo base_url(); ?>assets/img/adi.PNG" class='img-circle' width='100' height='100'>
                        </div>
                        <div class="col-lg-10">
                            <blockquote class="pull-left">
                                <p>Sebagai salah satu Bisnis Travel yang berada di Kota Makassar, Akbar Travel memberikan pelayanan kebutuhan Paket untuk tour wisata dan travel sekaligus Penjualan Tiket Penerbangan Domestik,
                                </p>
                                <small>Adhi<cite title="Source Title">Akbar Travel's Owner</cite></small>
                            </blockquote>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-3">        
        <div class="bs-example">
            <div class="list-group">
                <a href="#" class="list-group-item active">Menu Utama</a>
                <a href="<?php echo site_url('c_user/tampil_daftar_user'); ?>" class="list-group-item">Data User</a>
                <a href="<?php echo site_url('c_pelanggan/tampil_daftar_pelanggan'); ?>" class="list-group-item">Data Pelanggan</a>
                <a href="<?php echo site_url('c_tour/tampil_daftar_tour'); ?>" class="list-group-item">Data Paket Tour dan Wisata</a>
                <a href="<?php echo site_url('c_tiket/tampil_daftar_tiket'); ?>" class="list-group-item">Data Tiket Penerbangan</a>
                <a href="<?php echo site_url('c_hotel/tampil_daftar_hotel'); ?>" class="list-group-item">Data Paket Hotel</a>
                <a href="<?php echo site_url('c_rental/tampil_daftar_rental'); ?>" class="list-group-item">Data Rental Mobil</a>
            </div>
        </div>
    </div>