<?php
/* Template name: Main Page */
?>
<?php get_header(); ?>

<main class="main" role="main">
	<section class="section hero">
		<div class="hero-wrap scroll-animate fade-in">
			<h1><?php the_field('headline_text'); ?></h1>
			<h3 class="top-line--blue"><?php the_field('subheading') ?></h3>
			<a class="cta--filled">
				<?php the_field('contact_button_text') ?>
			</a>
		</div>
		<div class="logo-side slide-in-left scroll-animate-special">
			<?php include_once("img/hpvico_icons/svg/hpvico.svg") ?>
		</div>
	</section>

	<section class="section section-items">

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
					<div class="logo-arrow scroll-animate slide-right-short">
						<?php include("img/hpvico_icons/svg/hpvico-arrow.svg") ?>
					</div>
				<?php endif; ?>

				<div class="items__item scroll-animate slide-right-short">
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
	<div class="photo-and-text__photo-wrapper scroll-animate fade-in">
		<div class="photo-and-text__photo">
			<img class="photo-and-text__photo--round" src="<?php the_field('image'); ?>"/> 
		</div>
		<div class="photo-caption">
			<p class="photo-caption__name text-weight-lrg">Albin Johansson</p><br>
			<p class="photo-caption__role">Business Analyst</p>
		</div>
	</div>

	<div class="photo-and-text__text text-white scroll-animate fade-in">
		<h2 class="bottom-line--white"> <?php the_field('about_title'); ?> </h2>
		<p class="text-weight-lit"> <?php the_field('about_text'); ?> </p>
	</div>
	</section>


	<section class="section form ">
		<div class="form-wrapper">
			<div class="logo text-center">
				<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
				<img src="<?php echo get_template_directory_uri(); ?>/img/hpvico_icons/png/HPVico_logga_250x207.png" alt="Logo" class="logo-img">
			</div>
			<h3 class="text-center"> <?php the_field('contact_us_text'); ?> </h3>
			<form class="form__form" id="form">
				<label class="form__input-name scroll-animate slide-right" for="fullname" >Full name *</label>
				<input class="form__input scroll-animate" type="text" name="fullname" id="fullname" required><br>
				<label class="form__input-name scroll-animate slide-right" for="company" >Company *</label>
				<input class="form__input scroll-animate " type="text" name="company" id="company" required><br>
				<label class="form__input-name scroll-animate slide-right" for="phone">Phone *</label>
				<input class="form__input scroll-animate " type="text" name="phone" id="phone" required><br>
				<label class="form__input-name scroll-animate slide-right" for="email">E-mail *</label>
				<input class="form__input scroll-animate" type="text" name="email" id="email" required><br>
				<label class="form__input-name scroll-animate slide-right" for="message" >Message</label>
				<textarea class="form__textarea" name="message" id="message"></textarea>
				<label class="permission-wrapper" for="consent">
					<input class="form__checkbox" type="checkbox" name="consent" id="consent" value="checked" required> 
					<p class="text-discrete"> <?php the_field('permissions_checkbox_text'); ?> </p>
				</label>
				<div class="submit-wrapper">
					<input class="form__submit cta text-weight-lrg" type="submit" name="submit" value="SUBMIT">
				</div>
			</form>
		
		</div>
	</section>
	<?php edit_post_link(); ?>
</main>

<?php get_footer(); ?>