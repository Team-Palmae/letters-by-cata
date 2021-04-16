
<?php get_header(); ?>
<main id="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="heading-background">
			<h2 class="entry-title"><?php the_title(); ?></h2> <?php edit_post_link(); ?>
		</div>
		<!-- Incase any gallerys are made and don't use gallery.php as the template -->
		<!-- The rest of this code can be edited in the future from functions.php as well as gallery.php and here -->
		<?php if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :
		
			$gallery_ids = $gallery['ids'];
			$gallery_ids = explode(',', $gallery_ids);
		?>
			<div class="gallery">
				<?php foreach ( $gallery_ids as $id ) { 
					$post_meta = get_post_from_id($id);
				?>
					<div class="gallery-image">
						<img loading="lazy" src="<?php echo $post_meta['src'] ?>" alt=" <?php if ($post_meta['caption'] != "") { echo $post_meta['caption']; } else { ?> Gallery Image <?php } ?> ">
						<?php if ($post_meta['caption'] != "") { ?>
							<span class="caption"><?php echo $post_meta['caption'] ?></span>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		<?php else : ?>
			<div class="entry-content">
			
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					
				<?php the_content(); ?>
						
			</div>
		<?php endif; ?>
	</article>
	<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
	<?php endwhile; endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>