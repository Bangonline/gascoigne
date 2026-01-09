<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>
		<?php wp_title(''); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
    <script src="/wp-content/themes/gascoigne-2014/js/html5shiv.js"></script>
  <![endif]-->

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<!-- wordpress head functions -->
	<?php wp_head(); ?>
	<!-- end of wordpress head -->

</head>

<body <?php body_class(); ?>>
	<div class="topnav wrap hidden-xs">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-left">
					<ul class="list-inline">
						<li>
							<a href="/our-stores/">
								<i class="fa fa-map-marker"></i> Find a showroom</a>
						</li>
						<li>
							<a href="tel:08 9444 5711">
								<i class="fa fa-phone"></i> (08) 9444 5711</a>
						</li>
					</ul>
				</div>
				<div class="col-md-6 text-right">
					<ul class="list-inline">
						<li>
							<a href="/" title="home">
								<i class="fa fa-home"></i>
							</a>
						</li>
						<li>
							<a href="/about-us/">About Us</a>
						</li>
						<li>
							<a href="/news/">News</a>
						</li>
						<li>
							<a href="/contact-us/">Contact Us</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</div>

	<div class="nav wrap">
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main_navigation">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<div class="logo">
						<img src="/wp-content/themes/gascoigne-2014/img/gascoigne-logo.png" alt="Gascoigne Leather Centre" class="hidden-xs"
						/>
						<img src="/wp-content/themes/gascoigne-2014/img/gascoigne-logo-mobile.png" alt="Gascoigne Leather Centre" class="visible-xs"
						/>
						</div>
					</a>
					<a href="tel:08 9444 5711" class="mobile-phone hidden-sm hidden-md hidden-lg hidden-xl">
								<i class="fa fa-phone"></i></a>
				</div>
				<?php /* Primary navigation */
			wp_nav_menu( array(
				'menu' => 'primary',
				'depth' => 3,
				'container' => 'div',
				'container_class'   => 'collapse navbar-collapse ',
				'menu_class' => 'nav navbar-nav',
        		'container_id'      => 'main_navigation',
				//Process nav menu using our custom nav walker
				'walker' => new wp_bootstrap_navwalker()
			  )
			);
			?>
			</div>
		</nav>
	</div>
	<?php if(get_field('promotion_text','options')){ ?>
	<?php
	$promotion_text = get_field('promotion_text','options');
	$promotion_link = get_field('promotion_link','options');
	$promotion_arrow = get_field('promotion_show_arrow','options');
	?>


	<div class="topnav wrap" id="promotion-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if($promotion_link){ ?><a href="<?php echo $promotion_link ?>" target="_blank"><?php }?>
						<?php echo $promotion_text; ?>
						<?php if($promotion_arrow == true){ ?>
								<i class="fa fa-chevron-right"></i>
						<?php }?>
					<?php if($promotion_link){ ?></a><?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<?php

	// check if the repeater field has rows of data
	if( have_rows('gallery_slider') ): ?>
	<ul id="slider">
	<?php // loop through the rows of data
	while ( have_rows('gallery_slider') ) : the_row();
	$image = get_sub_field('image');
	$image = $image['sizes'];
	?>
		<li>
			<?php if(get_sub_field('link')){ ?>
			<a href="<?php the_sub_field('link') ?>">
				<?php } ?>
				<img src="<?php echo $image['homepage-banner']; ?>" width="<?php echo $image['homepage-banner-width']; ?>" height="<?php echo $image['homepage-banner-height']; ?>" alt="<?php the_sub_field('name'); ?>"
				/>
				<?php if(get_sub_field('link')){ ?> </a>
			<?php } ?>
		</li>
		<?php
	endwhile; ?>
	</ul>
		<?php else :  // no rows found
endif;?>
