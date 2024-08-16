<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="ninecol first clearfix" role="main">

						<div class="inner-bg">

						<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post();
						if ( has_post_thumbnail() ) {
						?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<div class="article-img"> <?php the_post_thumbnail('magicraft-post', array('class' => 'magicraft-post-thumb')); ?></div>

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

									<footer class="article-footer">
										<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

									</footer> <?php // end article footer ?>

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


								<?php if (function_exists('bones_page_navi')) { ?>
										<?php bones_page_navi(); ?>
								<?php } else { ?>
										<nav class="wp-prev-next">
												<ul class="clearfix">
													<li class="prev-link"><?php next_posts_link( __( 'Starší příspěvky', 'bonestheme' )) ?></li>
													<li class="next-link"><?php previous_posts_link( __( 'Novější příspěvky', 'bonestheme' )) ?></li>
												</ul>
										</nav>
								<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<?php get_search_form( ); ?>
											<p><?php _e( 'Probably there was a creeper before you and blew it up.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php  _e( 'Try again for something similar?', 'bonestheme' ); ?></p>
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
