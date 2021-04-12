<?php
/**
 * Template name: Gallery Display
 * @package cataco
 * @since 1.0
*/
get_header(); ?>
<!-- Template for displaying pages with a gallery -->
<!-- Currently being used for the gallery and about pages -->
<main id="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="heading-background">
			<h2 class="entry-title"><?php the_title(); ?></h2> <?php edit_post_link(); ?>
		</div>
        <?php if ($pagename == 'about') : ?>
            <?php 
                $block_one = get_field('block_one');
                $top_text = get_field('top_text');
                $main_image = get_field('main_image');
                $bottom_text = get_field('bottom_text');
            ?>
            <div class="about_page">
                <?php echo $top_text; ?>
                <img class="about-image about-main-image" src="<?php echo esc_url( $main_image['url'] ); ?>" alt="<?php echo esc_attr( $main_image['alt'] ); ?>" />
                <?php echo $bottom_text; ?>
            </div>
        <?php endif; ?>
        <!-- In case this is added on any pages that don't use a gallery -->
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

<?php get_footer(); ?>