<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header"><?= $this->lang->line('tags'); ?></h1>

    </div>
</div>

<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3>    
            <i class="fa fa-plus fa-fw"></i>
            <?= $this->lang->line('create'); ?>
        </h3>
        </div>
        <div class="panel-body">
           
           <div class="row">
                <div class="col-lg-12">
                    <?php 
                    $form_location = base_url() . 'tags/create';
                    echo validation_errors('<p style="color: red">', '</p>');
                     ?>
                     <form action="<?= $form_location ?>" method="POST">
                        <?php 
                        if(isset($update_id)) {
                            echo form_hidden('update_id', $update_id);
                        }
                         ?>
                         <div class="col-md-6">
                             <!-- Start Title Category -->
                             <div class="form-group">
                                 <label><?= $this->lang->line('tag_title'); ?>: </label>
                                 <input type="text" class="form-control" name="tag_title" value="<?= $tag_title ?>" required>
                             </div>
                             <!-- End Title Category -->
                             
                         </div>
                         <div class="col-md-6">
                            <div class="arabic-design">
                              <!-- Start Title Category -->
                             <div class="form-group">
                                 <label><?= $this->lang->line('tag_title_ar'); ?>: </label>
                                 <input type="text" class="form-control" name="tag_title_ar" value="<?= $tag_title_ar ?>" required>
                             </div>
                             <!-- End Title Category -->
                            </div>
                         </div>
                         <div class="clearfix"></div>
                         <div class="actions_btn1" style="margin-top: 45px">
                            <button name="submit" class="btn btn-primary" value="Submit">
                            	<i class="fa fa-plus fa-fw"></i>
                             <?= $this->lang->line('save'); ?></button>
                            
                        </div>
                       
                     </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php 
if ($num_rows >0) {

 ?>
<div class="row">
	<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">

			<h3><i class="fa fa-tags fa-fw"></i>&nbsp;<?= $this->lang->line('manage_tags') ?></h3>
		</div>
	<table class="table table-striped custab">
	    <thead>
	    
	        <tr>
	            <th><?= $this->lang->line('id') ?></th>
	            <th><?= $this->lang->line('tag_title'); ?></th>
	            <th><?= $this->lang->line('tag_title_ar'); ?></th>
	            <th class="text-center"><?= $this->lang->line('actions') ?></th>
	        </tr>
	    </thead>
	           <?php 
	           foreach ($query->result() as $row) {
	           
	            ?>

	            <tr>
	                <td><?= $row->id ?></td>
	                <td><?= $row->tag_title ?></td>
	                <td><?= $row->tag_title_ar ?></td>
	                <td class="text-center"><a href="<?= base_url() ?>tags/del/<?= $row->id ?>" class="btn btn-danger btn-xs"><span class="fa fa-times fa-fw"></span> <?= $this->lang->line('del'); ?></a></td>
	            </tr>
	           <?php 
	           }
	            ?>
    </table>
</div>
	</div>
</div>
<?php } ?>