<?php
add_shortcode( 'code', function( $atts, $content ) {
    ob_start();

	$atts = shortcode_atts( array(
        'theme' => 'prism',
        'lang' => 'markup',
	), $atts );

	$theme = !empty($atts['theme']) ? $atts['theme'] : 'prism';

    if ( !empty($content) ) : ?>
        <div class="hovard-source-code <?php echo $theme ?>" data-lng-type="<?php echo esc_attr($atts['lang']) ?>">
            <pre>
                <code class="language-<?php echo esc_attr($atts['lang']) ?>">
                    <?php
                    if ( $atts['lang'] == 'CSS' || $atts['lang'] == 'css' || $atts['lang'] == 'js' || $atts['lang'] == 'JS' ) {
	                    echo str_replace('<br />', ' ', $content );
                    } else {
	                    echo esc_html( $content );
                    }
                    ?>
                </code>
            </pre>
        </div>
        <?php
    endif;
    $html = ob_get_clean();
    return $html;
});