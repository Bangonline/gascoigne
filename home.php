<?php get_header(); ?>

<div class="wrap">
	<div class="container-">
		<div class="row clearfix">
			<div class="col-md-8 col-md-push-2 colum">
				
				<div class="headline">
					<h1 class="underline">News</h1>
				</div>
				<?php
				if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="blog-post">
						<div class="padding">
							<?php
							echo "<h2>".get_the_title()."</h2>";
							echo "<p><small>Posted on ". get_the_time('F jS, Y') ."</small></p>";
							// check if the post has a Post Thumbnail assigned to it.
							if ( has_post_thumbnail() ) {
							the_post_thumbnail('medium', array( 'class' => 'img-responsive pull-right img-rounded'));
							} 
							the_content();
							?>
						</div>
						<hr />
					</div>


						<?php
						endwhile;	
						?>
						<?php
						else :
						echo 'Page not found';
						endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>