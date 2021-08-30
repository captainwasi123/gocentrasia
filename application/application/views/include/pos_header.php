<?php 
$alert_msg=$this->session->userdata('alert_msg');
    $tk_c = $this->router->class; //DASHOBOARD
    $tk_m = $this->router->method;

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard-2 | Admire</title>
    <meta http-equ  iv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/logo1.ico"/>

    <!--global styles-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>style/css/components.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>style/css/custom.css" />
    <!-- end of global styles-->

<style>
            /* message box */
            body{
                height:100%;
            }

            .message-box {
                display: none;
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 9999;
            }
            .message-box.open {
                display: block;
            }
            .message-box .mb-container {
                position: absolute;
                left: 0px;
                top: 35%;
                background: rgba(0, 0, 0, 0.9);
                padding: 20px;
                width: 100%;
                z-index:0;
            }
            .message-box .mb-container .mb-middle {
                width: 50%;
                left: 25%;
                position: relative;
                color: #FFF;
            }
            .message-box .mb-container .mb-middle .mb-title {
                width: 100%;
                float: left;
                padding: 10px 0px 0px;
                font-size: 31px;
                font-weight: 400;
                line-height: 36px;
            }
            .message-box .mb-container .mb-middle .mb-title .fa,
            .message-box .mb-container .mb-middle .mb-title .glyphicon {
                font-size: 38px;
                float: left;
                margin-right: 10px;
            }
            .message-box .mb-container .mb-middle .mb-content {
                width: 100%;
                float: left;
                padding: 10px 0px 0px;
            }
            .message-box .mb-container .mb-middle .mb-content p {
                margin-bottom: 0px;
            }
            .message-box .mb-container .mb-middle .mb-footer {
                width: 100%;
                float: left;
                padding: 10px 0px;
            }
            .message-box.message-box-warning .mb-container {
                background: rgba(254, 162, 35, 0.9);
            }
            .message-box.message-box-danger .mb-container {
                background: rgba(182, 70, 69, 0.9);
            }
            .message-box.message-box-info .mb-container {
                background: rgba(63, 186, 228, 0.9);
            }
            .message-box.message-box-success .mb-container {
                background: rgba(149, 183, 93, 0.9);
            }
            .no-print{
                display: none;
            }
        </style>
    

</head>

<body class="body">

<div id="wrap">
    <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand float-left" href="index.html">
                    <h4>ADMIN PENAL</h4>
                </a>
                <div class="topnav dropdown-menu-right float-right">
                    
                 
                
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <a href="<?php echo site_url('Auth/logout'); ?>"  class="btn btn-default no-bg micheal_btn">
                                 <strong class="admin_img2"><i class="fa fa-sign-out"></i> Log Out</strong>
                            </a>
                        </div>
                    </div>

                </div>
              
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>
    <!-- /#top -->
    <div class="wrapper">
       
