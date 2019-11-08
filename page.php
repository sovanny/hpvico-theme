<?php get_header(); ?>
	<main role="main">
		<section class="section text-content">

			<h1 class="page-title"><?php the_title(); ?></h1>		

			<?php if( get_field('text_content') ): ?>
				<?php the_field('text_content'); ?>

			<?php else: ?>
				<h2><?php _e( 'Sorry, nothing to display.', 'hpvico' ); ?></h2>

			<?php endif; ?>
		</section>
		<?php edit_post_link(); ?>
	</main>
<?php get_footer(); ?>
