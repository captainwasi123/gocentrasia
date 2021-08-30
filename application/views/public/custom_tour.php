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
   background-color: transparent!important;
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

.small-activities form div {
    margin-right: 0px !important;
    width: 32.6%;
}

.tours-slick-slider .package-box2 {
    height:inherit !important;
}

@media screen and (max-width:992px) and (min-width:768px) { 
    
    .small-activities form div {
    margin-right: 0px !important;
    width: 49%;
}
    
}

/* New Class for Custom tour sliders Adjestment */
.custom-sliders-new{
	width: 281px !important;
}

</style>
<!-- Tour Info Detail Section Starts Here -->
<section class="pad-bot-60 pad-top-60 c-tour-sec">
   <div class="container">
      <div class="row">
         <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 sec-wid-left">
            <div class="included-service-content">
               <h3 class="upper col-blue"> custom tour </h3>
               <p> Custom tour Allow You to create</p>
               <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
            </div>
            
             <div class="included-service-content shade1">
               <h3 class="upper col-blue" > INCLUDED SERVICES </h3>
               <h6>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon1.jpg"> Guide </span>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon2.jpg"> Driver </span>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon3.jpg"> Lunch/Breakfast </span>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon4.jpg"> Accomodation </span>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon5.jpg"> Domestic Bus/ <br/> Flight Tickets </span>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon6.jpg"> Entrance Tickets </span>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon7.jpg"> Dinner </span>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon8.jpg"> Camping </span>
                  <span> <img src="<?=base_url()."assets/site/"?>images/service-icon10.jpg"> Gas </span>
               </h6>
            </div>
            
            
           
         </div>
         <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sec-wid-right">
           
         </div>
      </div>
   </div>
</section>
<section class="">
   <div class="container">
       <div class="row">
           
           <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 sec-wid-left">
               <div class="extra-heading1 extra-heading2" style="float:none !important;">
         <h3> Choose From Map <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span> </h3>
      </div>
      <div class="itenary-map map-design1" style="margin-bottom:30px;">
         <div class="map-wrapper1">
            <div id="map" class="map" style="width: 80%; height: 5%;"></div>
         </div>
      </div>
              </div>
              
          <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sec-wid-right">
              <div class="extra-heading1 small-act">
         <h3> Choose From Activities <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span> </h3>
      </div>
            <div class="custom-made">
               <div class="facilities-content small-activities">
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
              </div> 
           
       </div>
       
       
       
       
       
   </div>
</section>
<section class="pad-bot-60 pad-top-60 c-tour-sec">
   <div class="container">
      <div class="row flex-row1">
         <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 sec-wid-left">
                 <div class="extra-heading1 extra-heading2" style="float:none !important;">
         <h3 style="margin:0px"> Select Tours <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span> </h3>
        <div class="counter-tour">
            <span> <?= count($custom_tour);?> Tours </span>
        </div> 
      
      </div>
            <div class="custom-tours custom-scroll1">
                
            
                
               <div class="tours-slick-slider333 horizontal-tours" id="custom">
                  <?php foreach($custom_tour as $key => $tour) { ?>
                  <div class="package-box2">
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
                  <?php  } ?>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sec-wid-right">
            <div class="itenary-box  sticky-box1" style="margin-top:0px">
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
                           if (!empty($this->cart->contents())) { $total_days = 0; 
                             foreach ($this->cart->contents() as $items) {  $days = str_replace(' Days','',$items['option']["day"]); $total_days = $total_days+$days; ?>
                        
                        <tr id="<?=$items['rowid']?>">
                           <td> <?=str_replace(',', '. ', $items["name"])?> </td>
                           <td id="number_of_days"> <?=str_replace('Days','',$items['option']["day"])?> </td>
                           <td id="price"> <?=get_price('INR',$items['price'])?> <a href="javascript:void(0)" class="minus-icon remove_row" data-id="<?=$items['rowid']?>"> - </a> </td>
                        </tr>
                        <?php }
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
               <!--<div class="itenary-options">
                  <select>
                     <option> Select Arrival City  </option>
                     <option> Tashkent </option>
                     <option> Dushanbe </option>
                     <option> Bishkek </option>
                     <option> Ashgabat </option>
                     <option> Nur-Sultan </option>
                  </select>
                  <select>
                     <option> Select Departure City  </option>
                     <option> Tashkent </option>
                     <option> Dushanbe </option>
                     <option> Bishkek </option>
                     <option> Ashgabat </option>
                     <option> Nur-Sultan </option>
                  </select>
                  <h6> Date <span> <input type="text" name="set_date" id="set_date">  </span> </h6>
                  <h6>No Of Travellers</h6>
                  <input type="number" name="people_qty" id="people_qty" style=" width: 100%;"> 
                   
                  <textarea placeholder="Additional Comment"></textarea>
               </div>-->
              
               <div class="itenary-price" style="margin-top: 25px !important;">
                  <h6>
                     Number of Days 
                     <b>
                        <div id="total_day"> <?=@$total_days?> </div>
                     </b>
                  </h6>
                  <h6> Base fare per person <b> <span id="show_base_fare"> 0 </span></b> </h6>
            <div class="loader" style="display: none;"></div>
                 <!-- <h6> GST (5%) <b> <?php get_price("INR",0); ?> </b> </h6>
                  <h6> TCS (5%) <b><?php get_price("INR",0); ?>  </b> </h6>
                  <h6> Final Price <b> <span id="total-price"><?php get_price("INR",$this->cart->total()); ?> </span></b> </h6>-->
               </div>
                <div class="itenary-button5">
                 <!-- <h5> Check Your Itinerary </h5>-->
                  <a style="background:#049e62" href="<?=base_url("Home/your_itinerary")?>"> Your Itinerary </a>
               </div>
               
              <!-- <div class="itenary-button">
                  <a href=""> Book Now </a>
               </div>-->
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


var loader = $('.loader');
$('#people_qty').keyup(function(){
  loader.show()
  var people_qty = $('#people_qty').val();
  if (people_qty < 1) {
    loader.hide()
    $('#show_base_fare').text(0);
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
        loader.hide()
      }
    }
  })
  })
   $(document).ready(function(){
     $("#set_date").datepicker({
           minDate: 0,
         //  maxDate: "+1M +5D"
       });
     $("#activity").on("click",function(){
   
       var searchIDs = $("#activity input:radio:checked").map(function(){
         return $(this).val();
       }).get(); 
          old_id = $('#old_activity_id').val();
      //  //  alert($("."+old_id).data('imgold'));
      //    $('#'+old_id).attr("src", $("."+old_id).data('imgold'));
       id = $("#activity input:radio:checked").data('id');
          $('#old_activity_id').val(id);
      //    $('#'+id).attr("src", $("#activity input:radio:checked").data('img'));
      $('#'+old_id).removeClass("active");
      $('#'+id).addClass("active");
           $.ajax({
               url: "<?=base_url()?>Home/getTourByActivity",
               method: 'post',
               data: {'formData':searchIDs},
               success: function (result) { 
                  $("#custom").html(result);
                  $('#lightSlider').lightSlider({
                     gallery: true,
                     item: 1,
                     loop:true,
                     slideMargin: 0,
                     thumbItem: 10,
                     speed: 900
                  });

                  slideShow();

                  function slideShow(){
   
                  var current = $('#slider .show');
                  
                  var next = current.next().length ? 
                    current.next() :
                    // if index == false then show first img
                    current.siblings().first();
                  
                  
                  current.hide().removeClass('show');
                  next.fadeIn("slow").addClass('show');
                  
                  
                  
                  setTimeout(slideShow, 6000);
                  
                  };

               },
               error: function (msg) {
   
               },
               
            });
       
     })
   });
   
</script>


<script>

        // Define your product name and version.
        tt.setProductInfo('<your-product-name>', '<your-product-version>');
        var map = tt.map({
            key: 'ypZNlaNBPtIoLXTRoWNB9KwhAcHZ2ARV',
            container: 'map',
            dragPan: !isMobileOrTablet(),
            center: [<?=$map_center->longitude?>, <?=$map_center->latitude?>],
            zoom: 6
        });
		  map.on('load',function(){
				var BRITISH_ENGLISH_CODE = "en-GB";
				map.setLanguage(BRITISH_ENGLISH_CODE);
			});	
        map.addControl(new tt.FullscreenControl());
        map.addControl(new tt.NavigationControl());
      <?php if (!empty($this->cart->contents())) { ?>
         var cityLocations = [
      <?php   foreach ($this->cart->contents() as $key => $items) {
         echo '['.$items["option"]["city_longitude"].','.$items["option"]["city_latitude"].'],';
         }   
      ?>
         ];  
         //console.log(cityLocations);
        map.on('load', function() {
            map.addLayer({ 
              'id': '123', 
              'type': 'line', 
              'source': { 
                'type': 'geojson', 
                'data': { 
                  'type': 'FeatureCollection', 
                  'features': [ { 
                    'type': 'Feature', 
                    'geometry': { 
                      'type': 'LineString', 
                      'properties': {}, 
                      'coordinates': cityLocations 
                    } 
                  } ] 
                } 
              }, 
              'layout': { 
                'line-cap': 'round', 
                'line-join': 'round' 
              }, 
              'paint': { 
                'line-color': '#132e66', 
                'line-width': 5 
              } 
            });
        });
     <?php } ?>
        function createMarker(icon, position, color, popupText,city_name) {
            var markerElement = document.createElement('div');
            markerElement.className = 'marker';
            markerElement.dataset.id = "23";
            var markerContentElement = document.createElement('div');
            markerContentElement.className = 'marker-content';
            markerContentElement.style.backgroundColor = color;
            markerElement.appendChild(markerContentElement);

            var iconElement = document.createElement('div');
            iconElement.className = 'marker-icon';
            iconElement.style.backgroundImage =
            'url(<?=base_url("assets/img/")?>' + icon + ')';
            markerContentElement.appendChild(iconElement);

            var popup = new tt.Popup({offset: 30}).setText(city_name);
            markerElement.addEventListener('click', function (e) {
               
                var city_id = popupText;

                //ajax code
          
            $.ajax({
               url: "<?=base_url()?>Home/getTourByCity",
               method: 'post',
               data: {'formData':city_id},
               success: function (result) { 
                  $("#custom").html(result);
						$('#custom').css('width','281px !important');
                  $('#lightSlider').lightSlider({
                     gallery: true,
                     item: 1,
                     loop:true,
                     slideMargin: 0,
                     thumbItem: 10,
                     speed: 900
                  });
                  slideShow();

                  function slideShow(){
   
                  
                  var next = current.next().length ? 
                    current.next() :
                    // if index == false then show first img
                    current.siblings().first();
                  
                  
                  current.hide().removeClass('show');
                  next.fadeIn("slow").addClass('show');
                  
                  
                  
                  setTimeout(slideShow, 6000);
                  
                  };

               },
               error: function (msg) {
   
               },
               
            });   
                //end ajax code



            });

            // add marker to map
            new tt.Marker({element: markerElement, anchor: 'bottom'})
                .setLngLat(position)
                .setPopup(popup)
                .addTo(map);
        } 
        var icon = 'icon1.png';
      <?php foreach ($city as $key => $city_val) {
         foreach ($this->cart->contents() as $key => $items) { 
            if($city_val->longitude == $items["option"]["city_longitude"] && $city_val->latitude == $items["option"]["city_latitude"]){ ?>
               icon = 'icon3.png';
         <?php   } ?> <?php 
         } if(empty($this->cart->contents())){ ?> icon = 'icon1.png'; <?php }
      ?>
        if(icon == ''){ icon = 'icon1.png'; }
        createMarker(icon, [<?=$city_val->longitude?>,<?=$city_val->latitude?>], '#5327c3', <?=$city_val->id?>,"<?=$city_val->name?>");
     <?php ?> icon = 'icon1.png'; <?php } ?>
    </script>
<script type="text/javascript">
   city_ids = [];
   <?php if(!empty($this->cart->contents())){ 
      foreach($this->cart->contents() as $val){ ?>
         city_ids.push(<?=$val['option']['city_id']?>); 
   <?php  }   }else{ ?> city_ids = []; <?php } ?>
   
   function myFunction(id,name,day,price,longitude,latitude,city_longitude,city_latitude,city_id) {
      city_ids.push(city_id);
      console.log(city_ids);
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
         'city_longitude':city_longitude,
         'city_latitude':city_latitude,
         'city_id':city_id,
       },
       dataType: "json", 
       success: function(result){
        // console.log(result);
         $("#total_day").html(result.days)
         $('#add_to_cart').html(result.html)
         $('#total-price').html("INR"+" "+result.total)
         //console.log(result);

         // Define your product name and version.
        tt.setProductInfo('<your-product-name>', '<your-product-version>');
        var map = tt.map({
            key: 'ypZNlaNBPtIoLXTRoWNB9KwhAcHZ2ARV',
            container: 'map',
            dragPan: !isMobileOrTablet(),
            center: [<?=$map_center->longitude?>, <?=$map_center->latitude?>],
            zoom: 6
        });
		  map.on('load',function(){
			var BRITISH_ENGLISH_CODE = "en-GB";
			map.setLanguage(BRITISH_ENGLISH_CODE);
		});	
        map.addControl(new tt.FullscreenControl());
        map.addControl(new tt.NavigationControl());

         cittLocation = [];
         jQuery.each(result.city_location, function(index, item) {
            cittLocation[index] = [item.city_longitude,item.city_latitude];
         });
         console.log(cittLocation);
        
        map.on('load', function() {
            map.addLayer({ 
              'id': '123', 
              'type': 'line', 
              'source': { 
                'type': 'geojson', 
                'data': { 
                  'type': 'FeatureCollection', 
                  'features': [ { 
                    'type': 'Feature', 
                    'geometry': { 
                      'type': 'LineString', 
                      'properties': {}, 
                      'coordinates': cittLocation 
                    } 
                  } ] 
                } 
              }, 
              'layout': { 
                'line-cap': 'round', 
                'line-join': 'round' 
              }, 
              'paint': { 
                'line-color': '#132e66', 
                'line-width': 5 
              } 
            });
        });

        function createMarker(icon, position, color, popupText,city_name) {
            var markerElement = document.createElement('div');
            markerElement.className = 'marker';
            markerElement.dataset.id = "23";
            var markerContentElement = document.createElement('div');
            markerContentElement.className = 'marker-content';
            markerContentElement.style.backgroundColor = color;
            markerElement.appendChild(markerContentElement);

            var iconElement = document.createElement('div');
            iconElement.className = 'marker-icon';
            iconElement.style.backgroundImage =
            'url(<?=base_url("assets/img/")?>' + icon + ')';
            markerContentElement.appendChild(iconElement);

            var popup = new tt.Popup({offset: 30}).setText(city_name);
            markerElement.addEventListener('click', function (e) {
               
                var city_id = popupText;

                //ajax code
          
            $.ajax({
               url: "<?=base_url()?>Home/getTourByCity",
               method: 'post',
               data: {'formData':city_id},
               success: function (result) { 
                  $("#custom").html(result);
                  $('#lightSlider').lightSlider({
                     gallery: true,
                     item: 1,
                     loop:true,
                     slideMargin: 0,
                     thumbItem: 10,
                     speed: 900
                  });

                  slideShow();

                  function slideShow(){
   
                  var current = $('#slider .show');
                  
                  var next = current.next().length ? 
                    current.next() :
                    // if index == false then show first img
                    current.siblings().first();
                  
                  
                  current.hide().removeClass('show');
                  next.fadeIn("slow").addClass('show');
                  
                  
                  
                  setTimeout(slideShow, 6000);
                  
                  };

               },
               error: function (msg) {
   
               },
               
            });   
                //end ajax code



            });

            // add marker to map
            new tt.Marker({element: markerElement, anchor: 'bottom'})
                .setLngLat(position)
                .setPopup(popup)
                .addTo(map);
        }
        icon = 'icon1.png'; 
        <?php foreach ($city as $key => $city_val) { ?> scity_id = <?=$city_val->id?>  
         
         $( city_ids ).each(function( index,item ) { 
            if(item == scity_id){
               icon = 'icon3.png';
            }
         });

        

        createMarker(icon, [<?=$city_val->longitude?>,<?=$city_val->latitude?>], '#5327c3', <?=$city_val->id?>,"<?=$city_val->name?>");
        <?php ?> icon = 'icon1.png'; <?php } ?>


       }
     });
   }
   
</script>    
<script>
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
               $("#"+id).remove();
               $('#total-price').html("INR"+" "+results.total)
               $("#total_day").html(results.days)
           
            }
         })
   });
</script>
