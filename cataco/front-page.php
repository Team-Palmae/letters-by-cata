<?php get_header(); ?>

<?php if(have_posts()) : ?>
    <!-- start the loop -->
    <?php while(have_posts()) : the_post(); ?>
    <!-- <section class="container"> -->
    <?php the_content(); ?>
    <!-- </section> -->
    <?php endwhile; ?>
    <?php 
    $image_gallery = get_field('image_gallery'); 
    $size = 'medium';
    ?>
    <?php
        if ($image_gallery) : ?>
        <div class="home-gallery-content">
            <img src="<?php echo esc_url( $image_gallery['image_one']['url'] ); ?>" alt="<?php echo esc_attr( $hero['image_one']['alt'] ); ?>" />
            <img src="<?php echo esc_url( $image_gallery['image_two']['url'] ); ?>" alt="<?php echo esc_attr( $hero['image_two']['alt'] ); ?>" />
            <img src="<?php echo esc_url( $image_gallery['image_three']['url'] ); ?>" alt="<?php echo esc_attr( $hero['image_three']['alt'] ); ?>" />
        </div>
        <?php endif; ?>
    <!-- end while loop -->
    <?php else : ?>
<?php endif; ?>
</div>

<?php get_footer();?>