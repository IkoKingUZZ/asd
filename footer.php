			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<div id="footer-widgets" class="twelvecol">
						<?php
						if(is_active_sidebar('footer-widgets')){
						dynamic_sidebar('footer-widgets');
						}?>
					</div>

					<div class="footer-bottom clearfix">
						<p class="source-org copyright">
							&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'title' ); ?>
							<span id="copyright-message"><?php echo get_theme_mod( 'creepy_footer_copyright_text' ); ?></span>
						</p>

						<p class="creepy"><a href="https://www.wptheme.us/cat/igry/">Игровые шаблоны Wordpress</a></p>
					</div>

				</div> <?php // end #inner-footer ?>

				<div class='creepy-footer-border creepy-3d-border wrap'>
					<span class="border-left"></span><span class="border-middle"><span></span></span><span class="border-right"></span>
				</div> 


			</footer> <?php // end footer ?>

		</div> <?php // end #container ?>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <?php // end page. what a ride! ?>
