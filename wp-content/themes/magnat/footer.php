<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dazzling
 */
?>
			</div>
			<div id="loading"></div>
			<?php wp_footer(); ?>
		</div>
	</body>
<script>
jQuery(window).bind("pageshow", function() {
	if (window.history && window.history.pushState) {
		jQuery(window).on('popstate', function(event) {
			<?php if(!is_front_page()){ ?>location.reload();<?php } ?>
		});
	}
});
</script>
</html>