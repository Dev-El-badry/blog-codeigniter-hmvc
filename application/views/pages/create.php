<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header"><?= $this->lang->line('title') ?></h1>

    </div>
</div>

<div class="row">
<div class="col-lg-12">
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
                <div class="col-lg-12">
                    <?php 
                    echo validation_errors('<p style="color: red">', '</p>');
                    $form_location = base_url() . 'pages/create';
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
                                 <label ><?= $this->lang->line('page_title') ?>: </label>
                                 <input type="text" class="form-control" name="page_title" value="<?= $page_title ?>" required>
                             </div>
                             <!-- End Title Category -->
                              <!-- Start Title Category -->
                             <div class="form-group">
                                 <label><?= $this->lang->line('arrange') ?>: </label>
                                 <input type="text" class="form-control" name="arrange" value="<?= $arrange ?>" required>
                             </div>
                             <!-- End Title Category -->
                         </div>
                         <div class="col-md-6">
                            <div class="">
                              <!-- Start Title Category -->
                             <div class="form-group">
                                 <label style="text-align: right">:<?= $this->lang->line('page_title_ar') ?></label>
                                 <input type="text" class="form-control" name="page_title_ar" value="<?= $page_title_ar ?>" required>
                             </div>
                             <!-- End Title Category -->
                            </div>
                         </div>
                         <div class="clearfix"></div>
                         <div class="actions_btn_1" style="margin-top: 45px">
                            <button name="submit" class="btn btn-primary" value="Submit"
                             ><?= $this->lang->line('save') ?></button>
                             <a href="<?= base_url() ?>">
                             <button name="submit" class="btn btn-danger" value="Cancel"
                             ><?= $this->lang->line('Cancel') ?></button>
                        </div>
                       
                     </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
