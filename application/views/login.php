<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sign In | 13 Years Guaranteed Education Program</title>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url()."assets/favicon2.ico"?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo base_url()."assets/css/gfonts.css"?>" rel="stylesheet" type="text/css">

    <!-- Material Icons -->
    <link href="<?php echo base_url()."assets/css/material-icons.css"?>" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()."assets/plugins/bootstrap/css/bootstrap.css"?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()."assets/plugins/node-waves/waves.css"?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()."assets/plugins/animate-css/animate.css"?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url()."assets/css/style.css"?>" rel="stylesheet">
    <style>
        body{
            background: url("<?php echo base_url()."assets/images/logo2.png"?>") left;
            background-size: 80%;
            background-repeat: no-repeat;
            max-width: unset;
        }
        .login-box{
            /*margin-right: 100px;*/
        }
    </style>
</head>

    <body class="login-page" style="margin-right:100px;">
        <div class="login-box" style="max-width: 360px;">
        <div class="logo">
            <a href="javascript:void(0);"><b>13 Years</b></a>
            <small> Guaranteed Education Program </small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open('login/login_user', 'role="form" id="loginForm"'); ?>
                    <div class="msg">Sign in</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LdzNjoUAAAAAGtDKI-5gqYuzk0J_x3W5Q4ZhPRW"></div>
                        <label id="captcha-error" class="error hidden" for="recaptcha"> Please verify  </label>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                <?php echo form_close()?>
                <a href="<?php echo base_url()."index.php/general"?>" target="_blank">View Schools Map</a>
            </div>
            <!-- Footer -->
            <div class="row">
                <div class="legal align-center ">
                    <a type="button" class="btn btn-lg bg-teal waves-effect p-l-80 p-r-80" href="http://dmb.moe.gov.lk"> Back to Portal </a>
                </div>
            </div>
            
            <hr>
            <div class="legal align-center" style="padding-bottom:20px;">
                <div class="copyright">
                    &copy;2017 <a href="javascript:void(0);">Data Management Branch</a><br>
                    <a href="javascript:void(0);">Ministry of Education, Sri Lanka</a>
                </div>
            </div>
            <!-- #Footer -->
        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery/jquery.min.js"?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()."assets/plugins/bootstrap/js/bootstrap.js"?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/node-waves/waves.js"?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-validation/jquery.validate.js"?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()."assets/js/pages/examples/sign-in.js"?>"></script>
    <script src="<?php echo base_url()."assets/js/script.js"?>"></script>
    
</body>
<script>
    //var response = grecaptcha.getResponse();

    $( "#loginForm" ).submit(function( event ) {
        var gresponse = grecaptcha.getResponse();
        
        if (!gresponse) {
            $('#captcha-error').removeClass('hidden');
            return false;
        }
        
    });
</script>
</html>

