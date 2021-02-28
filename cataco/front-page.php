<?php get_header(); ?>

<?php if(have_posts()) : ?>
    <!-- start the loop -->
    <?php while(have_posts()) : the_post(); ?>
    <section>
        <?php the_content(); ?>
    </section>
    <?php endwhile; ?>
    <!-- end while loop -->
    <?php else : ?>
<?php endif; ?>

<?php get_footer();?>