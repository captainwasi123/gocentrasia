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
                                     <form action="<?php echo site_url('Dashboard/update_country'); ?>" id="add_product" method="post" enctype="multipart/form-data">
                                     <div class="card-block">
                                     <?php foreach ($country as $key => $country) { ?>
                                    <div class="row">
                                    <input type="hidden" name="c_id" value="<?=$country->id?>">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Country Name</h5>
                                            <input type="text" class="form-control" name="country_name"
                                            placeholder="Enter Country Name" value="<?=$country->country_name?>" autocomplete="off" required/>
                                        </div>
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Tag Line</h5>
                                            <input type="text" class="form-control" name="tag_line"
                                            placeholder="Enter tag Line" autocomplete="off" value="<?=$country->tag_line?>" required/>
                                        </div>
                                    </div>

									<div class="row">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Latitude Of Country<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="latitude"
                                            placeholder="Enter Latitude Of Country" autocomplete="off" value="<?=$country->latitude?>"  required/>
                                        </div>
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Longitude Of Country<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="longitude"
                                            placeholder="Enter Longitude Of Country" value="<?=$country->longitude?>" autocomplete="off" required/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 input_field_sections">
                                            <h5>Description<span class="danger">*</span></h5>
                                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" required><?=$country->description?></textarea>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Tour<span style="color: #F00">*</span></h5>
                                            <input type="text" class="form-control" name="tour" placeholder="Enter Tour detail" value="<?=$country->tour?>" required />
                                        </div>
                                        <div class="col-lg-4 input_field_sections">
                                            <h5>Cover Image<span style="color: #F00">*</span></h5>
                                            <input type="file" class="form-control" name="cover_img" />
                                            <input type="hidden" name="old_cover_img" value="<?=$country->cover_img?>">
                                        </div> 
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Main Image</h5>
                                            <input type="file" class="form-control" name="img"/>
                                            <input type="hidden" name="old_img" value="<?=$country->country_img?>">
                                        </div>
                                        
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Gallery</h5>
                                            <input type="file" class="form-control" name="country_gallery[]" multiple />
                                        </div>
                                        <div class="col-12 input_field_sections">
                                        <div class="row mt-2 ml-1">
                                            <div class="tab-pane gallery-padding active" id="tab_4" aria-expanded="true">
                                                    <div class="row no-gutters" id="old-gallery">
                                                        <?php foreach ($country_images as $key => $value) { 
                                                            ?>
                                                            
                                                            <div class="col-sm-3" id="<?=$value->id?>" style="overflow: hidden;" id="ydOXwq952QE2vjlxW4K6">
                                                                <div class="card ml-2" style="border: none; ">
                                                                    <img src="<?=base_url().$value->img?>" class="card-img-top img-thumbnail" >
                                                                    <a class="btn btn-danger position-absolute gallery_img_delete mb-2" style="right: 0;color: #fff;" data-id="<?=$value->id?>" data-img="<?=$value->img?>"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                                </div>
                                                         <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <?php } ?>
                                    <br>
                                    <input class="btn btn-success glow_button" type="submit" value="Save">
                                </div>
                                 <div id="gallery_img"></div>                           
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

<script>
    CKEDITOR.replace( 'description' );
</script> 
<script>
    $(document).ready(function(){
        $('.gallery_img_delete').click(function() { //alert();
            img_id = $(this).data('id');
            img_name = $(this).data('img');
            $('#gallery_img').append('<input type="hidden" value="'+img_id+'" name="img_id[]">\n\
            <input type="hidden" value="'+img_name+'" name="old_img_name[]">');
            $("#"+img_id).remove();
        });
    });
</script>   
