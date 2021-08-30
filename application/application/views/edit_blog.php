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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                    <form action="<?=base_url();?>Blog/update_blog" method="POST" id="add_package" enctype="multipart/form-data">
                                <div class="card-block">
                                    <?php foreach ($blog as $key => $value) { ?>
                                        <input type="hidden" name="id" value="<?=$value->id?>">
                                    <div class="row">
										<div class="col-6 input_field_sections">
                                            <h5>TIlte<span class="danger">*</span></h5>
                                            <input type="text" class="form-control" name="title"
                                            placeholder="Enter Blog Title" value="<?=$value->title?>" autocomplete="off" required/>
                                        </div>
										<div class="col-6 input_field_sections">
											<h5>Video Link<span class="danger">*</span></h5>
											<input class="form-control"value="<?=$value->video_link?>" type="text" name="link" id="day" placeholder="Enter Video Link" required>
										</div>
                                    </div>
									<div class="row">
                                        <div class="col-6 input_field_sections">
                                            <h5>Tag<span class="danger">*</span></h5>
                                            <select class="tag form-control" name="tags[]" id="tag" multiple="multiple">
                                                <?php foreach ($tags as $va) { ?>
                                                <option value="<?=$va->id?>" <?php foreach ($blog_tags as $tag) {
                                                    if($tag->tag_id == $va->id){ echo "selected"; }
                                                } ?>><?=$va->tag_name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 input_field_sections">
											<h5>Thumbnail Image<span class="danger">*</span></h5>
											<input class="form-control" type="file" name="img" id="img" <?= $is_edit ? '' : 'required' ?>>
                                            <input type="hidden" name="old_img" $value="<?=$value->img?>">
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-12 input_field_sections">
											<h5>Description<span class="danger">*</span></h5>
											<textarea class="form-control" type="text" id="description" name="description" placeholder="Enter Description" required><?=$value->description?></textarea>
										</div>
                                    </div>
                                    <?php } ?>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    CKEDITOR.replace( 'description' );
</script> 
<script>
$("#tag").select2({
    tags: true,
    tokenSeparators: [',', ' '],
    placeholder: "Select a Tag",
})
</script>
