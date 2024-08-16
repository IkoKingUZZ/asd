<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="ninecol first clearfix" role="main">

						<?php if( true === get_theme_mod( 'creepy_display_slider' ) ) { ?>

							<div class="cleafix twelvecol slider-wrap">

							<div class="inner-bg">

							<?php

								// Get 'slider' posts
								$slides = get_posts( array(
									'post_type' => 'slider',
									'posts_per_page' => 6, // Unlimited posts
									'orderby' => 'date', // Order by date published
									'order' => 'DESC',
								) );
								?>

								<?php 

								if ( count($slides) == 1 ){
									?>
									<div class="one-slide">
									<?php 
										foreach ( $slides as $post ): 
										setup_postdata($post);
										
										// Resize and CDNize thumbnails using Automattic Photon service
										$url = null;
										if ( has_post_thumbnail($post->ID) ) {
											$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'magicraft-slider' );
											$url = $src[0];
										}
										?>

										<div class="slide" style="background-image:url(<?=$url?>)">
											<div class="slider-content">
												<?php the_content(); ?>
											</div>
										</div><!-- /.slide -->

										<?php endforeach; ?>

									</div>
									<?php
								}else{
								?>
								<div class="slider">
						 			<ul class="slides">

									<?php
									if ( $slides){
									?>		

										<?php 
										foreach ( $slides as $post ): 
										setup_postdata($post);
										
										// Resize and CDNize thumbnails using Automattic Photon service
										$url = null;
										if ( has_post_thumbnail($post->ID) ) {
											$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'magicraft-slider' );
											$url = $src[0];
										}
										?>

										<li class="slide" style="background-image:url(<?=$url?>)">
											<div class="slider-content">
												<?php the_content(); ?>
											</div>
										</li><!-- /.slide -->

										<?php endforeach; ?>

									<?php } else { //When Slider is active, but no slides have been made yet. ?>

										<li class="slide" style="background-color:#5e372c;">
											<div class="slider-content">
												<h1>Activate Slider</h1>
												Insert some slides first
											</div>
										</li><!-- /.slide -->

										<li class="slide" style="background-color:#5e372c;">
											<div class="slider-content">
												<h1>Activate Slider</h1>
												Insert some slides first
											</div>
										</li><!-- /.slide -->
									<?php } ?>

								  	</ul>
								</div>
								<?php
								} // end else solo slide?>

							</div> <?php // end .inner-bg ?>

							<div class="creepy-content-border creepy-3d-border"><span class="border-left"></span><span class="border-middle"><span></span></span><span class="border-right"></span></div>

							</div><?php // end .slider-wrap ?>

							<?php }
							 // end if ?>

						<div class="inner-bg twelvecol">

						<?php if (have_posts()) : while (have_posts()) : the_post();
						if ( has_post_thumbnail() ) {
						?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<div class="article-img"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('magicraft-post', array('class' => 'magicraft-post-thumb')); ?></a></div>

								<div class="article-post">

									<header class="article-header">
										<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										<p class="byline vcard">
											<span class="author">author:&nbsp;<?php echo bones_get_the_author_posts_link(); ?></span> <span class="comment-number"><?php echo comments_number( 'no comments', '1 comment', '% comments' ); ?></span>
										</p>

									</header> <?php // end article header ?> 

									<section class="entry-content clearfix">
										<?php the_excerpt(); ?> 
									</section> <?php // end article section ?>

								</div> <?php // end .article-post ?>

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article> <?php // end article ?>
						<?php }else { // Doesnt have post thumbnail ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<div class="twelvecol">

									<header class="article-header">
										<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										<p class="byline vcard">
											<span class="author">author:&nbsp;<?php echo bones_get_the_author_posts_link(); ?></span> <span class="comment-number"><?php echo comments_number( 'no comments', '1 comment', '% comments' ); ?></span>
										</p>

									</header> <?php // end article header ?> 

									<section class="entry-content clearfix">
										<?php the_excerpt(); ?> 
									</section> <?php // end article section ?>

									<footer class="article-footer">
										<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

									</footer> <?php // end article footer ?>

								</div> <?php // end .article-post ?>

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article> <?php // end article ?>

						<?php } ?>

						<?php endwhile; ?>

								<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
										<?php bones_page_navi(); ?>
								<?php } else { ?>
										<nav class="wp-prev-next">
												<ul class="clearfix">
													<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
													<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
												</ul>
										</nav>
								<?php } ?>

						<?php else : ?>

								<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
									</footer>
								</article>

						<?php endif; ?>

					</div> <?php //end .inner-bg ?>

					<div class="creepy-content-border creepy-3d-border"><span class="border-left"></span><span class="border-middle"><span></span></span><span class="border-right"></span></div>

				</div> <?php // end #main ?>

				<?php get_sidebar(); ?>

				</div> <?php // end #inner-content ?>

				<div class='creepy-main-border creepy-3d-border wrap'>
					<span class="border-left"></span><span class="border-middle"><span></span></span><span class="border-right"></span>
				</div> 

			</div> <?php // end #content ?>

<?php get_footer(); ?>
