<!-- Slider main container -->
<div class="swiper testimonial-01 lg:pb-20 pb-15 swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
		<?php
		if ( $testimonials ) :
			foreach ( $testimonials as $testimonial ) :
				?>
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="testimonial-bg bg-dawnpink xl:py-9 py-7 xl:px-7 px-5">
                        <div class="flex xl:gap-6 gap-4">
							<?php
							if ( ! empty( $testimonial['author_image'] ) ) {
								echo wp_kses_post( wp_get_attachment_image( $testimonial['author_image']['id'], 'thumbnail', '', [ 'w-17.5 h-17.5 rounded-1/2' ] ) );
							}
							?>
							<?php if ( ! empty( $testimonial['content'] ) ) : ?>
                                <p class="feedback font-ibmplexmono font-normal text-para text-emperor -mt-2">
									<?php echo wp_kses_post( $testimonial['content'] ); ?>
                                </p>
							<?php
							endif;
							?>
                        </div>
                        <div class="flex items-end xl:gap-6 gap-4 mt-4">
                            <div class="w-17.5">
                                <img src="<?php echo esc_url( plugins_url( 'hovard-core/widgets/images/quote-icon.png' ) ); ?>" alt="Icon" />
                            </div>
                            <div>
								<?php if ( ! empty( $testimonial['name'] ) ) : ?>
                                    <h4 class="author-name font-rufina font-bold text-title4 text-shaft mb-2.5">
										<?php echo wp_kses_post( $testimonial['name'] ); ?>
                                    </h4>
								<?php
								endif;
								if ( ! empty( $testimonial['designation'] ) ) :
									?>
                                    <p class="author-designation font-ibmplexmono font-normal text-para2 text-emperor">
										<?php echo wp_kses_post( $testimonial['designation'] ); ?>
                                    </p>
								<?php
								endif;
								?>
                            </div>
                        </div>
                    </div>
                </div>
			<?php
			endforeach;
		endif;
		?>

    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
</div>

