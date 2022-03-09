<?php
    if ($resume_histories):
    foreach ($resume_histories as $history):
?>
    <!-- Education item -->
    <div class="grid grid-cols-9 gap-7.5">
        <div class="col-span-2 text-right">
            <?php if(!empty($history['institution'])): ?>
                <h5 class="institution font-rufina font-bold text-shaft text-subtitle4"> <?php echo esc_html($history['institution']); ?></h5>
	        <?php
                endif;
                if(!empty($history['st_en_year'])):
            ?>
                <span class="st-en-year font-ibmplexmono font-medium text-subtitle text-emperor"><?php echo esc_html($history['st_en_year']); ?></span>
            <?php
                endif;
            ?>
        </div>
        <div class="history-bar col-span-1 relative z-10 before:absolute before:top-3 before:left-1/2 before:-translate-x-1/2 before:block before:w-1 before:h-full before:bg-oceangreen before:-z-10">
            <span class="circle w-4 h-4 rounded-1/2 border-4 border-oceangreen bg-white block mx-auto mt-3 z-20"></span>
        </div>
        <div class="col-span-6 pb-10">
	        <?php if(!empty($history['designation'])): ?>
                <h5 class="designation font-rufina font-bold text-shaft text-title8"><?php echo esc_html($history['designation']); ?></h5>
	        <?php
	            endif;
	            if(!empty($history['description'])):
	        ?>
                <p class="description font-ibmplexmono font-normal text-para text-emperor"><?php echo wp_kses_post($history['description']); ?></p>
            <?php
	            endif;
		    ?>
        </div>
    </div>
    <!-- Education item -->
<?php
    endforeach;
    endif;
?>