<?php
	require_once 'include/header.php';
?>


      <!-- Tour Info Detail Section Starts Here -->
      <section class="pad-bot-60 pad-top-60">
         <div class="container">
            <div class="row">
               <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                  <?php foreach($blog as $value){ ?>
                  <div class="single-blog-detail">
                     <h3> <?=$value->title?> </h3>
							<?php
							
							$uid = $value->video_link;
							$link = preg_replace("#.*.youtube\.com/watch\?v=#","",$uid);
							?>
							<iframe width="100%" height="498" src="https://www.youtube.com/embed/<?=$link?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							
                     <p> <?=$value->description?> </p>
                  </div>
                  
                  <div class="blog-tags">
                     <h3> Tagged </h3>
                     <p> 
                        <span> <?=$value->tagName?> </span> 
                     </p>
                  </div>
                  <?php } ?>
                  <div class="recommended-vid-head">
                     <h3> Recommended Videos </h3>
                  </div>
                  <div class="recommended-vid-data">
                     <div class="row">
							<?php foreach ($random as $key => $value) { ?>
								
							
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                           <div class="video-box">
										<img src="<?=base_url()."assets/img/"?>blog_img/<?=$value->img?>">
                              <h3> <?=$value->title?> </h3>
										<h6> <?php $new_date = new DateTime($value->create_at); echo $new_date->format('d, M Y');?> </h6>
										<p><?= substr($value->description,-200) ?></p>
										<a href="<?=base_url('Home/blog_detail/')?><?=hashids_encrypt($value->id)?>"> READ MORE </a>
                           </div>
                        </div>

							<?php } ?>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                  <div class="related-tours-head" style="margin-top: 0px !important">
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
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Tour Info Detail Section Ends Here -->

<?php
	require_once 'include/footer.php';
?>
