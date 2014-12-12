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
		__( 'Design is copyright %1$s Fahlstad Design', 'sQuirrl' ),
		date( 'Y' )
	) );
	?>" />

	<title><?php wp_title($sep = ''); ?> | <?php bloginfo('name');?></title>

	<!-- Bootstrap CSS file -->
	<link href="<?php bloginfo('template_directory'); ?>/lib/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="<?php bloginfo('template_directory'); ?>/lib/bootstrap-3.0.3/css/bootstrap-theme.min.css" rel="stylesheet"/>
	<link rel='stylesheet' id='font-awesome-css'  href='//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css' type='text/css' media='all' />
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
				<a class="navbar-brand" href="<?php bloginfo('siteurl'); ?>"><?php bloginfo('blog_name'); ?></a>
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
<div class="jumbotron">
	<div class="container">
		<?php if(is_home()){?>
			<h1><?php echo get_bloginfo('name')?></h1>
			<p class="lead"><?php echo get_bloginfo('description')?></p>
		<?php } ?>
		<?php if(is_single()){?>
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
		<?php } ?>
		<?php if(is_page()){?>
			<h1><?php echo the_title()?></h1>
		<?php } ?>

	</div> <!-- .container -->
</div>
<!-- Body -->
<div class="container" id="main">
<!--<div class="row">
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
</div>-->
	<div class="row">