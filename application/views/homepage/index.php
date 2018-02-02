<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
		<?php 
		foreach ($query_slides->result() as $slide) {
		if($slide->target_url == '') {
			$target = '';
		} else {
			$target = $slide->target_url;
		}
		?>
	   	<li style="background-image: url(<?= base_url() ?>images/slides/<?= $slide->slide_image ?>);">
	   		<div class="overlay"></div>
	   		<div class="container-fluid">
	   			<div class="row">
		   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h1><?= $slide->slide_title_ar ?></h1>
		   					<h2><?= $slide->slide_description_ar ?></h2>
								<p>
									<a class="btn btn-primary btn-learn" href="">
										<i class="icon-arrow-right3"></i> اعرف اكتر</a>
								</p>
		   				</div>
		   			</div>
		   		</div>
	   		</div>
	   	</li>
	   	<?php } ?>
	  	</ul>
  	</div>
</aside>

<div class="fh5co-narrow-content">
	<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">من أنا</h2>
	<div class="row">
		<?php 
		foreach ($query_services->result() as $service) {
			
		?>
		<div class="col-md-6">
			<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
				<div class="fh5co-icon">
					<i class="icon-<?= $service->icon ?>"></i>
				</div>
				<div class="fh5co-text">
					<h3><?= $service->services_title_ar ?></h3>
					<p><?= $service->services_description_ar ?></p>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>


<div class="fh5co-narrow-content">
	<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">المقالات الحالية</h2>

	<div class="row row-bottom-padded-md">
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

	foreach ($query_articles->result() as $article) {
		$category_id = $article->category_id;
		$article_id = $article->id;
		$q_sql = $this->Mdl_categories->get_where($category_id);
		foreach ($q_sql->result() as $q) {
			$category_title_ar = $q->category_title_ar;
		}

		$count_comments = $this->Mdl_comments->count_where('id',$article_id);
		if($count_comments == 0) {
			$count = 'لا توجد تعلقاات';
		} else {
			$count = $count_comments;
		}
	?>
		<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
			<div class="blog-entry">
				<?php 
				if($article->sml_pic != '') { ?>
				<a href="<?= base_url() ?>blog/single_blog/<?= $article->article_slug_ar ?>" class="blog-img"><img src="<?= base_url() ?>images/articles/<?= $article->sml_pic ?>" class="img-responsive" alt="<?= $article->article_title_ar ?>"></a>
				<?php
				} elseif($article->video_link != '') { ?>
				<a href="<?= base_url() ?>blog/single_blog/<?= $article->article_slug_ar ?>" class="blog-img"><img src="https://img.youtube.com/vi/<?php youtube_id_from_url($article->video_link);  ?>/0.jpg" class="img-responsive" alt="<?= $article->article_title_ar ?>"></a>
				<?php
				}
				?>
				
				<div class="desc">
					<h3><a href="<?= base_url() ?>blog/single_blog/<?= $article->article_slug_ar ?>"><?= $article->article_title_ar ?></a></h3>
					<span><small>بواسطة الادمن </small> / <small> <?= $category_title_ar ?> </small> / <small> <i class="icon-comment"></i> <?= $count ?></small></span>
					<p><?= $article->article_descripition_ar ?></p>
					<a href="<?= base_url() ?>single_blog/<?= $article->article_slug_ar ?>" class="lead">Read More <i class="icon-arrow-right3"></i></a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	
</div>
