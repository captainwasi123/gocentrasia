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
                  <!--<div class="search-form">
                     <input type="text" placeholder="Search here" name="">
                     <button type="submit"> <i class="fa fa-search"> </i> </button>
                  </div>-->
                  <!--<div class="destination-textual">
                     <h3> About Us </h3>
                     <p> Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin, lorem quis bibendum auct or, nisi elit consequat ipsum, nec sagittis sem. </p>
                  </div>-->
                   <div class="visa-polic">
                <button class="custom-btn2" data-toggle="modal" data-target=".bs-example-modal-lg4"> See Visa Policy </button>  
                <!--VISA Policy Popup Starts Here-->
<div class="modal fade bs-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="custom-modal-head">
            <h4>  VISA Policy </h4>
            <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="custom-modal-data">
            <div>
               <h5> Loss / Damage </h5>
               <p> Company is not responsible for any loss or damage to personal belongings during the stay in the hotel or while traveling in the coach. Due to theft or loss of baggage, tour participant can lodge a complaint with the local authorities on his/her sole discretion, cost, risk and consequences</p>
            </div>
 
         </div>
      </div>
   </div>
</div>
<!--VISA Policy Popup Ends Here-->
                  </div>
                  
                  
                  <div class="destination-textual">
                     <h3> Destinations </h3>
                     <ul>
                        <?php foreach ($destination as $key => $value) { ?>
                           <li> <a href="<?=base_url()?>/Home/country/<?=hashids_encrypt($value->id)?>"> <?= ucwords($value->country_name); ?> </a> </li>
                        <?php } ?>
                        <!-- <li> <a href=""> Uzbekistan </a> </li>
                        <li> <a href=""> Tajiskistan </a> </li>
                        <li> <a href=""> Krygyzstan </a> </li>
                        <li> <a href=""> Turkmenistan </a> </li>
                        <li> <a href=""> Kazakhstan </a> </li> -->
                     </ul>
                  </div>
                 
                  
                  
                 
                  
               </div>
            </div>
         </div>
      </section>
      <!-- Tour Info Detail Section Ends Here -->
      
      
      <section>
          <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                 <div class="range-filter">
                      	<label for="priceRange">Price Range:</label>
								<input type="text" id="priceRange" name="price_range">
								<div id="price-range" class="slider"></div>
								<span class="tooltip3" style="top: 0px !important;"> Filter By Price </span>
                  </div>
                  
            </div>
            
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
            <div class="show-actives-head">
                <button data-toggle="modal" data-target=".bs-example-modal-lg8"> Activities </button>
                <span class="tooltip3" > Filter By Activities </span>
            </div>
            <div class="show-actives-all">
                <span> Trekking </span> 
                <span> Home Stay </span> 
                <span> Wild Life </span> 
                <span> History  </span> 
                <span> Yurt Stay </span> 
            </div>
            </div>
            
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
            <div class="reset-button-wrapper">
                <button type="reset" class="reset-btn"> Reset  </button>
					 <button type="button" class="reset-btn" id="rangesubmit"> Submit  </button>
            </div>
            </div>


				<!-- model for activity checkbox -->

<div class="modal fade bs-example-modal-lg8" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width:700px;">
      <div class="modal-content">
          <div class="activity-modal-wrapper">
         <div class="activity-modal-head">
             <h3> Select Your Activities </h3>
              <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div> 
         
        <div class="activity-modal-data">
            <?php foreach ($activity as $key => $value) { ?>
					<div>
						<label>
							<input type="checkbox" value="<?=$value->id?>" class="activity_id" name="activity_id[]">
							<img style="background: none; filter: none; border-radius: none; padding: none;
 box-shadow: 1px 1px 10px #6e7686;" src="<?=base_url()?>/assets/img/activity_img/<?=$value->activity_img?>">
							<span >  <?=$value->activity_name?> </span>
						</label>
					</div>
				<?php } ?>
            <!-- <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303158_icon05.png">
            <span class="col-blue">  Trekking </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303203_icon_02.png">
            <span class="col-blue">  Horse Riding </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303273_icon_03.png">
            <span class="col-blue">  Yurt Stay  </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303317_icon_04.png">
            <span class="col-blue">  Home Stay  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303406_Icon_Gray.png">
            <span class="col-blue">  Wildlife  </span>
            </label>
            </div>
            
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303453_icon06.png">
            <span class="col-blue">  Off road  </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303500_icon07.png">
            <span class="col-blue">  Winter Activity  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303579_icon10.png">
            <span class="col-blue">  Culture  </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303636_icon11.png">
            <span class="col-blue">  History  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303677_icon12.png">
            <span class="col-blue">  Cuisine  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303724_icon08.png">
            <span class="col-blue">  Cooking  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303760_icon09.png">
            <span class="col-blue">  Cycling  </span>
            </label>
            </div> -->
            
            
         </div> 
         </div>
      </div>
   </div>
</div>
		  </div>
        </div>
          </div>
      </section>
      
      
      <!-- Tour Package Type Section Starts Here -->
      <section class="pad-top-60 pad-bot-60">
         <div class="container">
            <div class="sec-head text-center">
               <h3> Tours </h3>
               <p> <?=$country->tour?>  </p>
            </div>
            <div class="package-data">
               <div class="row" id="append-data">
               <?php foreach ($event as $key => $value) { ?>
               
                  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
						<a href="<?=base_url()?>Home/packages/<?=hashids_encrypt($value->id); ?>"
							style="background: none; color: none; font-weight: none; letter-spacing: none; padding: none; border-radius: none;"
							>
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
						</a>
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
							<a href="<?=base_url()?>Home/packages/<?=hashids_encrypt($value->id); ?>"
							style="background: none; color: none; font-weight: none; letter-spacing: none; padding: none; border-radius: none;"
							>
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
							</a>
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



<!--Select Activities Popup Starts Here-->

<!-- <div class="modal fade bs-example-modal-lg8" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width:700px;">
      <div class="modal-content">
          <div class="activity-modal-wrapper">
         <div class="activity-modal-head">
             <h3> Select Your Activities </h3>
              <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div> 
         
        <div class="activity-modal-data">
            <?php foreach ($activity as $key => $value) { ?>
					<div>
						<label>
							<input type="checkbox" value="<?=$value->id?>" name="activity_id[]">
							<img style="background: none; filter: none; border-radius: none; padding: none;
 box-shadow: 1px 1px 10px #6e7686;" src="<?=base_url()?>/assets/img/activity_img/<?=$value->activity_img?>">
							<span >  <?=$value->activity_name?> </span>
						</label>
					</div>
				<?php } ?>
             <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303158_icon05.png">
            <span class="col-blue">  Trekking </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303203_icon_02.png">
            <span class="col-blue">  Horse Riding </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303273_icon_03.png">
            <span class="col-blue">  Yurt Stay  </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303317_icon_04.png">
            <span class="col-blue">  Home Stay  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303406_Icon_Gray.png">
            <span class="col-blue">  Wildlife  </span>
            </label>
            </div>
            
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303453_icon06.png">
            <span class="col-blue">  Off road  </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303500_icon07.png">
            <span class="col-blue">  Winter Activity  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303579_icon10.png">
            <span class="col-blue">  Culture  </span>
            </label>
            </div>
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303636_icon11.png">
            <span class="col-blue">  History  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303677_icon12.png">
            <span class="col-blue">  Cuisine  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303724_icon08.png">
            <span class="col-blue">  Cooking  </span>
            </label>
            </div>
            
            
            <div>
            <label>
            <input type="checkbox">
            <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/activity_img//2021/04/1618303760_icon09.png">
            <span class="col-blue">  Cycling  </span>
            </label>
            </div> 
            
            
         </div> 
         </div>
      </div>
   </div>
</div> -->
 <!--Select Activities Popup Starts Here-->










<?php 
require_once "include/footer.php"

?>

<script>
    $(document).ready(function(){
    $('header').removeClass("header-style2");    
    })


	// $(document).ready(function () { 
	// 	$('#rangesubmit').click(function (e) { 
	// 		e.preventDefault();
	// 		var val = [];
	// 		$(':checkbox:checked').each(function(i){
	// 			val[i] = $(this).val();
	// 		}); 
	// 		var priceRange = $('#priceRange').val();

	// 		$.ajax({
	// 			type: "post",
	// 			url: "<?=base_url()?>/Home/price_range_filter",
	// 			data: {
	// 				'activty_id':val,
	// 				'pricerange':priceRange
	// 			},
	// 			dataType: "json",
	// 			success: function (response) {
	// 				console.log(response);
	// 			}
	// 		});
	// 	});
	// })

		
	$(document).ready(function () { 



		$( "#price-range" ).slider({
			range: true,
			min: 0,
			max: 200000,
			slide:function(event, ui){
				load_product(ui.values[0], ui.values[1]);
			}
		});

		function load_product(min, max)
		{
			$.ajax({
				url:"<?=base_url()?>/Home/price_range_filter",
				method:"POST",
				data:{min:min, max:max},
				success:function(data)
				{
					
				}
			});
		}


	})


</script>
