<!-- Testimonial Area -->
<!-- Slider main container -->
<div class="swiper testimonial-02">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
		<?php
		if ( $testimonials ) :
			foreach ( $testimonials as $testimonial ) :
				?>
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="flex md:flex-nowrap flex-wrap items-center gap-4">
                        <div class=" w-full md:w-1/5">
							<?php
							if ( ! empty( $testimonial['author_image'] ) ) {
								echo wp_kses_post( wp_get_attachment_image( $testimonial['author_image']['id'], 'full' ) );
							}
							?>
                        </div>
                        <div class="w-full md:w-4/5 border-t md:border-t-0 md:border-l border-iron md:pl-12.5 pt-7.5 md:pt-0 pb-16">
							<?php
							if ( ! empty( $testimonial['content'] ) ) :
								?>
                                <p class="feedback font-ibmplexmono font-medium italic text-title10 text-emperor dark:text-silver mb-5 relative">
									<?php echo wp_kses_post( $testimonial['content'] ); ?>
                                </p>
							<?php
							endif;
							?>
                            <h4 class="author-name font-rufina font-bold text-title7 text-shaft dark:text-white">
								<?php
								if ( ! empty( $testimonial['name'] ) ) {
									echo wp_kses_post( $testimonial['name'] );
								}
								if ( ! empty( $testimonial['designation'] ) ) :
									?>
                                    <span class="author-designation font-ibmplexmono font-normal text-para text-emperor dark:text-silver">
                                        <?php echo wp_kses_post( $testimonial['designation'] ); ?>
                                    </span>
								<?php
								endif;
								?>
                            </h4>
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
<!-- Testimonial Area -->