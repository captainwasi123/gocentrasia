<?php
	require_once 'include/header.php';
?>

      <!-- Tour Info Detail Section Starts Here -->
      <section class="pad-bot-60 pad-top-60">
         <div class="container">
            <div class="row">
               <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                

               <div class="all-blogs">
                  <?php foreach ($blogs as $key => $value) { 
    //function get_date($date, $format = 'd, M Y')
                        //$date1 = $this->custom_helper->get_date($value->create_at);
                     ?>
                     <div class="blog-block">
                        <div class="blog-block-image">
                            <img src="<?=base_url()."assets/img/"?>blog_img/<?=$value->img?>">
                          <!-- <iframe src="<?= $value->video_link ?>"></iframe> -->
                           </div>
                           <div class="blog-block-content">
                           <h3> <?=$value->title?> </h3>
                           <h6> <?php $new_date = new DateTime($value->create_at); echo $new_date->format('d, M Y');?> </h6>
                           <p><?= substr($value->description,0, 200). '....' ?></p>
                           <a href="<?=base_url('Home/blog_detail/')?><?=hashids_encrypt($value->id)?>"> READ MORE </a>
                        </div>
                     </div>		
                  <?php } ?>

                  <div class="blog-pagination">
                     <nav aria-label="Page navigation">
                      <!--   <ul class="pagination">
                           <li>
                              <a href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              </a>
                           </li>
                           <li><a href="#">1</a></li>
                           <li><a href="#">2</a></li>
                           <li><a href="#">3</a></li>
                           <li><a href="#">4</a></li>
                           <li><a href="#">5</a></li>
                           <li>
                              <a href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              </a>
                           </li>
                        </ul> -->
                        
                        <?= $this->pagination->create_links(); ?>
                     </nav>
                  </div>

               </div>


               </div>
               <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                  <div class="search-form">
                     <input type="text" placeholder="Search here" name="">
                     <button type="submit"> <i class="fa fa-search"> </i> </button>
                  </div>

                  <div class="related-tours-head">
                  <h3> Related Tours </h3>
                  </div>

                  <div class="sidebar-tours">

                  <?php foreach ($rendomevent as $key => $value) { ?>
                  <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()?><?=$value->images?>">
                           <h4>  <?=$value->event_name?>  </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> <?=$value->description?> </p>
                           <h6> 
                              <span> Group Tour</span>
                              <b>  <?php get_price("INR",$value->group_price)?> </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> <?php get_price("INR",$value->private_price)?> </b>
                           </h6>
                        </div>
                  </div>	
						<?php } ?>



                     <!-- <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()."assets/site/"?>images/sidebar-tour2.jpg">
                           <h4> Samarkand </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempordolore magna aliqua. Quis ipsum suspendisse ultrices gravida.    </p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> $1,360 </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> $3,560 </b>
                           </h6>
                        </div>
                     </div>	



                     <div class="package-box2">
                        <div class="package-box2-image">
                           <img src="<?=base_url()."assets/site/"?>images/sidebar-tour3.jpg">
                           <h4> Bukhara </h4>
                        </div>
                        <div class="package-box2-middle">
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempordolore magna aliqua. Quis ipsum suspendisse ultrices gravida.    </p>
                           <h6> 
                              <span> Group Tour</span>
                              <b> $1,360 </b>
                           </h6>
                           <h6> 
                              <span>Private Tour</span>
                              <b> $3,560 </b>
                           </h6>
                        </div>
                     </div>	 -->


                  </div>
                   
                 
               </div>
            </div>
         </div>
      </section>
      <!-- Tour Info Detail Section Ends Here -->

<?php
	require_once 'include/footer.php';
?>
