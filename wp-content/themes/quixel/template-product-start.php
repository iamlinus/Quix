<?php /* Template Name: Product start template */ ?>

<?php get_header(); ?>
	
	<!-- Section -->
	<section>
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php the_content(); ?>
			



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
			
			echo "<ul>";
			echo "<li><a href='$link1'>$menu1</a></li>";
			echo "<li><a href='$link2'>$menu2</a></li>";
			echo "</ul>";
			echo "<div class='submenutext'><p class='green'>$green</p><p>$black</p></div>";
			echo "<div class='submenuimg'><img alt='$green' src='$img'>";
		?>

		<!-- Det här är bildspelet -->
		<?php
			//Läser ut en repeater som en array här SlideShow
			$rows = get_field('slideShowObject');
			if($rows)
			{
				echo '<div class="slideshow">';
			
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
					echo '<div style="float:left; width:220px; margin:20px;" class="thumbnail">';
					echo "<a title='$alt' href='$link' $relShadowbox><img alt='$alt' src='$img'></a>";
					echo "<p> $content </p>";
					echo '</div>';
				}
				echo '</div>';
			}
			?>
			
			<!-- Menyn under bildspelet -->
			<?php
			echo "<ul style='clear:both'>";
				echo "<li><a href='#'>";
				the_field('masterLearningTitle'); 
				echo "</a></li>";
				echo "<li><a href='#'>";
				the_field('toolSpecTitle'); 
				echo "</a></li>";
				echo "<li><a href='#'>";
				the_field('communityHighlightsTitle'); 
				echo "</a></li>";
			echo "</ul>";
			?>

			<!-- Innehållet i Master learning -->
			<?php
				//Läser ut en repeater som en array här Master Learning
				$rows = get_field('masterLearningObject');
				if($rows)
				{
					echo '<div style="clear:both;" class="masterlearning">';
				
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
						echo '<div style="float:left; width:220px; margin:20px;" class="thumbnail">';
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
					echo '<div style="clear:both;" class="toolspec">';
				
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
						echo '<div style="float:left; width:220px; margin:20px;" class="thumbnail">';
						echo "<a title='$alt' href='$link' rel='shadowbox$width$height'><img alt='$alt' src='$img'></a>";
						echo "<p>$headline</p>";
						echo "<p>$subtitle</p>";
						echo "</div>";

					}
					echo '</div>';
				}
			?>
			<!-- Innehållet i Community Highlights -->
			<div style="clear:both;" class="communityhighlights">
				<?php //Läser ut ett enstaka fält - här Community highlights
					the_field('communityHighlightsContent'); 
				?>
			</div>

			<!-- Innehållet i Testimonials -->
			<?php
				//Läser ut en repeater som en array - här Tool spec
				$rows = get_field('testimonialsObject');
				if($rows)
				{
					echo '<div style="clear:both;" class="testimonials">';
				
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
						echo '<div style="float:left; width:220px; margin:20px;" class="thumbnail">';
						echo "<p>&ldquo;$headline&rdquo;</p>";
						echo "<p>&ndash; $subtitle";
						echo "<a title='$alt' href='$link' rel='lightbox'> FULL</a></p>";
						echo '</div>';

					}
					echo '</div>';
				}
			?>

			<br class="clear">			
		</article><!-- /Article -->
		<?php endwhile; ?>
		<?php else: ?>
		<!-- Article -->
		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article><!-- /Article -->
		<?php endif; ?>
	</section><!-- /Section -->
<?php get_footer(); ?>