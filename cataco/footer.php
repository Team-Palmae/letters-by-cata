			</div>
			<div class="mailing">
				<div class="heading-background">
					<h2>Mailing List Sign Up</h2>
				</div>

				<p>Want to get in on the shop updates, deals, and freebies?</p>
				<a class="btn popmake-258" href="<?php echo esc_url( home_url( '/' ) ); ?>/contact" id="signup">Sign Up Here</a>
			</div>
			<footer id="footer">
				<?php //dynamic_sidebar( 'footer_area_top' ); ?>
				<div class="footer-area-top">
					<div class="social-links">
						<a href="https://www.instagram.com/lettersbycataco/?hl=en">
							<img src="/lettersbycata/wp-content/uploads/2021/03/instagram.svg" alt="Instagram">
						</a>
		
						<a href="https://www.facebook.com/lettersbycataco">
							<img src="/lettersbycata/wp-content/uploads/2021/03/facebook.svg" alt="Facebook">
						</a>
		
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>/contact">
							<img src="/lettersbycata/wp-content/uploads/2021/03/envelope.svg" alt="Contact">
						</a>
					</div>
				</div>
				<div class="over-bottom">	
					<?php dynamic_sidebar( 'footer_area_bot' ); ?>
					<div id="copyright">
						<p>
							Letters by Cata Co. | Edmonton, Alberta CA.
						</p>
					</div>
				</div>
			</footer>
		</div>
	<?php wp_footer(); ?>
		<!-- <script type="text/javascript" src="https://apiv2.popupsmart.com/api/Bundle/362474" async></script> -->
	</body>
</html>
