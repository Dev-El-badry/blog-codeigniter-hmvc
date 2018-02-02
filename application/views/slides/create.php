<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header"><?= $this->lang->line('add_slides') ?></h1>

    </div>
</div>
<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12">
			<?php 
		if(isset($flash)) {
			echo $flash;
		}
		 ?>

		<div class="panel panel-default">
	        <div class="panel-heading">
	        <h3>    
	            <i class="fa fa-plus fa-fw"></i>
	            <?= $this->lang->line('add_slides') ?>
	        </h3>
	        </div>
	        <div class="panel-body">

			 <?php 
				$form_location = base_url() . 'slides/create';
				echo validation_errors();
				 ?>
				<form action="<?= $form_location ?>" method="POST" enctype='multipart/form-data'>
					<div class="col-md-6">
					<?php 
					if(isset($update_id)) {
					echo form_hidden('update_id', $update_id);
					}
					 ?>

					


					<div class="form-group">
						<label><?= $this->lang->line('slide_title') ?>: </label>
						<input type="text" name="slide_title" value="<?= $slide_title ?>" class="form-control" required>
					</div>

					<div class="form-group">
						<label><?= $this->lang->line('slide_description') ?>: </label>
						<textarea class="form-control" name="slide_description" required> <?= $slide_description ?></textarea>
					</div>
				 		<div class="form-group">
						<label><?= $this->lang->line('alt') ?>: </label>
						<input type="text" name="alt" value="<?= $alt ?>" class="form-control" required>
					</div>
			 		</div>
			 		<div class="col-md-6">
			 			<div class="arabic-design">
			 				<div class="form-group">
								<label><?= $this->lang->line('slide_title_ar') ?>: </label>
								<input type="text" name="slide_title_ar" value="<?= $slide_title_ar ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label><?= $this->lang->line('slide_description_ar') ?>: </label>
								<textarea class="form-control" name="slide_description_ar" required> <?= $slide_description_ar ?></textarea>
							</div>
							<div class="form-group">
								<label><?= $this->lang->line('alt_ar') ?>: </label>
								<input type="text" name="alt_ar" value="<?= $alt_ar ?>" class="form-control" required>
							</div>
			 			</div>
			 		</div>
			 		<div class="form-group">
			 			<label><?= $this->lang->line('target_url') ?>: </label>
			 			<input type="text" name="target_url" class="form-control" />
			 		</div>
			 		<div class="form-group">
			 			<label><?= $this->lang->line('slide_image') ?></label>
			 			<input type="file" name="userfile" class="form-control" required />
			 		</div>
			 		
			 		<div class="clearfix"></div>
			 		<div class="col-md-12 text-center">
				 		<div class="actions_btn">
				 			<button type="submit" class="btn btn-primary" name="submit" value="Submit" ><?= $this->lang->line('submit') ?></button>
				 			<a href="<?= base_url() ?>sliders/manage">
				 			<button type="button" class="btn btn-danger" name="submit" value="Cancel" ><?= $this->lang->line('finished') ?></button>
				 			</a>
				 		</div>
			 		</div>
			 		</form>	

			</div>
		</div>
	</div>
</div>

<?php 
if($num_rows >0) {

 ?><div class="row">
		<?php 
		$count = 0;
		
		foreach ($query->result() as $row) {
			$count ++;
			
			if($count == 1) {
				$color = 'default';
			} elseif($count == 2) {
				$color = 'primary';
			} elseif($count == 3) {
				$color = 'success';
			} elseif($count == 4) {
				$color = 'info';
			} elseif($count == 5) {
				$color = 'warning';
			} elseif($count > 5) {
				$count = 0;
			}
		 ?>

	<div class="col-md-12">
	

		
		<div class="panel panel-<?= $color ?>">
	        <div class="panel-heading">
	        <h3  style="margin: 0px; padding: 0px">    
	            <i class="fa fa-picture-o fa-fw"></i>
	           	<?= $row->slide_title ?> 
	           	<div class="go-left">
	           	 <a title="Delete Slide" style="color: red" href="<?= base_url() ?>slides/del/<?= $row->id ?>" class="pull-right"><i class="fa fa-trash-o"></i></a> 
	           	 <a title="Edit Slide" style="color: #2ecc71" href="<?= base_url() ?>slides/edit_slide/<?= $row->id ?>" class="pull-right"><i class="fa fa-pencil fa-fw"></i></a>
	           	</div>
	        </h3>

	        </div>
	        <div class="panel-body">
			 	
	        	<img src="<?= base_url() ?>images/slides/<?= $row->slide_image ?>" class="img-responsive img-thumbnail" alt="">

			</div>
		</div>
		

		</div>
	

<?php } ?></div>
<?php  } ?>
