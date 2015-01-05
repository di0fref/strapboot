<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Basic Meta Data -->
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="copyright" content="<?php
	esc_attr(sprintf(
		__('Design is copyright %1$s Fahlstad Design', 'WP StrapBoot'),
		date('Y')
	));
	?>"/>

	<title><?php wp_title($sep = ''); ?> | <?php bloginfo('name'); ?></title>

	<link rel='stylesheet' id='google-fonts-css' href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,300italic,400italic,600italic|Roboto+Condensed:400italic,700italic,400,700' type='text/css' media='all'/>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,100italic,300italic,400italic' rel='stylesheet' type='text/css'>	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>

<?php echo '<body class="' . join(' ', get_body_class()) . '">' . PHP_EOL; ?>
<!-- Header -->
<!--<header class="site-header">
	bdbt
</header>-->
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-8 logo">
				<a href="<?php bloginfo('url');?>"><img width="120" src="<?php bloginfo('template_directory'); ?>/images/logo_fref.png"></a>
			</div>
			<div class="col-md-4">
				<ul class="list-inline">
					<li><a title="LinkedIn" href="https://www.linkedin.com/profile/view?id=45749252"><i class="fa fa-linkedin"></i>&nbsp;</a></li>
					<li><a title="Twitter" href="https://twitter.com/fredrikfahlstad"><i class="fa fa-twitter"></i>&nbsp;</a></li>
					<li><a title="RSS Feed" href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss"></i>&nbsp;</a></li>
					<li><a title="DRI-Nordic" href="http://dri-nordic.se"><i class="fa fa-code"></i>&nbsp;</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<header class="navbar navbar-default bs-docs-nav" role="banner" id="nav">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
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