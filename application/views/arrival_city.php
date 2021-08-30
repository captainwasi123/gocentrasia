<?php
	require_once 'include/header.php';
?>
<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/select2/css/select2.min.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/datatables/css/scroller.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/datatables/css/colReorder.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/datatables/css/dataTables.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/pages/dataTables.bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/plugincss/responsive.dataTables.min.css" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/pages/tables.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/pages/index.css">
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
                                    <h5><?=$form_title . $title?></h5>
                                     <form action="<?php echo site_url('Dashboard/arrival_city_save'); ?>" id="add_product" method="post" enctype="multipart/form-data">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-4 input_field_sections">
                                            <h5>Country<span style="color: #F00">*</span></h5>
                                            <select class="form-control" name="country" id="country" require>
												<option value="">Select</option>
												<?php foreach ($country as $key => $value) { ?>
													<option value="<?=$value->id?>"><?=$value->country_name?></option>
												<?php } ?>
											</select>
                                        </div>

										<div class="col-lg-4 input_field_sections">
                                            <h5>Arrival City<span style="color: #F00">*</span></h5>
                                            <select class="form-control" name="arrival_city" id="arrival_city" require>
												<option value="">Select</option>
												<?php foreach ($city as $key => $value) { ?>
													<option value="<?=$value->id?>"><?=$value->name?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-success glow_button" type="submit" value="Save">
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

			<div class="outer">
                <div class="inner bg-light lter bg-container cal_btn_hov" style="margin-top:30px">
                    <div class="col-lg-12 col-12 m-t-35" style="margin-top: 0px !important;">
                            <div class="card">
                                 <div class="card-block"  style="margin-top: 25px;">
                                   <table class="table table-striped table-bordered table-hover " id="sample_6">
                                       <thead>
                                           <tr>
                                               <th style="width: 30px">#</th>
                                               <th>Country</th>
											   <th>Arrival City</th>
											   <!-- <th>Departure City</th> -->
                                               <th style="width: 100px">Action</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                            <?php
											if (!empty($data)) {
											
											foreach ($data as $key => $value) { ?>
                                                <tr>
                                                    <td><?=++$key?></td>
                                                    <td><?=$value->country_name?></td>
                                                    <td><?=$value->arrival_name?></td>
                                                    <td colspan="3">
                                                        <a id="editBtn" class="btn btn-info btn-sm" href="<?=base_url();?>Dashboard/arrival_city_edit/<?=hashids_encrypt($value->id)?>">Edit</a>
														<a id="editBtn" class="btn btn-danger btn-sm" href="<?=base_url();?>Dashboard/delete_arrival_city/<?=hashids_encrypt($value->id)?>"><i class="fa fa-trash"></i></a>
                                                    </a>
                                                    </td>
                                                </tr>
                                            <?php }
											} else{ ?>
												<tr>
													<td colspan="12" align="center">No Data Found</td>
												</tr>
										 	<?php }
											?>
                                       </tbody>
                                   </table>
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

		<!-- Edit Model -->
		<!-- <div class="modal" tabindex="-1" role="dialog" id="Edit">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" id="closebtn" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<label for="#country">Country Name</label>
							<input class="form-control" type="text" name="country" id="country" value="" require>
						</div>
						<div class="form-group">
							<label for="#image">Country Image</label>
							<input class="form-control" type="file" name="image" id="image" value="" require>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Save changes</button>
					<button type="button" id="closebtn" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
				</div>
				</div>
			</div>
		</div> -->
<?php
	require_once 'include/footer.php';
?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/vendors/select2/js/select2.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script> 
<script>
    $(document).ready(function(){
        $(".alert").click(function(){ 
             $("#notificationWrp").hide();
        });
    });
</script>   
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you sure ?");
}

</script> 
