<?php
/**
 * Template name: Services
 * @package cataco
 * @since 1.0
*/
get_header(); ?>

<?php 
    $block_one = get_field('block_one'); 
    $block_two = get_field('block_two'); 
    $block_three = get_field('block_three'); 
    $block_four = get_field('block_four'); 
    $block_five = get_field('block_five'); 
    $block_six = get_field('block_six'); 
    $block_seven = get_field('block_seven'); 
    $block_eight = get_field('block_eight'); 
    $block_nine = get_field('block_nine'); 
    $block_ten = get_field('block_ten');
?>
<main id="content">
    <?php if ($block_one) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_one['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_one['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_one['service_title']; ?></h3>
                <?php echo $block_one['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_two) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_two['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_two['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_two['service_title']; ?></h3>
                <?php echo $block_two['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_three) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_three['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_three['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_three['service_title']; ?></h3>
                <?php echo $block_three['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_four) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_four['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_four['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_four['service_title']; ?></h3>
                <?php echo $block_four['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_five) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_five['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_five['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_five['service_title']; ?></h3>
                <?php echo $block_five['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_six) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_six['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_six['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_six['service_title']; ?></h3>
                <?php echo $block_six['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_seven) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_seven['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_seven['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_seven['service_title']; ?></h3>
                <?php echo $block_seven['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_eight) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_eight['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_eight['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_eight['service_title']; ?></h3>
                <?php echo $block_eight['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_nine) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_nine['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_nine['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_nine['service_title']; ?></h3>
                <?php echo $block_nine['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($block_ten) : ?>
        <div class="service">
            <img class="frame-square thumbnail" src="<?php echo esc_url( $block_ten['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $block_ten['service_image']['alt'] ); ?>" /> 
            <div class="service-content">
                <h3><?php echo $block_ten['service_title']; ?></h3>
                <?php echo $block_ten['service_text']; ?>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>