<?php
	require_once 'include/header.php';
?>
      <!-- Destination Banner Section Starts Here -->
      <section class="destination-bg country-banner">
         <div class="container">
            <div class="banner-text2">
               <h3> Destination </h3>
               <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                  accumsan lacus vel facilisis.  
               </p>
            </div>
         </div>
      </section>
      <!-- Destination Banner Section Ends Here -->
      
      
      <!-- Explore With Go Center Asia Section Starts Here -->
      <section class="pad-top-60 pad-bot-60">
         <div class="container">
            <div class="explore-data destination-data">
               <div class="row">
					<?php foreach ($country as $key => $value) {
                  if ($key == 0) {
               ?>
						<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
							<div class="explore-box">
								<div class="explore-image">
									<a href="<?=base_url()?>/Home/country/<?=hashids_encrypt($value->id)?>" >
										<img src="<?=base_url().$value->country_img?>">
										<h5> <?= ucwords($value->country_name); ?> </h5>
									</a>
								</div>
							</div>
               	</div>
               <?php } } ?>
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                 <?php foreach ($country as $key => $value) { 
               if ($key != 0) { ?>
                     <div class="explore-box half">
                        <div class="explore-image">
                           <a href="<?=base_url()?>/Home/country/<?=hashids_encrypt($value->id)?>">
                           <img src="<?=base_url().$value->country_img?>">
                           <h5> <?= ucwords($value->country_name); ?> </h5>
                           </a>
                        </div>
                     </div>
            <?php   } } ?>
                  </div> 
               </div>
            </div>
         </div>
      </section>
      <!-- Explore With Go Center Asia Section Ends Here -->
      
      
      <?php
	require_once 'include/footer.php';
?>

<script>
    $(document).ready(function(){
    $('header').removeClass("header-style2")        
    })
</script>
