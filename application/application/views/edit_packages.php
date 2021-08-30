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
                                    <form action="<?=base_url();?>Dashboard/update_package" method="POST" id="add_package" enctype="multipart/form-data">
                                <?php foreach ($package as $key => $pack) { ?>
                                    <input type="hidden" name="package_id" value="<?=$pack->id?>">
                            <div class="card-block">
                                <div class="row">
                                
                                    <div class="col-lg-6 input_field_sections">
                                            <h5>Tour Country<span class="danger">*</span></h5>
                                            <select class="form-control" name="country" id="country" required="">
                                                <?php 
                                                    foreach ($country as $key => $value) { ?>
                                                        <option value="<?=$value->id?>"
                                                        <?php if ($value->id == $pack->country_id) {
                                                            echo "selected";
                                                        }?>
                                                        ><?=$value->country_name ?></option>
                                                <?php   }
                                                    
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Package Title<span class="danger">*</span></h5>
                                            <input type="text" class="form-control" name="package_title"
                                            placeholder="Enter Package Title" value="<?=$pack->package_name?>" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 input_field_sections">
                                            <h5>Package Duration<span class="danger">*</span></h5>
                                            <input type="text" class="form-control" name="package_duration"
                                            placeholder="Enter Package Duration" value="<?=$pack->duration?>" autocomplete="off" required/>
                                        </div>
                                        <div class="col-6 input_field_sections">
                                            <h5>Places<span class="danger">*</span></h5>
                                            <input class="form-control" type="text" name="places" id="places" value="<?=$pack->places_description?>" placeholder="Enter Places" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 input_field_sections">
                                            <h5>Description<span class="danger">*</span></h5>
                                            <textarea class="form-control" type="text" name="description" placeholder="Enter Description" value="" required><?=$pack->description?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 input_field_sections">
                                            <h5>Tour Activities</h5>
                                            <?php foreach ($activity as $key => $act) { ?>
                                                <label>
                                                    <input type="checkbox" name="activity[<?=$key?>]" value="<?=$act->id?>" 
                                                    <?php foreach ($pkg_act_id as $key => $item) { echo $item->activity_id; ?>
                                                    <?php if ($act->id == $item->activity_id) {
                                                        echo "checked";
                                                    }?>
                                                    <?php   } ?>
                                                    >
                                                    <span class="cr"></i></span>
                                                     <?=$act->activity_name?>
                                                    </label> &nbsp;&nbsp;
                                            <?php } ?>
                                            
                                        </div>
                                        <div class="col-6 input_field_sections">
                                            <h5>Tour Services</h5>
                                            <?php foreach ($services as $key => $value) { ?>
                                                    <label>
                                                    <input type="checkbox" name="service[<?=$key?>]" value="<?=$value->id?>" 
                                                    <?php foreach ($pkg_srv_id as $item) { ?>
                                                    <?php if ($item->service_id == $value->id) {
                                                        echo "checked";
                                                    } ?>
                                                    <?php } ?>
                                                    >
                                                    <span class="cr"></i></span>
                                                     <?=$value->service_name?>
                                                    </label> &nbsp;&nbsp;
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 input_field_sections">
                                            <h5>Accommodation<span class="danger">*</span></h5>
                                            <textarea name="accommodation" id="accommodation" placeholder="Enter Accommodation" value="" required><?=$pack->accommodation?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 input_field_sections">
                                            <h5>Inclusion<span class="danger">*</span></h5>
                                            <textarea name="in_ex" id="in_ex" placeholder="Enter Inclusion" required><?=$pack->inclusion?></textarea>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-12 input_field_sections">
                                            <h5>Exclusion<span class="danger">*</span></h5>
                                            <textarea name="ex" id="ex" placeholder="Enter Exclusion" required><?=$pack->exclusion?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 input_field_sections">
                                            <h5>Additional Remarks<span class="danger">*</span></h5>
                                            <textarea class="form-control" name="Remarks" placeholder="Enter Additional Remarks" rows="10" required><?=$pack->additional_remarks?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6 input_field_sections">
                                            <h5>Main Image<span class="danger">*</span></h5>
                                            <input type="file" class="form-control" name="image"/>
                                            <input type="hidden" name="old_img" value="<?=$pack->images?>">
                                        </div>
                                        <div class="col-6 input_field_sections">
                                            <h5>Galary<span class="danger">*</span></h5>
                                            <input name="inputfa[]" type="file" multiple class="form-control"/>
                                            <!-- <?php foreach ($package_image as $key => $p_i) {
                                                foreach($pkg_img_id as $key => $p_i_id){
                                                    if ($p_i->pkg_id == $p_i_id->pkg_id) { ?>
                                                        <input type="hidden" name="old_gal_img[]" value="<?=$p_i->img?>">
                                            <?php   }
                                                }
                                            } ?> -->
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 input_field_sections">
                                        <div class="row mt-2 ml-1">
                                            <div class="tab-pane gallery-padding active" id="tab_4" aria-expanded="true">
                                            <h5>Old Gallery</h5>
                                                    <div class="row no-gutters" id="old-gallery">
                                                        <div class="row mt-2 ml-1">
                                            <div class="tab-pane gallery-padding active" id="tab_4" aria-expanded="true">
                                                    <div class="row no-gutters" id="old-gallery">
                                                        <?php foreach ($package_image as $key => $value) { 
                                                            ?>
                                                            <input type="hidden" name="old_gallery[<?=$key?>]" value="<?=$value->img?>">
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
                                                </div>
                                            </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class=" m-t-25" style="margin-top:35px;">
                                        <h5>Tour Itinerary</h5>
                                        <table class="table" id="sample_6">
                                            <thead>
                                                <tr style="background-color: #686868; color: #FFF;">
                                                    <th>Title</th>
                                                    <th >Description</th>
                                                    <th >Image</th>
                                                    <th width="2%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addrow">
                                                <?php foreach ($itinerary as $key => $item) {
                                                    ?>
                                                <tr class="dynamic_row" id="row<?=$key?>">
                                                    <td>
                                                        <input id="price0" type="text" class="form-control" name="itinerary[<?=$key?>][title]"
                                                       placeholder="" value="<?=$item->title?>"/>
                                                   </td>
                                                    <td>
                                                        <textarea  class="form-control" name="itinerary[<?=$key?>][detail]" cols="40"><?=$item->detail?></textarea>
                                                   
                                                   </td>
                                                    <td>
                                                        <input id="subtotal0" type="file" class="form-control subtotal" name="itinerary_img[]" />
                                                        <input type="hidden" name="old_itinerary_img[]" value="<?=$item->img?>">
                                                    </td>
                                                
                                                    <td>
                                                        <?php if ($key == 0){ ?>
                                                            <button type="button" name="remove" class="btn btn-success" id="add"><i class="fa fa-plus"></i></button>    
                                                        <?php }else{ ?>
                                                            <button type="button" name="remove" id="<?=$key?>" class="btn btn-danger btn_remove">X</button>
                                                        <?php } ?>
                                                        
                                                    </td>
                                                </tr>
                                                <?php }   ?>
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
                           <?php } ?>
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
