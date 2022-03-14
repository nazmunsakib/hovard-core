    <!-- Portfolio Area -->
	<div x-data="{ tab: 'all'}">

		<div>
			<div class="p-tab-btn button-group filters-button-group flex gap-2.5 mb-7.5 pt-2.5">
				<button
					class="button is-checked font-ibmplexmono font-medium text-subtitle2 text-clay rounded-md border border-iron px-5 transition-all duration-300 hover:bg-sienna hover:text-white hover:border-white"
					@click.prevent="tab = 'all'" :class="{ 'active bg-sienna !text-white' : tab === 'all' }"
				>
					All
				</button>
                <?php
                $project_cat = get_terms( array(
	                'taxonomy' => 'portfolio_cat',
	                'hide_empty' => false,
                ) );

                foreach( $project_cat as $cat ):
                ?>
                    <button
                        class="button font-ibmplexmono font-medium text-subtitle2 text-clay rounded-md border border-iron px-5 transition-all duration-300 hover:bg-sienna hover:text-white hover:border-white"
                        @click.prevent="tab = '<?php echo esc_attr( $cat->slug ); ?>'" :class="{ 'active bg-sienna !text-white' : tab === '<?php echo esc_attr( $cat->slug ); ?>' }"
                    >
	                    <?php echo esc_html( $cat->name ); ?>
                    </button>
                <?php endforeach; ?>

			</div>

			<div class="projects-grid grid grid-cols-9 gap-5">
                <?php
                foreach ( $portfolios as $portfolio ):

                    $project_ids = ! empty( $portfolio['project_id'] ) ? $portfolio['project_id'] : 0;
                    $project = new WP_Query( array(
                        'post_type'      => 'portfolio',
                        'order'          => 'DESC',
                        'posts_per_page' => -1,
                        'p'              => $project_ids,
                    ) );

                    while ( $project->have_posts() ): $project->the_post();

                    $terms = get_the_terms(get_the_ID(), 'portfolio_cat');
                    if ( $terms && ! is_wp_error( $terms ) ){
                        $cat_arr = array();
	                    $terms_tabs = '';
                        $last_item = count($terms);
                        foreach ( $terms as $i => $term  ) {
                            $i = $i + 1;
	                        $cat_arr[] = $term->slug;
	                        $sep = $i == $last_item ? '' : '|| ';
	                        $terms_tabs .= "tab === '$term->slug' $sep";
                        }
                        $terms_class = join( " ", $cat_arr );
                        $terms_name = join( ", ", $cat_arr );
                    }

                ?>
                    <!-- Project item -->
                    <div class="project-item element-item col-span-<?php echo esc_attr( $portfolio['image_size'] ); ?> <?php echo esc_attr( $terms_class ); ?>" x-show="<?php echo esc_attr( $terms_tabs ); ?> || tab === 'all'">
                        <div class="group w-full h-full relative">
                            <?php the_post_thumbnail('full', ['class' => 'w-full h-full']);  ?>

                            <div
                                class="absolute left-0 bottom-0 right-0 w-full h-0 bg-oceangreen/60 flex flex-wrap items-center justify-center duration-500 ease-[ease] overflow-hidden group-hover:h-full"
                            >
                                <div class="text-center">
                                    <a href="#"><i class="ti-search inline-block bg-sienna text-white text-title9 rounded-sm border-4 border-sandrift px-4 py-3 mb-7.5"></i></a>
                                    <h4 class="font-rufina font-bold text-title4 text-rosewhite mb-2.5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p class="font-ibmplexmono font-normal text-para3 text-rosewhite"><?php echo esc_attr( ucwords( $terms_name ) ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                endforeach;
                ?>
			</div>
		</div>
	</div>
	<!-- Portfolio Area -->
