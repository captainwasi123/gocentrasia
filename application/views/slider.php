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
                                     <form action="<?php echo site_url('Pages/save_slider'); ?>" id="add_product" method="post" enctype="multipart/form-data">
                                     	<input type="hidden" name="slider_id" value="<?=@$slider->id?>"> 
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Title<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="title" value="<?=@$slider->title?>" 
                                            placeholder="Enter Title" autocomplete="off" required/>
                                        </div>
										<div class="col-lg-6 input_field_sections">
                                            <h5>Image <?php if($form_title != 'Edit Slider'){ ?><span style="color: #F00">*</span> <?php } ?></h5>
                                            <input type="file" class="form-control" name="img"
                                            autocomplete="off" <?php if($form_title != 'Edit Slider'){ echo "required";  }?>/>
                                        </div>
                                        <div class="col-lg-12 input_field_sections">
                                            <h5>Tag Line<span style="color: #F00">*</span></h5>
											<textarea class="form-control" name="tag_line" id="" cols="40" rows="3" required placeholder="Enter Tag Line"><?=@$slider->tag_line?></textarea>
                                        </div> 
                                    </div>
                                    
                                    <br>
                                    <button class="btn btn-success glow_button" type="submit">Save</button>
                                </div>

                                </form>
                                </div>
                                 <div class="card-block"  style="margin-top: 25px;">
                                   <table class="table table-striped table-bordered table-hover " id="sample_6">
                                       <thead>
                                           <tr>
                                               <th style="width: 30px">#</th>
                                               <th>Title</th>
                                               <th>Tag Line</th>
											   <th>Client Image</th>
                                               <th style="width: 100px">Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                        <?php foreach ($slider_data as $key => $value) { ?>
                                            <tr>
                                                <td><?=++$key?></td>
                                                <td><?=$value->title?></td>
												<td><?=$value->tag_line?></td>	
                                                <td>
													<img class="img-thumbnil" src="<?=base_url()?><?=$value->img?>" alt="" style="width: 98px;">
												</td>
                                                <td>
                                                	<a href="<?=base_url();?>Pages/edit_silder/<?=hashids_encrypt($value->id)?>" class="mt-2 btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
													<a  onclick="return confirm_click();" href="<?=base_url();?>Pages/delete_silder/<?=hashids_encrypt($value->id)?>" class="mt-2 btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
