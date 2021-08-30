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
                                    <form action="<?=base_url();?>Dashboard/save_agent_size_cost" method="POST" id="add_package" enctype="multipart/form-data">
                                <div class="card-block">
								<div class="row">
									<input type="hidden" name="id" value="<?=$edit->id?>">
									
                                    <div class="col-lg-6 input_field_sections">
                                            <h5>itinerary<span class="danger">*</span></h5>
											<select class="form-control" name="itinerary" id="itinerary" required="">
												<option value="">Select itinerary</option>
												<?php 
													foreach ($itin as $key => $value) { ?>
														<option value="<?=$value->id?>" 
														<?php if ($value->id == $edit->itinerary_id) {
															echo "selected";
														} ?>
														><?=$value->title ?></option>
												<?php } ?>
											</select>
                                        </div>
										<div class="col-lg-6 input_field_sections">
                                            <h5>Country<span class="danger">*</span></h5>
                                            <input type="text" class="form-control" name="country" id="country" value="<?=$edit->country_name?>" readonly autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="row">
										<div class="col-lg-6 input_field_sections">
                                            <h5>Aggents<span class="danger">*</span></h5>
											<select class="form-control" name="aggent" id="aggent" required>
												<!-- <option value="">select</option> -->
												<option value="<?=$edit->guide_id?>"><?=$edit->name?></option>
											</select>
                                        </div>

										<div class="col-lg-3 input_field_sections" id="show_tour_type">
                                            <h5>Tour Type<span class="danger">*</span></h5>
											<select class="form-control" name="tour_type" id="tour_type" required>
												<option value="">select</option>
												<option value="Standard"
												<?php if ($edit->tour_type == 'Standard') {
													echo 'selected';
												} ?>
												>Standard</option>
												<option value="Custom" 
												<?php if ($edit->tour_type == 'Custom') {
													echo 'selected';
												} ?>
												>Custom</option>
											</select>
                                        </div>

										<div class="col-lg-3 input_field_sections" id="show_group">
                                            <h5>Group Type<span class="danger">*</span></h5>
											<select class="form-control" name="group_type" id="group_type" required>
												<option value="">select</option>
												<option value="Group" 
												<?php 
													$group_type = explode(',',$edit->group_type);
													$size = explode(',',$edit->size);
													$cost = explode(',',$edit->cost);
													if ($group_type[0] == 'Group') {
														echo 'selected';
													}
												?>
												>Group</option>
												<option value="Private" 
													<?php 
														if ($group_type[0] == 'Private') {
															echo 'selected';
														}
													?>
												>Private</option>
											</select>
                                        </div>
                                    </div>
									<div class="row mt-3 
									<?php if ($group_type[0] != 'Private') {
										echo 'd-none';
									} ?>
									" id="private_table">
										<div class="col-12">
											<h5>Private tour<span class="danger">*</span></h5>
											<table class="table" id="sample_6">
                                            <thead>
                                                <tr style="background-color: #686868; color: #FFF;">
                                                    <th>Private (group size)</th>
                                                    <th >Cost per person</th>
                                                    <th width="2%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addrow">
												<?php for ($i=0; $i <= 7 ; $i++) { ?>
													<tr class="dynamic_row" id="row[<?=$i?>]">
														<td>
															<input id="price0" type="number" class="form-control private_group_size" name="private_group_size[<?=$i?>]"
															value="<?=@$size[$i]?>"
														placeholder="Enter Private (group size)" />
														</td>
														<td>
															<input id="subtotal0" type="number" placeholder="Enter Cost per person" 
															value="<?=@$cost[$i]?>"
															class="form-control private_price subtotal" name="private_price[<?=$i?>]" />
														</td>
														<?php if($i == 0){ ?>
														<td>
															<button name="remove" type="button" class="btn btn-success" id="add"><i class="fa fa-plus"></i></button>
														</td>
														<?php }else{ ?>
														<td>
															<button type="button" name="remove" id="<?=$i?>" class="btn btn-danger btn_remove">X</button>
														</td>
														<?php } ?>
													</tr>
												<?php } ?>
                                            </tbody>
                                        </table>
										</div>
									</div>
									<div class="row mt-3 
									<?php if ($group_type[0] != 'Group') {
										echo 'd-none';
									} ?>
									" id="group_table">
										<div class="col-12">
											<h5>Group tour<span class="danger">*</span></h5>
											<table class="table" id="sample_6">
                                            <thead>
                                                <tr style="background-color: #686868; color: #FFF;">
                                                    <th>Group (group size)</th>
                                                    <th >Cost per person</th>
                                                    <th width="2%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="group_addaccrow">
												<?php for ($i=0; $i <= 31 ; $i++) { ?>
													<tr class="group_dynamic_row" id="group_row0">
														<td>
															<input id="price0" type="number" class="form-control groups_size" name="group_size[<?=$i?>]"
															value="<?=@$size[$i]?>"
															placeholder="Enter (group size)" />
														</td>
														<td>
															<input id="subtotal0" type="number" placeholder="Enter Cost per person" 
															value="<?=@$cost[$i]?>" class="form-control group_price subtotal" name="group_price[<?=$i?>]" />
														</td>
														<?php if($i == 0){ ?>
														<td>
															<button name="remove" type="button" class="btn btn-success" id="addacc"><i class="fa fa-plus"></i></button>
														</td>
														<?php }else{ ?>
														<td>
															<button type="button" name="remove" id="<?=$i?>" class="btn btn-danger btn_remove_group">X</button>
														</td>
														<?php } ?>
													</tr>
												<?php } ?>
                                            </tbody>
                                        </table>
										</div>
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
        </div>
<?php
	require_once 'include/footer.php';
?>

<!--end of plugin scripts-->
<script type="text/javascript" src="<?=base_url();?>assets/js/form.js"></script>
<script>
    var i=7;  
       $('#add').click(function(){  
           i++;
           $('#addrow').append('<tr class="dynamic_row" id="row'+i+'">\n\
                                                    <td>\n\
													<input id="price0" type="number" class="form-control private_group_size" name="private_group_size['+i+']"		placeholder="Enter Private (group size)" />\n\
                                                   </td>\n\
                                                    <td>\n\
														<input id="subtotal0" type="number" placeholder="Enter Cost per person" class="form-control private_price subtotal" name="private_price['+i+']" />\n\
                                                   </td>\n\
                                                    <td>\n\
                                                        <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>\n\
                                                    </td>\n\
                                                </tr>');  
       });
	   	$('#addrow').on('click','.btn_remove',function(){
            if(confirm('Are you sure want to remove this?')){
                $(this).parent().parent().remove();
            }
        });
</script>

<script>
	$(document).ready(function () {
		$('#tour_type').change(function(){
			if($(this).val() == 'Standard' || $(this).val() == 'Custom'){
				$('#show_tour_type').removeClass('col-lg-6');
				$('#show_tour_type').addClass('col-lg-3');
				$('#show_group').removeClass('d-none');
			}else{
				$('#show_group').addClass('d-none');
				$('#show_tour_type').removeClass('col-lg-3');
				$('#show_tour_type').addClass('col-lg-6');
			}
		})

		$('#group_type').change(function(){
			if ($(this).val() == 'Private') {

				$('.group_price').prop('required',false);
				$('.groups_size').prop('required',false);

				$('.private_price').prop('required',true);
				$('.private_group_size').prop('required',true);

				$("#group_table").addClass('d-none')
				$("#private_table").removeClass('d-none');

			}else if($(this).val() == 'Group'){

				$('.private_price').prop('required',false);
				$('.private_group_size').prop('required',false);

				$('.group_price').prop('required',true);
				$('.groups_size').prop('required',true);

				$("#private_table").addClass('d-none');
				$("#group_table").removeClass('d-none')
			}
		})
	});
</script>


<script>
	$(document).ready(function () {
		$('#itinerary').change(function (param) { 
			var id = $(this).val();
			$.ajax({
				type: "post",
				url: "<?=base_url('Dashboard/itinerary_get/')?>"+id,
				data: id,
				dataType: "json",
				success: function (res) {
					$("#country").val(res.country);
					$('#aggent').empty();
					$.each(res.guidde_name, function (index, value) { 
						$('#aggent').append('<option value="'+res.guidde_id[index]+'">'+value+'</option>');
					});
				}
			});
		})
	});
</script>



<script>
	// for group remove 
	$(document).ready(function () {
		$('#group_addaccrow').on('click','.btn_remove_group',function(){
            if(confirm('Are you sure want to remove this?')){
                $(this).parent().parent().remove();
            }
        });


		// add group rwo

		var i=31;  
       $('#addacc').click(function(){  
           i++;
           $('#group_addaccrow').append('<tr class="dynamic_row" id="row'+i+'">\n\
                                                    <td>\n\
													<input id="price0" type="number" class="form-control groups_size" name="group_size['+i+']"		placeholder="Enter Private (group size)" />\n\
                                                   </td>\n\
                                                    <td>\n\
														<input id="subtotal0" type="number" placeholder="Enter Cost per person" class="form-control group_price subtotal" name="group_price['+i+']" />\n\
                                                   </td>\n\
                                                    <td>\n\
                                                        <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_group">X</button>\n\
                                                    </td>\n\
                                                </tr>');  
       });
	});
</script>
