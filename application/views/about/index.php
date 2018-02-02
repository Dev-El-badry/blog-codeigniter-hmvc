<div class="fh5co-narrow-content">
	<div class="row row-bottom-padded-md">
		<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
			<img class="img-responsive" src="<?= base_url() ?>front/images/img_bg_1.jpg" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
		</div>
		<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
			<h2 class="fh5co-heading">محتوى الصفحة</h2>
			<?= nl2br($site_description_ar) ?>
		</div>
	</div>
</div>

<div class="fh5co-narrow-content">
		<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">من انا</h2>
		<div class="row">

			<?php 
		foreach ($query_services->result() as $service) {
			
		?>
		<div class="col-md-6">
			<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
				<div class="fh5co-icon">
					<i class="icon-<?= $service->icon ?>"></i>
				</div>
				<div class="fh5co-text">
					<h3><?= $service->services_title_ar ?></h3>
					<p><?= $service->services_description_ar ?></p>
				</div>
			</div>
		</div>
		<?php } ?>
			
		</div>
	</div>