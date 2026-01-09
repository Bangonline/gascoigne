<?php get_header(); ?>

<div class="wrap">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="padding content">
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
					the_content();
					endwhile;	
				?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php	
else :
echo 'Page not found';
endif; ?>

<?php get_footer(); ?>