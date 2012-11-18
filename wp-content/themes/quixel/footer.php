	<!-- Footer -->
	<div id="footer">
		<div id="footer1">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footerupper')) ?>
		</div> <!-- /footer1 -->
		<div id="footer2">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footerlower')) ?>
		</div> <!-- /footer2 -->
	</div><!-- /footer -->	
</div> <!-- /Wrapper964 -->
	<?php wp_footer(); ?>
</body>
</html>