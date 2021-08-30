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
                                    <h5><?=$form_title?></h5>
                                     <form action="<?php echo site_url('Dashboard/save_event'); ?>" id="add_product" method="post" enctype="multipart/form-data">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Event Name<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="event_name" required />
                                        </div> 
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Package<span style="color: #F00">*</span></h5>
                                            <select class="form-control" name="package_name" id="package_name">
                                                <option value="">Select...</option>
                                                <?php foreach ($package as $value) { ?>
                                                    <option value="<?=$value->id?>"><?=$value->package_name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Duration</h5>
                                            <input type="text" class="form-control" name="duration" id="duration" readonly="">
                                        </div>
                                        <div class="col-lg-3 input_field_sections">
                                            <h5>Start Date<span style="color: #F00">*</span></h5>
                                            <input type="date" class="form-control" name="start_date" required />
                                        </div> 
                                        <div class="col-lg-3 input_field_sections">
                                            <h5>End Date<span style="color: #F00">*</span></h5>
                                            <input type="date" class="form-control" name="end_date" required />
                                        </div>
										<div class="col-lg-3 input_field_sections">
                                            <h5>Base Fare<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" id="gst" name="base_fare"
                                            placeholder="Enter Base Fare" autocomplete="off" required/>
                                        </div>
                                        <div class="col-lg-3 input_field_sections">
                                            <h5>GST<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" id="gst" name="gst"
                                            placeholder="Enter GST" autocomplete="off" required/>
                                        </div>
										<div class="col-lg-3 input_field_sections">
                                            <h5>TCS<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" id="tcs" name="tcs"
                                            placeholder="Enter TCS" autocomplete="off" required/>
                                        </div>
										<div class="col-lg-3 input_field_sections">
                                            <h5>Min People<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="min_no_people"
                                            placeholder="Min No: of People In Group" autocomplete="off" min="2" max="16" required/>
                                        </div>
										<div class="col-lg-3 input_field_sections">
                                            <h5>Max People<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="max_no_people"
                                            placeholder="Max No: People In Group" min="2" max="16" autocomplete="off" required/>
                                        </div>
                                        <div class="col-lg-3 input_field_sections">
                                            <h5>Private Tour Price (INR)<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" id="private_price" name="private_price"
                                            placeholder="Enter Private Tour Price" autocomplete="off" required/>
                                        </div>
										<div class="col-lg-3 input_field_sections">
                                            <h5>Group Tour Price (INR)<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" id="group_price" name="group_price"
                                            placeholder="Enter Group Tour Price" autocomplete="off" required/>
                                        </div>
                                        <div class="col-lg-3 input_field_sections">
                                            <h5>Separate Room Sharges<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="separate_room_charges"
                                            placeholder="Enter Seperate Room Charges" autocomplete="off" required/>
                                        </div>
										<div class="col-lg-3 input_field_sections">
                                            <h5>Affiliate code<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="affiliate_code"
                                            placeholder="Enter Affiliate code" autocomplete="off" required/>
										</div>
                                        <div class="col-lg-3 input_field_sections">
                                            <h5>Affiliate code Discount<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="discount"
                                            placeholder="Enter Affiliate code Discount" autocomplete="off" required/>
                                        </div>
										<!-- <div class="col-lg-3 input_field_sections">
                                            <h5>Group Price with Txt<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" id="group_txt_price" name="group_txt_price" autocomplete="off" readonly="" required/>
                                        </div>
										<div class="col-lg-3 input_field_sections">
                                            <h5>Private Price with Txt<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" id="private_txt_price" name="private_txt_price"  autocomplete="off" readonly="" required/>
                                        </div> -->
										<div class="col-lg-3 input_field_sections">
                                            <h5>Show On Home<span style="color: #F00">*</span></h5>
                                            <select name="show_home" class="form-control" id="show" required>
												<option value="no">NO</option>
												<option value="yes">Yes</option>
											</select>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <input class="btn btn-success glow_button" type="submit" value="Save">
                                </div>

                                </form>
                                </div>
                                 <div class="card-block"  style="margin-top: 25px;">
                                   <table class="table table-striped table-bordered table-hover " id="sample_6">
                                       <thead>
                                           <tr>
                                               <th style="width: 30px">#</th>
                                               <th>Event Name</th>
                                               <th>Package Name</th>
                                               <th>Duration</th>
                                               <th>Start Date</th>
                                               <th>End Date</th>
                                               <th>Group Price (INR)</th>
                                               <th>Private Price (INR)</th>
											   <th>Min People</th>
											   <th>Max People</th>
                                               <th style="width: 100px">Action</th>
                                           
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php foreach ($event as $key => $value) { ?>
                                            <tr>
                                                <td><?=++$key?></td>
                                                <td><?=$value->event_name?></td>
                                                <td><?=$value->pkgName?></td>
                                                <td><?=$value->duration?></td>
                                                <td><?=$value->start_date?></td>
                                                <td><?=$value->end_date?></td>
                                                <td><?=$value->group_price?></td>
                                                <td><?=$value->private_price?></td>
												<td><?=$value->min_no_people?></td>
												<td><?=$value->max_no_people?></td>
                                                <td>
                                                    <a id="editBtn" class="btn btn-info btn-sm" href="<?=base_url();?>Dashboard/edit_event/<?=hashids_encrypt($value->id)?>">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="<?=base_url();?>Dashboard/delete_event/<?=hashids_encrypt($value->id)?>"><i class="fa fa-trash"></i></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>    
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
<?php
    require_once 'include/footer.php';
?>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/select2/js/select2.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/pluginjs/dataTables.tableTools.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/pluginjs/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/vendors/datatables/js/dataTables.scroller.min.js"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="<?=base_url();?>assets/js/pages/datatable.js"></script><!--end of plugin scripts-->

<script>
    $(document).ready(function(){
        $(".alert").click(function(){ 
             $("#notificationWrp").hide(1000);
        });
    });
</script>   
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you sure ?");
}

</script> 
<script>

$(document).ready(function(){
    $('body').on('change','#package_name',function(){
        let package_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?=base_url('Dashboard/getDuration')?>",
            data: {"package_id":package_id},
            success: function(result){
                $('#duration').val(result);
            }
        });
    });

	// $('body').on("blur","#private_price",function(){
	// 	let private_price = $(this).val();
	// 	// let private_txt = $("#private_txt_price")
	// 	let gst = parseInt($("#gst").val());
	// 	let tcs = parseInt($("#tcs").val());
	// 	let gst_total = (gst/100)*private_price; 
	// 	let tcs_total = (tcs/100)*private_price;
	// 	let txt_total = Number(tcs_total) + Number(gst_total) + Number(private_price);
	// 	$("#private_txt_price").val(txt_total);
	// })

	// $('body').on("blur","#group_price",function(){
	// 	let group_price = $(this).val();
	// 	// let private_txt = $("#private_txt_price")
	// 	let gst = parseInt($("#gst").val());
	// 	let tcs = parseInt($("#tcs").val());
	// 	let gst_total = (gst/100)*group_price;
	// 	let tcs_total = (tcs/100)*group_price;
	// 	let txt_total = Number(tcs_total) + Number(gst_total) + Number(group_price);
	// 	$("#group_txt_price").val(txt_total);
	// })
});

</script>
