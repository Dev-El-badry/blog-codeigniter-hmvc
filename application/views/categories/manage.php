<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header"><?= $this->lang->line('categories'); ?></h1>

    </div>
</div>
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3>    
          <i class="fa fa-tags fa-fw"></i> 
            <?= $this->lang->line('manage'); ?>
        </h3>
        </div>
        <div class="panel-body">
           
           <div class="row">
                <div class="col-lg-12">
                <table class="table table-striped custab">
				    <thead>
				        <tr>
				            <th><?= $this->lang->line('id') ?></th>
				            <th><?= $this->lang->line('category_title') ?></th>
				            <th><?= $this->lang->line('category_title_ar') ?></th>
				            <th class="text-center"><?= $this->lang->line('actions') ?></th>
				        </tr>
				    </thead>
				    <?php 
				    foreach ($query->result() as $row) {
				    
				    ?>
				            <tr>
				                <td><?= $row->id ?></td>
				                <td><?= $row->category_title ?></td>
				                <td><?= $row->category_title_ar ?></td>
				                <td class="text-center"><a class='btn btn-info btn-xs' href="<?= base_url() ?>categories/create/<?= $row->id ?>" 
				                	><span class="fa fa-pencil"></span> <?= $this->lang->line('edit'); ?></a> <a href="#" onclick="if(confirm('<?= $this->lang->line('alert') ?>')) 
				                	{ window.location.href = '<?= base_url() ?>categories/del/<?= $row->id ?>'; }" class="btn btn-danger btn-xs"><span class="fa fa-times"></span> 
				                	<?= $this->lang->line('del'); ?></a></td>
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