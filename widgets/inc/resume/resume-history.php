<?php
if ( $resume_histories ):
	foreach ( $resume_histories as $history ):
		?>
        <!-- Education item -->
        <div class="grid grid-cols-9 gap-y-7.5 md:gap-y-0 md:gap-7.5">
            <div class="xl:col-span-2 md:col-span-3 col-span-9 text-right">
				<?php if ( ! empty( $history['institution'] ) ): ?>
                    <h5 class="institution font-rufina font-bold text-shaft text-subtitle4 dark:text-white"> <?php echo esc_html( $history['institution'] ); ?></h5>
				<?php
				endif;
				if ( ! empty( $history['st_en_year'] ) ):
					?>
                    <span class="st-en-year font-ibmplexmono font-medium text-subtitle text-emperor dark:text-silver"><?php echo esc_html( $history['st_en_year'] ); ?></span>
				<?php
				endif;
				?>
            </div>
            <div class="history-bar md:col-span-1 col-span-9 relative z-10 before:absolute before:top-3 before:left-1/2 before:-translate-x-1/2 before:block md:before:w-1 md:before:h-full before:w-full before:h-1 before:bg-oceangreen before:-z-10">
                <span class="circle w-4 h-4 rounded-1/2 border-4 border-oceangreen bg-white dark:bg-shaft md:block hidden mx-auto mt-3 z-20"></span>
            </div>
            <div class="xl:col-span-6 md:col-span-5 col-span-9 pb-10">
				<?php if ( ! empty( $history['designation'] ) ): ?>
                    <h5 class="designation font-rufina font-bold text-shaft text-title8 dark:text-white"><?php echo esc_html( $history['designation'] ); ?></h5>
				<?php
				endif;
				if ( ! empty( $history['description'] ) ):
					?>
                    <p class="description font-ibmplexmono font-normal text-para text-emperor dark:text-silver"><?php echo wp_kses_post( $history['description'] ); ?></p>
				<?php
				endif;
				?>
            </div>
        </div>
        <!-- Education item -->
	<?php
	endforeach;
endif;