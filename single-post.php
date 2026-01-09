<?php get_header(); ?>

<div class="wrap">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="padding">
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
					// check if the post has a Post Thumbnail assigned to it.
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('medium', array( 'class' => 'img-responsive img-rounded'));
					} 
					echo "<h1>".get_the_title()."</h1>";
					echo "<p><small>Posted on ". get_the_time('F jS, Y') ."</small></p>";
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