<?php
use Elementor\Plugin;
$active_tab = strtolower( str_replace(" ", "_", $tabs[0]['tab_title'] ));
?>
<div x-data="{ page: '<?php echo esc_attr( $active_tab ); ?>' }" class="tab_shortcode">
    <ul class="flex justify-between gap-2">
        <?php
        foreach ( $tabs as $item ) :
            $tab_btn_id = strtolower( str_replace(" ", "_", $item['tab_title'] ) );
        ?>
            <li>
                <a class="font-ibmplexmono font-medium text-subtitle text-shaft flex items-center justify-center gap-2 px-8 py-3 border border-iron rounded-md transition-all hover:bg-oceangreen hover:text-white hover:border-oceangreen"
                    :class="{ 'active !text-white border-oceangreen bg-oceangreen': page === '<?php echo esc_attr( $tab_btn_id ); ?>' }"
                    @click.prevent="page = '<?php echo esc_attr( $tab_btn_id ); ?>'" href="#" >
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?> <?php echo wp_kses_post($item['tab_title']); ?>
                </a>
            </li>
            <?php
        endforeach;
        ?>
    </ul>
        <?php
        foreach ( $tabs as $item ) :
	        $tab_content_id = strtolower( str_replace(" ", "_", $item['tab_title'] ) );
        ?>
            <div x-show="page === '<?php echo esc_attr( $tab_content_id ); ?>'">
	            <?php
	            if ( 'content' == $item['tabs_content_type'] ) {
		            echo do_shortcode( $item['tab_content'] );
	            } elseif ( 'template' == $item['tabs_content_type'] ) {
		            if ( ! empty( $item['primary_templates'] ) ) {
			            echo Plugin::$instance->frontend->get_builder_content($item['primary_templates'], true);
		            }
	            }
	            ?>
            </div>
            <?php
        endforeach;
        ?>
    </div>