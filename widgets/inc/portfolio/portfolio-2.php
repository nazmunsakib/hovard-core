<!-- Portfolio Area -->

<div x-data="{ page: 'aboutTwo' }">
    <div x-data="{ tab: 'all'}">
        <div class="flex flex-wrap gap-3 md:gap-11 mb-6 -mt-2.5">

            <button
                    class="font-ibmplexmono font-medium text-subtitle2 text-shaft dark:text-silver transition-all duration-300 relative after:absolute after:left-0 after:bottom-1 after:w-0 after:h-[1px] after:bg-oceangreen after:transition-width after:duration-300 hover:after:w-full hover:text-oceangreen dark:hover:text-oceangreen active after:w-full text-oceangreen dark:text-oceangreen"
                    @click.prevent="tab = 'all'"
                    :class="{ 'active after:w-full text-oceangreen' : tab === 'all' }"
            >
	            <?php echo esc_html( ' All', 'hovard-core' ); ?>
            </button>

			<?php
			$project_cat = get_terms( array(
				'taxonomy'   => 'portfolio_cat',
				'hide_empty' => false,
			) );
			foreach ( $project_cat as $cat ):
				?>
                <button
                        class="font-ibmplexmono font-medium text-subtitle2 text-shaft dark:text-silver transition-all duration-300 relative after:absolute after:left-0 after:bottom-1 after:w-0 after:h-[1px] after:bg-oceangreen after:transition-width after:duration-300 hover:after:w-full hover:text-oceangreen dark:hover:text-oceangreen"
                        @click.prevent="tab = '<?php echo esc_attr( $cat->slug ); ?>'"
                        :class="{ 'active after:w-full text-oceangreen' : tab === '<?php echo esc_attr( $cat->slug ); ?>' }"
                >
					<?php echo esc_html( $cat->name ); ?>
                </button>
			<?php endforeach; ?>

        </div>

        <div class="gallery grid grid-cols-1 md:grid-cols-2 gap-x-7.5 gap-y-7.5 md:gap-y-12.5">

			<?php
			$project = new WP_Query( array(
				'post_type'      => 'portfolio',
				'post_status'    => 'publish',
				'orderby'        => 'DESC',
				'posts_per_page' => - 1,
			) );

			while ( $project->have_posts() ): $project->the_post();
				$terms = get_the_terms( get_the_ID(), 'portfolio_cat' );
				if ( $terms && ! is_wp_error( $terms ) ) {
					$cat_arr    = array();
					$terms_tabs = '';
					$last_item  = count( $terms );
					foreach ( $terms as $i => $term ) {
						$i          = $i + 1;
						$cat_arr[]  = $term->slug;
						$sep        = $i == $last_item ? '' : '|| ';
						$terms_tabs .= "tab === '$term->slug' $sep";
					}
					$terms_class = join( " ", $cat_arr );
					$terms_name  = join( ", ", $cat_arr );
				}
				?>

                <!-- Project item -->
                <div class="project-item col-span-1 <?php echo esc_attr( $terms_class ); ?>"
                     x-show="<?php echo esc_attr( $terms_tabs ); ?> || tab === 'all'">
                    <div class="rounded-lg2">
						<?php the_post_thumbnail( 'hovard_core_845x830' ); ?>
                        <div class="gallery__Details grid grid-cols-8 gap-5 md:gap-7.5 md:px-5 pt-6 pb-5">
                            <div class="col-span-8 md:col-span-5">
                                <h4 class="font-rufina font-bold text-subtitle6 text-shaft mb-4"><?php the_title(); ?></h4>
                                <p class="font-ibmplexmono font-normal text-para text-emperor xl:w-5/6">
									<?php the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="col-span-8 md:col-span-3">
                                <ul>
									<?php
									if ( function_exists( 'get_field' ) && have_rows( 'project_info' ) ):
										while ( have_rows( 'project_info' ) ): the_row();
											?>
                                            <li class="font-ibmplexmono font-normal text-para text-emperor mb-2.5 last:mb-0">
                                            <span class="font-medium text-shaft">
                                                <?php echo esc_html( get_sub_field( 'info_label' ) ); ?>:
                                            </span>
												<?php echo esc_html( get_sub_field( 'info_content' ) ); ?>
                                            </li>
										<?php
										endwhile;
									endif
									?>
                                    <li class="font-ibmplexmono font-normal text-para text-emperor mb-2.5 last:mb-0">
										<?php hovard_social_share(); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-wrap gap-2.5 justify-between items-center rounded-sm2 bg-white shadow-custom6 py-9 px-7.5 ml-5 mr-12.5 -mt-9 relative z-10">
                        <div>
                            <p class="font-ibmplexmono font-medium text-para text-sienna flex items-center gap-1">
								<?php echo esc_attr( ucwords( $terms_name ) ); ?>
                            </p>
                            <h4 class="font-rufina font-bold text-subtitle6 text-shaft mt-1.5">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                        </div>
                        <div>
                            <a @click.prevent
                               data-large="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full', [ 'class' => 'gallery__Image2' ] ) ); ?>"
                               class="gallery__Image2 inline-block py-3.5 px-4.5 bg-sienna text-white rounded-sm2"
                            ><i class="ti-plus"></i></a>
                        </div>
                    </div>
                </div>
			<?php
			endwhile;
			?>
        </div>
    </div>
</div>

<!-- Portfolio Area -->
