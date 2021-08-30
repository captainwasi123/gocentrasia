<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/site/'?>css/animate.css">
<!-- <link rel="stylesheet" type="text/css" href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css"> -->
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
<style type="text/css">
         .related-tours-head h3 {
            color: black;
            font-weight: 600;
            letter-spacing: 0.4px;
            font-size: 32px;
            text-align: center;
         }
      </style>
<div class="tour-path">
                     <div class="tour-path-head">
                        <h3> Your Tour Itinerary: </h3>
                     </div>
                     <div class="tour-path-content">

								<?php 
									foreach ($itin as $key => $val) { 
								?>
									<div class="path-box">
										<h4> <?=$val->title?> </h4>
										<div>
											<!-- <img src="<?=base_url($val->img)?>" /> -->
											<p><?=$val->detail?></p>
										</div>
                        	</div>
								<?php } ?>
                     </div>
                  </div>
      <script src="<?=base_url().'assets/site/'?>js/bootstrap.min.js"> </script>
