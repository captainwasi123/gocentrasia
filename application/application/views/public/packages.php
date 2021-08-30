<?php
 require_once "include/header.php"
?>
<link rel="stylesheet" type="text/css" href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css"> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel='stylesheet' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.12.0/maps/maps.css'>
<link rel='stylesheet' href='https://api.tomtom.com/maps-sdk-for-web/6.x/6.12.0//examples/pages/examples/assets/ui-library/index.css'>
<style type="text/css">
         .related-tours-head h3 {
            color: black;
            font-weight: 600;
            letter-spacing: 0.4px;
            font-size: 32px;
            text-align: center;
         }

			.marker-icon {
            background-position: center;
            background-size: 22px 22px;
            border-radius: 50%;
            height: 22px;
            left: 4px;
            position: absolute;
            text-align: center;
            top: 3px;
            transform: rotate(45deg);
            width: 22px;
        }
        .marker {
            height: 30px;
            width: 30px;
        }
        .marker-content {
            border-radius: 50% 50% 50% 0;
            height: 30px;
            left: 50%;
            margin: -15px 0 0 -15px;
            position: absolute;
            top: 50%;
            transform: rotate(-45deg);
            width: 30px;
        }
        .marker-content::before {
            border-radius: 50%;
            content: "";
            height: 24px;
            margin: 3px 0 0 3px;
            position: absolute;
            width: 24px;
        }
      </style>
<!-- Package Type Detail Section Starts Here -->
<section class="pad-bot-60 pad-top-60">
         <div class="container">
            <div class="row">
               <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 sec-wid-left">
                  <div class="package-gallery">
                     <h3> <?=$event->event_name?> </h3>
                     <div class="demo clinic-photo-gallery">
                        <ul id="lightSlider">
                           <?php foreach($img_galary as $img_galary){ ?>
										<li data-thumb="<?=base_url()?><?=$img_galary->img?>">
                                 <img src="<?=base_url()?><?=$img_galary->img?>" alt="" class="img-responsive center-block">
                              </li>
                           <?php } ?>   
                        </ul>
                     </div>
                  </div>
                  <div class="package-details">
                     <p> <?=$event->description?> </p>
                  </div>
                  <div class="package-activities">
                     <h3 class="col-white"> Activities </h3>
                     <h6>

								<?php $activity_name = explode(',', $activity->act_name);
											$act_img = explode(',',$activity->act_img);
											foreach ($act_img as $key => $activity_val) { 
									?>
									<span> 
										<img src="<?=base_url()?>assets\img\activity_img\<?=$activity_val?>">
										<?=$activity_name[$key]?> 
									</span>
								<?php } 
								?>
                        
                     </h6>
                  </div>
						<div class="package-includes">
                     <h3 class="col-blue"> Included Service </h3>
                     <h6>
							<?php $service_name = explode(',', $service->serv_name); 
								$serv_img = explode(',',$service->serv_img);
								foreach ($serv_img as $key => $service_val) { 
							?>
							<span> 
                        <img src="<?=base_url()?>assets\img\service_img\<?=$service_val?>">
								<?=$service_name[$key]?> 
							</span>
							<?php } ?>
                     </h6>
                  </div>
						<div class="download-button">
                     <a href="<?=base_url()."Home/downloaditinerary/"?><?=hashids_encrypt($event->package_id)?>" target="_blank"> <i class="fa fa-download"> </i> Download Itinerary </a>
                  </div>
                  <div class="tour-path">
                     <div class="tour-path-head">
                        <h3> Tour Itinerary: </h3>
                     </div>
                     <div class="tour-path-content" id="ShowLoadData">

								<?php 
									foreach ($itin as $key => $val) { 
								?>
									<div class="path-box">
										<h4> <?=$val->title?> </h4>
										<h5> <img src="<?=base_url()."assets/site/"?>images/pin-icon.jpg"> </h5>
										<div>
											<img src="<?=base_url()?><?=$val->img?>" />
											<p><?=$val->detail?></p>
										</div>
                        	</div>
								<?php } ?>
                        <div class="inclusion-button">
                           <a href="javascript:void(0)" id="load-itin" data-id="<?=$val->pkg_id?>" data-limit="7"> SHOW MORE </a>
                        </div>
                     </div>
                  </div>
                  <div class="itenary-map">
                     <h3> Itinerary Map </h3>
						<div class="map-wrapper1">	<div id="map" class="map" style="width: 80%; height: 5%;"></div> </div>
                  </div>
                  
                   <div class="additional-comments" style="margin-top:40px;">
               <h3> Accommodation </h3>
               <table class="table-type3" style="width:100%">
                  <thead>
                     <tr>
                        <th> City </th>
                        <th> Stay </th>
                        <th> Detail </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $acc = json_decode($event->accommodation, true); 
                     foreach ($acc['city'] as $key => $value) {  ?>
                     <tr>  
                        <td><?=$value?></td>
                        <td><?=$acc['stay'][$key]?></td>   
                        <td><?=$acc['detail'][$key]?></td>
                     </tr>
                       <?php } ?>   
							<tr>
							
								
                  </tbody>
               </table> 
            </div>
                  
                  
                  <div class="bg-silver2" style="margin-top:50px;">
               <div class="row">
                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                     <div class="inclusion-text">
                        <h3> Inclusion </h3>
                        <ul>
								<?=$event->inclusion?>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                     <div class="inclusion-text">
                        <h3> Exclusion </h3>
                        <?=$event->exclusion?>
                     </div>
                  </div>
                  <!-- <div class="col-md-12 col-lg-12 col-xs-12">
                     <div class="inclusion-button">
                        <a href=""> Read More </a> 
                     </div>
                  </div> -->
               </div>
            </div>
            
            
            
            
             <div class="additional-comments" style="margin-top:50px;">
               <h3> Additional Remarks </h3>
               <textarea class="form-control" readonly><?=$event->additional_remarks?></textarea>
            </div>
                  
                  
                  
               </div>
               <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sec-wid-right">
                  <div class="package-con1">
                     <div>
                        <span>  <img src="<?=base_url()."assets/site/"?>images/cal-icon.jpg">
                        Duration </span>
                        <b> <?=$event->duration?> Days </b> 
                     </div>
                     <div>
                        <span style="border-bottom: 1px solid silver; padding-bottom: 4px;"> Group Tour  </span>
                        <b> <?php get_price("INR",$event->group_price); ?> </b> 
                     </div>
                     <div>
                        <span style="border-bottom: 1px solid silver; padding-bottom: 4px;">  Private Tour </span>
                        <b> <?php get_price("INR",$event->private_price); ?> </b> 
                     </div>
                     <h5> <b> Places:  </b> <?=$event->places_description?> 
                     </h5>
                  </div>
                  <div class="booking-wrapper">
                     <div class="booking-head">
                        <h5> Booking </h5>
                     </div>
                     <form action="<?=base_url()?>Home/package_form" method="post">  
                     <div class="booking-private">
                        <h5> <input type="radio" name="tour-type" value="Private Tour" class="pkg_amt" data-amt="<?=$event->private_price?>" required> Private Tour </h5>
                        <p> Start from: <b> <?php get_price("INR",$event->private_price); ?>/ per person </b> </p>
								<div  id='datetimepicker1'>
                    			<input type='text' name="set_date form-control" id="set_date"  style=" width: 100%; "/>
						  		</div>
                     </div>
                     <div class="booking-private">
                        <h5> <input type="radio" name="tour-type" value="Group Tour" class="pkg_amt" data-amt="<?=$event->group_price?>" required> Group Tour </h5>
                        <p> Group Size: <b> 1-16 person </b> <b> <?php get_price("INR",$event->group_price); ?>/person </b> </p>
                        <p> <input type="checkbox"  name="" id="seperate_room" value="<?=$event->separate_room_charges?>"> Seperate Rooms <b> (<?php get_price("INR",$event->separate_room_charges); ?>) </b> </p>
                        <h6> <b class="col-blue"> Guaranteed Departures </b> Even if there is only ONE traveler </h6>
                         <div class="form-field4">
                            <p class="col-blue"> Select the date of travel </p> 
                         </div> 
                         <div class="form-group">
                <div  id='datetimepicker1'>
                 <!-- <input type="text" class="datepicker hasDatepicker invalid" invalid="2021-03-27" id="col_date" oninput="this.className = ''" name="collection_date"> -->
                    <input type='text' name="set_date form-control" id="set_date1"  style=" width: 100%; "/>
                    <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span> -->
						  
                </div>
            </div>
                     </div>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 60px;
  height: 60px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.loader::before{
	display: none;
}
</style>
                     <div class="booking-confirm">
                        <table>
                           <tbody>
                              <tr>
                                 <td> Date of Travel </td>
                                 <td id="travel_date"> </td>
                              </tr>
                              <tr>
                                 <td> No. of travellers </td>
                                 <td> 
                                    <input type="number" id="people_qty" name="people_qty" class="form-control" width="100%" required="">
                                    <input type="hidden" name="base_fare" value="<?=$event->base_fare?>" id="base_fare">
                                    <input type="hidden" name="tcs" value="<?=$event->tcs?>" id="tcs">
                                    <input type="hidden" name="gst" value="<?=$event->gst?>" id="gst">
                                    <input type="hidden" name="total_amt" class="total_amt">
                                    <input type="hidden" name="event_name" value="<?=$event->event_name?>">
                                    <input type="hidden" name="count_base_fare" id="count_base_fare">
                                    <input type="hidden" name="per_person" id="per_person_price">
                                    <input type="hidden" name="full_final_price" id="full_final_price">
                                   
                                 </td>
                                 
                              </tr>
                              <tr>
                                 <td> Discount  </td>
                                 <td>   </td>
                              </tr>
                              <tr>
                                 <td> Affiliate code </td>
                                 <td> <input type="text" name="code" class="form-control" width="100%">  </td>
                              </tr>
                              <tr>
                                 <td> Base Fare <small> (including GST & TCS) </small> </td>
                                 <td> 
                                 <b id="final_pric"> <?=get_price('INR',$event->base_fare)?> </b> 
                                 <span id="show_base_fare"> Base Fare: </span> <span> TCS (<?=$event->tcs?>%) </span> 
                                 <span> GST(<?=$event->gst?>%) </span>
                                 </td>
                              </tr>
                              <tr>
                                 <td> Price Per Person  </td>
                                 <td> <b id="per_person"> 0 </b>
                                 </td>
                              </tr>
                              <tr>
                                 <td> Final price  </td>
                                 <td> <b id="final_price"> 0 </b>
                                  <div class="loader" style="display: none;"></div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <div class="booking-button">
                           <button type="submit" class="custom-btn2"> BOOK NOW </button>
                        </div>
                     </div>
                  </form>
                  </div>
                  <div class="related-tours-head" style="margin-top: 0px !important">
                     <h3> More Tours </h3>
                  </div>
                  <div class="sidebar-tours">
							<?php foreach ($rendomevent as $key => $value) { ?>
							<div class="package-box2">
								<a href="<?=base_url()?>Home/packages/<?=hashids_encrypt($value->id); ?>">
                        <div class="package-box2-image">
                           <img src="<?=base_url()?><?=$value->images?>">
                           <h4> <?=$value->event_name?> </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p><?=$value->description?></p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> <?php get_price("INR",$value->group_price); ?> </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> <?php get_price("INR",$value->private_price); ?> </b>
                           </h6>
                        </div>
								</a>
                     </div>
							<?php } ?>
                  </div>
                  <div class="related-tours-head" style="margin-top: 0px !important">
                     <h3> Similar Tours </h3>
                  </div>
                  <div class="sidebar-tours">
							<?php foreach ($this->Site_model->SimilerEvent($event->country_id,4) as $key => $value) { ?>
								<div class="package-box2">
									<a href="<?=base_url()?>Home/packages/<?=hashids_encrypt($value->id); ?>">
									<div class="package-box2-image">
										<img src="<?=base_url()?><?=$value->images?>">
										<h4> <?=$value->event_name?> </h4>
									</div>
									<div class="package-box2-middle">
										<p><?=$value->description?></p>
										<h6> 
											<span> Group Tour</span>
											<b> <?php get_price("INR",$value->group_price); ?> </b>
										</h6>
										<h6> 
											<span>Private Tour</span>
											<b> <?php get_price("INR",$value->private_price); ?> </b>
										</h6>
									</div>
									</a>
								</div>
							<?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Package Type Detail Section Ends Here -->
    
     
      
      <!-- Multi Country Section Starts Here -->
      <section class="pad-top-60 pad-bot-60">
         <div class="container">
            <div class="sec-head text-center">
               <h3> Multi Country Packages </h3>
               <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra   </p>
            </div>
            <div class="package-data">
               <div class="row">
					<?php foreach ($rendomeventbottom as $key => $value) { ?>
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
                              <b> <?php get_price("INR",$value->group_price)?> </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b>  <?php get_price("INR",$value->private_price)?> </b>
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
               </div>
            </div>
         </div>
      </section>
      <!-- Multi Country Section Ends Here -->

<?php
 require_once "include/footer.php"
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.12.0/maps/maps-web.min.js'></script>
<script src='https://api.tomtom.com/maps-sdk-for-web/6.x/6.12.0//examples/pages/examples/assets/js/mobile-or-tablet.js'></script>

<script >
	var loader = $('.loader');
     $("#set_date").datepicker({
			firstDay: 1,
			dateFormat: "dd-mm-yy",
    });
	 $("#set_date1").datepicker({
			firstDay: 1,
			dateFormat: "dd-mm-yy",
        	minDate: "<?=date('dd-mm-yy',strtotime($event->start_date))?>",
        	maxDate: "<?=date('dd-mm-yy',strtotime($event->end_date))?>"
    });
	//  $('#people_qty').click(function(){
	// 	if (!$(".pkg_amt").is(':checked')) {
   //          alert("Select Tour Price Category!");
   //      }
	// })
      $('.pkg_amt').click(function() { 
         var people_qty = $('#people_qty').val('');
      $('.total_amt').val($(this).data('amt'));
      if ($("input[name='tour-type']:checked").val() != 'Group Tour') {
            $("#seperate_room").prop("checked", false);
         //   return false;
         }
   });
   $('#set_date').change(function() {
      $('#travel_date').text($('#set_date').val());
   });
   $('#set_date1').change(function() {
      $('#travel_date').text($('#set_date1').val());
   });   
	
	$('#people_qty').keyup(function(){
		if (!$(".pkg_amt").is(':checked')) {
            alert("Select Tour Price Category!");
				return false;
        }
		  loader.show()
			var people_qty = $('#people_qty').val();
			var base_fare_one = $('#base_fare').val();
         var gst = $('#gst').val();
         var tcs = $('#tcs').val();
         var pkg_amt = $('.total_amt').val();
		if (people_qty < 1) {
			loader.hide()
			$('#per_person').text(0);
			$('#final_price').text(0);
			return false;
		}

			
         $.ajax({
            type: "POST",
            url : "<?=base_url('Cart/count_price')?>",
            data: {
               'people_qty':people_qty,'base_fare_one':base_fare_one,'gst':gst,'tcs':tcs,'pkg_amt':pkg_amt
            },
            dataType: "json", 
            success: function(result){
               $('#show_base_fare').text(result.base_fare);
               $('#per_person').text(result.per_person);
               $('#final_price').text(result.final_price);
              
               $('#count_base_fare').val(result.base_fare);
               $('#per_person_price').val(result.per_person);
               $('#full_final_price').val(result.final_price);
					loader.hide()
            }
         })
	})
	$('#seperate_room').click(function() {
      if (this.checked) {
         if ($("input[name='tour-type']:checked").val() != 'Group Tour') {
            alert('This option use onlye group tour');
            return false;
         }
         var final_price = $('.total_amt').val();
         var room_price = $('#seperate_room').val(); 
         var new_price = Number(final_price)+Number(room_price);
         $("#total_amt").text(new_price);
         $('.total_amt').val(new_price);
      }else{
         var final_price = $('.total_amt').val();
         var room_price = $('#seperate_room').val(); 
         var new_price = Number(final_price)-Number(room_price);
         $("#total_amt").text(new_price);
         $('.total_amt').val(new_price);
      }
   })

	$("body").on("click","#load-itin",function () { 
		//alert($(this).data("id"));
	   var id = $(this).data("id");
		var offset = $(this).data("limit");
		

		$.ajax({
            type: "POST",
            url : "<?=base_url('Home/Loaditin')?>",
            data: {
               'id':id,'offset':offset,
            },
            success: function(result){ 
					$("#load-itin").remove();
               $("#ShowLoadData").append(result);
            }
         })
	 })
</script>
<script>
	// Define your product name and version.
	var latitude = parseFloat("<?=$country->latitude?>");
	var longitude = parseFloat("<?=$country->longitude?>");
tt.setProductInfo('Codepen Examples', '${analytics.productVersion}');
var map = tt.map({
    key: 'ypZNlaNBPtIoLXTRoWNB9KwhAcHZ2ARV',
    container: 'map',
    dragPan: !isMobileOrTablet(),
    center: [longitude, latitude],
    zoom: 2
});
map.addControl(new tt.FullscreenControl());
map.addControl(new tt.NavigationControl());
function createMarker(icon, position, color, popupText) {
    var markerElement = document.createElement('div');
    markerElement.className = 'marker';
    var markerContentElement = document.createElement('div');
    markerContentElement.className = 'marker-content';
    markerContentElement.style.backgroundColor = color;
    markerElement.appendChild(markerContentElement);
    var iconElement = document.createElement('div');
    iconElement.className = 'marker-icon';
    iconElement.style.backgroundImage =
	 	'url(<?=base_url("assets/img/")?>' + icon + ')';
    markerContentElement.appendChild(iconElement);
    var popup = new tt.Popup({offset: 30}).setText(popupText);
    // add marker to map
    new tt.Marker({element: markerElement, anchor: 'bottom'})
        .setLngLat(position)
        .setPopup(popup)
        .addTo(map);
}
<?php 
	foreach ($itin as $key => $val) { 
?>
var latitude = parseFloat("<?=$val->latitude?>");
var longitude = parseFloat("<?=$val->longitude?>"); 
createMarker('mark.svg', [longitude,latitude], '', 'Location');
// createMarker('accident.colors-white.svg', [69.345116,30.375320], '#5327c3', 'SVG icon');
// createMarker('accident.colors-white.svg', [69.345116,30.375320], '#5327c3', 'SVG icon');
// createMarker('accident.colors-white.svg', [69.345116,30.375320], '#5327c3', 'SVG icon');

<?php } ?>
</script>
