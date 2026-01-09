<?php get_header(); ?>

<div class="wrap">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-offset-2 col-md-8 column">
				<div class="padding padding-vert content">
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
					echo "<h1 class='underline'>".get_the_title()."</h1>";
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