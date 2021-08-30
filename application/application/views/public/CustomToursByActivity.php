<?php foreach ($data as $key => $value) { ?>
	<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
		<div class="package-box2">
			<div class="package-day">
			<span> <?=$value->day?> Day </span>
			</div>
			<div class="package-box2-image">
			<h4> <?=$value->title?> </h4>
			<img src="<?=base_url()?><?=$value->image?>" height="150">
			</div>
			<div class="package-box2-middle">
			<p> <?=substr($value->description,-90)?> </p>
			<p> <b class="col-blue" style="display: block;"> Places: </b> <span> <?=$value->place?> </span> <span> Mausoleum :  </span> <span> <?=$value->mausoleum?> </span>   </p>
			</div>
			<?php $act_imgs = explode(',',$value->activity_img);
			$act_name = explode(',',$value->activity_name); ?>
			<div class="package-box2-features">
			<?php foreach ($act_imgs as $key => $value) { ?>
				<span> <img src="<?=base_url()."assets/img/activity_img/"?><?=$value?>"> <?=$act_name[$key]?> </span>
			<?php } ?>
			</div>
			<div class="package-box2-detail">
			<a href=""> + Add to Itinerary </a>
			</div>
		</div>
	</div>
<?php } ?>
