<?php get_header(); ?>
	<div class="col-md-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article
				class="post-636 post type-post status-publish format-standard hentry category-plugins tag-jetpack tag-widgets media odd">
				<a class="pull-left" href="http://wpsmackdown.com/list-jetpack-widget-php-class-names/">
					<?php
					if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail(array(120, 120), array("class" => "media-object img-thumbnail"));
					} else {
						?>
						<img width="120" height="120" class="img-thumbnail media-object"
							 src="<?php bloginfo('template_directory'); ?>/images/default.png" alt="No Image"><?php
					}?>
				</a>

				<div class="media-body">
					<h2 class="media-heading" id="post-636">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php the_excerpt(); ?>
					<?php edit_post_link(); ?>
				</div>
			</article>
			<hr>
			<!--
			<article>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="row">
					<div class="col-sm-6 col-md-6 small">
						<span class="glyphicon glyphicon-folder-open"></span> &nbsp;&nbsp;&nbsp;<?php the_category(', '); ?>
						&nbsp;&nbsp;
						<span class="glyphicon glyphicon-tags"></span> &nbsp;&nbsp;<?php the_tags(""); ?>
					</div>
					<div class="col-sm-6 col-md-6 small">
						<span class="glyphicon glyphicon-pencil"></span> <?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), "comment_link has_icon"); ?>
						&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?php the_time('F j, Y H:i'); ?>

					</div>
				</div>
				<hr>
				<?php the_content(); ?>
				<?php edit_post_link(); ?>

				<hr>
			</article>
-->

		<?php endwhile;
		else : ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
		<?php bootstrap_pagination();?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>