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
            <i class="fa fa-cog fa-fw"></i>
            Manage Services
        </h3>
        </div>
        <div class="panel-body">
		 			<div class="row">
		 				<div class="col-md-12">
		 				 <table class="table table-striped custab">
				    <thead>
				        <tr>
				            <th>ID</th>
				            <th>Service Icon</th>
				            <th>Services Title</th>
				            <th>Services Description</th>
				            <th class="text-center">Actions</th>
				        </tr>
				    </thead>
				    <?php 
				   	$count = 0;
				   	$this->load->helper('text');
				    foreach ($query->result() as $row) {
				    $count ++;

				    $string = word_limiter($row->services_description, 10);
				    
				    ?>
				            <tr>
				                <td><?= $count ?></td>
				                <td><?= $row->icon ?></td>
				                <td><?= $row->services_title ?></td>
				                <td><?=  $string ?></td>

				                <td class="text-center"> 
				                	<a href="<?= base_url() ?>services/view/<?= $row->id ?>" class="btn btn-success btn-xs"><span class="fa fa-play"></span> 
				                	View</a>
				         		<a href="<?= base_url() ?>services/create/<?= $row->id ?>" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span> 
				                	Edit</a>
				                	<a href="#" onclick="if(confirm('Are You Sure To Delete Comment?')) 
				                	{ window.location.href = '<?= base_url() ?>services/del/<?= $row->id ?>'; }" class="btn btn-danger btn-xs"><span class="fa fa-times"></span> 
				                	Delete</a>
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