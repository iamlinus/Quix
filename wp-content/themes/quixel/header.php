<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]--> 
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	
	<!-- Meta -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0;">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	<!-- jQuery -->
	<script type="text/javascript" src="/wp-content/themes/quixel/js/jquery-1.8.2.min.js"></script>

	<!-- CSS + jQuery + JavaScript wp_head -->
	<?php wp_head(); ?>
	
	<!-- Shadowbox -->
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/quixel/shadowbox/shadowbox.css">
	<script type="text/javascript" src="/wp-content/themes/quixel/shadowbox/shadowbox.js"></script>
	<script type="text/javascript">
		Shadowbox.init();
	</script>


	
	<!-- Hämta sid-specifik CSS -->
	<style type="text/css">
		<?php the_field('css'); ?>
	</style>
</head>

<body <?php body_class(); ?>>
<div id="wrapper964" class="clearfix">
	<div id="header" class="clearfix">
		<a href="/">
			<div id="sitetitle" class="clearfix">
				<div id="header-image" class="clearfix">
				</div>
			</div>
		</a>
		<?php //wp_nav_menu(array('theme_location' => 'header-menu', 'items_wrap' => '<ul>%3$s</ul>', 'depth' => 1)); 
		wp_nav_menu();
		?><ul class="menu nowidth">
			<li>
			<?php // Lägg dit "Kontakt"-sidebaren som ska innehålla kontakt-knappen
			if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('contactlink')) ?>
			</li>
		</ul>
		
		<?php 
			// Lägg dit "Login"-sidebaren som ska innehålla Login-knappen
			if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('loginlink')) 
		?>
	</div> <!-- /Header -->