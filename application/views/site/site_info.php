<div class="row">
    <div class="col-lg-12">
    	 <div class="actions_btn pull-right" style="margin-top: 45px">
        	<button name="submit" class="btn btn-primary" value="Submit" 
        	onclick="getElementById('my_form').submit();" 
        	 ><?= $this->lang->line('save'); ?></button>
        	 <a href="<?= base_url() ?>">
        	<button name="cancel" class="btn btn-danger" value="Cancel" ><?= $this->lang->line('cancel'); ?></button></a>
        </div>
        <h1 class="page-header"><?= $this->lang->line('basic_info'); ?></h1>

    </div>
</div>
<!-- Form -->
<?php 
$form_location  = base_url() . 'site/create';
if(isset($flash)){
	echo $flash;
}
 ?>

<form action="<?= $form_location ?>" method="POST" id="my_form" enctype="multipart/form-data">
	<?php 
if(isset($update_id)) { 
echo form_hidden('update_id', $update_id);
}?>
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3>	
        	<i class="fa fa-pencil fa-fw"></i>
            <?= $this->lang->line('update_icon'); ?>
        </h3>
        </div>
        <div class="panel-body">
           
           <div class="row">
           		<div class="col-lg-12">

        			<!-- Start Add Logo and favicon -->
        			<div class="col-lg-6">
        			<section class="text-center">
        				<label for="logo" >Logo(width:180px,height:129px)</label><br />
		           			<label for="upload">
				     		<span class="btn btn-default" aria-hidden="true">Logo</span>
				      		<input type="file" id="upload" name="logo" onclick="readUrl(this.value)" style="display:none" required>
				   			</label><br />
						<label for="favicon" >Favicon(width:32px,height:32px)</label><br />
	           			<label for="upload2">
				     		<span class="btn btn-default" aria-hidden="true">Favicon</span>
				      		<input type="file" id="upload2" onclick="readUrl1(this.value)" name="favicon" style="display:none" required>
			   			</label>
        			</section>
        		</div>
        			<div class="col-lg-6">
           			
	           			<img src="<?= base_url(); ?>images/<?php 
	           			if(isset($update_id)) {
	           				echo $logo;
	           			}
	           			 ?>" alt="website logo" class="img-responsive img-thumbnail thumb-preview">
	           			
	           			<img src="<?= base_url(); ?>images/<?php 
	           			if(isset($update_id)) {
	           				echo $favicon;
	           			}
	           			 ?>" alt="website favicon" class="img-responsive img-thumbnail thumb-preview1">

	           		</div>
	           			
		   			<!-- End Add Logo and favicon -->

           		</div>

           </div>
            
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
</div>
    <div class="row">
    	<div class="col-md-12">
       <div class="panel panel-default">
        <div class="panel-heading">
        <h3>	
        	<i class="fa fa-pencil fa-fw"></i>
            <?= $this->lang->line('update_info'); ?>
        </h3>
        </div>
        <div class="panel-body">
           
<div class="row">
<div class="col-md-12">
        		<!-- Start Section Add Basic Info English -->
		   			<div class="col-md-6">
		   				<section class="basic_info">
		   					<!-- Start Site Title -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_title') ?>:</label>
			   					<input type="text" name="site_title" class="form-control" placeholder="Write Site Title Here" value="<?= $site_title ?>" required>

			   				</div>
			   				<!-- End Site Title -->

			   				<!-- Start Site Title -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_description') ?>:</label>
			   					<textarea class="form-control" name="site_description" rows="3" placeholder="Write Website Description Here" value="" required><?= $site_description ?></textarea>
			   				</div>
			   				<!-- End Site Title -->

			   			</section>
		   			</div>


		   			<!-- Start Arabic design -->
		   			<div class="col-md-6">
		   				<div class="arabic-design">
		   					<!-- Start Site Title -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_title_ar') ?>:</label>
			   					<input type="text" name="site_title_ar" class="form-control" placeholder="اكتب هنا عنونا الموقع" value="<?= $site_title_ar ?>" required>

			   				</div>
			   				<!-- End Site Title -->

			   				<!-- Start Site Title -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_description_ar') ?>:</label>
			   					<textarea class="form-control" name="site_description_ar" rows="3" placeholder="اكتب هنا وصف الموقع" value="" required><?= $site_description_ar ?></textarea>
			   				</div>
			   				<!-- End Site Title -->
		   				</div>
		   			</div>
		   			<!-- End Arabic design -->


		   			<!-- End Section Add Basic Info English -->
					</div>

           </div><!-- end .row -->
            
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
</div>
    <div class="row">
    	<div class="col-md-12">
    	<div class="panel panel-default">
        <div class="panel-heading">
        <h3>	
        	<i class="fa fa-pencil fa-fw"></i>
            <?= $this->lang->line('update_contact'); ?>
        </h3>
        </div>
        <div class="panel-body">
           
           <div class="row">
           		
			<div class="col-md-12">
        		<!-- Start Section Add Basic Info English -->
		   			<div class="col-md-6">
		   				<section class="basic_info">
		   					<!-- Start Site address -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_address') ?>:</label>
			   					<input type="text" name="site_address" class="form-control" placeholder="Write Address Here" value="<?= $site_address ?>" required>

			   				</div>
			   				<!-- End Site address -->

			   				<!-- Start Site email -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_email') ?>:</label>
			   					<input type="text" name="site_email" class="form-control" placeholder="Write E-mail Adress Here" value="<?= $site_email ?>" required> 
			   				</div>
			   				<!-- End Site email -->

			   				<!-- Start Site email -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('phone_number') ?>:</label>
			   					<input type="text" name="phone_number" class="form-control" placeholder="Write Phone Number Here" value="<?= $phone_number ?>" required>
			   				</div>
			   				<!-- End Site email -->

			   			</section>
		   			</div>


		   			<!-- Start Arabic design -->
		   			<div class="col-md-6">
		   				<div class="arabic-design">
		   					<!-- Start Site address -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_address_ar') ?>:</label>
			   					<input type="text" name="site_address_ar" class="form-control" placeholder="اكتب هنا العنوان الرئيسى" value="<?= $site_address_ar ?>" required />

			   				</div>
			   				<!-- End Site address -->
			   			
		   				</div>
		   			</div>
		   			<!-- End Arabic design -->


		   			<!-- End Section Add Basic Info English -->

           </div>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->

    	</div>
    </div> <!-- End .row -->



    <div class="row">
    	<div class="col-md-12">
    	<div class="panel panel-default">
        <div class="panel-heading">
        <h3>	
        	<i class="fa fa-pencil fa-fw"></i>
            <?= $this->lang->line('update_links'); ?>
        </h3>
        </div>
        <div class="panel-body">
           
           <div class="row">
           		<div class="col-lg-12">

        		<!-- Start Section Add Basic Info English -->
		   			<div class="col-md-6">
		   				<section class="basic_info">
		   					<!-- Start Site Facebook -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_fb') ?>:</label>
			   					<input type="text" name="site_fb" class="form-control" placeholder="Facebook Here" value="<?= $site_fb ?>">

			   				</div>
			   				<!-- End Site Facebook -->

			   				<!-- Start Site Twitter -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_twitter') ?>:</label>
			   					<input type="text" name="site_twitter" class="form-control" placeholder="Write Twitter Here" value="<?= $site_twitter ?>">
			   				</div>
			   				<!-- End Site Twitter -- >

			   				<!-- Start Site Instagram -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_insta') ?>:</label>
			   					<input type="text" name="site_insta" class="form-control" placeholder="Write Instagram Here" value="<?= $site_insta ?>">
			   				</div>
			   				<!-- End Site Instagram -- >

			   				<!-- Start Site Google Plus -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('site_google_plus') ?>:</label>
			   					<input type="text" name="site_google_plus" class="form-control" placeholder="Write Google Plus Here" value="<?= $site_google_plus ?>">
			   				</div>
			   				<!-- End Site Google Plus -- >

			   				<!-- Start Site Google Plus -->
			   				<div class="form-group">
			   					<label><?= $this->lang->line('skype') ?>:</label>
			   					<input type="text" name="skype" class="form-control" placeholder="Write skype Here" value="<?= $skype ?>">
			   				</div>
			   				<!-- End Site Google Plus -- >

			   			</section>
		   			</div>


		   			<!-- Start Arabic design -->
		   			<div class="col-md-6">
		   				
		   			</div>
		   			<!-- End Arabic design -->
			
		   			<!-- End Section Add Basic Info English -->
           		</div>

           </div>
            
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
	

    	</div>
    </div> <!-- end .row -->

</form>
