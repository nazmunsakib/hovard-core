<?php
$price     = ! empty( $settings['table_price'] ) ? $settings['table_price'] : '';
$ptitle    = ! empty( $settings['table_title'] ) ? $settings['table_title'] : '';
$pfeatures = ! empty( $settings['table_features'] ) ? $settings['table_features'] : '';
$pbtn_text = ! empty( $settings['table_btn_text'] ) ? $settings['table_btn_text'] : '';
$pbtn_url  = ! empty( $settings['table_btn_url'] ) ? $settings['table_btn_url'] : '';
?>
<!-- pricing item -->
<div class="pricing-table col-span-1 pt-12 relative">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-29.5 h-29.5 rounded-1/2 dark:border-solid dark:border-6 dark:border-cloud bg-white shadow-custom5 flex items-center justify-center z-10">
        <p class="font-rufina font-bold text-title15 text-shaft"> <?php echo esc_html( $price ); ?> </p>
    </div>
    <div class="bg-white dark:bg-mineshaft border border-pampas dark:border-mineshaft rounded-lg2 text-center px-7.5 2xl:px-12.5 pb-10 duration-300 ease-in-out hover:shadow-custom5 hover:border-transparent">
        <div class="title-bg bg-sienna pt-21 pb-3.5 relative overflow-hidden">
            <div class="absolute right-0 top-0 w-[200%] h-1/2 bg-white dark:bg-mineshaft -rotate-40"></div>
            <h4 class="font-rufina font-bold text-subtitle7 text-white"><?php echo esc_html( $ptitle ); ?></h4>
        </div>

        <ul class="py-6.5">
			<?php
			$features = explode( "\n", $pfeatures );
			foreach ( $features as $item ) {
				printf( "<li class='font-ibmplexmono font-normal text-para4 text-emperor dark:text-silver'>%s</li>", esc_html( $item ) );
			}
			?>
        </ul>

        <a href="<?php echo esc_url( $pbtn_url ); ?>"
           class="font-ibmplexmono font-medium text-subtitle text-white bg-sienna block rounded-sm2 py-3">
			<?php echo esc_html( $pbtn_text ); ?>
        </a>
    </div>
</div>