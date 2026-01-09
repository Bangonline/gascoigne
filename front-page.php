<?php get_header(); ?>


<div class="wrap homepage-content">
	<div class="container">
		<div class="row clearfix">
			<?php get_template_part('parts','advert'); ?>
			<div class="col-md-offset-1 col-md-10 column">
				<div class="padding padding-vert">
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
<div class="wrap white">
	<div class="container category list">
		
		<h2 class="underline spacing">Featured products</h2>
		<?php
			echo do_shortcode('[featured_products] ');
		?>
	</div>
</div>
<?php
else :
echo 'Page not found';
endif; ?>

<?php get_footer(); ?>
