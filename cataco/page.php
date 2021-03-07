<?php get_header(); ?>
<main id="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="heading-background">
			<h2 class="entry-title"><?php the_title(); ?></h2> <?php edit_post_link(); ?>
		</div>
		<div class="entry-content">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			<?php echo get_post_format(get_the_ID()); ?>
			<?php //if ( 'Gallery' == get_the_title() ) : ?>
				<!-- <p>Working</p> -->
			<?php if ( $gallery = get_post_gallery( get_the_ID(), false ) ) : ?>
				<p>Working</p>
				<?php foreach ( $gallery['src'] as $src ) { ?>
					<img src="<?php echo $src; ?>" alt="gallery image">
				<?php } ?>
			<?php else : ?>
				<?php the_content(); ?>
				<!-- <div class="entry-links">
					<?php //wp_link_pages(); ?>	
				</div> -->
			<?php endif; ?>
		</div>
	</article>
	<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
	<?php endwhile; endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>