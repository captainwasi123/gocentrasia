<?php
	require_once 'include/header.php';
?>
</style>
      <!-- Country Banner Section Starts Here -->
      <!-- <section class="pad-bot-60 pad-top-60">
         <div class="container">
            <div class="banner-text2">
               <h3> BUY NOW </h3>
               <p>  
               </p>
            </div>
         </div>
      </section> -->
      <!-- Country Banner Section Ends Here -->
      <!-- Tour Info Detail Section Starts Here -->
      <section class="pad-bot-60 pad-top-60">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <div class="contact-form">
                     <form>
                        <div class="form-field1">
                           <p> Name * </p>
                           <input type="text" placeholder="" name="" required="">
                        </div>
                        <div class="form-field1">
                           <p> Email Address * </p>
                           <input type="text" pl aceholder="" name="" required="">
                        </div>
                        <div class="form-field1">
                           <p> Phone number (optional)  </p>
                           <input type="text" placeholder="" name="" >
                        </div>
                        <div class="form-field1">
                           <p>Tour name </p>
                           <input type="text" placeholder="" name="" value="<?=$from_data['event_name']?>" disabled="">
                        </div>
                        <div class="form-field1">
                           <p>Tour type </p>
                           <input type="text" placeholder="" name="" value="<?=$from_data['tour-type']?>" disabled="">
                        </div>
                        <div class="form-field1">
                           <p>Date </p>
                           <input type="text" placeholder="" name="" value="<?=$from_data['set_date_form-control']?>" disabled="">
                        </div>
                        <div class="form-field1">
                           <p>No. of travellers </p>
                           <input type="text" placeholder="" name="" value="<?=$from_data['people_qty']?>" disabled="">
                        </div>
                        <div class="form-field1">
                           <p>Base fare </p>
                           <input type="text" placeholder="" name="" value="<?=$from_data['base_fare']?>" disabled="">
                        </div>
                        <div class="form-field1">
                           <p>GST % </p>
                           <input type="text" placeholder="" name="" value="<?=$from_data['gst']?>" disabled="">
                        </div>
                        <div class="form-field1">
                           <p>TCS % </p>
                           <input type="text" placeholder="" name="" value="<?=$from_data['tcs']?>" disabled="">
                        </div>
                        <div class="form-field1">
                           <p>  Final price <br> <span>(including GST&TCS)</span></p>
                           <input type="text" placeholder="" name="" value="<?=$from_data['full_final_price']?>" disabled="">
                        </div>
                        <div class="form-field">
                           <p>  <input type="checkbox" placeholder="" name=""> I accept Privacy Policy & Terms & Conditions</p>
                        </div>
                        <div class="form-field1">
                           <input type="submit" value="BUY NOW" name="">
                        </div>
                        
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Tour Info Detail Section Ends Here -->

<?php
	require_once 'include/footer.php';
?>
