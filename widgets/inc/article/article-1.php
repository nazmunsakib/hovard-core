<!-- Blog Area -->
<div class="pt-10 lg:pt-12.5 xl:pt-17.5 pb-5 lg:pb-7.5 xl:pb-12.5">
    <div class="article_wrapper grid grid-cols-2 gap-x-7.5 gap-y-10 xl:gap-y-15 pt-2.5">

		<?php
		wp_enqueue_script( 'my_loadmore' );

		$post_args = new WP_Query( array(
			'post_type'      => 'post',
			'order'          => 'DESC',
			'posts_per_page' => $settings['posts_per_page'],
		) );

		while ( $post_args->have_posts() ): $post_args->the_post();
			$categories    = get_the_category( get_the_ID() );
			$category_list = join( ', ', wp_list_pluck( $categories, 'name' ) );
			?>

            <!-- Blog item -->
            <div <?php echo post_class( "md:col-span-1 col-span-2 relative z-10 pt-5" ); ?> >

                <a href="<?php get_the_permalink(); ?>"
                   class="hbcat-list absolute top-0 left-6 inline-block bg-oceangreen font-ibmplexmono font-medium text-para3 text-white rounded-[3px] py-1.5 px-2.5">
					<?php echo wp_kses_post( $category_list ); ?>
                </a>

                <a href=" <?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'hovard-box', [ "class" => "rounded-md" ] ); ?>
                </a>

                <div class="bg-white shadow-custom3 rounded-md mx-5 -mt-12.5 relative z-10 xl:px-7.5 px-5 xl:py-6 py-3.5">

                    <ul class="flex xl:flex-row flex-col gap-0 xl:gap-6">
                        <li class="flex items-center font-ibmplexmono font-normal xl:text-para4 text-para text-emperor">
                            <a href="#"><i class="ti-user text-sienna mr-2.5"></i></a><?php the_author_link(); ?>
                        </li>
                        <li class="flex items-center font-ibmplexmono font-normal xl:text-para4 text-para text-emperor">
                            <i class="ti-calendar text-sienna mr-2.5"></i> <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
                        </li>
                    </ul>

                    <h4 class="article-title font-rufina font-bold text-title10 text-shaft duration-300 ease-in-out mt-2.5 hover:text-oceangreen">
                        <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                    </h4>

                </div>

            </div>

		<?php
		endwhile;
		?>
        <div class="col-span-2 text-center pt-2.5">
            <a class="loade_more_btn font-ibmplexmono font-medium text-subtitle2 text-white bg-oceangreen rounded-sm2 inline-block py-2.5 xl:py-3.5 px-8.5 xl:px-13.5"
               href="#"><?php echo esc_html( 'Load More', 'hovard-core' ); ?></a>
        </div>
		<?php
		wp_reset_postdata();
		?>
    </div>

</div>
<!-- Blog Area -->
