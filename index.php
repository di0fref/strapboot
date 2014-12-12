<?php get_header(); ?>
	<div class="col-md-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article
				class="post-636 post type-post status-publish format-standard hentry category-plugins tag-jetpack tag-widgets media odd">
				<a class="pull-left" href="http://wpsmackdown.com/list-jetpack-widget-php-class-names/">
					<!--<img class="media-object" src="http://placehold.it/120x120" alt="No Image">-->
					<?php
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail( array(120, 120), array("class" => "media-object") );
					}
					else{?>
						<img class="media-object" src="http://placehold.it/120x120" alt="No Image"><?php
					}
					?>
				</a>

				<div class="media-body">
					<h2 class="media-heading" id="post-636">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php the_content(); ?>
					<?php //edit_post_link(); ?>
				</div>
				<!-- .media-body -->
			</article>
			<hr>
		<?php endwhile;
		else : ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>