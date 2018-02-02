<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header"><?= $this->lang->line('title') ?></h1>

    </div>
</div>

<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3>    
            <i class="fa fa-cog fa-fw"></i>
            <?= $this->lang->line('manage') ?>
        </h3>
        </div>
        <div class="panel-body">
           
           <div class="row">
                <div class="col-lg-12">
                 	<ul style="margin: 10px 0" class="list-unstyled ui-sortable" id="sortlist">
                 		<?php 
                 		foreach ($query->result() as $row) {
                 		
                 		 ?>
			 				<li id="3" class="sort ui-sortable-handle"><i class="fa fa-sort fa-fw fa-lg"></i>&nbsp;<?= $row->page_title ?> - <?= $row->page_title_ar ?>					
			 					&nbsp; <a class="pull-right" href="<?= base_url() ?>pages/create/<?= $row->id ?>"><i class="fa fa-edit"></i> </a>
			                  </li>
						<?php } ?>		
				</ul>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
