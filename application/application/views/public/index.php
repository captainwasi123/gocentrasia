<?php
	require_once 'include/header.php';
?>
<section class="banner-slider home-banner-slider">
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            <?php foreach ($slider as $key => $value) { ?>   
               <div class="item <?php if($key == 0){ echo "active"; } ?>" style="background-image:url(<?=base_url().$value->img?>)">
                  <div class="container">
                     <div class="banner-text">
                        <h3>  <?=$value->title?> <br/>
                            
                        </h3>
                        <p> <?=$value->tag_line?> </p>
                     </div>
                  </div>
               </div>
            <?php } ?>   
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </section>
      <!-- Banner Slider Section Ends Here -->
      <!-- Banner Boxes Section Starts Here -->
      <section class="banner-boxes">
         <div class="container">
            <div class="row">
				<?php foreach ($event as $key => $value) { ?>
					
               <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
               
                  <div class="tour-box" style="background-image:url('<?=base_url().$value->images?>')">
						<a href="<?=base_url()?>Home/packages/<?=hashids_encrypt($value->id); ?>" >
                     <h4> <?=substr($value->event_name,0,15)?>... </h4>
                     <p> <?=substr($value->description,-90)?> </p>
                     <h6> . </h6>
                     <h5> <b>  <?php get_price("INR",$value->group_price)?> </b> per person </h5>
							</a>
                  </div>
               
               </div>
					<?php } ?>
            </div>
				
         </div>
      </section>
      <!-- Banner Boxes Section Ends Here -->
      <!-- Tour Package Type Section Starts Here -->
      <section class="pad-top-60 pad-bot-60">
         <div class="container">
            <div class="sec-head text-center">
               <h3> <?=$home->main_title?> </h3>
               <p> <?=$home->main_title_dec?>  </p>
            </div>
            <div class="package-data">
               <div class="row">
                  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box">
                     	<div class="package-height1">
                        <h3> <?=$home->box_title1?> </h3>
                        <p> <?=$home->box_title1_dec?> </p>
                    </div>
                        <ul>
                           <li> <img src="<?=base_url().'assets/site/'?>images/group-icon1.png"> Fixed Schedule </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/group-icon2.png"> Fixed Itinery </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/group-icon3.png"> Travel in Group </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/group-icon4.png"> Budget Travel </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/group-icon5.png"> Premium Travel </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box">
                     	<div class="package-height1">
                        <h3> <?=$home->box_title2?> </h3>
                        <p> <?=$home->box_title2_dec?></p>
                    </div>
                        <ul>
                           <li> <img src="<?=base_url().'assets/site/'?>images/private-icon1.png"> Fixed Schedule  </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/private-icon2.png"> Fixed Itinery  </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/private-icon3.png"> Premium Travel  </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/private-icon4.png"> Couples/Families   </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/private-icon5.png">  Solo Travel </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/private-icon6.png">  Chaperone  </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                     <div class="package-box">
                     	<div class="package-height1">
                        <h3> <?=$home->box_title3?> </h3>
                        <p> <?=$home->box_title3_dec?> </p>
                       </div>
                        <ul>
                           <li> <img src="<?=base_url().'assets/site/'?>images/custom-icon1.png"> Fixed Schedule  </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/custom-icon2.png"> Design your own Itinery  </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/custom-icon3.png"> Luxury Travel  </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/custom-icon4.png"> Couples/Families    </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/custom-icon5.png"> Solo Travel  </li>
                           <li> <img src="<?=base_url().'assets/site/'?>images/custom-icon6.png">   Chaperone </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Tour Package Type Section Ends Here -->
      <!-- Tour Calendar Section Starts Here -->
      <section>
         <div class="container">
            <div class="tour-calendar">
               <table>
                  <thead>
                     <tr>
                        <th colspan="2">   Upcoming Group Tour Dates in 2021  </th>
                        <th> STATUS  </th>
                        <th> DAYS </th>
                        <th> PRICE(INR) </th>
                     </tr>
                  </thead>
                  <tbody>
						<?php foreach ($event as $key => $value) { ?>
                     <tr>
							<!-- <td><?= date("d M")?></td> -->
                        <td> 
                            <?=date("d", strtotime($value->start_date))?> 
                            <br>
                            <?=date("M", strtotime($value->start_date))?>
                        </td>
                        <td> 
                           <b> <?=$value->event_name?> </b>
                           <span> <?=$value->places_description?> </span>
                           <a href="<?=base_url()?>Home/packages/<?=hashids_encrypt($value->id); ?>" class="btn btn-info"> more details</a>
                        </td>
                        <td class="col-blue"> Available
                           <!-- <?php if ($value->status == "1") { ?>
									Available
								<?php }else{ ?>  Unavailable  <?php } ?> -->
                           
                        </td>
                        <td class="col-black"> <?=$value->duration ?> </td>
                        <td class="col-black"> <?php get_price("INR",$value->group_price);?> </td>
                     </tr>
						<?php } ?> 	
                  </tbody>
               </table>
            </div>
         </div>
      </section>
      <!-- Tour Calendar Section Ends Here -->
    
      
       <!-- Explore With Go Center Asia Section Starts Here -->
      <section class="pad-top-60 pad-bot-60">
         <div class="container">
             <div class="sec-head text-center">
               <h3><?=$home->explore_title?></h3>
               <p><?=$home->explore_dec?></p>
            </div>
            
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
		$("#load_more").click(function(e){
			//e.preventDefault();
			const BASE_URL = "<?php echo base_url();?>";
			let site_url = BASE_URL;
			$("#explore").empty();
			$.ajax({
				type: "GET",
				url: BASE_URL+"Home/load_country",
				data: {'url':site_url},
				dataType: "json", 
				success: function(result){
				//console.log(result);
				$.each(result, function(index, data) {
					let hashids_encrypt = "<?=hashids_encrypt("+data.id+")?>";
					let country = "";
					country += '<div class="explore-box">';
					country += '<div class="explore-image">';
					country += "<a href="+BASE_URL+"/Home/country/"+hashids_encrypt+">";
					country += "<img src="+BASE_URL+"assets/img/country_img/"+data.country_img+">";
					country += ' <h5> '+data.country_name+' </h5>';
					country += '</a>';
					country +=	'</div>';
					country += '</div>';
					$("#explore").append(country);
				});
				// $("#explore").html(result);
			}
		})
		})
	})
</script>

<script>
    $(document).ready(function(){
    $('header').removeClass("header-style2")        
    })
</script>
