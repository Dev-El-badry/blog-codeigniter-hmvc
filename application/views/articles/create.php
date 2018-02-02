<div class="row">
    <div class="col-lg-12">
    	  <div class="actions_btn pull-right" style="margin-top: 45px">
                <button name="submit" class="btn btn-primary" onclick="getElementById('my_form').submit()" value="Submit">
                    <?= $this->lang->line('save'); ?></button>
                 <a href="<?= base_url() ?>articles/manage">
                <button name="submit" class="btn btn-danger" value="Cancel" ><?= $this->lang->line('cancel'); ?></button></a>
            </div>
        <h1 class="page-header"><?= $this->lang->line('title'); ?></h1>

    </div>
</div>
<?php 
if (is_numeric($update_id)) {

?>

<div class="row">
<div class="col-lg-12">

    <div class="panel panel-default">
        <div class="panel-heading">

        <h3>    
            <i class="fa fa-cog fa-fw"></i>
            <?= $this->lang->line('options'); ?>
        </h3>

        </div>
        <div class="panel-body">
            <?php 
            if(isset($ss) AND $ss == TRUE) {
            ?>
            <a href="<?= base_url() ?>articles/add_video/<?= $update_id ?>" class="btn btn-primary">
                <i class="fa fa-video-camera fa-fw"></i>&nbsp;<?= $this->lang->line('add_video'); ?></a>
            <a href="<?= base_url() ?>articles/do_upload/<?= $update_id ?>" class="btn btn-success">
                <i class="fa fa-picture-o fa-fw"></i>&nbsp;<?= $this->lang->line('add_image'); ?></a>
            <?php 
            } elseif(isset($img) AND $img == TRUE) { ?>
            <a href="<?= base_url() ?>articles/do_upload/<?= $update_id ?>" class="btn btn-success">
                <i class="fa fa-pencil fa-fw"></i>&nbsp;<?= $this->lang->line('update_image'); ?></a>
            <a onclick="if(confirm('هل انت متاكد من مسح ؟')) { window.location.href='<?= base_url() ?>articles/del_img/<?= $update_id ?>'; }" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>&nbsp;<?= $this->lang->line('del_image'); ?></a>
            <?php
            } elseif(isset($video_link) AND $video_link == TRUE) { ?>
            <a href="<?= base_url() ?>articles/add_video/<?= $update_id ?>" class="btn btn-success">
                <i class="fa fa-pencil fa-fw"></i>&nbsp;<?= $this->lang->line('update_video'); ?></a>
            <a  onclick="if(confirm('هل انت متاكد من مسح ؟')) { window.location.href='<?= base_url() ?>articles/del_video/<?= $update_id ?>'; }"
             class="btn btn-danger"><i class="fa fa-times fa-fw"></i>&nbsp;<?= $this->lang->line('del_video'); ?></a>
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
<div class="col-lg-12">
        <?php 
    if(isset($flash)) {
        echo $flash;
    }
     ?>
  
    <div class="panel panel-default">
        <div class="panel-heading">

        <h3>    
            <i class="fa fa-pencil fa-fw"></i>
            <?= $this->lang->line('add_article_title'); ?>
        </h3>

        </div>
        <div class="panel-body">
            <?php 
                $form_location = base_url() . 'articles/create';
                echo validation_errors('<p style="color: red">','</p>');
            ?>
            <form action="<?= $form_location ?>" method="POST" enctype="multipart/form-data" id="my_form">
           <div class="row">
                <div class="col-lg-12">

                    <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#english">English</a></li>
            <li><a data-toggle="tab" href="#arabic">العربية</a></li>
            
          </ul>

          <div class="tab-content">

            <div id="english" class="tab-pane fade in active">
            <!-- Start English -->
           

                <?php 

                if(isset($update_id)) {
                    echo form_hidden('update_id', $update_id);
                }
                ?>
                <div class="col-md-6">
                    <!-- Start Title Article -->
                
                    <div class="form-group">
                        <label><?= $this->lang->line('article_title'); ?>: </label>
                        <input type="text" class="form-control" name="article_title" value="<?= $article_title ?>" required>
                    </div>
                    <!-- End Title Article -->
                      <!-- Start Description Article -->
                             
                    <div class="form-group">     
                        <label><?= $this->lang->line('article_description'); ?>: </label>     
                       <?php echo $this->ckeditor->editor("article_description",$article_description); ?>
                    </div>
                    <!-- End Description Article -->
                    

                    <!-- Start Categories Article -->
                    <div class="form-group">
                        <label><?= $this->lang->line('categories'); ?>: </label>    
                    <?php
                    $class = 'class="form-control" required'; 
                    echo form_dropdown('category_id', $options, $category_id, $class);

                    ?>
                </div>
                    <!-- End Categories Article -->

                    <!-- Start Tags Article -->
                    <div class="form-group">
                        <label><?= $this->lang->line('Tags'); ?>: </label>    
                        <?php
                        $ss = 'sdsd';
                    $class = 'class="form-control select2-multi" multiple="multiple" required '; 
                    if (!is_numeric($update_id)) {
                        $all_Ids = '';
                    }
                    echo form_dropdown('tag_id[]', $options_tag, $all_Ids, $class);

                    ?>
                    </div>
                    <!-- End Tags Article -->

                </div>
            <!-- End English -->
            </div>


            <div id="arabic" class="tab-pane fade">
            <!-- Start Arabic -->
             <div class="row" style="padding: 10px">
                 <div class="col-md-12">
                    <div class="arabic-design">
                     <div class="form-group">
                        <label><?= $this->lang->line('article_title_ar'); ?>: </label>
                        <input style="width: 745px" type="text" class="form-control" name="article_title_ar" value="<?= $article_title_ar ?>" required>
                    </div>
                    <!-- End Title Article -->
                      <!-- Start Description Article -->
                             
                    <div class="form-group">     
                        <label><?= $this->lang->line('article_description_ar'); ?>: </label>     
                       <?php 
                       echo $this->ckeditor->editor("article_descripition_ar",$article_descripition_ar); ?>
                    </div>
                    <!-- End Description Article -->
                    </div>

                
                 </div>
             </div>
              <!-- End Arabic -->
             
            </div>
            
          </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>

</div>
</div>


