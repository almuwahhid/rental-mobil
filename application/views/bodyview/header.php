<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link href="<?php echo base_url('assets/vendor/fonts/circular-std/style.css" rel="stylesheet')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/concept/style.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/chartist-bundle/chartist.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/morris-bundle/morris.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/c3charts/c3.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css')?>">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js')?>"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-skripsi.css')?>">
    <title>Admin Sewa Mobil</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html"><img src="<?php echo base_url('assets/images/logo.png')?>" alt="" style="height:50px;width:50px;margin-top:-5px" class="user-avatar-md rounded-circle">&nbsp;SEWA MOBIL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('assets/images/admin.png')?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?= $username ?></h5>
                                    <!-- <span class="status"></span><span class="ml-2">Available</span> -->
                                </div>
                                <a class="dropdown-item" href="<?= base_url('admin/ubahpassword') ?>"><i class="fas fa-cog mr-2"></i>Ubah Password</a>
                                <a class="dropdown-item" href="<?= base_url('admin/logout') ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark" style="background-color:white">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php if($page == "dashboard")echo " active";?> " href="<?= base_url()?>"><i class="fas fa-home"></i>Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link<?php if($page == "kendaraan")echo " active";?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-car"></i>Kendaraan </a>
                                <!-- <span class="badge badge-success">6</span> -->
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>kendaraan">Daftar Kendaraan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>kendaraan/tambah">Tambah Kendaraan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link<?php if($page == "model")echo " active";?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-list-ol"></i>Kategori Kendaraan </a>
                                <!-- <span class="badge badge-success">6</span> -->
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>modelkendaraan">Daftar Kategori</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>modelkendaraan/tambah">Tambah Kategori</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link<?php if($page == "tarif")echo " active";?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-2"><i class="fas fa-bus"></i>Tarif </a>
                                <!-- <span class="badge badge-success">6</span> -->
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>tarif">Daftar Tarif</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>tarif/tambah">Tambah Tarif</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                Progress
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php if($page == "user")echo " active";?>" href="<?= base_url()?>user"><i class="fas fa-users"></i>User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php if($page == "booking")echo " active";?>" href="<?= base_url()?>booking"><i class="fas fa-users"></i>Booking</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link<?php if($page == "laporan")echo " active";?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-2"><i class="fas fa-book"></i>Laporan </a>
                                <!-- <span class="badge badge-success">6</span> -->
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>laporan">Laporan Tahunan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>laporan/bulanan">Laporan Bulanan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
