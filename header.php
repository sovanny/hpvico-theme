<!doctype html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
		<meta property="og:title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo get_permalink(); ?>" />
		<meta property="og:image" content="<?php the_field('og_image', 'option'); ?>" />

		<?php wp_head(); ?>

		<!-- Variables used in the js scripts -->
		<script>
			var ajaxurl = "<?php echo admin_url("admin-ajax.php"); ?>";
			var fileDownloadUrl = "<?php the_field('file_url', 'option'); ?>";
			var fileDownloadName = "<?php the_field('file_name', 'option'); ?>";
        </script>
	</head>

	<body <?php body_class(); ?>>
		<!-- wrapper -->
		<div class="wrapper">

			<header class="header" role="banner">
				<div class="header-logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/hpvico_icons/png/HPVico_logga_250x207.png" alt="HPViCO Logo" class="logo-img">
					</a>
				</div>
				<nav class="nav">
					<ul class="nav__links" role="navigation">
					<?php	if (have_rows('custom_links', 'option')) : ?>
					<?php 		while (have_rows('custom_links', 'option')) : the_row(); ?>
						<li class="nav__item">
							<a href="<?php the_sub_field('custom_link_page'); ?>"><?php the_sub_field('custom_link_name'); ?></a>
						</li>
					<?php	 	endwhile; ?>
					<?php 	endif; ?>
					<?php $conditional_url = !is_front_page() ? get_site_url() : "" ?>
						<li class="nav__item hide-on-mobile-l"><a href="<?php echo $conditional_url ?>#features">
							<?php the_field('features_nav_link_text', 'option'); ?>
						</a></li>
						<li class="nav__item hide-on-mobile-l"><a href="<?php echo $conditional_url ?>#about">
							<?php the_field('about_nav_link_text', 'option'); ?>
						</a></li>
						<li class="nav__item btn-no-select hide-on-mobile-l">
							<a href="<?php echo $conditional_url ?>#download" class="cta-hollow margin-left-05" role="button" >
							<?php the_field('cta_nav_button_text', 'option'); ?>
						</a></li>
					</ul>
				</nav>
			</header>
			<!-- /header -->
