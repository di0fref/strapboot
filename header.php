<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Basic Meta Data -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="copyright" content="<?php
	esc_attr( sprintf(
		__( 'Design is copyright %1$s Fahlstad Design', 'WP StrapBoot' ),
		date( 'Y' )
	) );
	?>" />

	<title><?php wp_title($sep = ''); ?> | <?php bloginfo('name');?></title>

	<!-- Bootstrap CSS file -->
	<link href="<?php bloginfo('template_directory'); ?>/lib/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="<?php bloginfo('template_directory'); ?>/lib/bootstrap-3.0.3/css/bootstrap-theme.min.css" rel="stylesheet"/>
	<link rel='stylesheet' id='google-fonts-css'  href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,300italic,400italic,600italic|Roboto+Condensed:400italic,700italic,400,700' type='text/css' media='all' />
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>

<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>
<!-- Header -->
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img class="navbar-brand" src="<?php bloginfo('template_directory'); ?>/images/logo_6.png">
			<a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('blog_name'); ?></a>

		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			<form class="navbar-form navbar-right" role="search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="form-group">
					<input type="text" class="form-control" name="s" id="s" placeholder="Search">
				</div>
				<button type="submit" id="searchsubmit" class="btn btn-default">Submit</button>
			</form>
			<?php /* Primary navigation */
			wp_nav_menu(array(
					'menu' => 'top_menu',
					'depth' => 2,
					'container' => false,
					'menu_class' => 'nav navbar-nav',
					'walker' => new wp_bootstrap_navwalker())
			);
			?>

		</nav>
	</div>

</header>

<div class="container" id="main">
<!--<div class="row">
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
</div>-->
	<div class="row">