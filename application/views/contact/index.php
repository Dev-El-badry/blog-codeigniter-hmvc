<div class="fh5co-more-contact">
<div class="fh5co-narrow-content">
	<div class="row">
		<div class="col-md-4">
			<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
				<div class="fh5co-icon">
					<i class="icon-globe"></i>
				</div>
				<div class="fh5co-text">
					<p><a href="#"><?= $site_email ?></a></p>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			
		</div>
		<div class="col-md-4">
			<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
				<div class="fh5co-icon">
					<i class="icon-phone"></i>
				</div>
				<div class="fh5co-text">
					<p><a href="tel://0<?= $phone_number ?>">0<?= $phone_number ?> + </a></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">

<div class="row">
	<div class="col-md-4">
		<h2>اضف لمستك</h2>
	</div>
</div>

	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<?php 
				if(isset($flash)) {
					echo '<p>'.$flash.'</p>';
				}
				?>
				<form action="<?= base_url() ?>contact/submit_action" method="POST">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="sender_name" class="form-control" placeholder="الاسم" required>
					</div>
					<div class="form-group">
						<input type="text" name="sender_email" class="form-control" placeholder="البريد الالكترونى" required>
					</div>
					<div class="form-group">
						<input type="text" name="sender_phone" class="form-control" placeholder="رقم التليفون" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<textarea name="content" id="message" cols="30" rows="7" class="form-control" placeholder="الرسالة" required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-md" value="ارسال الرسالة">
					</div>
				</div>
				</form>
			</div>
		</div>
		
	</div>

</div>