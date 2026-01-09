<?php get_template_part('parts/find-a-store'); ?>
<?php if (is_page(16)) { ?>
	<div class="wrap highlight padding-vert">
		<div class="container footer">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="underline">Get in touch</h2>
					<?php echo do_shortcode('[gravityform id=2 title=false description=false]'); ?>
				</div>
			</div>
		</diV>
	</div>
<?php } ?>
<div class="wrap white">
	<div class="container footer">
		<div class="row padding-vert">
			<div class="col-md-6">
				<p>COPYRIGHT <?php echo date('Y'); ?> GASCOIGNE FURNITURE | <a href="/contact-us/">CONTACT US</a> | <a
						href="/cleaning-guide/">CLEANING GUIDE</a></p>
			</div>
			<div class="col-md-6 text-right">
				<p>Website built by <a href="https://www.bangdigital.com.au" target="_blank">Bang Digital</a></p>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); // js scripts are inserted using this function ?>
<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 976583961;
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
	<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt=""
			src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/976583961/?guid=ON&amp;script=0" />
	</div>
</noscript>
</body>

</html>