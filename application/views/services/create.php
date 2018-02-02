<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header">Services</h1>

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
	            <i class="fa fa-<?= $icon ?> fa-fw"></i>
	           <?= $head_line ?>
	        </h3>
	        </div>
	        <div class="panel-body">
			 	<div class="row">
			 		
				 			<?php 
					 		$form_location = base_url() . 'services/create';
					 		echo validation_errors('<p style="color: red">', '</p>');
					 		 ?>
					 		<form action="<?= $form_location ?>" method="POST">
					 			<?php 
					 			echo form_hidden('update_id', $update_id);
					 			 ?>
					 			<div class="col-md-6">
					 			<div class="form-group">
					 				<label>ICON: </label>
					 				<?php 
					 				$options_icons = array(
					 					''=>'Select Icon ..',
					 					'search4' => 'search4',
					 					'params' => 'params',
					 					'paperplane' => 'paperplane',
					 					'settings' => 'settings'
					 				);
					 				$class='class="form-control" required';
					 				echo form_dropdown('icon', $options_icons, $icon, $class);
					 				 ?>
					 			</div>

					 			<div class="form-group">
					 				<label>Service Title: </label>
					 				<input type="text" name="services_title" value="<?= $services_title ?>" class="form-control" required>
					 			</div>

					 			<div class="form-group">
					 				<label>Service Description: </label>
					 				<textarea class="form-control" name="services_description" required> <?= $services_description ?></textarea>
					 			</div>
				 		
			 		</div>
			 		<div class="col-md-6">
			 			<div class="arabic-design ">
			 			<div class="form-group">
					 		<label>اسم الخدمة: </label>
					 		<input type="text" name="services_title_ar" value="<?= $services_title_ar ?>" class="form-control" required>
					 	</div>

					 	<div class="form-group">
					 		<label>وصف الخدمة: </label>
					 		<textarea class="form-control" name="services_description_ar" required> <?= $services_description_ar ?></textarea>
					 	</div>
					 </div>
			 		</div>
			 		<div class="clearfix"></div>
			 		<div class="col-md-12">
			 		<div class="actions_btn">
			 			<button type="submit" class="btn btn-primary" name="submit" value="Submit" >Submit</button>
			 			<a href="<?= base_url() ?>services/manage">
			 			<button type="button" class="btn btn-danger" name="submit" value="Cancel" >Cancel</button>
			 			</a>
			 		</div>
			 		</div>
			 		</form>	

			 	</div>
			</div>
		</div>
	</div>
</div>