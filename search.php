<?php get_header(); ?>

<div class="wrap">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="padding content">
					<h1>Search Results</h1>
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
					?><h3><?php the_title() ?></h3> <?
					the_excerpt();
					?>
					<a href="<?php the_permalink() ?>">Read more ></a><hr /><?
					endwhile; else : ?>
				<p>No search results found</p>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>