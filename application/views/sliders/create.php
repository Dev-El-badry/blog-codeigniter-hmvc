<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header">Sliders</h1>

    </div>
</div>
<div class="clearfix"></div>

<?php 
	if(is_numeric($update_id)) { ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
	        <div class="panel-heading">
	        <h3>    
	            <i class="fa fa-cog fa-fw"></i>
	            Options
	        </h3>
	        </div>
	        <div class="panel-body">
	        	<?php
	        	$query = $this->Mdl_slides->get_where_custom('slider_id', $update_id);
	        	$num_rows = $query->num_rows();

	        	if($num_rows >0) { ?>
				<a href="<?= base_url() ?>slides/create/<?= $update_id ?>" class="btn btn-success"><i class="fa fa-picture-o"></i> <?= $this->lang->line('update_slides') ?></a>
	        	<?php
	        	} else { ?>
	        	<a href="<?= base_url() ?>slides/create/<?= $update_id ?>" class="btn btn-primary"><i class="fa fa-picture-o"></i> <?= $this->lang->line('add_slides') ?></a>
	        	<?php
	        }
	        	?>
			 	
			</div>
		</div>
	</div>
</div>
<?php
	}
 ?>

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
	            <i class="fa fa-<?= $icon; ?> fa-fw"></i>
	            <?= $head_line; ?>
	        </h3>
	        </div>
	        <div class="panel-body">
			 	<div class="row">
			 		
				 			<?php 
					 		$form_location = base_url() . 'sliders/create';
					 		echo validation_errors('<p style="color: red">', '</p>');

					 		 ?>
					 		<form action="<?= $form_location ?>" method="POST">
					 			<div class="col-md-6">
					 			<?php 
					 			echo form_hidden('update_id', $update_id);
					 			 ?>

					 			<div class="form-group">
					 				<label><?= $this->lang->line('slider_title') ?>: </label>
					 				<input type="text" name="slider_title" value="<?= $slider_title ?>" class="form-control" required>
					 			</div>

					 			<div class="form-group">
					 				<label><?= $this->lang->line('slider_description') ?>: </label>
					 				<textarea class="form-control" name="slider_description" required> <?= $slider_description ?></textarea>
					 			</div>
				 		
			 		</div>
			 		
			 		<div class="clearfix"></div>
			 		<div class="col-md-12">
			 		<div class="actions_btn">
			 			<button type="submit" class="btn btn-primary" name="submit" value="Submit" ><?= $this->lang->line('save') ?></button>
			 			<a href="<?= base_url() ?>sliders/manage">
			 			<button type="button" class="btn btn-danger" name="submit" value="Cancel" ><?= $this->lang->line('cancel') ?></button>
			 			</a>
			 		</div>
			 		</div>
			 		</form>	

			 	</div>
			</div>
		</div>
	</div>
</div>

