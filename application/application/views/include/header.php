<?php 
$alert_msg=$this->session->userdata('alert_msg');
    $tk_c = $this->router->class; //DASHOBOARD
    $tk_m = $this->router->method;

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title. ' | ' : '' ?>Dashboard</title>
    <meta http-equ  iv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/logo1.ico"/>

    <!--global styles-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/components.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/custom.css" />
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
                <div class="menu">
                    <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars"></i>
                    </span>
                </div>
                <div class="topnav dropdown-menu-right float-right">
                    
                 
                
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img  src="<?=base_url();?>assets/img/admin.jpg" class="admin_img2 img-thumbnail rounded-circle avatar-img"> <strong class="admin_img2"> Admin</strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <a class="dropdown-item" href="<?php echo site_url('Auth/logout'); ?>"><i class="fa fa-sign-out"></i>
                                    Log Out</a>
                            </div>
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
        <div id="left">
            <div class="menu_scroll">
             
                <ul id="menu">
                    <li class="<?php if($tk_c == 'dashboard' && $tk_m == 'index'){ echo 'active';} ?>">
                        <a href="<?php echo site_url('dashboard'); ?>">
                            <i class="fa fa-tachometer"></i>
                            <span class="link-title menu_hide">&nbsp;Dashboard 

                            </span>
                        </a>
                    </li>
                    <li class="dropdown_menu <?php if($tk_c == 'dashboard' && $tk_m == 'country' || $tk_m == 'add_country'){ echo 'active'; }?> ">
                        <a href="javascript:;">
                            <!-- <i class="fa fa-user"></i> -->
                            <i class="fa fa-globe"></i>
                            <span class="link-title menu_hide">&nbsp; Country</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li class="<?php if($tk_m == 'country'){echo 'active';}?>">
                                <a href="<?=base_url();?>dashboard/country">
                                    <i class=""></i>
                                    &nbsp; All Country
                                </a>
                            </li>
                            <li class="<?php if($tk_m == 'add_country'){echo 'active';}?>">
                                <a href="<?=base_url();?>dashboard/add_country">
                                    <i class=""></i>
                                    &nbsp; Add Country 
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if($tk_c == 'dashboard' && $tk_m == 'activities'){ echo 'active';} ?>">
                        <a href="<?php echo site_url('dashboard/activities'); ?>">
                            <i class="fa fa-flag"></i>
                            <span class="link-title menu_hide">&nbsp;Activities</span>
                        </a>
                    </li>
                    <li class="<?php if($tk_c == 'dashboard' && $tk_m == 'service'){ echo 'active';} ?>">
                        <a href="<?php echo site_url('dashboard/service'); ?>">
							<i class="fa fa-cog"></i>
                            <span class="link-title menu_hide">&nbsp;Service</span>
                        </a>
                    </li>
                    <li class="dropdown_menu <?php if($tk_c == 'dashboard' && $tk_m == 'all_packages' || $tk_m == 'add_packages'){ echo 'active'; }?> ">
                        <a href="javascript:;">
                            <!-- <i class="fa fa-user"></i> -->
                            <i class="fa fa-archive"></i>
                            <span class="link-title menu_hide">&nbsp; Packages</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li class="<?php if($tk_m == 'all_packages'){echo 'active';}?>">
                                <a href="<?=base_url();?>dashboard/all_packages">
                                    <i class=""></i>
                                    &nbsp; All Packages
                                </a>
                            </li>
                            <li class="<?php if($tk_m == 'add_packages'){echo 'active';}?>">
                                <a href="<?=base_url();?>dashboard/add_packages">
                                    <i class=""></i>
                                    &nbsp; Add Package 
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu <?php if($tk_c == 'dashboard' && $tk_m == 'all_custom_tour' || $tk_m == 'custom_tour'){ echo 'active'; }?> ">
                        <a href="javascript:;">
                            <!-- <i class="fa fa-user"></i> -->
                            <i class="fa fa-archive"></i>
                            <span class="link-title menu_hide">&nbsp; Custom Tour</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li class="<?php if($tk_m == 'all_custom_tour'){echo 'active';}?>">
                                <a href="<?=base_url();?>custom_tour/all_custom_tour">
                                    <i class=""></i>
                                    &nbsp; All Custom Tours
                                </a>
                            </li>
                            <li class="<?php if($tk_m == 'custom_tour'){echo 'active';}?>">
                                <a href="<?=base_url();?>custom_tour/custom_tour">
                                    <i class=""></i>
                                    &nbsp; Add Custom Tour
                                </a>
                            </li>
                        </ul>
                    </li>
					<li class="<?php if($tk_c == 'dashboard' && $tk_m == 'events'){ echo 'active';} ?>">
                        <a href="<?php echo site_url('dashboard/events'); ?>">
							<i class="fa fa-calendar"></i>
                            <span class="link-title menu_hide">&nbsp;Events</span>
                        </a>
                    </li>
                    <li class="dropdown_menu <?php if($tk_c == 'dashboard' && $tk_m == 'add_blog' || $tk_m == 'add_blog'){ echo 'active'; }?> ">
                        <a href="javascript:;">
                            <!-- <i class="fa fa-user"></i> -->
                            <i class="fa fa-rss-square" aria-hidden="true"></i>
                            <span class="link-title menu_hide">&nbsp; Blogs</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li class="<?php if($tk_m == 'all_blog'){echo 'active';}?>">
                                <a href="<?=base_url();?>blog/all_blog">
                                    <i class=""></i>
                                    &nbsp; All Blog
                                </a>
                            </li>
                            <li class="<?php if($tk_m == 'add_blog'){echo 'active';}?>">
                                <a href="<?=base_url();?>blog/add_blog">
                                    <i class=""></i>
                                    &nbsp; Add Blog
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu <?php if($tk_c == 'Pages' && $tk_m == 'client_reviews' || $tk_m == 'our_partners' || $tk_m == 'home' || $tk_m == 'slider' || $tk_m == 'about_us' || $tk_m == 'terms_and_conditions'){ echo 'active'; }?> ">
                        <a href="javascript:;">
                            <!-- <i class="fa fa-user"></i> -->
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span class="link-title menu_hide">&nbsp; Pages</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li class="<?php if($tk_m == 'home'){echo 'active';}?>">
                                <a href="<?=base_url();?>pages/home">
                                    <i class=""></i>
                                    &nbsp; Home Page
                                </a>
                            </li>
                            <li class="<?php if($tk_m == 'slider'){echo 'active';}?>">
                                <a href="<?=base_url();?>pages/slider">
                                    <i class=""></i>
                                    &nbsp; Slider
                                </a>
                            </li>
                            <li class="<?php if($tk_m == 'client_reviews'){echo 'active';}?>">
                                <a href="<?php echo site_url('Pages/client_reviews'); ?>">
                                    <i class=""></i>
                                    &nbsp; Client Reviews
                                </a>
                            </li>
                            <li class="<?php if($tk_m == 'our_partners'){echo 'active';}?>">
                                <a href="<?php echo site_url('Pages/our_partners'); ?>">
                                    <i class=""></i>
                                    &nbsp; Our Partners
                                </a>
                            </li>
							<li class="<?php if($tk_m == 'about_us'){echo 'active';}?>">
                                <a href="<?php echo site_url('Pages/about_us'); ?>">
                                    <i class=""></i>
                                    &nbsp; About US
                                </a>
                            </li>
                            <li class="<?php if($tk_m == 'terms_and_conditions'){echo 'active';}?>">
                                <a href="<?php echo site_url('Pages/terms_and_conditions'); ?>">
                                    <i class=""></i>
                                    &nbsp; Terms And Conditions
                                </a>
                            </li>
                        </ul>
				 </ul>
                <!-- /#menu -->
            </div>
        </div>
