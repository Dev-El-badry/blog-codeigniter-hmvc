<div class="clearfix"></div>
<div class="row" style="margin-top: 20px">
	<div class="col-md-12">
		<div class="panel panel-success">
		    <div class="panel-heading">
		      <h3 class="panel-title"><?= $this->lang->line('title_video') ?> </h3>
		    </div>
		    <div class="panel-body">
		    	<form action="<?= base_url(); ?>articles/add_video" method="POST">
		    		<input type="hidden" id="validUrl" name="video_link" />
		    		<?php 
		    		echo form_hidden('update_id', $update_id);
		    		 ?>
		    	<label><?= $this->lang->line('title_video') ?>: </label>
		    	<input type="text" name="video_link1" class="form-control" onchange="validateYouTubeUrl()" id="youTubeUrl" value="<?= $video_link ?>" required>

		    	<!-- Ifram -->
		    	<div class="col-md-12 text-center" style="margin-top: 20px">
				<iframe id="videoObject" src="<?= $video_link ?>" type="text/html" width="500" height="265" frameborder="0" allowfullscreen></iframe>
				</div>

		    	<div class="actions-btn">
		    		<button type="submit" class="btn btn-primary" name="submit" Value="Submit"><?= $this->lang->line('upload') ?></button>
		    		
		    		<a href="<?= base_url() ?>articles/create/<?= $this->uri->segment(3) ?>">
				<button style="margin-left: 5px" name="submit" type="button" class="btn btn-default"><?= $this->lang->line('cancel') ?></button>
			</a>
		    	</div>
		    	</form>
		    </div>
		</div>
	</div>
</div>