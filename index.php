<?php
/* Template name: Main Page */
?>
<?php get_header(); ?>

<main class="main" role="main">
	<section class="section hero">
		<div class="hero-wrap fade-in">
			<h1><?php the_field('headline_text'); ?></h1>
			<h3 class="top-line--blue"><?php the_field('subheading') ?></h3>
			<a class="cta cta--filled">
				<?php the_field('contact_button_text') ?>
			</a>
		</div>
		<div class="logo-side slide-in-left">
			<?php include_once("img/hpvico_icons/svg/hpvico.svg") ?>
		</div>
	</section>

	<section class="section ">

		<?php
		$itemCount = 0;
		if (have_rows('product_feature_repeater')) :
			while (have_rows('product_feature_repeater')) :
				$itemCount++;
				the_row();
				?>
				<?php 
				if ($itemCount == 1) : ?>
				<div class="items">
					<div class="logo-arrow">
						<?php include("img/hpvico_icons/svg/hpvico-arrow.svg") ?>
					</div>
				<?php endif; ?>

				<div class="items__item">
					<h3> <?php the_sub_field('title'); ?> </h3>
					<p> <?php the_sub_field('text'); ?> </p>
				</div>

				<?php
				if ($itemCount == 2) :
					$itemCount = 0;
				?>
					</div>
				<?php endif; ?>
		<?php	
			endwhile;
		else :
		// no rows found
		endif;
		?>
	</section>
	
	
	<section class="section photo-and-text bg-blue-dark" >
	
	<!-- <img class="photo" src=<?php the_field('image'); ?> /> -->

	<div class="uploaded-photo" style="background-image: url(<?php the_field('image');?>)" >
		<div class="bg-transparent-color"></div>
	</div>

	<div class="text-content text-white">
		<h2 class="bottom-line--white"> <?php the_field('about_title'); ?> </h2>
		<p class="text-weight-lit"> <?php the_field('about_text'); ?> </p>
	</div>
	
	</section>


	<section class="section form bg-blue-dark">
		<div class="form-wrapper">
		<div class="logo text-center">
			<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
			<img src="<?php echo get_template_directory_uri(); ?>/img/hpvico_icons/png/HPVico_logga_250x207.png" alt="Logo" class="logo-img">
		</div>
			<h3 class="text-center"> <?php the_field('contact_us_text'); ?> </h3>
			<form class="form__form">
				<div class="form__input-name">Full name *</div>
				<input class="form__input" type="text" name="fullname" ><br>
				<div class="form__input-name">Company *</div>
				<input class="form__input" type="text" name="company" ><br>
				<div class="form__input-name">Phone *</div>
				<input class="form__input" type="text" name="phone" ><br>
				<div class="form__input-name">E-mail *</div>
				<input class="form__input" type="text" name="e-mail" ><br>
				<div class="form__input-name">Message *</div>
				<textarea class="form__textarea" name="message"></textarea>
				<div class="permission-wrapper">
					<input class="form__checkbox" type="checkbox" name="gdpr-permission" value="checked"> 
					<p class="text-discrete"> <?php the_field('permissions_checkbox_text'); ?> </p>
				</div>
				<div class="submit-wrapper">
					<input class="form__submit cta" type="submit" name="submit" value="SUBMIT">
				</div>
			</form>
		
		</div>
	</section>
	<?php edit_post_link(); ?>
</main>

<?php get_footer(); ?>