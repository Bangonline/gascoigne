<section id="find-a-store">
<div class="wrap padding-vert">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-4">
				<?php if(get_field('locations_heading','options') ){  ?>
					<h2 class="underline">
						<?php the_field('locations_heading','options'); ?>
					</h2>
				<?php  } ?>		
			
				<?php
				
				
				if( have_rows('locations_store_details','options') ):
					?>
					<dl class="dl-horizontal">
					<?php 
					while ( have_rows('locations_store_details','options') ) : the_row();
						// display a sub field value
						echo "<dt><strong>";
						the_sub_field('store_name');
						echo "</dt></strong>";
						echo "<dd><a href='tel:".get_sub_field('store_phone')."'>";
						the_sub_field('store_phone');
						echo "</a></dd>";
					endwhile;
					?>
					</dl><?php
					else :
				endif;
				?>
				<hr />
				<?php if(get_field('locations_opening_times','options')){?>
					<p class="text-center">
						<strong>
							<?php if(get_field('locations_opening_times_heading','options') ){ 
								the_field('locations_opening_times_heading','options'); }
							?>
						</strong><br /><?php the_field('locations_opening_times','options'); ?></p>
				<?php } ?>
				
			</div>
			<div class="col-md-8 column">
				<?php if(get_field('locations_embed_map_url','options') ){ ?>
				<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" style="float:left;" marginwidth="0" src="<?php echo get_field('locations_embed_map_url','options'); ?>"></iframe>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
</section>