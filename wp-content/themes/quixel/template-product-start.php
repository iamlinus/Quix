<?php /* Template Name: Product start template */ ?>

<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- Här är submenyn -->
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
			echo "<ul>";
				echo "<li><a href='$link1'>$menu1</a></li>";
				echo "<li><a href='$link2'>$menu2</a></li>";
			echo "</ul>";
			echo "<div id='offer'><p class='green'>$green</p><p>$black</p></div>";
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
					if($row['slideshowShadowbox'] == TRUE)
					{
						$relShadowbox = 'rel="shadowbox"';
					}
					else
					{
						$relShadowbox = '';
					}

					/* Skriv ut värdena så vi ser vad vi får
					echo $img . "<br>";
					echo $link . "<br>" ;
					echo $lightbox . "<br>" ;
					echo $relLightbox . "<br>" ;
					echo $content . "<br>" ;
					echo "<hr>"; */


					// Skriv ut värdena i sina riktiga HTML-taggar
					//echo "<a title='$alt' href='$link' $relShadowbox>"
					echo "<img alt='$alt' src='$img' />";
					//echo "<p> $content </p>";
					//echo '</a>';
				}
				echo '</div> <!-- /slider -->';
			echo '</div> <!-- /slider-wrapper -->';
		}
	?>



	<div class="tabber">

		<!-- Innehållet i Master learning -->
	<?php
		//Läser ut en repeater som en array här Master Learning
		$rows = get_field('masterLearningObject');
		if($rows)
		{
			echo "<div class='tabbertab' title='" . get_field('masterLearningTitle') . "'>";
		
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

				/* Skriv ut värdena så vi ser vad vi får 
				echo $img . "<br>";
				echo $link . "<br>" ;
				echo $headline . "<br>" ;
				echo $subtitle . "<br>" ;
				echo "<hr>"; */

				// Skriv ut värdena i sina riktiga HTML-taggar
				echo '<div class="thumbnail">';
				echo "<a title='$alt' href='$link' rel='shadowbox$width$height'><img alt='$alt' src='$img'></a>";
				echo "<p>$headline</p>";
				echo "<p>$subtitle</p>";
				echo "</div>";

			}
			echo '</div>';
		}
	?>

		<!-- Innehållet i Tool Specs (likadan som Master learning) -->
	<?php
		//Läser ut en repeater som en array - här Tool spec
		$rows = get_field('toolSpecObject');
		if($rows)
		{
			echo "<div class='tabbertab' title='" . get_field('toolSpecTitle') . "'>";
		
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
				echo '<div class="thumbnail">';
				echo "<a title='$alt' href='$link' rel='shadowbox$width$height'><img alt='$alt' src='$img'></a>";
				echo "<p>$headline</p>";
				echo "<p>$subtitle</p>";
				echo "</div>";

			}
			echo '</div>';
		}
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
				echo '<div id="testimonial1">';
					echo '<div class="inner2">';
					echo "<h3>&ldquo;$headline&rdquo;</h3>";
					echo "<p>&ndash; $subtitle";
					echo "<a title='$alt' href='$link' rel='lightbox'> FULL</a></p>";
					echo '</div>';
				echo '</div>';

			}
			echo '</div>';
		}
	?>

	<?php endwhile; ?>
	<?php else: ?>
		<!-- Article -->
		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article><!-- /Article -->
	<?php endif; ?>
<?php get_footer(); ?>