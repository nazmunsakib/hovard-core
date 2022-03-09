<?php

add_image_size( 'hovard_370x300', 370, 300, true); // Screenshot carousel style 6
add_image_size( 'hovard_70x70', 70, 70, true); // Recent posts thumbnail
add_image_size( 'hovard_16x16', 16, 16, true); // Forums list widget forum thumbnail image
add_image_size( 'hovard_60x40', 60, 40, true); // Forums list widget forum thumbnail image
add_image_size( 'hovard_270x152', 270, 152, true); // Forums list widget forum thumbnail image
add_image_size( 'hovard_671x411', 671, 411, true); // Video Carousel Thumb Single
add_image_size( 'hovard_40x40', 40, 40, true); // Forum user image

/**
 * Elementor URL field output
 * @param $settings_key
 * @param bool $echo
 * @return string
 */
function hovard_el_btn( $settings_key, $echo = true ) {
    if ( $echo == true ) {
        echo $settings_key['is_external'] == true ? 'target="_blank"' : '';
        echo $settings_key['nofollow'] == true ? 'rel="nofollow"' : '';
        echo !empty($settings_key['url']) ? 'href="'.esc_url($settings_key['url']).'"' : '';
    } else {
        $output = $settings_key['is_external'] == true ? 'target="_blank"' : '';
        $output .= $settings_key['nofollow'] == true ? 'rel="nofollow"' : '';
        $output .= !empty($settings_key['url']) ? 'href="'.esc_url($settings_key['url']).'"' : '';
        return $output;
    }
}

// Icon Array
function hovard_icon_array($k, $replace = 'icon', $separator = '-') {
    $v = array();
    foreach ( $k as $kv ) {
        $kv = str_replace($separator, ' ', $kv);
        $kv = str_replace($replace, '', $kv);
        $v[] = array_push($v, ucwords($kv));
    }
    foreach($v as $key => $value) if($key&1) unset($v[$key]);
    return array_combine($k, $v);
}


// Social Share
function hovard_social_share() { ?>
    <div class="social_icon">
        <?php esc_html_e( 'share:', 'hovard-core') ?>
        <ul class="list-unstyled">
            <li><a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="social_facebook"></i></a></li>
            <li><a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>"><i class="social_twitter"></i></a></li>
            <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>"><i class="social_pinterest"></i></a></li>
            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><i class="social_linkedin"></i></a></li>
        </ul>
    </div>
    <?php
}

add_filter( 'gettext','hovard_enter_title');
function hovard_enter_title( $input ) {
    global $post_type;
    if( is_admin() && 'Enter title here' == $input && 'team' == $post_type )
        return 'Enter here the team member name';
    return $input;
}

// Category array
function hovard_cat_array($term = 'category') {
    $cats = get_terms( array(
        'taxonomy' => $term,
        'hide_empty' => true
    ));
    $cat_array = array();
    $cat_array['all'] = esc_html__( 'All', 'hovard-core');
    foreach ($cats as $cat) {
        $cat_array[$cat->slug] = $cat->name;
    }
    return $cat_array;
}

/**
 * Make slug text
 */
function hovard_get_slug( $text ) {
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

/**
 * Limit latter
 * @param $string
 * @param $limit_length
 * @param string $suffix
 */
function hovard_core_limit_latter($string, $limit_length, $suffix = '...' ) {
    if ( strlen($string) > $limit_length ) {
        echo strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
    } else {
        echo strip_shortcodes(esc_html($string));
    }
}

/**
 * Social Links
 */
function hovardcore_social_links() {
    $opt = get_option( 'hovard_opt' );
    ?>
    <?php if( !empty($opt['facebook'])) { ?>
        <li> <a href="<?php echo esc_url($opt['facebook']); ?>"><i class="social_facebook" aria-hidden="true"></i></a> </li>
    <?php } ?>

    <?php if( !empty($opt['twitter'])) { ?>
        <li> <a href="<?php echo esc_url($opt['twitter']); ?>"><i class="social_twitter" aria-hidden="true"></i></a> </li>
    <?php } ?>

    <?php if( !empty($opt['instagram'])) { ?>
        <li> <a href="<?php echo esc_url($opt['instagram']); ?>"><i class="social_instagram" aria-hidden="true"></i></a> </li>
    <?php } ?>

    <?php if( !empty($opt['linkedin'])) { ?>
        <li> <a href="<?php echo esc_url($opt['linkedin']); ?>"><i class="social_linkedin" aria-hidden="true"></i></a> </li>
    <?php } ?>

    <?php if( !empty($opt['youtube'])) { ?>
        <li> <a href="<?php echo esc_url($opt['youtube']); ?>"><i class="social_youtube" aria-hidden="true"></i></a> </li>
    <?php } ?>

    <?php if( !empty($opt['github'])) { ?>
        <li> <a href="<?php echo esc_url($opt['github']); ?>"><i class="social_github" aria-hidden="true"></i></a> </li>
    <?php } ?>

    <?php if( !empty($opt['dribbble'])) { ?>
        <li> <a href="<?php echo esc_url($opt['dribbble']); ?>"><i class="social_dribbble" aria-hidden="true"></i></a> </li>
    <?php }
}

/**
 * Day link to archive page
 **/
function hovardcore_day_link() {
    $archive_year   = get_the_time( 'Y' );
    $archive_month  = get_the_time( 'm' );
    $archive_day    = get_the_time( 'd' );
    echo get_day_link( $archive_year, $archive_month, $archive_day);
}

/**
 * Post Share Options
 */
function hovardcore_social_share() {
	$opt = get_option('hovard_opt' );
	$is_social_share = isset($opt['is_social_share']) ? $opt['is_social_share'] : '';
	if ( $is_social_share == '1' ) :
		?>
        <div class="blog_social text-center">
			<?php if ( !empty($opt['share_title']) ) : ?>
                <h5><?php echo wp_kses_post($opt['share_title']) ?></h5>
			<?php endif; ?>
            <ul class="list-unstyled f_social_icon">
                <li><a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="social_facebook"></i></a></li>
                <li><a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank"><i class="social_twitter"></i></a></li>
                <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank"><i class="social_pinterest"></i></a></li>
                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>" target="_blank"><i class="social_linkedin"></i></a></li>
            </ul>
        </div>
	<?php
	endif;
}


// Arrow icon left right position
function hovardcore_arrow_left_right() {
    $arrow_icon = is_rtl() ? 'arrow_left' : 'arrow_right';
    echo esc_attr($arrow_icon);
}


/**
 * Elementor Title tags
 */
function hovard_el_title_tags() {
    return [
        'h1'  => __( 'H1', 'hovard-core' ),
        'h2' => __( 'H2', 'hovard-core' ),
        'h3' => __( 'H3', 'hovard-core' ),
        'h4' => __( 'H4', 'hovard-core' ),
        'h5' => __( 'H5', 'hovard-core' ),
        'h6' => __( 'H6', 'hovard-core' ),
        'div' => __( 'Div', 'hovard-core' ),
        'span' => __( 'Span', 'hovard-core' ),
        'p' => __( 'Paragraph', 'hovard-core' ),
    ];
}


/**
 * Get Default Image Elementor
 * @param $settins_key
 * @param string $class
 * @param string $alt
 */
function hovard_el_image( $settings_key = '', $alt = '', $class = '', $atts = [] ) {
    if ( !empty($settings_key['id']) ) {
        echo wp_get_attachment_image( $settings_key['id'], 'full', '', array('class' => $class) );
    }
    elseif ( !empty($settings_key['url']) && empty($settings_key['id']) ) {
        $class = !empty($class) ? "class='$class'" : '';
        $attss = '';
        //echo print_r($atts);
        if ( !empty($atts) ) {
            foreach ( $atts as $k => $att ) {
                $attss .= "$k=". "'$att'";
            }
        }
        echo "<img src='{$settings_key['url']}' $class alt='$alt' $attss>";
    }
}

/**
 * Docs array
 *
 * @param string Post Type
 */
function hovard_get_posts( $post_type = 'docs' ) {
    $docs  = get_pages(
        array(
            'post_type' => $post_type,
            'parent' => 0,
        ));
    $docs_array = [];
    if ( $docs ) {
        foreach ($docs as $doc) {
            $docs_array[$doc->ID] = $doc->post_title;
        }
    }

    return $docs_array;
}

if ( !function_exists('wedocs_get_breadcrumb_item') ) {
    function wedocs_get_breadcrumb_item($label, $permalink, $position = 1)
    {
        return '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="' . esc_attr($permalink) . '">
            <span itemprop="name">' . esc_html($label) . '</span></a>
            <meta itemprop="position" content="' . $position . '" />
        </li>';
    }
}

/**
 * @param string $post_type
 * @param int $limit
 * @param string $search
 * @return array
 */
function hovard_get_query_post_list($post_type = 'any', $limit = -1, $search = '')
{
    global $wpdb;
    $where = '';
    $data = [];

    if (-1 == $limit) {
        $limit = '';
    } elseif (0 == $limit) {
        $limit = "limit 0,1";
    } else {
        $limit = $wpdb->prepare(" limit 0,%d", esc_sql($limit));
    }

    if ('any' === $post_type) {
        $in_search_post_types = get_post_types(['exclude_from_search' => false]);
        if (empty($in_search_post_types)) {
            $where .= ' AND 1=0 ';
        } else {
            $where .= " AND {$wpdb->posts}.post_type IN ('" . join("', '",
                    array_map('esc_sql', $in_search_post_types)) . "')";
        }
    } elseif (!empty($post_type)) {
        $where .= $wpdb->prepare(" AND {$wpdb->posts}.post_type = %s", esc_sql($post_type));
    }

    if (!empty($search)) {
        $where .= $wpdb->prepare(" AND {$wpdb->posts}.post_title LIKE %s", '%' . esc_sql($search) . '%');
    }

    $query = "select post_title,ID  from $wpdb->posts where post_status = 'publish' $where $limit";
    $results = $wpdb->get_results($query);
    if (!empty($results)) {
        foreach ($results as $row) {
            $data[$row->ID] = $row->post_title;
        }
    }
    return $data;
}

/**
 * Get all elementor page templates
 *
 * @param  null  $type
 *
 * @return array
 */
function hovard_get_el_templates($type = null)
{
    $options = [];

    if ($type) {
        $args = [
            'post_type' => 'elementor_library',
            'posts_per_page' => -1,
        ];
        $args['tax_query'] = [
            [
                'taxonomy' => 'elementor_library_type',
                'field' => 'slug',
                'terms' => $type,
            ],
        ];

        $page_templates = get_posts($args);

        if (!empty($page_templates) && !is_wp_error($page_templates)) {
            foreach ($page_templates as $post) {
                $options[$post->ID] = $post->post_title;
            }
        }
    } else {
        $options = hovard_get_query_post_list('elementor_library');
    }

    return $options;
}

/**
 * Post order order by
 */
function hovard_order_by() {
    $orderby = [
        'none' => esc_html__('None', 'hovard-core'),
        'ID' => esc_html__('ID', 'hovard-core'),
        'author' => esc_html__('Author', 'hovard-core'),
        'title' => esc_html__('Title', 'hovard-core'),
        'name' => esc_html__('Name', 'hovard-core'),
        'type' => esc_html__('Type', 'hovard-core'),
        'date' => esc_html__('Date', 'hovard-core'),
        'modified' => esc_html__('Modified', 'hovard-core'),
        'parent' => esc_html__('Parent', 'hovard-core'),
        'rand' => esc_html__('Random', 'hovard-core'),
        'comment_count' => esc_html__('Comment Count', 'hovard-core'),
        'relevance' => esc_html__('Relevance', 'hovard-core'),
        'menu_order' => esc_html__('Menu Order', 'hovard-core'),
    ];
    return $orderby;
}

/**
 * Enables the Excerpt meta box in post type edit screen.
 */
function hovard_doc_excerpt_support() {
    add_post_type_support( 'docs', 'excerpt' );
}
add_action( 'init', 'hovard_doc_excerpt_support' );


function changelog_title_placeholder( $title ){

    $screen = get_current_screen();

    if ( 'changelog' == $screen->post_type ){
        $title = esc_html__( 'Add Version', 'hovard-core' );
    }

    return $title;
}

add_filter( 'enter_title_here', 'changelog_title_placeholder' );


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );