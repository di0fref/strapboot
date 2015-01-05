<?php get_header(); ?>
	<div class="col-md-8">
		<h1><?php echo the_title()?></h1>
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<i class="fa fa-comments-o"></i> <?php comments_popup_link( __( 'No Comments' ), __( '1 Comment' ), __( '% Comments' ), "comment_link has_icon" ); ?>
				&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('F j, Y H:i'); ?>

			</div>
		</div>
		<hr>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article>
				<?php the_content(); ?>
				<?php edit_post_link(); ?>
				<hr>
			</article>

		<?php endwhile;
		else : ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>

		<?php comments_template(); ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>