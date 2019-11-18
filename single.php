<?php get_header(); ?>

	<!-- This template is not used since the website does not use Posts -->

	<main role="main">
	<section class="section" role="region">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
 
			<!-- post details -->
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'hpvico' ); ?> <?php the_author_posts_link(); ?></span>

			<?php the_content(); // Dynamic Content ?>

			<?php edit_post_link(); ?>

		</article>

	<?php endwhile; ?>

	<?php else: ?>

		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'hpvico' ); ?></h1>
		</article>

	<?php endif; ?>

	</section>
	</main>

<?php get_footer(); ?>
