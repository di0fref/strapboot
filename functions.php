<?php
/* Theme setup */
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

add_filter('body_class', 'strapboot_body_class');
add_action('wp_head', 'strapboot_wp_head');

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
if (!function_exists('strapboot_setup')):
	function strapboot_setup()
	{
		register_nav_menu('primary', __('Primary navigation', 'strapboot_main_menu'));
	} endif;


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
	echo '<style>' . PHP_EOL;
	echo 'body{ padding-top: 30px !important; }' . PHP_EOL;
	echo 'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }' . PHP_EOL;
	echo 'body.logged-in .navbar-fixed-top{ top: 28px !important; }' . PHP_EOL;
	echo '</style>' . PHP_EOL;
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
				<?php comment_reply_link(array_merge($args, array('reply_text' => __('<i class="icon-reply"></i>&nbsp; Reply'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>
		</div>
		<!-- .comment-content -->
	</article>
<?php
}

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

function tokenTruncate($string, $your_desired_width = 200)
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