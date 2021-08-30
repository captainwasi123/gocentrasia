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
                                     <form action="<?php echo site_url('Pages/save_about_us'); ?>" id="add_product" method="post" enctype="multipart/form-data">
                                <div class="card-block">
                                    <div class="row">
										<div class="col-lg-12 input_field_sections">
                                            <h5>About Us Title<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="about_us_title" value="<?=@$about->about_us_title?>"  required />
                                        </div> 
										<div class="col-lg-12 input_field_sections">
                                            <h5>About Us Description<span style="color: #F00">*</span></h5>
                                            <textarea class="form-control" name="about_us_desc" required><?=@$about->about_us_desc?></textarea>
                                        </div>
										<hr>
										<div class="col-lg-6 input_field_sections">
                                            <h5>Cover Image<span style="color: #F00">*</span></h5>
                                            <input class="form-control" name="cover_img" type="file" onchange="CoverreadURL(this);"  />
                                        </div>
										<div class="col-lg-6 input_field_sections">
											<img class="img img-thumbnail" id="blahCover" 
											<?php if(!empty(@$about->cover_img)) { ?>
												src="<?=base_url()?><?=@$about->cover_img?>"
											<?php }else{ ?>
												src="#"
											<?php } ?>	
											alt="" />
											<input type="hidden" name="old_cover_img" value="<?=@$about->cover_img?>">
										</div>
                                        <div class="col-lg-12 input_field_sections">
                                            <h5>Our Story Title<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="story_title" value="<?=@$about->story_title?>"  required />
                                        </div> 
										<div class="col-lg-12 input_field_sections">
                                            <h5>Our Story Description<span style="color: #F00">*</span></h5>
                                            <textarea class="form-control" name="story_desc" required><?=@$about->story_desc?></textarea>
                                        </div>
										<hr>
										<div class="col-lg-6 input_field_sections">
                                            <h5>Image<span style="color: #F00">*</span></h5>
                                            <input class="form-control" name="img" type="file" onchange="readURL(this);" />
                                        </div>
										<div class="col-lg-6 input_field_sections">
											<img class="img img-thumbnail" id="blah" 
											<?php if(!empty(@$about->img)) { ?>
												src="<?=base_url()?>/<?=@$about->img?>"
											<?php }else{ ?>
												src="#"
											<?php } ?>	
											alt="" />
											<input type="hidden" name="old_img" value="<?=@$about->img?>">
										</div>
										<div class="col-lg-12 input_field_sections">
                                            <h5>What We Do Title<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="we_do_title" value="<?=@$about->we_do_title?>" required />
                                        </div> 
										<div class="col-lg-12 input_field_sections">
                                            <h5>What We Do Description<span style="color: #F00">*</span></h5>
                                            <textarea class="form-control" name="we_do_desc" required><?=@$about->we_do_desc?></textarea>
                                        </div>
										<div class="col-lg-12 input_field_sections">
                                            <h5>Our Travelers Title<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="our_travelers_title" value="<?=@$about->our_travelers_title?>" required>
                                        </div>
										<div class="col-lg-12 input_field_sections">
                                            <h5>Our Travelers Description<span style="color: #F00">*</span></h5>
                                            <textarea class="form-control" name="our_travelers_desc" required><?=@$about->our_travelers_desc?></textarea>
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
<script type="text/javascript" src="<?=base_url();?>assets/vendors/select2/js/select2.js"></script>
<script>
    CKEDITOR.replace( 'story_desc' );
    CKEDITOR.replace( 'we_do_desc' );
	CKEDITOR.replace( 'our_travelers_desc' )
	CKEDITOR.replace( 'about_us_desc' )
</script> 
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
<script type="text/javascript">

	function readURL(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
				
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

	function CoverreadURL(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blahCover').attr('src', e.target.result);
				
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
