<?php /* Template Name: Shop template */ ?>

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
		

		<!-- Det här är submenyn -->
		<?php
			//Läser ut en repeater som en array - här Produktmenyn
			$rows = get_field('productMenuObject');
			if($rows)
			{
				echo '<div class="productmenu">';
			
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
				echo '</div>';
			}
			?>

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