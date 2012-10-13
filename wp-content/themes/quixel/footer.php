	<!-- Footer -->
	<div id="footer">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footerupper')) ?>
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footerlower')) ?>
	</dic id="footer">
	<!-- /Footer -->
	
	</div>
	<!-- /Wrapper -->
	
	<?php wp_footer(); ?>


	<!-- Nivo Slider script -->
<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
</script>
</body>
</html>