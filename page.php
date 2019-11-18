<?php get_header(); ?>
	<main role="main">
		<section class="section container--page">
			<article>
				<h1 class="text-dark-blue"><?php the_title(); ?></h1>		
				
				<?php if( get_field('text_content') ): ?>
					<?php the_field('text_content'); ?>

				<?php else: ?>
					<h2><?php _e( 'Sorry, nothing to display.', 'hpvico' ); ?></h2>

				<?php endif; ?>
			</article>
		</section>
		<?php edit_post_link(); ?>
	</main>
<?php get_footer(); ?>
