<?php
/* Theme setup */
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

add_filter('body_class', 'strapboot_body_class');
add_action('wp_head', 'strapboot_wp_head');
add_action("wp_enqueue_scripts", "strapboot_enqueue_scripts");

function strapboot_enqueue_scripts()
{
	wp_register_style('strapboot_awesome_fonts_min', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '', 'all');
	wp_register_style('strapboot_bootstrap_min', get_template_directory_uri() . '/lib/bootstrap-3.3.1/css/bootstrap.min.css', array(), '3.3.1', 'all');
	wp_register_style('strapboot_bootstrap_theme_min', get_template_directory_uri() . '/lib/bootstrap-3.3.1/css/bootstrap-theme.min.css', array(), '3.3.1', 'all');

	wp_enqueue_style("strapboot_awesome_fonts_min");
	wp_enqueue_style("strapboot_bootstrap_min");
	wp_enqueue_style("strapboot_bootstrap_theme_min");

	wp_register_script('holder', get_template_directory_uri() . '/holder.js', array("jquery"), '2.4.1+f63aw', true);
	wp_register_script('bootstrap', get_template_directory_uri() . '/lib/bootstrap-3.3.1/js/bootstrap.min.js', array("jquery"), '3.3.1', true);

	wp_enqueue_script("bootstrap");
	wp_enqueue_script("holder");

}


require_once('wp_bootstrap_navwalker.php');
if (function_exists('register_sidebar')) {

	$args = array(
		'name' => __('Sidebar 1', 'theme_text_domain'),
		'id' => 'sidebar-1',
		'description' => '',
		'class' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s ">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>');

	register_sidebar($args);
}
add_action('after_setup_theme', 'strapboot_setup');
if (!function_exists('strapboot_setup')) {
	function strapboot_setup()
	{
		register_nav_menu('primary', __('Primary navigation', 'strapboot_main_menu'));
	}
}


add_theme_support('post-thumbnails');

function strapboot_body_class($classes)
{
	if (is_user_logged_in()) {
		$classes[] = 'body-logged-in';
	} else {
		$classes[] = 'body-logged-out';
	}
	return $classes;
}

function strapboot_wp_head()
{
	//echo '<style>' . PHP_EOL;
	//echo 'body{ padding-top: 75px !important; }' . PHP_EOL;
	//echo 'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }' . PHP_EOL;
	//echo 'body.logged-in .navbar-fixed-top{ top: 28px !important; }' . PHP_EOL;
	//echo '</style>' . PHP_EOL;
}

/**
 * Display Logo
 */
function strapboot_logo()
{
	$logo = strapboot_get_theme_option('logo');

	$d = "<div class='row'>
		<div>
			<img alt='" . esc_attr(get_bloginfo('name', 'display')) . "' src= $logo>
			<p class='text-center'>" . get_bloginfo('name') . "</p>
			<p class='site-subtitle'>" . get_bloginfo('description') . "</p>
		</div>

	</div>";
	echo "
		<div class='cold-md-1'>
			<img class='header_image img-responsive img-circle pull-left' alt='" . esc_attr(get_bloginfo('name', 'display')) . "' src='$logo'>
		</div>
		<div class='cold-md-1 clearfix'>
		<p class=''>" . get_bloginfo('name') . "</p>
			<p class='site-subtitle'>" . get_bloginfo('description') . "</p>
		</div>
	";

}

function strapboot_get_theme_option($option_name, $default = '')
{
	$options = get_option('strapboot_theme_options');
	if (isset($options[$option_name])) {
		return $options[$option_name];
	}
	return $default;
}

function strapboot_customize_register($wp_customize)
{
	$wp_customize->add_section('logo', array(
		'title' => 'Add Logo',
		'description' => "Upload your main logo, this shows in the header",
		'priority' => '25'
	));
	$wp_customize->add_setting('strapboot_theme_options[logo]', array(
		'default' => 0,
		'type' => 'option'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Site Logo', 'strapboot'),
		'section' => 'title_tagline',
		'settings' => 'strapboot_theme_options[logo]',
	)));
}

add_action('customize_register', 'strapboot_customize_register');

/*********************************************************/
/* Comments */

function twbs_comment_format($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
	<article>
		<div class="comment-meta pull-left">
			<?php echo get_avatar($comment, 96); ?>
			<p class="text-center comment-author"><?php comment_author_link(); ?></p>
		</div>
		<!-- .comment-meta -->
		<div class="comment-content media-body">
			<p class="comment-date text-right text-muted pull-right"><?php echo human_time_diff(get_comment_time('U'), current_time('timestamp')) . ' ago'; ?>
				&nbsp;<a class="comment-permalink"
						 href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"
						 title="Comment Permalink"><i class="icon-link"></i></a></p>
			<?php if ($comment->comment_approved == '0') { // Awaiting Moderation ?>
				<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<?php } ?>
			<?php comment_text(); ?>
			<div class="reply pull-right">
				<?php comment_reply_link(array_merge($args, array('reply_text' => __('<i class="fa fa-reply"></i>&nbsp; Reply'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>
		</div>
		<!-- .comment-content -->
	</article>
<?php
}

function strapboot_excerpt_more($more)
{
	return '...';
}

add_filter('excerpt_more', 'strapboot_excerpt_more');

add_filter('comment_reply_link', 'twbs_reply_link_class');
function twbs_reply_link_class($class)
{
	$class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-default btn-xs", $class);
	return $class;
}

add_filter('get_avatar', 'twbs_avatar_class');
function twbs_avatar_class($class)
{
	$class = str_replace("class='avatar", "class='avatar img-circle media-object", $class);
	return $class;
}

add_action('wp', 'wp_check_home');
function wp_check_home()
{
	if (is_home())
		add_filter('the_content', 'tokenTruncate');
}

function tokenTruncate($string, $your_desired_width = 30000)
{
	$parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
	$parts_count = count($parts);

	$length = 0;
	$last_part = 0;
	for (; $last_part < $parts_count; ++$last_part) {
		$length += strlen($parts[$last_part]);
		if ($length > $your_desired_width) {
			break;
		}
	}

	return implode(array_slice($parts, 0, $last_part));
}

function bootstrap_pagination($query = null)
{
	global $wp_query;
	$query = $query ? $query : $wp_query;
	$length = 999999999;

	$paginate = paginate_links(
		array(
			'base' => str_replace($length, '%#%', esc_url(get_pagenum_link($length))),
			'type' => 'array',
			'total' => $query->max_num_pages,
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'prev_text' => __('Previous'),
			'next_text' => __('Next'),
		)
	);
	if ($query->max_num_pages > 1) :
		?>
		<ul class="pagination pagination-centered">
			<?php
			foreach ($paginate as $page) {
				if (!preg_match('/^<span class="page-numbers dots">/', $page)) {
					echo '<li>' . $page . '</li>';
				}
			}
			?>
		</ul>
	<?php
	endif;
}