<?php get_header(); ?>
	<div class="col-md-8">
		<h1><?php echo the_title()?></h1>
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<span class="glyphicon glyphicon-folder-open"></span> &nbsp;<?php the_category(', '); ?>
				&nbsp;&nbsp;
				<span class="glyphicon glyphicon-bookmark"></span> <?php the_tags(""); ?>
			</div>
			<div class="col-sm-6 col-md-6">
				<span class="glyphicon glyphicon-pencil"></span> <?php comments_popup_link( __( 'No Comments' ), __( '1 Comment' ), __( '% Comments' ), "comment_link has_icon" ); ?>
				&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?php the_time('F j, Y H:i'); ?>

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