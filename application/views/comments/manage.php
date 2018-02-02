<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header">Comments</h1>

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
            Manage Comments
        </h3>
        </div>
        <div class="panel-body">
		 <table class="table table-striped custab">
				    <thead>
				        <tr>
				            <th>Article Title</th>
				            <th>Comment</th>
				            <th>Submmited By</th>
				            <th>Submmited on</th>
				            <th class="text-center">Actions</th>
				        </tr>
				    </thead>
				    <?php 
				   
				    foreach ($query->result() as $row) {
				    $article_id = $row->article_id;
				    $sql_q = $this->Mdl_articles->get_where($article_id);
				    foreach ($sql_q->result() as $r) {
				    	$article_title = $r->article_title;
				    }
				    ?>
				            <tr>
				                <td><?= $article_title ?></td>
				                <td><?= nl2br($row->comment) ?></td>
				                <td><?= $row->sender_name ?></td>
				                <td><?= date('d, M Y', $row->date_created) ?></td>

				                <td class="text-center"> 
				                	
				                	<?php 
				                	if($row->view == 0) { ?>
									<a href="<?= base_url(); ?>comments/approve/<?= $row->id ?>" class="btn btn-primary btn-xs"><span class="fa fa-thumbs-up fa-fw"></span> 
				                	Approve</a>
				                	<?php
				                	} elseif($row->view == 1) { ?>
				                	<a href="<?= base_url(); ?>comments/unapprove/<?= $row->id ?>" class="btn btn-warning btn-xs"><span class="fa fa-thumbs-down fa-fw"></span> 
				                	Unapprove</a>
				                	<?php
				                	}
				                	 ?>
				                	
				                	

				                	<a href="#" onclick="if(confirm('Are You Sure To Delete Comment?')) 
				                	{ window.location.href = '<?= base_url() ?>comments/del/<?= $row->id ?>'; }" class="btn btn-danger btn-xs"><span class="fa fa-times"></span> 
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