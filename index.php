<?php
/* Template name: HPViCo Front Page */
?>
<?php get_header(); ?>

<main class="main" role="main">
	<section class="section section--hero bg-white">
		<div class="hero scroll-observe fade-in">
			<h1 class="hero__headline text-dark-blue"><?php the_field('headline_text'); ?></h1>
			<h4 class="hero__subheading line-top"><?php the_field('subheading') ?></h3>
			<a class="cta--filled btn-no-select" href="#contact">
				<?php the_field('cta_button_text') ?>
			</a>
		</div>

		<div class="big-logo-side slide-in-left">
			<?php include_once("img/hpvico_icons/svg/hpvico.svg") ?>
		</div>
	</section>

	
	<section class="section bg-white" id="features">
		<div class="container">
			<?php if (have_rows('text_item_repeater')) : ?>
			<div class="item-grid">
			<?php 	while (have_rows('text_item_repeater')) : the_row(); ?>
				<div class="item scroll-observe slide-right-short">	
					<div class="item__title"> 
						<div class="logo-arrow scroll-observe slide-right-short">
							<?php include("img/hpvico_icons/svg/hpvico-arrow.svg") ?>
						</div>
						<h3 class="item__title--text"><?php the_sub_field('title'); ?> </h3>
					</div>
					<p class="item__body"> <?php the_sub_field('text'); ?> </p>
				</div>			
			<?php 	endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>
	
	
	
	<section class="section bg-blue-dark text-white" id="about">
		<div class="container flex flex--center-hor">
			<div class="photo-wrapper scroll-observe fade-in">
				<div class="photo">
					<img class="img--circle" src="<?php the_field('text_and_image_image'); ?>"/> 
				</div>
					<p class="photo-caption__name text-weight-lrg"><?php the_field('image_caption_title'); ?></p>
					<p class="photo-caption__role"><?php the_field('image_caption_subtitle'); ?></p>
					<p class="photo-caption__email text-weight-lit">albin.johansson@hpvico.se</p>
					<p class="photo-caption__number text-weight-lit">+4670 123 4567</p>
			</div>
			<div class="text-wrapper text-white scroll-observe fade-in">
				<h2 class="line-bottom"> <?php the_field('text_and_image_title'); ?> </h2>
				<p class="text-weight-lit"> <?php the_field('text_and_image_text'); ?> </p>
			</div>
		</div>
	</section>

	<section class="section bg-white" id="contact">
		<div class="container flex flex--center-hor">
			<div class="form-wrapper">
				<div class="text-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/hpvico_icons/png/HPVico_logga_250x207.png" alt="Logo" class="logo-img">
					<h3 class="text-dark-blue"> <?php the_field('form_title'); ?> </h3>
					<p><?php the_field('form_body'); ?></p>
				</div>
				<form class="form" id="form">
					<label class="form__input-label scroll-observe slide-right" for="fullname" >Full name *</label>
					<input class="form__input" type="text" name="fullname" id="fullname" required><br>
					<label class="form__input-label scroll-observe slide-right" for="company" >Company *</label>
					<input class="form__input " type="text" name="company" id="company" required><br>
					<label class="form__input-label scroll-observe slide-right" for="email">E-mail *</label>
					<input class="form__input" type="email" name="email" id="email" required><br>
					<label class="form__input-label scroll-observe slide-right" for="phone">Phone</label>
					<input class="form__input" type="tel" name="phone" id="phone" pattern="[0-9'+' ]+"><br>
					<label class="form__input-label scroll-observe slide-right" for="message" >Message</label>
					<textarea class="form__textarea" name="message" id="message"></textarea>
					<div class="permission-wrapper">
						<input class="form__checkbox" type="checkbox" name="consent" id="consent" required> 
						<label for="consent" class="text-discrete">
							By checking this box you agree to our <a href="<?php get_permalink(); ?>/privacy-policy/">privacy policy</a>. 
						</label>
					</div>
					<div class="submit-wrapper">
						<input class="form__submit cta text-weight-lrg" type="submit" name="submit" value="<?php the_field('submit_button_text'); ?>">
					</div>
				</form>
				<!-- TODO: ha med eller ej?
				<div class="submitted-message" id="submitted-msg" >
					<p>Thank you for contacting us! We'll get in touch with you soon.</p>
				</div>
				-->
			</div>
		</div>
	</section>
	<?php edit_post_link(); ?>
</main>

<?php get_footer(); ?>