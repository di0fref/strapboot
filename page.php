<?php get_header(); ?>
	<div class="col-md-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article>
				<h1><?php echo the_title()?></h1>
				<hr>
				<?php the_content(); ?>
				<?php edit_post_link(); ?>
			</article>

		<?php endwhile;
		else : ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>