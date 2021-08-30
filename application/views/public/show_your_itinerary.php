<?php
	require_once 'include/header.php';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel='stylesheet' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.12.0/maps/maps.css'>
<link rel='stylesheet' href='https://api.tomtom.com/maps-sdk-for-web/6.x/6.12.0//examples/pages/examples/assets/ui-library/index.css'>
<style>
	  /* .custom-tours > .row {
        display: flex;
    flex-grow: 1;
    flex: 0 0 100%;
    flex-wrap: wrap;
    }
   .custom-tours .package-box2 {
    border: none;
    background: white;
    margin-bottom: 0px;
    height: 100%;
} */
/* .custom-tours > .row > div {
    margin-bottom: 35px;
} */
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
		  .loader::before{
	display: none;
}
		  .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 60px;
  height: 60px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
    
</style>


<section class="pad-bot-60 pad-top-60 c-tour-sec">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="included-service-content">
               <h3 class="upper col-blue"> Your Custom Itinerary  </h3>
                   </div>
         </div>
      </div>
   </div>
</section>
 
 
    
    
    
    
    
            <!-- Tour Info Detail Section Starts Here -->
            <section class="pad-bot-60">
         <div class="container">
            <div class="row flex-row1">
               <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 sec-wid-left">
                   <div class="itenary-head11">
         <h3> Itinerary Map </h3>
      </div>
      <div class="itenary-map" style="margin-bottom:30px;">
         <div class="map-wrapper1">
            <div id="map" class="map" style="width: 80%; height: 5%;"></div>
         </div>
      </div>
						
						<div class="package-activities">
                     <h3 class="col-white"> Activities </h3>
                     <h6>
		  						<?php foreach ($custom_tour as $key => $value) {
									  # code...
								   $activity_name = explode(',', $value->activity_name);
											$act_img = explode(',',$value->activity_img);
											foreach ($act_img as $key => $activity_val) { 
									?>
									<span> 
										<img src="<?=base_url()?>assets\img\activity_img\<?=$activity_val?>">
										<?=$activity_name[$key]?> 
									</span>
								<?php }
								}  
								?>
                        
                     </h6>
                  </div>
                  
					 
						<div class="tour-path">
                     <div class="tour-path-head">
                        <h3> Tour Itinerary: </h3>
                     </div>
                     <div class="tour-path-content" id="ShowLoadData">

								<?php foreach($custom_tour as $key => $tour) { ?>
									<div class="path-box">
										<h4> <?=$tour->day?> <?=$tour->title?> </h4>
										<h5> <img src="<?=base_url()."assets/site/"?>images/pin-icon.jpg"> </h5>
										<div>
											<img src="<?=base_url()?><?=$tour->image?>" />
											<p><?=$tour->description?></p>
										</div>
                        	</div>
								<?php } ?>
                     </div>
                  </div>
                  </div>
               <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sec-wid-right">
                  
                  <div class="itenary-box itenary-margin1  sticky-box2">
                     <div class="itenary-head">
                        <h3> Your Itinerary </h3>
                     </div>
                     <div class="itenary-content">
                        <table class="cart">
                           <thead>
                              <tr>
                                 <th> Tour Package </th>
                                 <th> Days </th>
                                 <th> Price </th>
                              </tr>
                           </thead>
                           <tbody id="add_to_cart">
                              <?php 
                    if (!empty($this->cart->contents())) {  $total_days = 0; 
                      foreach ($this->cart->contents() as $items) { 
								$days = str_replace(' Days','',$items['option']["day"]); $total_days = $total_days+$days;
                         ?>
                        '<tr id="<?=$items['rowid']?>">
                          <td> <?=str_replace(',', '. ', $items["name"])?> </td>
                          <td id="day"> <?=$items['option']["day"]?> </td>
                          <td id="price"> <?=get_price('INR',$items['price'])?> </td>
                        </tr>
                    <?php }
                    }
                    ?>
                           </tbody>
                        </table>
                     </div>
                     <div class="itenary-options">
                        <select>
                           <option> Arrival City </option>
                           <option> Arrival City </option>
                           <option> Arrival City </option>
                        </select>
                        <select>
                           <option> Departure city </option>
                           <option> Departure city </option>
                           <option> Departure city </option>
                        </select>
                        <h6> Date <span> <input type="text" name="set_date" id="set_date">  </span> </h6>
                        <h6>No Of Travellers</h6><input type="number" id="people_qty" name="people_qty" class="form-control" width="100%" required="">
                        <textarea placeholder="Additional Comment"></textarea>
               </div>
               
               <div class="itenary-price">
                  <h6>
                     Number of Days 
                     <b>
                        <div id="total_day"> <?=@$total_days?> </div>
                     </b>
                  </h6>
                  <h6> Base fare per person <b> <span id="show_base_fare"> <?php get_price("INR", 0); ?>  </span></b> </h6>
                  <h6> GST (<?=$setting->gst?>%) <b id="gst"> <?php get_price("INR",0); ?> </b> </h6>
                  <h6> TCS (<?=$setting->tcs?>%) <b id="tcs"><?php get_price("INR",0); ?>  </b> </h6>
                  <h6> Final Price <b> <span id="final_price"><?php get_price("INR",0); ?> </span></b> </h6> 
						<div class="loader" style="display: none;"></div>
               </div>
               <div class="itenary-button">
                  <a href=""> Book Now </a>
               </div>
               
               
               
            </div>
         </div>
      </section>
      <!-- Tour Info Detail Section Ends Here -->


      <!-- Additional Comments Section Starts Here -->
		<section class="pad-top-60 pad-bot-60">
         <div class="container">
            <div class="additional-comments pad-bot-60">
               <h3> Additional Remarks </h3>
               <textarea class="form-control" readonly> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </textarea>
            </div>
         </div>
      </section>
      <!-- Additional Comments Section Ends Here -->


      <?php
	require_once 'include/footer.php';
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.12.0/maps/maps-web.min.js'></script>
<script src='https://api.tomtom.com/maps-sdk-for-web/6.x/6.12.0//examples/pages/examples/assets/js/mobile-or-tablet.js'></script>
<script>
var loader = $('.loader');
$('#people_qty').keyup(function(){
	loader.show()
			var people_qty = $('#people_qty').val();
		if (people_qty < 1) {
			loader.hide()
			$('#per_person').text(0);
         $('#show_base_fare').text(0);
						$('#per_person').text(0);
						$('#final_price').text(0);
						$('#gst').text(0);
						$('#tcs').text(0);
						$('#count_base_fare').val(0);
						$('#per_person_price').val(0);
						$('#full_final_price').val(0);
			return false;
		}

			
         $.ajax({
            type: "POST",
            url : "<?=base_url('Cart/custom_tour_count_price')?>",
            data: {
               'people_qty':people_qty,
            },
            dataType: "json", 
            success: function(result){
					if(result){
						$('#show_base_fare').text(result.base_fare);
						$('#final_price').text(result.final_price);
						$('#gst').text(result.gst_total);
						$('#tcs').text(result.tcs_total);
						$('#full_final_price').val(result.final_price);
						loader.hide()
					}
               
               
            }
         })
	})

$(document).ready(function(){
	$("#set_date").datepicker({
        minDate: 0,
        maxDate: "+1M +5D"
    });
	$("#activity").on("click",function(){
		var searchIDs = $("#activity input:checkbox:checked").map(function(){
      return $(this).val();
    }).get(); 
    $.ajax({
            url: "<?=base_url()?>Home/getTourByActivity",
            method: 'post',
            data: {'formData':searchIDs},
            success: function (result) {
               // $('#loader').hide();
               // $("#information").html(result);
               console.log(result);
               $("#custom").html(result);
            },
            error: function (msg) {

            },
            
         });
		
	})
});
function myFunction(id,name,day,price) {
  $.ajax({
		type: "POST",
		url : "<?=base_url('Cart')?>",
		data: {
			'id':id,
			'name':name,
			'day':day,
			'price':price,
		},
		dataType: "json", 
		success: function(result){
			$('#add_to_cart').html(result)
			//console.log(result);
		}
  });
}


   // $(".cart").delegate(".remove_row", "click", function(){ 
   //    var id = $(this).data('id');
	// 	$.ajax({
	// 		type: "POST",
	// 	url : "<?=base_url('Cart/removeCartItem')?>",
	// 	data: {
	// 		'id':id
	// 	},
	// 	dataType: "text", 
	// 	success: function(result){
	// 		if(result == true){
	// 			//alert();
	// 			$("#"+id).remove();
	// 		}
	// 	}
	// 	})
   // });

<?php foreach ($this->cart->contents() as $key => $items) { ?>
		var latitude = parseFloat("<?=$items['option']["latitude"]?>");
		var longitude = parseFloat("<?=$items['option']["longitude"]?>");
<?php } ?>
		tt.setProductInfo('Codepen Examples', '${analytics.productVersion}');
var map = tt.map({
    key: 'ypZNlaNBPtIoLXTRoWNB9KwhAcHZ2ARV',
    container: 'map',
    dragPan: !isMobileOrTablet(),
    center: [longitude, latitude],
    zoom: 4
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
<?php foreach ($this->cart->contents() as $key => $items) { ?>
		var latitude1 = parseFloat("<?=$items['option']["latitude"]?>");
		var longitude1 = parseFloat("<?=$items['option']["longitude"]?>");
		createMarker("icon3.png", [longitude1, latitude1], '', 'Location');
<?php }
	?>
</script>
