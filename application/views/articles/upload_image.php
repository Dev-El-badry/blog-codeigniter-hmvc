<div class="clearfix"></div>
<div class="row" style="margin-top: 20px">
	<div class="col-md-12">
		<div class="panel panel-success">
		    <div class="panel-heading">
		      <h3 class="panel-title"><?= $this->lang->line('title_img') ?></h3>
		    </div>
		    <div class="panel-body">
			<p><?= $this->lang->line('img_msg') ?></p>
		    
			<form action="<?= base_url() ?>articles/do_upload/<?= $this->uri->segment(3) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">

			<input type="file" name="userfile" size="20">

			<br><br>

			<input type="submit" name="submit" class="btn btn-primary" value="<?= $this->lang->line('upload') ?>">
			<a href="<?= base_url() ?>articles/create/<?= $this->uri->segment(3) ?>">
				<button style="margin-left: 5px" name="submit" type="button" class="btn btn-default"><?= $this->lang->line('cancel') ?></button>
			</a>
			</form>
			</div>
		</div>
	</div>
</div>