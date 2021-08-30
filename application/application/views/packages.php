<?php
	require_once 'include/header.php';
?>
<style type="text/css">
    .danger{
        color:red;
    }
    .fileinput-upload-button{
        display: none;
    }
</style>
     <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/inputlimiter/css/jquery.inputlimiter.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/chosen/css/chosen.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/jquery-tagsinput/css/jquery.tagsinput.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/daterangepicker/css/daterangepicker.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/datepicker/css/bootstrap-datepicker.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap-switch/css/bootstrap-switch.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/vendors/fileinput/css/fileinput.min.css"/>

    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/pages/form_elements.css"/>
    <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                    <?php
                        if (!empty($alert_msg)) {
                            $flash_status = $alert_msg[0];
                            $flash_desc = $alert_msg[1];
                           if ($flash_status == 'success') {
                                ?>
                                <div class="row" id="notificationWrp">
                                    <div class="col-md-12">
                                        <div class="alert bg-success disabled" role="alert">
                                            <i class="icono-check" style="color: #FFF;"></i> 
                                            <?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                    <div class="row no-gutters">
                        <div class="col-6">
                            <h4 class="m-t-5">
                                <?=$title?>
                            </h4>
                        </div>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container cal_btn_hov" style="margin-top:30px">
                    <div class="col-lg-12 col-12 m-t-35" style="margin-top: 0px !important;">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h5><?=$form_title?></h5>
                                    <form action="<?=base_url();?>Dashboard/save_package" method="POST" id="add_package" enctype="multipart/form-data">
                                <div class="card-block">
								<div class="row">
                                    <div class="col-lg-6 input_field_sections">
                                            <h5>Tour Country<span class="danger">*</span></h5>
											<select class="form-control" name="country" id="country" required="">
												<option value="">Select Country</option>
												<?php 
													foreach ($country as $key => $value) { ?>
														<option value="<?=$value->id?>"><?=$value->country_name ?></option>
												<?php	}
													
												?>
											</select>
                                        </div>
										<div class="col-lg-6 input_field_sections">
                                            <h5>Package Title<span class="danger">*</span></h5>
                                            <input type="text" class="form-control" name="package_title"
                                            placeholder="Enter Package Title" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="row">
										<div class="col-lg-6 input_field_sections">
                                            <h5>Package Duration<span class="danger">*</span></h5>
                                            <input type="text" class="form-control" name="package_duration"
                                            placeholder="Enter Package Duration" autocomplete="off" required/>
                                        </div>
										<div class="col-6 input_field_sections">
											<h5>Places<span class="danger">*</span></h5>
											<input class="form-control" type="text" name="places" id="places" placeholder="Enter Places" required>
										</div>
                                    </div>
									<div class="row mt-2">
										<div class="col-12 input_field_sections">
											<h5>Description<span class="danger">*</span></h5>
											<textarea class="form-control" type="text" name="description" placeholder="Enter Description" required></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-6 input_field_sections">
											<h5>Tour Activities</h5>
                                            <?php foreach ($activity as $key => $value) { ?>
                                               <label>
                                                    <input type="checkbox" name="activity[]" value="<?=$value->id?>">
                                                    <span class="cr"></i></span>
                                                    <?=$value->activity_name?>
                                                </label> &nbsp;&nbsp;
                                            <?php   } ?>
											
                                        </div>
										<div class="col-6 input_field_sections">
											<h5>Tour Services</h5>
											<?php foreach ($service as $key => $value) { ?>
                                                    <label>
                                                    <input type="checkbox" name="service[]" value="<?=$value->id?>">
                                                    <span class="cr"></i></span>
                                                     <?=$value->service_name?>
                                                    </label> &nbsp;&nbsp;
											<?php	} ?>
                                        </div>
                                    </div>
									<div class="row mt-3">
										<div class="col-12">
											<h5>Accommodation<span class="danger">*</span></h5>
											<table class="table" id="sample_6">
                                            <thead>
                                                <tr style="background-color: #686868; color: #FFF;">
                                                    <th>City</th>
                                                    <th >Stay</th>
                                                    <th >Detail</th>
                                                    <th width="2%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addaccrow">
                                                <tr class="dynamic_row" id="row0">
                                                    <td>
                                                        <input id="price0" type="text" class="form-control" name="city[0]"
                                                       placeholder="Enter City Name" />
                                                   </td>
                                                    <td>
                                                        <input id="subtotal0" type="text" class="form-control subtotal" name="stay[0]" />
                                                    </td>
													<td>
                                                        <textarea  class="form-control" name="detail[0]" cols="40"></textarea>
                                                   </td>
                                                    <td>
                                                        <button name="remove" type="button" class="btn btn-success" id="addacc"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
											<div class="message-box animated fadeIn create_remove_popup1" data-sound="alert" id="mb-signout">
                                                    <div class="mb-container">
                                                        <div class="mb-middle">
                                                            <div class="mb-title"><span class="fa fa-times "></span> Remove<strong></strong> ?</div>
                                                            <div class="mb-content">
                                                                <p>Are you sure you want to Remove?</p>                    
                                                                <p>Press No if youwant to continue work. Press Yes to Remove current Row.</p>
                                                                <input type="hidden" id="crearemove_data1" class="crearemove_data1">
                                                            </div>
                                                            <div class="mb-footer">
                                                                <div class="pull-right">
                                                                    <a id="remove_row" class="btn btn-success btn-lg createdata_remove_row" data-dismiss="modal">Yes</a>
                                                                    <button class="btn btn-default btn-lg mb-control-close" type="button">No</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </tbody>
                                        </table>
										</div>
									</div>
									<div class="row">
										<div class="col-12 input_field_sections">
											<h5>Inclusion<span class="danger">*</span></h5>
											<textarea name="in_ex" id="in_ex" placeholder="Enter Inclusion & Exclusion" required></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-12 input_field_sections">
											<h5>Exclusion<span class="danger">*</span></h5>
											<textarea name="ex" id="ex" placeholder="Enter Inclusion & Exclusion" required></textarea>
										</div>
									</div>
                                    <div class="row">
										<div class="col-12 input_field_sections">
											<h5>Additional Remarks<span class="danger">*</span></h5>
											<textarea class="form-control" name="Remarks" placeholder="Enter Additional Remarks" rows="10" required></textarea>
										</div>
									</div>
									
                                    <div class="row">
                                        <div class="col-6 input_field_sections">
                                            <h5>Main Image<span class="danger">*</span></h5>
                                            <input type="file" class="form-control" name="image" required/>
                                        </div>
                                        <div class="col-6 input_field_sections">
                                            <h5>Galary<span class="danger">*</span></h5>
                                            <input name="inputfa[]" type="file" multiple class="form-control"  required/>
                                        </div>
                                    </div>
                                    <div class=" m-t-25" style="margin-top:35px;">
                                        <h5>Tour Itinerary</h5>
                                        <table class="table" id="sample_6">
                                            <thead>
                                                <tr style="background-color: #686868; color: #FFF;">
                                                    <th>Title</th>
                                                    <th >Description</th>
													<th>Longitude</th>
													<th>Latitude</th>
                                                    <th >Image</th>
                                                    <th width="2%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addrow">
                                                <tr class="dynamic_row" id="row0">
                                                    <td>
                                                        <input id="price0" type="text" class="form-control" name="itinerary[0][title]"
                                                       placeholder="" />
                                                   </td>
                                                    <td>
                                                        <textarea  class="form-control" name="itinerary[0][detail]" cols="40"></textarea>
                                                   </td>
												   <td>
                                                        <input id="longitude0" type="text" class="form-control" name="itinerary[0][longitude]"
                                                       placeholder="" />
                                                   </td>
												   <td>
                                                        <input id="longitude0" type="text" class="form-control" name="itinerary[0][latitude]"
                                                       placeholder="" />
                                                   </td>
                                                    <td>
                                                        <input id="subtotal0" type="file" class="form-control subtotal" name="itinerary_img[]" multiple />
                                                    </td>
                                                    <td>
                                                        <button name="remove" type="button" class="btn btn-success" id="add"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            <div class="message-box animated fadeIn create_remove_popup" data-sound="alert" id="mb-signout">
                                                    <div class="mb-container">
                                                        <div class="mb-middle">
                                                            <div class="mb-title"><span class="fa fa-times "></span> Remove<strong></strong> ?</div>
                                                            <div class="mb-content">
                                                                <p>Are you sure you want to Remove?</p>                    
                                                                <p>Press No if youwant to continue work. Press Yes to Remove current Row.</p>
                                                                <input type="hidden" id="crearemove_data" class="crearemove_data">
                                                            </div>
                                                            <div class="mb-footer">
                                                                <div class="pull-right">
                                                                    <a id="remove_row" class="btn btn-success btn-lg createdata_remove_row" data-dismiss="modal">Yes</a>
                                                                    <button class="btn btn-default btn-lg mb-control-close" type="button">No</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <input class="btn btn-info glow_button" type="submit" value="Save">
                                </div>

                                </form>
                                </div>
                            </div>
                        </div>
                    <br /> <br />
                    <!-- Modal -->
                    
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
            <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <form>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="float-right" aria-hidden="true">&times;</span>
                            </button>
                            <div class="input-group search_bar_small">
                                <input type="text" class="form-control" placeholder="Search..." name="search">
                                <span class="input-group-btn">
									<button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
								</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
	require_once 'include/footer.php';
?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<!-- plugin level scripts -->
<script type="text/javascript" src="<?=base_url();?>assets/vendors/jquery.uniform/js/jquery.uniform.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/inputlimiter/js/jquery.inputlimiter.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/chosen/js/chosen.jquery.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/jquery-tagsinput/js/jquery.tagsinput.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/validval/js/jquery.validVal.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/daterangepicker/js/daterangepicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/inputmask/js/inputmask.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/inputmask/js/jquery.inputmask.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/inputmask/js/inputmask.date.extensions.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/inputmask/js/inputmask.extensions.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/fileinput/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/fileinput/js/theme.js"></script>


<!--end of plugin scripts-->
<script type="text/javascript" src="<?=base_url();?>assets/js/form.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/pages/form_elements.js"></script>   
<script>
    CKEDITOR.replace( 'accommodation' );
    CKEDITOR.replace( 'in_ex' );
	CKEDITOR.replace( 'ex' );
</script> 
<script>
    var i=0;  
       $('#add').click(function(){  
           i++;  
           $('#addrow').append('<tr class="dynamic_row" id="row'+i+'">\n\
                                                    <td>\n\
                                                        <input id="price0" type="text" class="form-control" name="itinerary['+i+'][title]"\n\
                                                       placeholder="" />\n\
                                                   </td>\n\
                                                    <td>\n\
                                                        <textarea  class="form-control" name="itinerary['+i+'][detail]" cols="40"></textarea>\n\
                                                   </td>\n\
												   <td>\n\
                                                        <input id="longitude0" type="text" class="form-control" name="itinerary['+i+'][longitude]"\n\
                                                       placeholder="" />\n\
                                                   </td>\n\
												   <td>\n\
                                                        <input id="longitude0" type="text" class="form-control" name="itinerary['+i+'][latitude]"\n\
                                                       placeholder="" />\n\
                                                   </td>\n\
                                                    <td>\n\
                                                        <input id="subtotal0" type="file" class="form-control subtotal" name="itinerary_img[]" />\n\
                                                    </td>\n\
                                                    <td>\n\
                                                        <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>\n\
                                                    </td>\n\
                                                </tr>');  
       });
       $(".table").delegate(".btn_remove", "click", function(){
            var id = $(this).attr('id');
             $('.crearemove_data').val(id);
             $('.create_remove_popup').modal('show');
        });
       $(".createdata_remove_row").click(function(){
            var id = $('.crearemove_data').val(); 
            $("#row"+id).remove();
        });
</script>

<script>
    var i=0;  
       $('#addacc').click(function(){  
           i++;  
           $('#addaccrow').append('<tr class="dynamic_row" id="accrow'+i+'">\n\
                                                    <td>\n\
                                                        <input id="price0" type="text" class="form-control" name="city['+i+']"\n\
                                                       placeholder="" />\n\
                                                   </td>\n\
                                                    <td>\n\
                                                        <input type="text" class="form-control" name="stay['+i+']" />\n\
                                                   </td>\n\
                                                    <td>\n\
                                                        <textarea id="subtotal0" type="text" class="form-control subtotal" cols="40" name="detail['+i+']" ></textarea>\n\
                                                    </td>\n\
                                                    <td>\n\
                                                        <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove1">X</button>\n\
                                                    </td>\n\
                                                </tr>');  
       });
       $(".table").delegate(".btn_remove1", "click", function(){
            var id = $(this).attr('id');
             $('.crearemove_data1').val(id);
             $('.create_remove_popup1').modal('show');
        });
       $(".createdata_remove_row").click(function(){
            var id = $('.crearemove_data1').val(); 
            $("#accrow"+id).remove();
        });
</script>
