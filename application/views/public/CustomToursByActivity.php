<?php 
if (!empty($data)) { 
foreach ($data as $key => $tour) { ?>
	<div class="package-box2 custom-sliders-new">
                     <input type="hidden" name="longitude" id="longitude" value="<?=$tour->longitude?>">
                     <input type="hidden" name="latitude" id="latitude" value="<?=$tour->latitude?>"> 

                     <input type="hidden" name="city_longitude" id="city_longitude" value="<?=$tour->city_longitude?>"> 
                     <input type="hidden" name="city_latitude" id="city_latitude" value="<?=$tour->city_latitude?>"> 

                     
                     <div class="new-box5">
                         <div class="left-hor-box">
                        <div class="package-day">
                           <span> <?=$tour->day?> </span>
                        </div>
                        <div class="package-box2-image">
                           <h4> <?=$tour->title?> </h4>
                           <img src="<?=base_url()?><?=$tour->image?>" height="150">
                        </div>
                        </div>
                        <div class="right-hor-box">
                        <div class="package-box2-middle">
                           <p> <?=substr($tour->description,0,90)?> </p>
                           <p>
                              <b class="col-blue" style="display: block;"> Places: </b> <span> <?=$tour->place?> </span> 
                              <!--<span> Mausoleum :  </span> <span> <?=$tour->mausoleum?> </span> -->
                           </p>
                        </div>
                        <?php $act_imgs = explode(',',$tour->activity_img);
                           $act_name = explode(',',$tour->activity_name); ?>
                        <div class="package-box2-features">
                           <?php foreach ($act_imgs as $key => $value) { 
                              ?>
                           <span> <img src="<?=base_url()."assets/img/activity_img/"?><?=$value?>"> <?=$act_name[$key]?> </span>
                           <?php
                              } ?>
                        </div>
                        <div class="package-box2-detail">
                           <a  href="javascript:void(0)" onclick='myFunction("<?=$tour->id?>","<?=$tour->title?>","<?=$tour->day?>","<?=$tour->price?>","<?=$tour->longitude?>","<?=$tour->latitude?>","<?=$tour->city_longitude?>","<?=$tour->city_latitude?>","<?=$tour->city_id?>")' class="add_cart"> + Add to Itinerary </a>
                        </div>
                        </div>
                     </div>
                  </div>
<?php } }else{ ?> 
	<div class="col-md-412 col-lg-12 col-sm-12 col-xs-12" style=" text-align: center; ">
		<h1>No record found</h1>
	</div>
<?php } ?>
