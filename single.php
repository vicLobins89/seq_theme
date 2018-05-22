<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

					<div id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
							<?php if ( has_post_thumbnail()) : ?>
							<div class="featured-image">
								<?php the_post_thumbnail('full'); ?>
							</div>
							<?php endif; ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf wrap'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

							<header class="article-header entry-header">

							  <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

							  <p class="byline entry-meta vcard">

								<?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
								   /* the time the post was published */
								   '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
								   /* the author of the post */
								   '<span class="by">'.__( 'by', 'bonestheme' ).'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_meta( 'display_name' ) . '</span>'
								); ?>

							  </p>
								
								<div class="share-this">
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank" class="facebook">
										<i class="fab fa-facebook-f"></i>
									</a>
									
									<a href="https://twitter.com/home?status=<?php echo get_permalink(); ?>" target="_blank" class="twitter">
										<i class="fab fa-twitter"></i>
									</a>
									
									<a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank" class="google-plus">
										<i class="fab fa-google-plus-g"></i>
									</a>
									
									<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=" target="_blank" class="linked-in">
										<i class="fab fa-linkedin-in"></i>
									</a>
								</div>

							</header> <?php // end article header ?>

							<section class="entry-content cf" itemprop="articleBody">
							  <?php
								the_content();
							  ?>
							</section> <?php // end article section ?>
								
							<hr>

							<footer class="article-footer">

								<?php printf( __( '<p class="tags">Categories', '</p>', 'bonestheme' ).': %1$s', get_the_category_list(', '), '%2$s' ); ?>

								<?php the_tags( '<p class="tags">' . __( 'Tags:', 'bonestheme' ) . ' ', ', ', '</p>' ); ?>

								<?php comments_template(); ?>

								<?php bones_related_posts(); ?>
							
							</footer> <?php // end article footer ?>

						  </article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div>

				</div>

			</div>

<?php get_footer(); ?>
