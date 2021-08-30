<?php
	require_once 'include/header.php';
?>
<link type="text/css" rel="stylesheet" href="<?=base_url();?>style/vendors/jquery-validation-engine/css/validationEngine.jquery.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>style/vendors/datepicker/css/bootstrap-datepicker.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>style/vendors/datetimepicker/css/DateTimePicker.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>style/vendors/bootstrapvalidator/css/bootstrapValidator.min.css" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>style/css/pages/form_validations.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url();?>style/vendors/chartist/css/chartist.min.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>style/css/pages/index.css">
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="<?=base_url();?>assets/img/loader.gif" style=" width: 50px;" alt="loading...">
    </div>
</div>
  
<div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                    <div class="row no-gutters">
                        <div class="col-6">
                            <h4 class="m-t-5">
                                <i class="fa fa-home"></i>
                                Dashboard
                            </h4>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- /.outer -->
<?php 
	require_once 'include/footer.php';
?>

    <script type="text/javascript" src="<?=base_url();?>style/vendors/jquery-validation-engine/js/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="<?=base_url();?>style/vendors/jquery-validation-engine/js/jquery.validationEngine-en.js"></script>
    <script type="text/javascript" src="<?=base_url();?>style/vendors/jquery-validation/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?=base_url();?>style/vendors/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>style/vendors/datetimepicker/js/DateTimePicker.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>style/vendors/bootstrapvalidator/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>style/vendors/moment/js/moment.min.js"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="<?=base_url();?>style/js/form.js"></script>
    <script type="text/javascript" src="<?=base_url();?>style/js/pages/form_validation.js"></script>
<!--end of plugin scripts-->

<script type="text/javascript">
    $("#getrec").submit(function(e){
        e.preventDefault();
        var startdate = $('#startdate').val();
        var enddate = $('#enddate').val();
            $('#grand_total').empty();
            $('#cost_total').empty();
            $('#expence_total').empty();
            $('#profit_total').empty();
        $.ajax({
            type: "post",
            url: "<?=base_url();?>dashboard/GetReport/",
            data: {startdate:startdate, enddate:enddate},
            dataType: 'JSON',
            success: function(data) { //alert(data);
                $('#grand').remove();
                $('#grand_total').append(data.grand_total);
                $('#cost').remove();
                $('#cost_total').append(data.cost_total);
                $('#expence').remove();
                $('#expence_total').append(data.expence_total);
                $('#profit').remove();
                $('#profit_total').append(data.profit_total);
            }
        })
    })
</script>
