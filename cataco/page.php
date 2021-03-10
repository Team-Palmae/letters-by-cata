<?php get_header(); ?>
<main id="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="heading-background">
			<h2 class="entry-title"><?php the_title(); ?></h2> <?php edit_post_link(); ?>
		</div>
		<?php if ( $gallery = get_post_gallery( get_the_ID(), false ) ) : ?>
			<?php print_r($gallery) ?>
			<div class="gallery">
				<?php foreach ( $gallery['src'] as $src ) { 
					$attachment_meta = wp_get_attachment($src);
					print_r($attachment_meta);
				?>
					<!-- <div class="gallery-image">
						<img loading="lazy" src="<?php echo $src; ?>" alt="gallery image">
					</div> -->
					<div class="gallery-image">
						<img loading="lazy" src="<?php echo $attachment_meta['src'] ?>" alt="gallery image">
						<p><?php echo $attachment_meta['caption'] ?></p>
					</div>
				<?php } ?>
			</div>
		<?php else : ?>
			<div class="entry-content">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				<?php the_content(); ?>
				<!-- <div class="entry-links">
					<?php //wp_link_pages(); ?>	
				</div> -->
			</div>
		<?php endif; ?>
	</article>
	<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
	<?php endwhile; endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>