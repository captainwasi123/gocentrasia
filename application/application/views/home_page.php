<?php
    require_once 'include/header.php';
?>
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
                            <h4 class="m-t-5"><?=$title?></h4>
                        </div>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container cal_btn_hov" style="margin-top:30px">
                    <div class="col-lg-12 col-12 m-t-35" style="margin-top: 0px !important;">
                           <div class="card">
                                <div class="card-header bg-white">
                                <div class="card-block">
                                <form action="<?=base_url()?>Pages/save_home_page" method="post">
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <input type="text" class="form-control" name="main_title" value="<?=$data->main_title?>" autocomplete="off" required="">
                                        </div>
                                        <div class="col-lg-12 input_field_sections">
                                            <textarea  class="form-control" name="main_title_dec" autocomplete="off" required="" rows="10"><?=$data->main_title_dec?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card m-t-35">
                                                    <div class="card-header bg-white">
                                                        <input type="text" class="form-control" name="box_title1" value="<?=$data->box_title1?>" autocomplete="off" required="">
                                                    </div>
                                                    <div class="card-block"> <br>
                                                    <textarea  class="form-control" name="box_title1_dec" autocomplete="off" required="" rows="10"><?=$data->main_title_dec?></textarea>
                                                    </div>
                                                    <!-- <div class="card-footer bg-white">
                                                        
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card m-t-35">
                                                    <div class="card-header bg-white">
                                                        <input type="text" class="form-control" name="box_title2" value="<?=$data->box_title2?>" autocomplete="off" required="">
                                                    </div>
                                                    <div class="card-block"> <br>
                                                    <textarea  class="form-control" name="box_title2_dec" autocomplete="off" required="" rows="10"><?=$data->box_title2_dec?></textarea>
                                                    </div>
                                                    <!-- <div class="card-footer bg-white">
                                                        
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card m-t-35">
                                                    <div class="card-header bg-white">
                                                        <input type="text" class="form-control" name="box_title3" value="<?=$data->box_title3?>"autocomplete="off" required="">
                                                    </div>
                                                    <div class="card-block"> <br>
                                                    <textarea class="form-control" name="box_title3_dec" autocomplete="off" required="" rows="10"><?=$data->box_title3_dec?></textarea>
                                                    </div>
                                                    <!-- <div class="card-footer bg-white">
                                                        
                                                    </div> -->
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 input_field_sections">
                                            <input type="text" class="form-control" name="explore_title" value="<?=$data->explore_title?>" autocomplete="off" required="">
                                        </div>
                                        <div class="col-lg-12 input_field_sections">
                                            <textarea class="form-control" name="explore_dec" autocomplete="off" required="" rows="10"><?=$data->explore_dec?></textarea>
                                        </div>
                                    </div> <br>
                                    <button class="btn btn-success glow_button" type="submit">Save</button>
                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    <br> <br>
                    <!-- Modal -->
                    
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
            
        </div>




<?php
    require_once 'include/footer.php';
?>
