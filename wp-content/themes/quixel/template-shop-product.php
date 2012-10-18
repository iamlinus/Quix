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
		echo '<div class="shopmenu">';
	
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
			echo "<div class='outerouter'>";
				echo "<a href='$link' class='outer'>";
					echo "<div class='upper' style='background: url($img) no-repeat scroll 0 0 #000000;'>";
						echo "<p>" . $cost . "</p>";
					echo "</div>";
					echo "<p>" . $name  . "</p>";
				echo "</a>";
			echo "</div>";
		}
		echo '</div>';
	}
?>


	
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
	<div id="contentshop" class="clearfix">
		<div class="productleft">
			<?php echo get_the_post_thumbnail(); ?>
		</div> <!-- /produktbild -->
		<div class="productright">

			<?php 


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
			$thumbnail = get_field('productThumbnail'); ?>

	<div class="buy_box">
        <div class="creditcard" id="prestacart">
			<form action="http://www.quixel.se/store/company/cart.php" method="POST">
				
				<!-- Formuläret som skickas till shoppen -->
				<input type="hidden" name="id_product" value=" <?php echo $id ?> "/>
                <input type="hidden" name="add" value="1" />
               	
               	<!-- <script src="http://api.jquery.com/scripts/events.js"></script> -->

				<div class="qty">Specify Quantity:<input type="text" name="qty" id="quantity_wanted" value="10" size="7"/></div>
            			<script type="text/javascript">
				            var f8 = new LiveValidation('quantity_wanted');
				            f8.add(Validate.Discount1, { minimum: 6, maximum: 10 } );
				        </script>
						<div class="save">YOU SAVE:<input type="text" id="notice" value="$200" /></div>
                    	<p class="cost"><?php echo $cost ?></p>
                    	<img src="/wp-content/themes/quixel/images/299.png" alt="" />
                    	<input type="image" value="Add to cart" src="/wp-content/themes/quixel/images/buy_now.png" border="0" alt="<?php echo $purchase ?>" name="Submit">
                    </form>
                </div>
			  	<div class="works_on"><?php echo $fineprint ?></div>
            </div>
		</div> <!-- /produktinfo -->
	</div> <!-- /content -->
		


<script type="text/javascript">

$(".shopmenu div").each(function () {
     if ($(this).find("a").attr("href") == window.location.href) {
         $(this).addClass("current-menu-item");
     }
});


</script>





		<?php endwhile; ?>
		<?php else: ?>
		<article> <!-- Article -->
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article> <!-- /Article -->
		<?php endif; ?>
	</section><!-- /Section -->
<?php get_footer(); ?>