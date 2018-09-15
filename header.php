<!DOCTYPE html>
<html <?php language_attributes(); ?> class="">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
	<body <?php body_class(); ?>>
	<div class="site-container">
	<div id="preload"><h1>snippy is Loading...</h1></div>
	<div class="overlay">
	</div>

		<a href="<?php echo home_url('/snippy'); ?>" class="button-a">View all Snippets</a>
		<a href="<?php echo home_url('/submit-snippy'); ?>" class="submit-snippy">Submit snippy</a>
        <a href="<?php echo bloginfo('url'); ?>" class="button-a-back">Back</a>


		
