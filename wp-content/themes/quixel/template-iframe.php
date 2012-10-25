<?php /* Template Name: iFrame Template */ ?>


<!DOCTYPE html>
<!--[if lt IE 7]><html dir="ltr" lang="sv-SE" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html dir="ltr" lang="sv-SE" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html dir="ltr" lang="sv-SE" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html dir="ltr" lang="sv-SE" class="no-js"><!--<![endif]--> 
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	
	<!-- Meta -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0;">
	<meta name="description" content="High-end art tools">
	<meta name='robots' content='noindex,nofollow' />
	
	<link rel="shortcut icon" href="http://quixel.se/wp-content/themes/quixel/favicon.ico">

	<!-- CSS + jQuery + JavaScript -->
	<link rel='stylesheet' id='html5blank-css'  href='http://quixel.se/wp-content/themes/quixel/style.css?ver=1.0' media='all' />
	
	<style>
		<?php the_field('css'); ?>
	</style>
</head>
<body>
	<div class="wrapper">
<!-- Det ovan är istället för get_header -->

		<div id="contentiframe">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>









					
			<?php 
				endwhile; 
				endif; 
			?>
		</div><!-- /contentiframe -->
	</div><!-- /wrapper -->
	
	<!-- Det nedan är istället för get_footer -->
	<!-- Optimised Asynchronous Google Analytics -->
	<script>
		var _gaq=[['_setAccount','UA-XXXXXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>

	<!-- Protocol Relative jQuery fall back if Google CDN offline -->
	<script>
		window.jQuery || document.write('<script src='http://quixel.se/wp-content/themes/quixel/js/jquery-1.8.2.min.js'><\/script>')
	</script>
</body>
</html>