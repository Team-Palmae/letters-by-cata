<?php get_header(); ?>
<main id="content">
	<article id="post-0" class="post not-found">
	<div class="heading-background">
        <h2><?php esc_html_e( 'Oops!', 'cataco' ); ?></h2>
    </div>
	<div class="error-content">
		<p><?php esc_html_e( 'The page you are looking for cannot be found.', 'cataco' ); ?></p>
		<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a>
	</div>
	</article>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
