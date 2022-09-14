<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<section class="slider-2021">
	<div class="testimonial-slider">
		<div class="container ">
			<div class="decoration-left"><div class="blue-ring-50px"></div></div>			
			<div class="slider">	
				<?php if (have_rows('testimonial_slider')): ?>
					<div class="slick-container">
					<?php while (have_rows('testimonial_slider')): the_row(); ?>
						<div class="t-slide">
							<div class="slide-box">	
								<div class="slide-wrapper">	
									<div class="slide-img-wrapper">	
										<div class="slider-img">
										<?php $slide_image = get_sub_field('slide_image' );
                						    if( !empty( $slide_image ) ): ?>
                						        <img src="<?php echo esc_url($slide_image['url']); ?>" alt="<?php echo esc_attr($slide_image['alt']); ?>" />
                					    <?php endif; ?>											

										</div>
									</div>
									<div class="slide-text-wrapper">					
										<h1 class="title-right "><?php the_sub_field('slide_title'); ?></h1>
										<blockquote>
											<cite>
												<?php the_sub_field('slide_quote'); ?>
											</cite>
										</blockquote>
										<div class="bread-right"><?php the_sub_field('slide_bio'); ?></div> 
										<?php if( get_sub_field('slide_btn') ): ?>
											<div class="link-right">
											<?php $btnLink = get_sub_field('slide_btn'); ?>
												<p class=" text-left"><a class="btn btn-primary slider-btn" href="<?php echo esc_url( $btnLink['url'] ); ?>"><?php echo esc_attr( $btnLink['title']); ?></a></p>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
					<div class="slider-nav">	    
						<div class="prev"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></div>
						<div class="nav-dots"> </div>
						<div class="next"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></div>
					</div>
				<?php endif; ?>
			</div>
			<div class="decoration-right"><div class="light-blue-ring-25px"></div></div>
			<div class="decoration-right-right"><div class="blue-ring-38px"></div></div>
		</div>
	</div>
</section>
