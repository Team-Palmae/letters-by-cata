<?php get_header(); ?>
<main id="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="heading-background">
			<h2 class="entry-title"><?php the_title(); ?></h2> <?php edit_post_link(); ?>
		</div>
		<?php if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :

			$gallery_ids = $gallery['ids'];
			$gallery_ids = explode(',', $gallery_ids);
		?>
			<div class="gallery">
				<?php //foreach ( $gallery['src'] as $src ) { ?>
					<!-- <div class="gallery-image">
						<img loading="lazy" src="<?php echo $src; ?>" alt="gallery image">
					</div> -->
				<?php //} ?>
				<?php foreach ( $gallery_ids as $id ) { 
					$attachment_meta = wp_get_attachment($id);
				?>
					<div class="gallery-image">
						<img loading="lazy" src="<?php echo $attachment_meta['src'] ?>" alt=" <?php if ($attachment_meta['caption'] != "") { echo $attachment_meta['caption']; } else { ?> Gallery Image <?php } ?> ">
						<?php if ($attachment_meta['caption'] != "") { ?>
							<span class="caption"><?php echo $attachment_meta['caption'] ?></span>
						<?php } ?>
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