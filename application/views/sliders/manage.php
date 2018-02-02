<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header"><?= $this->lang->line('title'); ?></h1>

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
		<a href="<?= base_url() ?>sliders/create" class="btn btn-primary"><i class="fa fa-plus"></i> <?= $this->lang->line('add_slider'); ?></a>
		<br /><br />
		<div class="panel panel-default">
        <div class="panel-heading">
        <h3>    
            <i class="fa fa-cog fa-fw"></i>
            <?= $this->lang->line('manage_slider'); ?>
        </h3>
        </div>
        <div class="panel-body">
		 			<div class="row">
		 				<div class="col-md-12">
		 				 <table class="table table-striped custab">
				    <thead>
				        <tr>
				            <th><?= $this->lang->line('id'); ?></th>
				            <th><?= $this->lang->line('slider_title'); ?></th>
				            <th><?= $this->lang->line('slider_description'); ?></th>
				            <th><?= $this->lang->line('manage_slider'); ?></th>
				            <th class="text-center"><?= $this->lang->line('actions'); ?></th>
				        </tr>
				    </thead>
				    <?php 
				   
				   	$this->load->helper('text');
				    foreach ($query->result() as $row) {
				    
				    $string = word_limiter($row->slider_description, 10);
				    
				    if($row->view == 1) {
				    	$state = $this->lang->line('active');
				    	$color = 'green';
				    } elseif($row->view == 0) {
				    	$state = $this->lang->line('unactive');
				    	$color = 'red';
				    }

				                	
				    ?>
				            <tr>
				                <td><?= $row->id ?></td>
				                <td><?= $row->slider_title ?></td>
				                <td><?=  $string ?></td>
				               
				                <td style="color: <?= $color ?>">
				                	<?= $state ?>
				                </td>
				                <td class="text-center"> 
				                	<?php if($row->view == 1) { ?>
				                	<a href="<?= base_url() ?>sliders/unactive/<?= $row->id ?>" class="btn btn-success btn-xs"><span class="fa fa-thumbs-down"></span> 
				                	<?=  $this->lang->line('active'); ?>
				                	</a>
				                	<?php
				                	} elseif($row->view == 0) { ?>
   									<a href="<?= base_url() ?>sliders/active/<?= $row->id ?>" class="btn btn-warning btn-xs"><span class="fa fa-thumbs-up"></span> 
				                	<?=  $this->lang->line('unactive'); ?>
				                	</a>
				                	<?php
				                	} ?>
				             
				         		<a href="<?= base_url() ?>sliders/create/<?= $row->id ?>" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span> 
				                	<?= $this->lang->line('edit') ?></a>
				                	<a href="#" onclick="if(confirm('<?= $this->lang->line('del') ?>')) 
				                	{ window.location.href = '<?= base_url() ?>sliders/del/<?= $row->id ?>'; }" class="btn btn-danger btn-xs"><span class="fa fa-times"></span> 
				                	<?= $this->lang->line('delete') ?></a>
				                </td>
				            </tr>
				    <?php 
				    }
				    ?>        
				    </table>
				</div>
		 			</div>
				</div>
			</div>
	</div>
</div>