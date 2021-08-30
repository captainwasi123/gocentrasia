<?php
    require_once 'include/header.php';
?>

<style>
h4.col-blue.fill-name {
    color: #23239e;
    font-size: 18px;
    letter-spacing: 0.6px;
    margin-top: 10px;
    line-height: 25px;
    font-weight: 200;
}
.main-image img {
    width: 100%;
}
 
.gallery-images div img {
    width: 100%;
}
.gallery-images div {
    width: 25%;
    float: left;
    padding: 0px 10px;
    margin-bottom: 15px;
}
.gallery-images {
    margin: 0px -10px;
}
.activities-all div {
    width: 90px;
    display: inline-block;
    padding: 0px 8px;
    text-align: center;
    color: black;
    font-weight: 500;
    line-height: 18px;
    letter-spacing: 0.4px;
}
.activities-all div img {
    height: 59px;
}
.itenary-table table thead tr th {
    color: black;
    font-size: 16px;
    letter-spacing: 0.6px;
    font-weight: normal;
    font-weight: 600;
    padding: 8px 15px;
    background: #f1f1f1;
    border: 1px solid #b5b5b5;
}
.itenary-table table tbody tr td {
    color: black;
    font-size: 15px;
    letter-spacing: 0.2px;
    font-weight: normal;
    padding: 8px 15px;
    line-height: 20px;
    background: white;
    border: 1px solid silver;
}
.itenary-table img {
    width: 200px;
}
.itenary-table table tbody tr:nth-child(even) td {
    background: #f9f9f9;
}

@media screen and (max-width:650px) and (min-width:320px) { 
    .gallery-images div {
    width: 33.333%;
}
}

</style>

<div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                                        <div class="row no-gutters">
                        <div class="col-6">
                            <h4 class="m-t-5">
                                Package Detail                         </h4>
                        </div>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container cal_btn_hov" style="margin-top:30px">
                    <div class="col-lg-12 col-12 m-t-35" style="margin-top: 0px !important;">
                           <div class="card">
                                <div class="card-header bg-white">
                                    <h5>View Packages </h5>
                                  
                                <div class="card-block">
                             
                                    <?php foreach ($package as $key => $pack) { ?>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5> Tour Country  </h5>
                                            <h4 class="col-blue fill-name"> <?=$pack->cName?> </h4>
                                        </div>
                                        <div class="col-lg-6 input_field_sections">
                                            <h5> Package Duration  </h5>
                                            <h4 class="col-blue fill-name"> <?=$pack->duration?> </h4>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <h5>Places Description  </h5>
                                            <h4 class="col-blue fill-name">
                                                <?=$pack->places_description?>
                                            </h4>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <h5> Description  </h5>
                                            <h4 class="col-blue fill-name">
                                                <?=$pack->description?>
                                            </h4>
                                        </div>
                                    </div>
                                    
 <br>                              
                                    
                                    <div class="row">
									<div class="col-12">
									<h5> Tour Services  </h5>
                                    </div>
									<?php foreach ($service as $serv) { ?>
                                        <div class="col-3"> 
                                          
                                        <div class="activities-all">
                                            <div>
                                                <img src="<?=base_url()."assets/img/service_img/"?><?=$serv->service_img?>">
                                                <span><?=$serv->service_name?></span>
                                            </div>
                                            
                                        </div>
                                        </div>
                                        <?php } ?>
                                    </div>

                               
<br>
                                    
                                    
									<div class="row">
									<div class="col-12">
									<h5> Tour Activity  </h5>
                                    </div>
									<?php foreach ($activity as  $act) { ?>
									<div class="col-3 input_field_sections"> 
										<div class="activities-all">
											<div>
												<img src="<?=base_url()."assets/img/activity_img/"?><?=$act->activity_img?>">
												<span><?=$act->activity_name?></span>
											</div>
										</div>
									</div>
									<?php } ?>
									</div>

                                    
                                    
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <h5> Accomodation  </h5>
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>City</th>
														<th>Stay</th>
														<th>Detail</th>
													</tr>
												</thead>
												<tbody>
													<?php $acc = json_decode($pack->accommodation, true);
														//echo "<pre>"; print_r($acc);
														foreach ($acc['city'] as $key => $value) {  ?>
															<tr>
																<td><?=$value?></td>
																<td><?=$acc['stay'][$key]?></td>
																<td><?=$acc['detail'][$key]?></td>
															</tr>
														<?php	}
													?>
												</tbody>
											</table>
                                            <h4 class="col-blue fill-name">
                                                
                                            </h4>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5> Inclusion  </h5>
                                            <h4 class="col-blue fill-name"> 
                                                <?=$pack->inclusion?>
                                            </h4>
                                        </div>
										<div class="col-lg-6 input_field_sections">
                                            <h5> Exclusion  </h5>
                                            <h4 class="col-blue fill-name"> 
                                                <?=$pack->exclusion?>
                                            </h4>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <h5> Additional Remarks  </h5>
                                            <h4 class="col-blue fill-name">  
                                                <?=$pack->additional_remarks?>
                                            </h4>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <h5> Main Image </h5>
                                            <div class="main-image">
                                                <img src="<?=base_url()?><?=$pack->images?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <h5> Gallery Images </h5>
                                            <div class="gallery-images">
                                                <?php foreach ($gallery as $key => $gal) { ?>
                                                    <div>
                                                        <img src="<?=base_url()?><?=$gal->img?>">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <h5> Tour Itenary </h5>
                                            <div class="itenary-table">
                                            <table>
                                                <thead> 
                                                <tr> 
                                                <th> Day </th>
                                                <th> Title </th>
                                                <th> Description </th>
                                                <th> Image </th>
                                                </tr>
                                            </thead>
                                                
                                                <tbody>
                                                <?php $i=1; foreach ($itinerary as $key => $it) { ?>
                                                    <tr>
                                                        <td> <?=$i++?> </td>
                                                        <td> <?=$it->title?> </td>
                                                        <td> <?=$it->detail?> </td>
                                                        <td>  <img src="<?=base_url()?><?=$it->img?>">  </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                                
                                            </table>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                     
                                     
                                     
                                     
                                     
                                 
                                    
                                    
                                    
                                    
                                    
                                   
                                </div>

                                 
                                </div>
                            </div>
                        </div>
                    <br> <br>
                    <!-- Modal -->
                    
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
            
        </div>




<?php
    require_once 'include/footer.php';
?>
