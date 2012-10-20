
<?php get_header(); ?>
	
	<div id="contentpage">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
	</div>
		<?php endwhile; ?>
		<?php else: ?>
		<article>			
			<h2><?php _e( 'Sorry, nothing dfdfto display.', 'html5blank' ); ?></h2>
		</article>	
		<?php endif; ?>

<?php get_footer(); ?>