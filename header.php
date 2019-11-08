<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

		<script>
			var ajaxurl = "<?php echo admin_url("admin-ajax.php"); ?>";
			var fileDownloadUrl = "<?php the_field('file_url', 'option'); ?>";
			var fileDownloadName = "<?php the_field('file_name', 'option'); ?>";
        </script>

	</head>


	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header" role="banner">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/hpvico_icons/png/HPVico_logga_250x207.png" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<nav class="nav">
						<ul class="nav__links">
						<?php if (have_rows('custom_links', 'option')) : ?>
						<?php 	while (have_rows('custom_links', 'option')) : the_row(); ?>
						<li class="nav__item nav__item--hide-on-mobile">
							<a href="<?php the_sub_field('custom_link_page'); ?>">
							<?php the_sub_field('custom_link_name'); ?>
							</a>
						</li>
						<?php 	endwhile; ?>
						<?php endif; ?>
							<li class="nav__item nav__item--hide-on-mobile"><a href="#features">Features</a></li>
							<li class="nav__item nav__item--hide-on-mobile"><a href="#about">About</a></li>
							<li class="nav__item btn-no-select"><a href="#contact" class="cta margin-left-05 ">Get datasheet</a></li>
						</ul>
					</nav>
					
			</header>
			<!-- /header -->
