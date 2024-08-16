<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="ninecol first clearfix single" role="main">

						<div class="inner-bg">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<?php the_post_thumbnail('magicraft-single', array('class' => 'magicraft-single-thumb')); ?>

								<header class="article-header">

									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
									<p class="byline vcard">
										<span class="author">author:&nbsp;<?php echo bones_get_the_author_posts_link(); ?></span> <time class="time-posted" datetime="<?php the_time('Y-m-d G:i'); ?>">posted:&nbsp;<?php the_date(); ?></time> 
										<span class="post-category">categories:&nbsp;<?php the_category(', '); ?></span>
									</p>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer">
									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> <?php // end article footer ?>

								<?php comments_template(); ?>

							</article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
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

						</div> <?php // end .inner-bg ?>

						<div class="creepy-content-border creepy-3d-border"><span class="border-left"></span><span class="border-middle"><span></span></span><span class="border-right"></span></div>

					</div> <?php // end #main ?>

					<?php get_sidebar(); ?>

				</div> <?php // end #inner-content ?>

				<div class='creepy-main-border creepy-3d-border wrap'>
					<span class="border-left"></span><span class="border-middle"><span></span></span><span class="border-right"></span>
				</div> 

			</div> <?php // end #content ?>

<?php get_footer(); ?>
