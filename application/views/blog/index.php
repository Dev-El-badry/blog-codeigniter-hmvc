<div class="fh5co-narrow-content">
	<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">اقرا مقالاتنا</h2>

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
				<a href="<?= base_url() ?>blog/single_blog?title=<?= $article->article_slug_ar ?>" class="blog-img"><img src="<?= base_url() ?>images/articles/<?= $article->sml_pic ?>" class="img-responsive" alt="<?= $article->article_title_ar ?>"></a>
				<?php
				} elseif($article->video_link != '') { ?>
				<a href="<?= base_url() ?>blog/single_blog?title=<?= $article->article_slug_ar ?>" class="blog-img"><img src="https://img.youtube.com/vi/<?php youtube_id_from_url($article->video_link);  ?>/0.jpg" class="img-responsive" alt="<?= $article->article_title_ar ?>"></a>
				<?php
				}
				?>
				
				<div class="desc">
					<h3><a href="<?= base_url() ?>blog/single_blog?title=<?= $article->article_slug_ar ?>"><?= $article->article_title_ar ?></a></h3>
					<span><small>بواسطة الادمن </small> / <small> <?= $category_title_ar ?> </small> / <small> <i class="icon-comment"></i> <?= $count ?></small></span>
					<p><?= $article->article_descripition_ar ?></p>
					<a href="<?= base_url() ?>blog/single_blog?title=<?= $article->article_slug_ar ?>" class="lead">Read More <i class="icon-arrow-right3"></i></a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	
</div>