<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * Date: 9/26/17
 * Time: 1:54 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> 13 Years Guaranteed Education Program </title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url()."assets/favicon2.ico"?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()."assets/plugins/bootstrap/css/bootstrap.css"?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()."assets/plugins/node-waves/waves.css"?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()."assets/plugins/animate-css/animate.css"?>" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url()."assets/plugins/sweetalert/sweetalert.css"?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url()."assets/css/style.css"?>" rel="stylesheet">

    <!-- Admin Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url()."assets/css/themes/all-themes.css"?>" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url()."assets/plugins/bootstrap-select/css/bootstrap-select.css"?>" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery/jquery.min.js"?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()."assets/plugins/bootstrap/js/bootstrap.js"?>"></script>
</head>


<body class="theme-teal">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" > Professional Entry </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Logged user's Name -->
                <li class="name"><a href="javascript:void(0);"><?php echo $this->session->name; ?></a></li>
                <li class="pull-right dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li><a href="<?php echo base_url()."index.php/login/logout"?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->