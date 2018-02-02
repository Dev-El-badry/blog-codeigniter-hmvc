<div class="fh5co-narrow-content">
<div class="single-article-main lang-ar">
	<div class="row row-bottom-padded-md fh5co-post-entry single-entry">
		<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
			
			<?php 
				if($big_pic != '') { ?>
				<figure class="animate-box">
				<img src="<?= base_url() ?>images/articles/<?= $big_pic ?>" alt="<?= $article_title_ar ?>" class="img-responsive">
				</figure>
				<?php
				} elseif($video_link != '') { ?>
					<div class="video embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="<?= $video_link ?>?color=white&amp;rel=0&amp;showinfo=0&amp;iv_load_policy=3&amp;controls=1&amp;modestbranding=1&amp;cc_load_policy=1"
						 frameborder="0" gesture="media" allowfullscreen></iframe>
					</div>
				<?php
				}
				?>
			
			
			<span class="fh5co-meta animate-box">
				<a href="#"><?= $category_title_ar ?></a>
			</span>
			<h2 class="fh5co-article-title animate-box">
				<a href="<?= base_url() ?>blog/single_blog?title=<?= $article_slug_ar ?>"><?= $article_title_ar ?></a>
			</h2>
			<span class="fh5co-meta fh5co-date animate-box"><?= date('M dS, Y', $date_created) ?></span>

			<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article article-lang-ar">
				<?= nl2br($article_descripition_ar) ?>
			</div>
		</article>
	</div>
	<!-- end row -->
</div><!-- single-article-main -->

</div><!-- fh5co-narrow-content -->