<?php get_header(); ?>

<?php if(have_posts()) : ?>
    <!-- start the loop -->
    <?php 
        $call_to_action = get_field('call_to_action');
        $call_text = $call_to_action['call_to_action_text'];
        $call_button_link = $call_to_action['call_button_link'];

        $home_shop = get_field('home_shop'); 
        $shop_text = $home_shop['shop_text'];
        $shop_button_text = $home_shop['shop_button_label'];

        $home_services = get_field('home_services'); 
        $services_text = $home_services['services_text'];
        $services_button_text = $home_services['services_button_label'];

        $home_about = get_field('home_about'); 
        $about_text = $home_about['about_text'];
        $about_button_text = $home_about['about_button_label'];
    ?>
    <?php if ($call_to_action) : ?>
        <div class="home-opener">
            <p class="call-to-action"><?php echo $call_text; ?></p>
            <a class="btn" href="<?php echo esc_url( home_url( '/' ) ) ?>">
                <?php print_r($call_button_link['title']); ?>
            </a>
        </div>
    <?php endif; ?>
    <?php if ($home_shop) : ?>
        <div class="heading-background">
            <h2><?php echo $home_shop['shop_header_text']; ?></h2>
        </div>
        <div class="home-block">
            <img class="frame-circle thumbnail" src="<?php echo esc_url( $home_shop['shop_image']['url'] ); ?>" alt="<?php echo esc_attr( $home_shop['shop_image']['alt'] ); ?>" />
            <div class="home-shop-content">
                <?php print_r($shop_text); ?>
                <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>shop">
                    <?php print_r($shop_button_text); ?>
                </a>
                <?php echo $home_shop['shop_etsy_text']; ?>
                <a class="btn" href="https://www.etsy.com/ca/shop/LettersByCataCo">
                    <?php echo $home_shop['shop_etsy_button_label']; ?>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($home_services) : ?>
        <div class="heading-background">
            <h2><?php echo $home_services['services_header_text']; ?></h2>
        </div>
        <div class="home-block">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $home_services['services_image']['url'] ); ?>" alt="<?php echo esc_attr( $home_services['services_image']['alt'] ); ?>" />
            <div class="home-services-content">
                <?php print_r($services_text); ?>
                <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>services">
                    <?php print_r($services_button_text); ?>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($home_about) : ?>
        <div class="heading-background">
            <h2><?php echo $home_about['about_header_text']; ?></h2>
        </div>
        <div class="home-block">
            <img class="frame-circle thumbnail" src="<?php echo esc_url( $home_about['about_image']['url'] ); ?>" alt="<?php echo esc_attr( $home_about['about_image']['alt'] ); ?>" />
            <div class="home-about-content">
                <?php print_r($about_text); ?>
                <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>about">
                    <?php print_r($about_button_text); ?>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <?php 
        $image_gallery = get_field('image_gallery'); 
        $size = 'medium';
    ?>
    <?php if ($image_gallery) : ?>
        <div class="heading-background">
            <h2>Gallery</h2>
        </div>
        <div class="home-gallery-content">
            <img src="<?php echo esc_url( $image_gallery['image_one']['url'] ); ?>" alt="<?php echo esc_attr( $image_gallery['image_one']['alt'] ); ?>" />
            <img src="<?php echo esc_url( $image_gallery['image_two']['url'] ); ?>" alt="<?php echo esc_attr( $image_gallery['image_two']['alt'] ); ?>" />
            <img src="<?php echo esc_url( $image_gallery['image_three']['url'] ); ?>" alt="<?php echo esc_attr( $image_gallery['image_three']['alt'] ); ?>" />
        </div>
    <?php endif; ?>
    <!-- end while loop -->
<?php else : ?>

<?php endif; ?>
<?php while(have_posts()) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>
</div>


<?php get_footer();?>