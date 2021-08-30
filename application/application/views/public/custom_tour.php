<?php
  require_once 'include/header.php';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel='stylesheet' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.12.0/maps/maps.css'>
<link rel='stylesheet' href='https://api.tomtom.com/maps-sdk-for-web/6.x/6.12.0//examples/pages/examples/assets/ui-library/index.css'>

<style>
    .custom-tours > .row {
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
}
.custom-tours > .row > div {
    margin-bottom: 35px;
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
            <!-- Tour Info Detail Section Starts Here -->
            <section class="pad-bot-60 pad-top-60">
         <div class="container">
            <div class="row">
               <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 sec-wid-left">
                  <div class="included-service-content">
                     <h3 class="upper col-blue"> custom tour </h3>
                     <p> Custom tour Allow You to create</p>
                     <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
                  </div>
                  
                  <div class="itenary-map" style="margin-bottom:30px;">
                     <h3> Itinerary Map </h3>
            <div class="map-wrapper1">  <div id="map" class="map" style="width: 80%; height: 5%;"></div> </div>
                  </div>
                  
                  
                  <div class="included-service-content">
                     <h3 class="upper col-blue"> INCLUDED SERVICES </h3>
                     <h6>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon1.jpg"> Guide </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon2.jpg"> Driver </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon3.jpg"> Lunch </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon4.jpg"> Accomodation </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon5.jpg"> Domestic Bus/ Flight Tickets </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon6.jpg"> Entrance Tickets </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon7.jpg"> Dinner </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon8.jpg"> Camping </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon9.jpg"> Lunch </span>
                        <span> <img src="<?=base_url()."assets/site/"?>images/service-icon10.jpg"> Gas </span>
                     </h6>
                  </div>
                  <div class="custom-made">
                     <div class="facilities-content">
              <form method="post" id="activity">
                <?php foreach ($activity as $key => $act) { ?>
                  <div>
                  
                    <input type="radio" name="activity[]" data-id="<?=$act->id?>" value="<?=$act->id?>" data-img="<?=base_url().$act->true_activity_img?>" data-imgold="<?=base_url().$act->custom_activity_img?>" class="<?=$act->id?>">
                    <img src="<?=base_url().$act->custom_activity_img?>" id="<?=$act->id?>">
                    <?=$act->activity_name?>
                  </div>
                <?php } ?>
                </form>
                     </div>
                     </div>
                     
                     <div class="custom-tours">
                         
  
                  
                  
                  <div class="tours-slick-slider">
						<?php foreach($custom_tour as $key => $tour) { ?>
						 	
                              
                              <div class="package-box2">
                                  <input type="hidden" name="longitude" id="longitude" value="<?=$tour->longitude?>">
                    <input type="hidden" name="latitude" id="latitude" value="<?=$tour->latitude?>"> 
                                  <div>
											 <div class="package-day">
													<span> <?=$tour->day?> Day </span>
												</div>
                                 <div class="package-box2-image">
											<h4> <?=$tour->title?> </h4>
                                    <img src="<?=base_url()?><?=$tour->image?>" height="150">
                                 </div>
                                 <div class="package-box2-middle">
                                    <p> <?=substr($tour->description,-90)?> </p>
                                    <p> <b class="col-blue" style="display: block;"> Places: </b> <span> <?=$tour->place?> </span> <span> Mausoleum :  </span> <span> <?=$tour->mausoleum?> </span>   </p>
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
                                    <a  href="javascript:void(0)" onclick='myFunction("<?=$tour->id?>","<?=$tour->title?>","<?=$tour->day?>","<?=$tour->price?>","<?=$tour->longitude?>","<?=$tour->latitude?>")' id="add_cart"> + Add to Itinerary </a>
                                 </div>
                              </div>
                              </div>
                            
                      <?php  } ?>
                        </div>
                 
                      
                      
                        </div>
                     </div>
            
              
               
               
               
               <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sec-wid-right">
                   <div id="slider">
  <img class="show" src="https://dnpprojects.com/demo/travel_web_admin/assets/img/package_img/2021/04/1617995619_tour-bg1.jpg" alt="">
  <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/package_img/2021/04/1618057000_tour-bg2.jpg" alt="">
  <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/package_img/2021/04/1617995619_tour-bg1.jpg" alt="">
  <img src="https://dnpprojects.com/demo/travel_web_admin/assets/img/package_img/2021/04/1618057000_tour-bg2.jpg" alt="">
</div>
                  <div class="itenary-box itenary-margin1">
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
                    if (!empty($this->cart->contents())) {
                      foreach ($this->cart->contents() as $items) { ?>
                        '<tr id="<?=$items['rowid']?>">
                          <td> <?=str_replace(',', '. ', $items["name"])?> </td>
                          <td id="day"> <?=$items['option']["day"]?> </td>
                          <td id="price"> <?=get_price('INR',$items['price'])?> <a href="javascript:void(0)" class="minus-icon remove_row" data-id="<?=$items['rowid']?>"> - </a> </td>
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
                        <h6>No Of Travellers</h6><select>
                  <option>  2 </option>
                           <option>  5 </option>
                           <option>  10 </option>
                        </select>
                        <textarea placeholder="Additional Comment"></textarea>
                     </div>
                     
                     <div class="itenary-button5">
              <h5> Check Your Itinerary </h5>
                         <a style="background:#049e62" href="<?=base_url("Home/your_itinerary")?>"> Your Itinerary </a>
                     </div>
                     
                     <div class="itenary-price">
                        <h6> Number of Days <b> <div id="total_day"> 0 </div></b> </h6>
                        <h6> Total base fare <b> <span id="total_price"> <?php get_price("INR",$this->cart->total()); ?>  </span></b> </h6>
                        <h6> GST (5%) <b> <?php get_price("INR",0); ?> </b> </h6>
                        <h6> TCS (5%) <b><?php get_price("INR",0); ?>  </b> </h6>
                        <h6> Final Price <b> <span id="total-price"><?php get_price("INR",$this->cart->total()); ?> </span></b> </h6>
                     </div>
                     <div class="itenary-button">
                        <a href=""> Book Now </a>
                     </div>
                  </div>
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
<input type="hidden" name="" id="old_activity_id" value="0">
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.12.0/maps/maps-web.min.js'></script>
<script src='https://api.tomtom.com/maps-sdk-for-web/6.x/6.12.0//examples/pages/examples/assets/js/mobile-or-tablet.js'></script>
<script>
$(document).ready(function(){
  $("#set_date").datepicker({
        minDate: 0,
      //  maxDate: "+1M +5D"
    });
   var day = $("#days").val()
  $("#total_day").html(day);
  $("#activity").on("click",function(){

    var searchIDs = $("#activity input:radio:checked").map(function(){
      return $(this).val();
    }).get(); 
      old_id = $('#old_activity_id').val();
    //  alert($("."+old_id).data('imgold'));
      $('#'+old_id).attr("src", $("."+old_id).data('imgold'));
      id = $("#activity input:radio:checked").data('id');
      $('#old_activity_id').val(id);
      $('#'+id).attr("src", $("#activity input:radio:checked").data('img'));

        $.ajax({
            url: "<?=base_url()?>Home/getTourByActivity",
            method: 'post',
            data: {'formData':searchIDs},
            success: function (result) {
               $("#custom").html(result);
            },
            error: function (msg) {

            },
            
         });
    
  })
});
function myFunction(id,name,day,price,longitude,latitude) {
  $.ajax({
    type: "POST",
    url : "<?=base_url('Cart')?>",
    data: {
      'id':id,
      'name':name,
      'day':day,
      'longitude':longitude,
      'latitude':latitude,
      'price':price,
    },
    dataType: "json", 
    success: function(result){
		
		
      $('#add_to_cart').html(result.html)
      $('#total-price').html("INR"+" "+result.total)
      // Define your product name and version.
      tt.setProductInfo('Codepen Examples', '${analytics.productVersion}');
      var map = tt.map({
        key: 'ypZNlaNBPtIoLXTRoWNB9KwhAcHZ2ARV',
        container: 'map',
        dragPan: !isMobileOrTablet(),
        center: [result.long, result.lat],
        zoom: 12
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
		
		jQuery.each(result.location, function(index, item) {
			createMarker('mark.svg', [item.long, item.lat], '', 'Location');
		});
      
      //console.log(result);
    }
  });
}


$(".cart").delegate(".remove_row", "click", function(){ 
      var id = $(this).data('id');
		
    $.ajax({
      type: "POST",
		url : "<?=base_url('Cart/removeCartItem')?>",
		data: {
			'id':id
		},
		dataType: "json", 
		success: function(results){
			// if(result == true){
			//alert();
			//alert(results.longitude);
				$("#"+id).remove();
				
				$('#total-price').html("INR"+" "+results.total)
				var day = $(".days").text()
				$("#total-day").html(day);
				tt.setProductInfo('Codepen Examples', '${analytics.productVersion}');
				var map = tt.map({
				key: 'ypZNlaNBPtIoLXTRoWNB9KwhAcHZ2ARV',
				container: 'map',
				dragPan: !isMobileOrTablet(),
				center: [results.long, results.lat],
				zoom: 4
				});
				map.addControl(new tt.FullscreenControl());
				map.addControl(new tt.NavigationControl());
			if(results.status){	
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
		jQuery.each(results.location, function(index, item) {
			createMarker('mark.svg', [item.long, item.lat],'', 'Location');
		});
	}
			// }
			}
		})
});

  $("#add_cart").click( function () {
       console.log($("#days").data('day'));
      //$("#total_day").html(Number(day))
  });
</script>
<script>
  <?php
	if (!empty($this->cart->contents())) { ?>
	<?php foreach ($this->cart->contents() as $key => $items) { ?>
		var latitude = parseFloat("<?=$items['option']["latitude"]?>");
		var longitude = parseFloat("<?=$items['option']["longitude"]?>");
	<?php } ?>
    
  // Define your product name and version.
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
<?php foreach ($this->cart->contents() as $key => $items) { ?>
    var latitude = parseFloat("<?=$items['option']["latitude"]?>");
    var longitude = parseFloat("<?=$items['option']["longitude"]?>");
createMarker("mark.svg", [longitude, latitude], '', 'Location');
<?php }
}else{
  ?>
  // Define your product name and version.
tt.setProductInfo('Codepen Examples', '${analytics.productVersion}');
var map = tt.map({
    key: 'ypZNlaNBPtIoLXTRoWNB9KwhAcHZ2ARV',
    container: 'map',
    dragPan: !isMobileOrTablet(),
    center: [-99.98580752275456, 33.43211082128627],
    zoom: 3
});
map.addControl(new tt.FullscreenControl());
map.addControl(new tt.NavigationControl());

<?php }
  ?>
</script>
