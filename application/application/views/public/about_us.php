<?php
	require_once 'include/header.php';
?>
 		<section class="about-bg country-banner" style="background-image: url('<?=base_url('').$about->cover_img?>')!important;">
         <div class="container">
            <div class="banner-text2">
               <h3> <?=@$about->about_us_title?> </h3>
               <?=@$about->about_us_desc?>
            </div>
         </div>
      </section>	
      <!-- About Information Section Starts Here -->
      <section class="pad-bot-60 pad-top-60">
         <div class="container">
            <div class="block-element">
               <div class="story-text">
                  <h3 class="col-blue"> <?=@$about->story_title?>  </h3>
						<?=@$about->story_desc?>
               </div>
               <div class="row" style="margin-top:50px !important;margin-bottom:50px !important">
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                     <div class="who-image">
                        <img src="<?=base_url()?><?=@$about->img?>">
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                     <div class="story-text">
                        <h3 class="col-blue"> <?=@$about->we_do_title?>  </h3>
                        <?=@$about->we_do_desc?>
                        <!-- <ul class="list-type1" style="margin-top: 25px;">
                           <li> <i class="fa fa-angle-right">  </i> First Class Flights </li>
                           <li> <i class="fa fa-angle-right">  </i> Best Price Guarantee </li>
                           <li> <i class="fa fa-angle-right">  </i> 5 Star Accommodations </li>
                           <li> <i class="fa fa-angle-right">  </i> World Class Service </li>
                           <li> <i class="fa fa-angle-right">  </i> Inclusive Packages </li>
                           <li> <i class="fa fa-angle-right">  </i> Handpicked Hotels </li>
                           <li> <i class="fa fa-angle-right">  </i> Latest Model Vehicles </li>
                           <li> <i class="fa fa-angle-right">  </i> Accessibility management </li>
                           <li> <i class="fa fa-angle-right">  </i> 10 Languages available </li>
                           <li> <i class="fa fa-angle-right">  </i> +120 Premium city tours </li>
                        </ul> -->
                     </div>
                  </div>
               </div>
               <div class="story-text">
                  <h3 class="col-blue"> <?=@$about->our_travelers_title?>   </h3>
                  <?=@$about->our_travelers_desc?>
               </div>
            </div>
         </div>
      </section>
      <!-- About Information Section Ends Here -->
      <!-- Client Reviews Section Starts Here -->
		<section class="pad-top-60 pad-bot-60 testimonials-bg">
         <div class="container">
            <div class="sec-head text-left">
               <h3 class="col-white" style="margin-bottom: 0px;"> Client Reviews </h3>
            </div>
            <div class="all-reviews">
				<?php foreach($review as $key => $value) { ?>
               <div class="review-box">
                  <div>
                     <p> <?=$value->review?>. 
                     </p>
                     <img class="tri-icon" src="<?=base_url()."assets/site/"?>images/down-arrow.png">
                     <h5> <?php if(!empty($value->img)) { ?>
								<img  src="<?=base_url()."assets/img/client_img/"?><?=$value->img?>" >
							<?php } else { ?> 
								<img style="width: 5%;" src="<?=base_url()."assets/img/client_img/"?>dummy.png">
							<?php } ?>  <?=$value->name?>  </h5>
                  </div>
               </div>
					<?php } ?>
               
            </div>
         </div>
      </section>
      <!-- Client Reviews Section Ends Here -->
      <!-- Our Partners Section Starts Here -->
      <section class="pad-top-60 pad-bot-60">
         <div class="container">
            <div class="sec-head text-center">
               <h3> Our Partners </h3>
            </div>
            <div class="row">
					<?php foreach ($partner as $key => $value) { ?>
						
					
               <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                  <div class="partner-box">
                     <img src="<?=base_url()."assets/img/partners_logo/"?><?=$value->img?>">
                  </div>
               </div>
					<?php } ?> 
            </div>
         </div>
      </section>
      <!-- Our Partners Section Ends Here -->
      <!-- Footer Section Starts Here -->
      <?php
	require_once 'include/footer.php';
?>
<script src="<?=base_url("assets/site/")?>js/slick-slider.js"> </script>      
      <script type="text/javascript">
         $('.all-reviews').slick({
          dots: true,
          infinite: true,
          speed: 300,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          focusOnSelect: true,
          autoplaySpeed: 2000,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
         
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
         
            {
              breakpoint: 700,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
         
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
         });
         
         
              
      </script>
      
      <script>
    $(document).ready(function(){
    $('header').removeClass("header-style2")        
    })
</script>
