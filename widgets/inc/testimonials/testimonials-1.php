<!-- Slider main container -->
<div class="swiper testimonial-01 pb-20">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <?php
            if ( $testimonials ) {
            foreach ( $testimonials as $testimonial ) {
	    ?>
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="testimonial-bg bg-dawnpink py-9 px-7">
                <div class="flex gap-6">
	                <?php
                        if (!empty($testimonial['author_image'])){
	                        echo wp_get_attachment_image( $testimonial['author_image']['id'], 'thumbnail', '', ['class'=>'w-17.5 h-17.5 rounded-1/2'] );
                        }
                    ?>
                    <?php if (!empty($testimonial['content'])){ ?>
                        <p class="feedback font-ibmplexmono font-normal text-para text-emperor -mt-2">
		                <?php echo wp_kses_post($testimonial['content']); ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="flex items-end gap-6 mt-4">
                    <div class="w-17.5">
	                    <?php
	                    if (!empty($testimonial['author_image'])){
		                    echo wp_get_attachment_image( $testimonial['quote_icon']['id'], 'full');
	                    }
	                    ?>
                    </div>
                    <div>
	                    <?php if (!empty($testimonial['name'])){ ?>
                            <h4 class="author-name font-rufina font-bold text-title4 text-shaft mb-2.5">
			                    <?php echo wp_kses_post($testimonial['name']); ?>
                            </h4>
	                    <?php
                            }
	                        if (!empty($testimonial['designation'])){
                        ?>
                        <p class="author-designation font-ibmplexmono font-normal text-para2 text-emperor">
                            <?php echo wp_kses_post($testimonial['designation']); ?>
                        </p>
                         <?php
	                        }
		                ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>

    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
</div>

<script>
    ;(function($){
        "use strict";
        const testimonial01 = new Swiper('.testimonial-01', {
            // configure Swiper to use modules
            slidesPerView: 2,
            loop: true,
            spaceBetween: 30,
            centeredSlides: false,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    })(jQuery)
</script>