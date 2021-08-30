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
                                Custom Tour
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
                                    <h5>Add Custom Tour</h5>
                                    <form action="<?=base_url();?>custom_tour/add_custom_tour" method="POST" id="add_package" enctype="multipart/form-data">
                                <div class="card-block">
								
                                    <div class="row">
										<div class="col-lg-6 input_field_sections">
                                            <h5>TIlte<span class="danger">*</span></h5>
                                            <input type="text" class="form-control" name="title"
                                            placeholder="Enter Title" autocomplete="off" required/>
                                        </div>
										<div class="col-6 input_field_sections">
											<h5>Day<span class="danger">*</span></h5>
											<input class="form-control" type="text" name="day" id="day" placeholder="Enter Day" required>
										</div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6 input_field_sections">
                                            <h5>Price (INR)<span class="danger">*</span></h5>
                                            <input type="text" class="form-control" name="price" required/>
                                        </div>
										<div class="col-6 input_field_sections">
											<h5>Places<span class="danger">*</span></h5>
											<textarea class="form-control" type="text" name="place" placeholder="Enter Description" required></textarea>
										</div>
									</div>
                                    <div class="row mt-2">
										<div class="col-12 input_field_sections">
											<h5>Description<span class="danger">*</span></h5>
											<textarea class="form-control" type="text" name="description" placeholder="Enter Description" required></textarea>
										</div>
									</div>
                                    <!-- <div class="row mt-2">
										<div class="col-12 input_field_sections">
											<h5>Mausoleum<span class="danger">*</span></h5>
											<textarea class="form-control" type="text" name="mausoleum" placeholder="Enter Mausoleum" required></textarea>
										</div>
									</div> -->
									<div class="row mt-2">
										<div class="col-6 input_field_sections">
											<h5>Latitude<span class="danger">*</span></h5>
											<input class="form-control" type="text" name="latitude" placeholder="Enter Latitude" required>
										</div>
										<div class="col-6 input_field_sections">
											<h5>Longitude<span class="danger">*</span></h5>
											<input class="form-control" type="text" name="longitude" placeholder="Enter Longitude" required>
										</div>
									</div>
									<div class="row">
										<div class="col-12 input_field_sections">
											<h5>Tour Activities</h5>
                                            <?php foreach ($activity as $key => $value) { ?>
                                               <label>
                                                    <input type="checkbox" name="activity[]" value="<?=$value->id?>">
                                                    <span class="cr"></i></span>
                                                    <?=$value->activity_name?>
                                                </label> &nbsp;&nbsp;
                                            <?php   } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-12 input_field_sections">
                                            <h5>Main Image<span class="danger">*</span></h5>
                                            <input type="file" class="form-control" name="image" required/>
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
<script>
    CKEDITOR.replace( 'accommodation' );
    CKEDITOR.replace( 'in_ex' );
</script> 
<script>
    $(document).ready(function(){
        $(".alert").click(function(){ 
             $("#notificationWrp").hide();
        });
    });
</script>   
