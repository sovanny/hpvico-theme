<?php
/* Template name: HPViCo Front Page */
?>
<?php get_header(); ?>

<main class="main" role="main">
	<section class="section section--hero bg-white" role="region">
		<div class="hero scroll-observe fade-in">
			<h1 class="hero__headline text-dark-blue" role="heading"><?php the_field('headline_text'); ?></h1>
			<h4 class="hero__subheading line-top"><?php the_field('subheading') ?></h3>
			<?php $conditional_url = !is_front_page() ? get_site_url() : "" ?>
			<a class="cta-filled btn-no-select" href="<?php echo $conditional_url ?>#download" role="button" >
				<?php the_field('cta_button_text') ?>
			</a>
		</div>

		<div class="big-logo-side hide-on-mobile-m slide-in-left">
			<?php include_once("img/hpvico_icons/svg/hpvico.svg") ?>
		</div>
	</section>

	
	<section class="section bg-white" id="features" role="region">
		<div class="container">
			<?php if (have_rows('text_item_repeater')) : ?>
			<div class="item-grid">
			<?php 	while (have_rows('text_item_repeater')) : the_row(); ?>
				<div class="item scroll-observe slide-right-short">	
						<div class="logo-arrow hide-on-mobile-s scroll-observe slide-right-short">
							<?php include("img/hpvico_icons/svg/hpvico-arrow.svg") ?>
						</div>
						<h3 class="item__title"><?php the_sub_field('title'); ?> </h3>
					<p class="item__body"> <?php the_sub_field('text'); ?> </p>
				</div>			
			<?php 	endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>
	
	
	
	<section class="section bg-blue-dark text-white" id="about" role="region">
		<div class="container flex flex--center-hor">
			<div class="photo-wrapper text-center hide-on-mobile-l scroll-observe fade-in">
				<div class="photo">
					<img class="img--circle" src="<?php the_field('text_and_image_image'); ?>" alt="<?php the_field('image_caption_title'); ?>"/> 
				</div>
					<p class="photo-caption__name text-weight-lrg"><?php the_field('image_caption_title'); ?></p>
					<p class="photo-caption__role"><?php the_field('image_caption_subtitle'); ?></p>
					<p class="photo-caption__email"><?php the_field('contact_info_1'); ?></p>
					<p class="photo-caption__number"><?php the_field('contact_info_2'); ?></p>
			</div>
			<div class="text-wrapper text-white scroll-observe fade-in ">
				<h2 class="line-bottom"> <?php the_field('text_and_image_title'); ?> </h2>
				<p class="line-height-lg"> <?php the_field('text_and_image_text'); ?> </p>

				<div class="show-on-mobile-l text-right">
					<br>
					<p class="photo-caption__name text-weight-lrg"><?php the_field('image_caption_title'); ?></p>
					<p class="photo-caption__role"><?php the_field('image_caption_subtitle'); ?></p>
					<p class="photo-caption__email"><?php the_field('contact_info_1'); ?></p>
					<p class="photo-caption__number"><?php the_field('contact_info_2'); ?></p>
				</div>
			</div>
			
		</div>
	</section>

	<section class="section bg-white" role="region">
		<div class="container flex flex--center-hor">
			<div class="form-wrapper" id="download">
				<div class="text-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/hpvico_icons/png/HPVico_logga_250x207.png" alt="Logo" class="logo-img">
					<h3 class="text-dark-blue"> <?php the_field('form_title'); ?> </h3>
					<p><?php the_field('form_body'); ?></p>
				</div>
				<form class="form" id="form" role="form">

					<label class="form__label scroll-observe slide-right" for="fullname" >Full name *</label>
					<input class="form__input" type="text" name="fullname" id="fullname" required><br>

					<label class="form__label scroll-observe slide-right" for="company" >Company *</label>
					<input class="form__input " type="text" name="company" id="company" required><br>

					<label class="form__label scroll-observe slide-right" for="email">E-mail *</label>
					<input class="form__input" type="email" name="email" id="email" required><br>

					<label class="form__label scroll-observe slide-right" for="phone">Phone</label>
					<input class="form__input" type="tel" name="phone" id="phone" pattern="[0-9'+' ]+"><br>

					<label class="form__label scroll-observe slide-right" for="message" >Message</label>
					<textarea class="form__input form__input--textarea" name="message" id="message"></textarea>

					<div class="consent-wrapper">
						<input class="form__checkbox" type="checkbox" name="consent" id="consent" required> 
						<label for="consent" class="text-discrete">
							By checking this box you agree to our <a href="<?php get_permalink(); ?>/privacy-policy/">privacy policy</a>. 
						</label>
					</div>

					<div class="text-center">
						<input class="cta-hollow cta-hollow--submit" id="submit" type="submit" 
							name="submit" role="button" value="<?php the_field('submit_button_text'); ?>">
					</div>
					
				</form>
				<div class="snackbar" id="snackbar">
					<p class="text-weight-med"><?php the_field('submitted_message'); ?></p>
				</div>
			</div>
		</div>
	</section>
	<?php edit_post_link(); ?>
</main>

<?php get_footer(); ?>