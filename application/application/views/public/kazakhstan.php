<?php 
require_once "include/header.php"
?>

<!-- Country Banner Section Starts Here -->
<section class="kazaghstan-bg country-banner" style="background-image: url('<?=base_url('').$country->cover_img?>')!important;">
         <div class="container">
            <div class="banner-text2">
               <h3>Discovered  <?=$country->country_name?> </h3>
               <p><?=$country->tag_line?></p>
            </div>
         </div>
      </section>
      <!-- Country Banner Section Ends Here -->
      <!-- Tour Info Detail Section Starts Here -->
      <section class="pad-bot-60 pad-top-60">
         <div class="container">
            <div class="row">
               <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                  <div class="country-textual">
                     <p> <?=$country->description?> </p>
                  </div>
                  <div class="country-textual2">
		             <?php $imgs = explode(',',$country->c_img);
						 foreach($imgs as $val){ ?>
						   <div> <img src="<?=base_url()?><?=$val?>"> </div>
                  <?php } ?>
						</div>
               </div>
               <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                  <div class="search-form">
                     <input type="text" placeholder="Search here" name="">
                     <button type="submit"> <i class="fa fa-search"> </i> </button>
                  </div>
                  <div class="destination-textual">
                     <h3> About Us </h3>
                     <p> Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin, lorem quis bibendum auct or, nisi elit consequat ipsum, nec sagittis sem. </p>
                  </div>
                  <div class="destination-textual">
                     <h3> Destinations </h3>
                     <ul>
                        <li> <a href=""> Uzbekistan </a> </li>
                        <li> <a href=""> Tajiskistan </a> </li>
                        <li> <a href=""> Krygyzstan </a> </li>
                        <li> <a href=""> Turkmenistan </a> </li>
                        <li> <a href=""> Kazakhstan </a> </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Tour Info Detail Section Ends Here -->
      <!-- Tour Package Type Section Starts Here -->
      <section class="pad-top-60 pad-bot-60">
         <div class="container">
            <div class="sec-head text-center">
               <h3> Tours </h3>
               <p> <?=$country->tour?>  </p>
            </div>
            <div class="package-data">
               <div class="row">
					<?php foreach ($event as $key => $value) { ?>
					
                  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()?><?=$value->images?>">
                           <h4> <?=$value->event_name?> </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> <?=$value->description?>  </p>
                           <p> <b> Places: </b> <span> <?=$value->places_description?> </span></p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> INR<?=number_format($value->group_price)?> </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> INR<?=number_format($value->private_price)?> </b>
                           </h6>
                        </div>
                        <div class="package-box2-features">
								<!-- <?php $serv_imgs = explode(',',$value->serv_img);
									foreach($serv_imgs as $val){ ?>
										<span> <img src="<?=base_url()?>assets\img\service_img\<?=$val?>"> <?=$value->service_name?> </span>
								<?php } ?> -->
								<?php $act_name = explode(',',$value->activity_name);
                        $act_imgs = explode(',',$value->activity_img);
									foreach($act_name as $key => $val){ 
										if ($key <= 4) {
											
										?>
										<span> <img src="<?=base_url()?>assets\img\activity_img\<?=$act_imgs[$key]?>"> <?=$val?> </span>
								<?php } 
								} ?>
                        </div>
                        <div class="package-box2-detail">
                           <a href="<?=base_url()?>Home/packages/<?=hashids_encrypt($value->id); ?>"> VIEW DETAIL </a>
                        </div>
                     </div>
                  </div>

					<?php } ?>
                  <!-- <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()."assets/site/"?>images/kazaghstan-tour3.jpg">
                           <h4> Tour to Uzbekistan </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempordolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
                           <p> <b> Places: </b> <span> Aşgabat </span> <span> Türkmenabat </span> <span> Daşoguz </span> <span> Mary </span> </p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> $2,530 </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> $5,360 </b>
                           </h6>
                        </div>
                        <div class="package-box2-features">
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon1.jpg"> Home stay </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon2.jpg"> Wild Life </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon3.jpg"> Off Road </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon4.jpg"> City Tour </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon5.jpg"> Beverages </span>
                        </div>
                        <div class="package-box2-detail">
                           <a href=""> VIEW DETAIL </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()."assets/site/"?>images/kazaghstan-tour2.jpg">
                           <h4> Tour to Krgyzstan </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempordolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
                           <p> <b> Places: </b> <span> Dushanbe </span> <span> Khujand </span> <span> Bokhtar  </span> <span> Kulob </span> </p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> $3,360 </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> $6,560 </b>
                           </h6>
                        </div>
                        <div class="package-box2-features">
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon1.jpg"> Home stay </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon2.jpg"> Wild Life </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon3.jpg"> Off Road </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon4.jpg"> City Tour </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon5.jpg"> Beverages </span>
                        </div>
                        <div class="package-box2-detail">
                           <a href=""> VIEW DETAIL </a>
                        </div>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </section>
      <!-- Tour Package Type Section Ends Here -->
      <!-- Multi Country Section Starts Here -->
      <section class="pad-top-60 pad-bot-60">
         <div class="container">
            <div class="sec-head text-center">
               <h3> Multi Country Tours </h3>
               <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra   </p>
            </div>
            <div class="package-data">
               <div class="row">
						<?php foreach ($rendomevent as $key => $value) { ?>
							<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()?><?=$value->images?>">
                           <h4> <?=$value->event_name?> </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> <?=$value->description?>  </p>
                           <p> <b> Places: </b> <span> <?=$value->places_description?> </span></p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> INR<?=number_format($value->group_price)?> </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> INR<?=number_format($value->private_price)?> </b>
                           </h6>
                        </div>
                        <div class="package-box2-features">
								<!-- <?php $serv_imgs = explode(',',$value->serv_img);
									foreach($serv_imgs as $val){ ?>
										<span> <img src="<?=base_url()?>assets\img\service_img\<?=$val?>"> <?=$value->service_name?> </span>
								<?php } ?> -->
								<?php $act_name = explode(',',$value->activity_name);
                        $act_imgs = explode(',',$value->activity_img);
									foreach($act_name as $key => $val){ 
										if ($key <= 4) { ?>
										<span> <img src="<?=base_url()?>assets\img\activity_img\<?=$act_imgs[$key]?>"> <?=$val?> </span>
								<?php } 
								} ?>
                        </div>
                        <div class="package-box2-detail">
                           <a href="<?=base_url()?>Home/packages/<?=hashids_encrypt($value->id); ?>"> VIEW DETAIL </a>
                        </div>
                     </div>
                  </div>
						<?php } ?>
                  <!-- <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()."assets/site/"?>images/kazaghstan-tour3.jpg">
                           <h4> Kazakhstan & Tajiskistan </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempordolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
                           <p> <b> Places: </b> <span> Aşgabat </span> <span> Türkmenabat </span> <span> Daşoguz </span> <span> Mary </span> </p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> INR2,530 </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> INR5,360 </b>
                           </h6>
                        </div>
                        <div class="package-box2-features">
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon1.jpg"> Home stay </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon2.jpg"> Wild Life </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon3.jpg"> Off Road </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon4.jpg"> City Tour </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon5.jpg"> Beverages </span>
                        </div>
                        <div class="package-box2-detail">
                           <a href=""> VIEW DETAIL </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()."assets/site/"?>images/kazaghstan-tour2.jpg">
                           <h4> Turkmenistan & Krgyzstan </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempordolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
                           <p> <b> Places: </b> <span> Dushanbe </span> <span> Khujand </span> <span> Bokhtar  </span> <span> Kulob </span> </p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> INR3,360 </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> INR6,560 </b>
                           </h6>
                        </div>
                        <div class="package-box2-features">
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon1.jpg"> Home stay </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon2.jpg"> Wild Life </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon3.jpg"> Off Road </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon4.jpg"> City Tour </span>
                           <span> <img src="<?=base_url()."assets/site/"?>images/visit-icon5.jpg"> Beverages </span>
                        </div>
                        <div class="package-box2-detail">
                           <a href=""> VIEW DETAIL </a>
                        </div>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </section>
      <!-- Multi Country Section Ends Here -->

<?php 
require_once "include/footer.php"

?>

<script>
    $(document).ready(function(){
    $('header').removeClass("header-style2")        
    })
</script>
