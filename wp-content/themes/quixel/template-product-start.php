<?php /* Template Name: Product start template */ ?>

<?php get_header(); ?>
	<!-- jQuery -->
	<script type="text/javascript" language="javascript" src="/wp-content/themes/quixel/js/jquery-1.8.2.min.js"></script>

    <!-- carouFredSel plugin -->
    <script type="text/javascript" language="javascript" src="/wp-content/themes/quixel/js/jquery.carouFredSel-6.1.0-packed.js"></script>
	
	<!-- Nivo slider  -->
	<script type="text/javascript" src="/wp-content/themes/quixel/js/jquery.nivo.slider.js"></script>

	<!-- tabber.js -->
	<script type="text/javascript" src="/wp-content/themes/quixel/js/tabber.js"></script>
	
    <!-- fire plugin onDocumentReady -->
    <script type="text/javascript" language="javascript">
      $(function() {
        //  Scrolled by user interaction
        $('#masterLearningID').carouFredSel({
	        auto: false,
	        circular: false,
			infinite: false,
	        prev: '#prev',
	        next: '#next',
	        pagination: "",
	        mousewheel: false,
	        swipe: {
	            onMouse: false,
	            onTouch: false
	        }
        });

       //  Scrolled by user interaction
        $('#toolSpecID').carouFredSel({
	        auto: false,
	        circular: false,
	        prev: '#prev2',
	        next: '#next2',
	        pagination: "",
	        mousewheel: false,
	        swipe: {
	            onMouse: false,
	            onTouch: false
	        }
        });

      });
    </script>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- Andra menyn -->
	<?php //Läs ut alla objekt i submenyn

		//Lättare att läsa koden
		$menu1 = get_field('subMenu1');
		$menu2 = get_field('subMenu2');
		$link1 = get_field('subMenu1Link');	
		$link2 = get_field('subMenu2Link');
		$green = get_field('subMenuTextGreen');
		$black = get_field('subMenuTextBlack');
		$img = get_field('subMenuImg');
		
		echo '<div id="nav" class="clearfix">';
			echo "<div class='navbuttons'>";
				echo "<p class='buttontext'><a href='$link1'>$menu1</a></p>";
			echo "</div>";
			echo "<div class='navbuttons'>";
				echo "<p class='buttontext'><a href='$link2'>$menu2</a></p>";
			echo "</div>";

			echo "<div id='offer'><ul><li class='offer1'>$green</li><li class='offer2'>$black</li></ul></div>";
			echo "<div id='productlogo'>";
				echo "<img alt='$green' src='$img'>";
			echo "</div> <!-- /productlogo -->";
			echo "</div> <!-- /nav -->";
	?>




	<!-- Det här är bildspelet -->
	<?php
		//Läser ut en repeater som en array här SlideShow
		$rows = get_field('slideShowObject');
		if($rows)
		{
			echo '<div class="slider-wrapper">';
				echo '<div id="slider" class="nivoSlider">';

			
				foreach($rows as $row)
				{
					//Definiera upp värdena så de blir lättare att jobba med
					$img = $row['slideshowImg'];
					$link = $row['slideshowLink'];
					$content = $row['slideshowContent'];
					$shadowbox = $row['slideshowShadowbox'];
					// Ta bort HTML-taggar från $content och spara som $alt
					$alt = strip_tags($content);

					// Kolla om lightbox är förkryssat, skriv isåfall ut rel="lightbox"
					//Om bredd och höjd är satt lägg till detta i rel
					if($row['slideshowShadowbox'] == TRUE)
					{
						$relShadowbox = 'rel="shadowbox"';
						//Sätt variablerna om fälten inte är lika med 0
						if ($row['slideshowShadowboxWidth'] != 0)
						{
							$width = ";width=" . $row['slideshowShadowboxWidth'];
							$height = ";height=" . $row['slideshowShadowboxHeight'];
							$relShadowbox = 'rel="shadowbox' . $width . $height . '"';
						}
					}
					else
					{
						$relShadowbox = '';
					}

					// Skriv ut värdena i sina riktiga HTML-taggar
					echo "<a title='$alt' href='$link' $relShadowbox>";
					echo "<img alt='$alt' src='$img' title='$content' />";
					echo '</a>';
				}
				echo '</div> <!-- /slider -->';
			echo '</div> <!-- /slider-wrapper -->';
		}
	?>



<div id="content" class="clearfix">
	<div class="tabber">
		<!-- Innehållet i Master learning -->
	<?php //Läser ut en repeater som en array här Master Learning
		$rows = get_field('masterLearningObject');
		if($rows)
		{

				// Klassnamn och ID är måste för att JSn ska funka. 
			echo "<div class='tabbertab' title='" . get_field('masterLearningTitle') . "'>";
				echo '<a id="prev" class="prev" href="#"> </a>';
				echo '<a id="next" class="next" href="#"> </a>';
				echo "<div class='list_carousel'>";
					echo "<div id='masterLearningID'>";
			foreach($rows as $row)
			{
				//Definiera upp värdena så de blir lättare att jobba med
				$img = $row['masterLearningImg'];
				$link = $row['masterLearningLink'];
				$headline = $row['masterLearningHeadline'];
				$subtitle = $row['masterLearningSubtitle'];
				$alt = strip_tags($headline . " - " . $subtitle);

				//Sätt variablerna om fälten inte är lika med 0
				if ($row['masterLearningWidth'] != 0)
				{
					$width = ";width=" . $row['masterLearningWidth'];
				}
				if ($row['masterLearningHeight'] != 0)
				{
					$height = ";height=" . $row['masterLearningHeight'];
				}

				// Skriv ut värdena i sina riktiga HTML-taggar
						echo '<div class="inner item">';
							echo "<a title='$alt' href='$link' rel='shadowbox$width$height'><img alt='$alt' src='$img'></a>";
							echo "<h3>$headline</h3>";
							echo "<p>$subtitle</p>";
						echo "</div>";

			}
			?>
			</div> <!-- /masterLearningID -->

			<div class="clearfix"></div>
		</div> <!-- /list_carousel -->
	</div> <!-- /tabbertab  -->
	<?php } ?>



		<!-- Innehållet i Tool Specs (likadan som Master learning) -->
	<?php
		//Läser ut en repeater som en array - här Tool spec
		$rows = get_field('toolSpecObject');
		if($rows)
		{
			echo "<div class='tabbertab' title='" . get_field('toolSpecTitle') . "'>";
				echo '<a id="prev2" class="prev" href="#"> </a>';
				echo '<a id="next2" class="next" href="#"> </a>';
				echo "<div class='list_carousel'>";
					echo "<div id='toolSpecID'>";
		
			foreach($rows as $row)
			{
				//Definiera upp värdena så de blir lättare att jobba med
				$img = $row['toolSpecImg'];
				$link = $row['toolSpecLink'];
				$headline = $row['toolSpecHeadline'];
				$subtitle = $row['toolSpecSubtitle'];
				$alt = strip_tags($headline . " - " . $subtitle);

				//Sätt variablerna för bredd och höjd om fälten inte är lika med 0
				if ($row['toolSpecsWidth'] != 0)
				{
					$width = ";width=" . $row['toolSpecsWidth'];
				}

				if ($row['toolSpecsHeight'] != 0)
				{
					$height = ";height=" . $row['toolSpecsHeight'];
				}

				// Skriv ut värdena i sina riktiga HTML-taggar
				echo '<div class="inner">';
					echo "<a title='$alt' href='$link' rel='shadowbox$width$height'><img alt='$alt' src='$img'></a>";
					echo "<h3>$headline</h3>";
					echo "<p>$subtitle</p>";
				echo "</div>";

			} ?>
			</div> <!-- /toolSpecID -->

			<div class="clearfix"></div>
		</div> <!-- /list_carousel -->
	</div> <!-- /tabbertab  -->
		<?php }
	?>


	<!-- Innehållet i Community Highlights -->
	<?php
		echo "<div class='tabbertab' title='" . get_field('communityHighlightsTitle') . "' >";
		//Läser ut ett enstaka fält - här Community highlights
		the_field('communityHighlightsContent'); 
		echo "</div>";
	?>

	</div> <!-- /tabber -->


	<!-- Innehållet i Testimonials -->
	<?php
		//Läser ut en repeater som en array - här Tool spec
		$rows = get_field('testimonialsObject');
		if($rows)
		{
			echo '<div id="testimonials">';
		
			foreach($rows as $row)
			{
				//Definiera upp värdena så de blir lättare att jobba med
				$link = $row['testimonialLink'];
				$headline = $row['testimonialHeadline'];
				$subtitle = $row['testimonialSubtitle'];
				$alt = strip_tags($headline . " - " . $subtitle);


				/* Skriv ut värdena så vi ser vad vi får 
				echo $link . "<br>" ;
				echo $headline . "<br>" ;
				echo $subtitle . "<br>" ;
				echo "<hr>"; */


				// Skriv ut värdena i sina riktiga HTML-taggar
				echo '<div class="inner2">';
					echo "<h3><a href='$link'>&ldquo;$headline&rdquo;</a></h3>";
					echo "<p class='author'>&ndash; $subtitle</p>";
					echo "<a class='full' title='$alt' href='$link' rel='lightbox'> FULL</a>";
				echo '</div>';
			}
			echo '</div>';
		}
	?>
</div> <!-- /content -->

	<?php endwhile; ?>
	<?php else: ?>
		<!-- Article -->
		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article><!-- /Article -->
	<?php endif; ?>
<?php get_footer(); ?>