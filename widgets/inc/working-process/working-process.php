<div class="md:col-span-2 lg:col-span-1 relative border-7 border-sienna rounded-3xl p-4 mr-12.5">
    <div class="absolute w-5 h-5 rounded-1/2 border-6 border-sienna bg-white dark:bg-shaft top-1/3 -right-3.5 before:absolute before:top-3.5 before:w-2 before:h-10 before:bg-white dark:before:bg-shaft"></div>
        <img src="<?php echo esc_url( plugins_url( 'hovard-core/widgets/images/arrow-red.png' ) ); ?>" alt="Arrow"
             class="absolute -right-[59px] top-2/5">
        <div class="rounded-lg2 shadow-custom4 bg-white px-5 pt-7.5 pb-8.5">

            <?php
            if ( ! empty( $settings['wp_icon'] ) ) {
                echo wp_kses_post( wp_get_attachment_image( $settings['wp_icon']['id'], 'thumbnail', '', [ 'class' => 'mb-5 mx-auto' ] ) );
            }
            ?>

            <h4 class="workp-title font-rufina font-bold text-title7 text-shaft text-center mb-2.5">
                <?php echo esc_html( $settings['wp_title'] ); ?>
            </h4>

            <p class="workp-desc font-ibmplexsans font-normal text-para text-emperor text-center">
                <?php echo esc_html( $settings['wp_desc'] ); ?>
            </p>
    </div>
</div>