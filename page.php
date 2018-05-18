<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<div id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								
								<?php // HERO AREA ?>
								<?php if ( has_post_thumbnail()) : ?>
								<div class="featured-image">
									<?php the_post_thumbnail('full'); ?>
									<?php
									if( get_field('hero_text') ) {
										echo '<div class="page-title">';
										the_field('hero_text');
										echo '</div>';
									} else {
										echo '<div class="page-title">
												<h1 itemprop="headline">'.get_the_title().'</h1>
											</div>';
									}
									?>
								</div>
								<?php endif; ?>
								
								
								<?php // MAIN CONTENT ?>
								<?php if( !empty(get_the_content()) ) : ?>
									<section class="entry-content wrap cf" itemprop="articleBody">
										<?php the_content(); ?>
									</section>
								<?php endif; ?>
								
								
								<?php // RELEASES ?>
								<?php if( have_rows('releases') ): ?>
									<div class="releases wrap">
										<h2><?php the_field('heading'); ?></h2>
										<hr>
									<?php while( have_rows('releases') ): the_row(); ?>
										<div class="col-12 cf">
											<div class="col-6">
												<h4><?php the_sub_field('date'); ?></h4>
												<p class="title"><?php the_sub_field('title'); ?></p>
											</div>
											<div class="col-6"><p><?php the_sub_field('details'); ?></p></div>
										</div>
										<hr>
									<?php endwhile; ?>
									</div>
								<?php endif; ?>
								
								
								<?php // TEAM MEMBERS ?>
								<?php if( have_rows('team') ): ?>
									<div class="team-carousel cf">
									<?php while( have_rows('team') ): the_row(); ?>
										<div class="carousel-item">
											<img src="<?php the_sub_field('photo'); ?>" alt="<?php the_sub_field('name'); ?>">
											<h4><?php the_sub_field('name'); ?></h4>
											<p><?php the_sub_field('position'); ?></p>
										</div>
									<?php endwhile; ?>
									</div>
								<?php endif; ?>
								
								
								<?php // COLUMNS CONTENT ?>
								<?php if( have_rows('rows') ): ?>
									<?php while( have_rows('rows') ): the_row(); ?>
										
										<section class="row cf<?php 
														if( get_sub_field('gradient') ) echo ' grad-alt';
														if( !get_sub_field('features_on') ) echo ' wrap';
														?>">

										<?php if( get_sub_field('column_size') == '1col' ) : ?>

											<?php if( !get_sub_field('features_on') ) : ?>
												<div class="col-12"><?php the_sub_field('col1'); ?></div>
											<?php else : ?>
												<div class="features-outer grad cf">
													<div class="features-inner wrap cf">
														<h2 class="features-title"><?php the_sub_field('features_title'); ?></h2>
														<?php if( have_rows('features_list') ): ?>
														<ol>
															<?php while( have_rows('features_list') ): the_row(); ?>
																<li><p><?php echo get_sub_field('feature'); ?></p></li>
															<?php endwhile; ?>
														</ol>
														<?php endif; ?>
													</div>
												</div>
											<?php endif; ?>

										<?php elseif( get_sub_field('column_size') == '2col' ) : ?>

											<div class="cf col-6 <?php if( in_array('left', get_sub_field('gradient')) ) echo 'grad'; ?>">
												<?php the_sub_field('col2_a'); ?>
											</div>

											<div class="cf col-6 <?php if( in_array('right', get_sub_field('gradient')) ) echo 'grad'; ?>">
												<?php the_sub_field('col2_b'); ?>
											</div>

										<?php elseif( get_sub_field('column_size') == '3col' ) : ?>

											<div class="col-4">
												<?php the_sub_field('col3_a'); ?>
											</div>

											<div class="col-4">
												<?php the_sub_field('col3_b'); ?>
											</div>

											<div class="col-4">
												<?php the_sub_field('col3_c'); ?>
											</div>

										<?php elseif( get_sub_field('column_size') == '4col' ) : ?>

											<div class="col-3">
												<?php the_sub_field('col4_a'); ?>
											</div>

											<div class="col-3">
												<?php the_sub_field('col4_b'); ?>
											</div>

											<div class="col-3">
												<?php the_sub_field('col4_c'); ?>
											</div>

											<div class="col-3">
												<?php the_sub_field('col4_d'); ?>
											</div>

										<?php endif; ?>

										<?php
											if( get_sub_field('divider') ) {
												echo '<hr>';
											}
										?>
											
										</section>
									<?php endwhile; ?>
								<?php endif; ?>
								
								
								<?php // BLOG HIGHLIGHTS (IF HOME PAGE) ?>
								<?php if ( is_front_page() ) : ?>
									<?php query_posts( array(
										'category_name'  => 'featured',
										'posts_per_page' => -1
									) ); ?>
								
									<?php if ( have_posts() ) : ?>
										<div class="wrap"><h4>Insights and articles...</h4></div>
										<div class="news-carousel cf">
										<?php while ( have_posts() ) : the_post(); ?>
											<div class="carousel-item">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumb">
													<?php the_post_thumbnail('rectangle-thumb-s'); ?>
												</a>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-title">
													<?php the_title(); ?>
												</a>
												<?php the_excerpt(); ?>
											</div>
										<?php endwhile; ?>
										</div>
										<div class="wrap">
											<hr>
										</div>
									<?php endif; ?>
									<?php wp_reset_query(); ?>
								<?php endif; ?>
								
								
								<?php // PRE-FOOTER ?>
								<?php if( !empty(get_field('pre_footer')) ) : ?>
									<section class="pre-footer wrap cf">
										<?php if( !empty(get_field('pre_footer_media')) ) : ?>
											<div class="col-6"><?php the_field('pre_footer_media') ?></div>
											<div class="col-6"><?php the_field('pre_footer') ?></div>
										<?php else : ?>
											<div class="col-12"><?php the_field('pre_footer') ?></div>
										<?php endif; ?>
									</section>
								<?php endif; ?>

							</article>

							<?php endwhile; endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
