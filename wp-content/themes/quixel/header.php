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

	<!-- CSS + jQuery + JavaScript -->
	<?php wp_head(); ?>
	
	<!-- Shadowbox -->
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/quixel/shadowbox/shadowbox.css">
	<script type="text/javascript" src="/wp-content/themes/quixel/shadowbox/shadowbox.js"></script>
	<script type="text/javascript">
		Shadowbox.init();
	</script>

</head>
<body <?php body_class(); ?>>

	<!-- Header -->
	<header>
	
		<!-- Wrapper -->
		<div class="wrapper">
		
			<!-- Logo -->
			<div id="logo">
				<a href="/">
					<img src="/wp-content/themes/quixel/img/logo.png" alt="Logo">
				</a>
			</div>
			<!-- /Logo -->
			
			<!-- Nav -->
			<nav>
				<?php wp_nav_menu(array('theme_location' => 'header-menu', 'items_wrap' => '<ul>%3$s</ul>', 'depth' => 1)); ?>
				<?php 
					// Lägg dit "Login"-sidebaren som ska innehålla Login-knappen
					if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('loginlink')) 
				?>
			</nav>
			<!-- /Nav -->
			
			<br class="clear">
			
		</div><!-- /Wrapper -->
	
	</header>
	<!-- /Header -->
	
	<!-- Wrapper -->
	<div class="wrapper">