<br />
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
	            Edit Slide
	        </h3>
	        </div>
	        <div class="panel-body">

			 <?php 
				$form_location = base_url() . 'slides/edit_slide';
				echo validation_errors('<p style="color: red">', '</p>');
				 ?>
				<form action="<?= $form_location ?>" method="POST" enctype='multipart/form-data'>
					<div class="col-md-6">
					<?php 
					echo form_hidden('update_id', $update_id);
					echo form_hidden('slider_id', $slider_id);
					 ?>

					


					<div class="form-group">
						<label>Slide Title: </label>
						<input type="text" name="slide_title" value="<?= $slide_title ?>" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Slide Description: </label>
						<textarea class="form-control" name="slide_description" required> <?= $slide_description ?></textarea>
					</div>
				 		<div class="form-group">
						<label>Alt: </label>
						<input type="text" name="alt" value="<?= $alt ?>" class="form-control" required>
					</div>
			 		</div>
			 		<div class="col-md-6">
			 			<div class="arabic-design">
			 				<div class="form-group">
								<label>عنوان الشريحة: </label>
								<input type="text" name="slide_title_ar" value="<?= $slide_title_ar ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label>وصف الشريحة: </label>
								<textarea class="form-control" name="slide_description_ar" required> <?= $slide_description_ar ?></textarea>
							</div>
							<div class="form-group">
								<label>بديل: </label>
								<input type="text" name="alt_ar" value="<?= $alt_ar ?>" class="form-control" required>
							</div>
			 			</div>
			 		</div>
			 		<div class="form-group">
			 			<label>Target URL: </label>
			 			<input type="text" name="target_url" value="<?= $target_url ?>" class="form-control" />
			 		</div>
			 		<div class="form-group">
			 			<label>Slide Image</label>
			 			<input type="file" name="userfile" class="form-control" />
			 		</div>
			 		
			 		<div class="clearfix"></div>
			 		<div class="col-md-12 text-center">
				 		<div class="actions_btn">
				 			<button type="submit" class="btn btn-primary" name="submit" value="Submit" >Submit</button>
				 			<a href="<?= base_url() ?>sliders/create/<?= $slider_id ?>">
				 			<button type="button" class="btn btn-danger" name="submit" value="Cancel" >Close</button>
				 			</a>
				 		</div>
			 		</div>
			 		</form>	

			</div>
		</div>
	</div>
</div>
<div class="row">


	<div class="col-md-12">
	

		
		<div class="panel panel-primary">
	        <div class="panel-heading">
	        <h3  style="margin: 0px; padding: 0px">    
	            <i class="fa fa-picture-o fa-fw"></i>
	           	<?= $slide_title ?> 
	           	 <a title="Delete Slide" style="color: red" href="<?= base_url() ?>slides/del/<?= $update_id ?>" class="pull-right"><i class="fa fa-trash-o"></i></a> 
	        </h3>

	        </div>
	        <div class="panel-body">
			 	
	        	<img src="<?= base_url() ?>images/slides/<?= $slide_image ?>" class="img-responsive img-thumbnail" alt="">

			</div>
		</div>
		

		</div>
	</div>
