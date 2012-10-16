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

	<!-- Nivo slider -->
	<script type="text/javascript" src="/wp-content/themes/quixel/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/quixel/js/jquery.nivo.slider.js"></script>

	<!-- tabber.js -->
	<script type="text/javascript" src="/wp-content/themes/quixel/js/tabber.js"></script>
	<script type="text/javascript">

	/* Optional: Temporarily hide the "tabber" class so it does not "flash" 
	on the page as plain HTML. After tabber runs, the class is changed
	to "tabberlive" and it will appear. */

	document.write('<style type="text/css">.tabber{display:none;}<\/style>');
	</script>

</head>
<body <?php body_class(); ?>>
<div id="wrapper964" class="clearfix">
	<div id="header" class="clearfix">
		<div id="sitetitle" class="clearfix">
			<div id="header-image" class="clearfix">
			</div>
		</div>
		<div class="menu">
		<?php wp_nav_menu(array('theme_location' => 'header-menu', 'items_wrap' => '<ul>%3$s</ul>', 'depth' => 1)); ?>
		</div>
		<?php 
			// Lägg dit "Login"-sidebaren som ska innehålla Login-knappen
			if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('loginlink')) 
		?>
	</div> <!-- /Header -->