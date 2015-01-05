<?php get_header(); ?>
	<div class="col-md-8">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="row">
				<div class="col-md-2">
					<a class="" href="<?php the_permalink(); ?>">
						<?php
						if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail(array(120, 120), array("class" => "media-object img-thumbnail img-responsive"));
						} else {
							?>
							<img width="120" height="120" class="img-thumbnail media-object img-responsive"
								 src="<?php bloginfo('template_directory'); ?>/images/default.png" alt="No Image"><?php
						}?>                    </a>
				</div>
				<div class="col-md-8">
					<h2 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<p><i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></p>
					<?php the_excerpt(); ?>
				</div>
			</div>
			<hr>

		<?php endwhile;

		else : ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
		<?php bootstrap_pagination(); ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>