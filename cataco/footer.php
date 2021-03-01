			</div>
			<footer id="footer">
				<nav id="menu">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				</nav>
				<div id="copyright">
					<p>&copy; <?php echo esc_html( date_i18n( __( 'Y', 'cataco' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?> | Edmonton, Alberta CA.</p>
				</div>
			</footer>
		</div>
	<?php wp_footer(); ?>
	</body>
</html>