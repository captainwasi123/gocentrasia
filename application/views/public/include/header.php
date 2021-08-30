<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php if (!empty($title)) { ?>
         <title> <?=$title." | "?>Go Centrasia </title>
      <?php }else{ ?>
         <title> Go Centrasia </title>
      <?php } ?>
      <!-- Animate With CSS -->
      <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/site/'?>css/animate.css">
      <!-- <link rel="stylesheet" type="text/css" href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css"> -->
      <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" >
		<!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/site/'?>css/slick.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/site/'?>css/slick-theme.css">
      <!-- Bootstrap Grids -->
      <link href="<?=base_url().'assets/site/'?>css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
      <!-- Custom Stylings -->
      <link href="<?=base_url().'assets/site/'?>css/custom.css" rel="stylesheet">
      <!-- Font Awesome Icons -->
      <link href="<?=base_url().'assets/site/'?>web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
      <!-- Jquery Library -->
      <script type="text/javascript" src="<?=base_url().'assets/site/'?>js/jquery-3.2.1.min.js"></script>

      

   </head>
   <body>
      <!-- Top Bar Section Starts Here -->
      <section class="top-bar">
         <div class="container">
            <div class="topbar-content">
               <div class="social-1">
                  <span> FOLLOW US: </span>
                  <a href=""> <i class="fab fa-facebook-f"> </i> </a>
                  <a href=""> <i class="fab fa-instagram"> </i> </a>
                  <a href=""> <i class="fab fa-twitter"> </i> </a>
               </div>
               <div class="social-1">
                  <span> PHONE: </span>
                  <a href="">  1-677-124-44227 </a>
               </div>
               <a href="" class="register-btn"> WANT US TO CALL YOU </a>	
            </div>
         </div>
      </section>
      <!-- Top Bar Section Ends Here -->
      <!-- Header Section Starts Here -->
      <header class="header-style2">
         <div class="container">
            <div class="logo">
               <a href="<?=base_url()."Home/index"?>"> <img src="<?=base_url().'assets/site/'?>images/logo.png"> </a>
            </div>
            <div class="navbar-handler">
               <img src="<?=base_url()."assets/site/"?>images/hamburger.png">
            </div>
            <div class="navbar-custom">
               <div class="menu-item">
                  <a href="<?=base_url()."Home/destination"?>"> Destination </a>
               </div>
               <div class="menu-item">
                  <a href="<?=base_url()."Home/custom_tour"?>"> Custom Tour </a>
               </div>
               <div class="menu-item">
                  <a href="<?=base_url()."Home/about"?>"> About Us </a>
               </div>
					<div class="menu-item">
                  <a href="<?=base_url()."Home/blogs_all"?>"> Blogs </a>
               </div>
               <div class="menu-item">
                  <a data-toggle="modal" data-target=".bs-example-modal-lg2">  Cancellation Policy </a>
               </div>
               <div class="menu-item">
                  <a href="<?=base_url()."Home/contact"?>"> Contact Us </a>
               </div>
            </div>
         </div>
      </header>
      <!-- Header Section Ends Here -->
      <!-- Banner Slider Section Starts Here -->
