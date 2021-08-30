<?php
  require_once 'include/header.php';
?>



<section class="pad-top-60 pad-bot-60">
    <div class="container">
        
    <div class="t-c-head">
        <h4 class="col-blue"> Terms & Conditions </h4>
    </div>    
    
    <div class="t-c-data">
<?php foreach ($data as $key => $value) {?>
    <div class="set">
        <a  > <?=$value->title?>
        <i class="fa fa-plus"></i>
        </a>
        <div class="content">
        <p> <?=$value->description?> </p>
        </div>
    </div>
<?php } ?>
        
    </div>
        
    </div>
</section>

<?php
  require_once 'include/footer.php';
?>