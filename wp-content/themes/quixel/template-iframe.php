<?php /* Template Name: iFrame Template */ ?>


<!DOCTYPE html>
<!--[if lt IE 7]><html dir="ltr" lang="sv-SE" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html dir="ltr" lang="sv-SE" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html dir="ltr" lang="sv-SE" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html dir="ltr" lang="sv-SE" class="no-js"><!--<![endif]--> 
<head>
	<meta charset="UTF-8">
	<title> </title>
	
	<!-- Meta -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0;">
	<meta name="description" content="High-end art tools">
	
	<link rel="shortcut icon" href="http://quixel.se/wp-content/themes/quixel/favicon.ico">

	<!-- CSS + jQuery + JavaScript -->
	<meta name='robots' content='noindex,nofollow' />
<link rel='stylesheet' id='html5blank-css'  href='http://quixel.se/wp-content/themes/quixel/style.css?ver=1.0' media='all' />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js?ver=1.8.2'></script>
<script type='text/javascript' src='http://quixel.se/wp-content/themes/quixel/js/modernizr.js?ver=2.6.2'></script>
<script type='text/javascript' src='http://quixel.se/wp-content/themes/quixel/js/scripts.js?ver=1.0.0'></script>
<script type='text/javascript' src='http://quixel.se/wp-includes/js/comment-reply.js?ver=3.4.2'></script>
	
	<!-- Shadowbox -->
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/quixel/shadowbox/shadowbox.css">
	<script type="text/javascript" src="/wp-content/themes/quixel/shadowbox/shadowbox.js"></script>
	<script type="text/javascript">
		Shadowbox.init();
	</script>

</head>
<body>
<div class="wrapper">
<!-- Det ovan är istället för get_header -->
	<!-- Section -->
	<section>
		<h1><?php the_title(); ?></h1>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
			</article> <!-- /Article -->
		<?php endwhile; ?>
		<?php else: ?>
		<!-- Article -->
		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article><!-- /Article -->
		<?php endif; ?>
	</section><!-- /Section -->
</div><!-- /Wrapper -->
	
<!-- Det nedan är istället för get_footer -->
<!-- Optimised Asynchronous Google Analytics -->
<script>var _gaq=[['_setAccount','UA-XXXXXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));</script><!-- Protocol Relative jQuery fall back if Google CDN offline --><script>window.jQuery || document.write('<script src='http://quixel.se/wp-content/themes/quixel/js/jquery-1.8.2.min.js'><\/script>')</script>
</body>
</html>