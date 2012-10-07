<?php /* Template Name: Shop product template */ ?>

<?php get_header(); ?>

<!-- Det här är submenyn -->
<?php
	// Definiera föräldern
	// $post ->post_parent hämtar förälderns ID
	// get_permalink($post->post_parent) länkar till föräldern
	// get_the_title($post->post_parent) hämtar förälderns titel
	$parent = $post->post_parent;

	//Läser ut en repeater som en array - här Produktmenyn
	$rows = get_field('productMenuObject', $parent);
	if($rows)
	{
		echo '<nav class="productmenu">';
	
		foreach($rows as $row)
		{
			//Definiera upp värdena så de blir lättare att jobba med
			$img = $row['productMenuImg'];
			$link = $row['productMenuLink'];
			$cost = $row['productMenuCost'];
			$name = $row['productMenuName'];

			

			/* Skriv ut värdena så vi ser vad vi får
			echo $img . "<br>";
			echo $link . "<br>" ;
			echo $cost . "<br>" ;
			echo $name . "<br>" ;
			echo "<hr>"; */


			// OBS! MÅSTE SÄTTA SELECTED PÅ RÄTT SIDA

			// Skriv ut värdena i sina riktiga HTML-taggar
			echo "<a href='$link' style='display:inline-block;'>";
				echo "<div class='productmenu'>";
					echo "<div style='background-image: url($img);float:left; height:150px; width:220px; margin:20px;' class='productmenuimg'>";
						echo "<p>" . $cost . "</p>";
					echo "</div>";
					echo "<p>" . $name  . "</p>";
				echo "</div>";
			echo "</a>";
		}
		echo '</nav>';
	}
?>



	<!-- Section -->
	<section>
	
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php 
			//Skriv utsidans bild
			echo get_the_post_thumbnail();

			// Skriv ut sidans rubrik
			echo "<h1>";
			the_title();
			echo "</h1>";

			//Hämta sidans innehåll
			the_content();

			//Hämta AFC och gör det lättare att läsa koden
			$id = get_field('productID');
			$cost = get_field('productCost');
			$fineprint = get_field('productFinePrint');	
			$purchase = get_field('productPurchase');
			$thumbnail = get_field('productThumbnail');


			//Skriv ut formuläret för shoppen
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