<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header"><?= $this->lang->line('title'); ?></h1>

    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-heading">
			<h3><?= $this->lang->line('manage_articles'); ?></h3>
		</div>
		<div class="panel panel-body">
			<table class="table table-striped custab" style="padding: 0;margin: 0">
				<thead>
				    <tr>
				   
				        <th><?= $this->lang->line('picture'); ?></th>
				        <th><?= $this->lang->line('article_title'); ?></th>
				        <th><?= $this->lang->line('article_title_ar'); ?></th>
				        <th><?= $this->lang->line('date_published'); ?></th>
				        <th><?= $this->lang->line('article_url'); ?></th>
				        
				        <th class="text-center"><?= $this->lang->line('actions'); ?></th>
				    </tr>
				</thead>
				<tbody>
					<?php 
					function youtube_id_from_url($url) {
	    $pattern =
	        '%^# Match any youtube URL
	        (?:https?://)?  # Optional scheme. Either http or https
	        (?:www\.)?      # Optional www subdomain
	        (?:             # Group host alternatives
	          youtu\.be/    # Either youtu.be,
	        | youtube\.com  # or youtube.com
	          (?:           # Group path alternatives
	            /embed/     # Either /embed/
	          | /v/         # or /v/
	          | .*v=        # or /watch\?v=
	          )             # End path alternatives.
	        )               # End host alternatives.
	        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
	        ($|&).*         # if additional parameters are also in query string after video id.
	        $%x';
	    $result = preg_match($pattern, $url, $matches);
	    if (false !== $result) {
	        echo isset($matches[1]) ? $matches[1] : false;
	    }
	    return false;
	}

					foreach ($query->result() as $row) {
						
					
					 ?>
					<tr>
				    <?php if ($row->sml_pic != ''): ?>
				    	 <td><img src="<?= base_url() ?>images/articles/<?= $row->sml_pic ?>" alt=""></td>
				    <?php endif ?>

				    <?php if ($row->video_link != ''): ?>
				    	<td><img style="width: 241px" src="https://img.youtube.com/vi/<?php youtube_id_from_url($row->video_link);  ?>/0.jpg" alt=""></td>
				    <?php endif ?>
				   
				    <td><?= $row->article_title ?></td>
				    <td><?= $row->article_title_ar ?></td>
				    <td><?= $row->date_created ?></td>
				    <td><?= base_url().$row->article_slug ?></td>
				    <td class="text-center"><a class="btn btn-info btn-xs" href="http://localhost/project/articles/create/<?= $row->id ?>"><span class="fa fa-pencil"></span> <?= $this->lang->line('edit'); ?> </a>
				    <a href="#" onclick="if(confirm('<?= $this->lang->line('alert_del'); ?>')) 
				                	{ window.location.href = 'http://localhost/project/articles/del/<?= $row->id ?>'; }" class="btn btn-danger btn-xs"><span class="fa fa-times"></span> 
				                	<?= $this->lang->line('del'); ?></a></td>
				    </tr>		
				       	<?php 
				       }
				        ?>    
				    </tbody>
				</table>
		</div>
		</div>
	</div>
</div>