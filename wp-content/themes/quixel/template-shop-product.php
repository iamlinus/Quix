<?php /* Template Name: Shop product template */ ?>

<?php get_header(); ?>
SUBMENY!
Det jag vill göra är: 
Hämta förälderns alla barn. 
Hämta barnens sidnamn, productCost och productThumbail. 
Loopa ut dessa i varsin div.



	<!-- Section -->
	<section>
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php the_content();

			//Lättare att läsa koden
			$id = get_field('productID');
			$cost = get_field('productCost');
			$fineprint = get_field('productFinePrint');	
			$purchase = get_field('productPurchase');
			$thumbnail = get_field('productThumbnail');



			echo '<form action="http://www.quixel.se/store/company/cart.php" method="POST">
				<!-- Formuläret som skickas till shoppen -->
				<input type="hidden" name="id_product" value="' . $id . '"/>
                <input type="hidden" name="add" value="1" />

				<p>Specify the quantity <input type="text" name=""></p>
				<p class="save">You save: $50</p>
                <input type="submit" value="' . $purchase . '">';
			?>
			</form>
			<br class="clear">
		</article><!-- /Article -->
		<?php endwhile; ?>
		<?php else: ?>
		<article> <!-- Article -->
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article> <!-- /Article -->
		<?php endif; ?>
	</section><!-- /Section -->
<?php get_footer(); ?>