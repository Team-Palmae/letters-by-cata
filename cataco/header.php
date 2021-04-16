<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<meta name="description" content="Calligraphy, Watercolor, Cricut. We have all your handmade designs covered. Find great handmade products right here!">
		<meta name="keywords" content="Calligraphy Watercolor Cricut Edmonton Local Art Design Lettering">
		<?php wp_head(); ?>
		<!-- Load Merriweather -->
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" />
		<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'" />
		<noscript>
			<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
		</noscript>
	</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<header class="header" id="header">
		<div class="inner-container flex">
			<div class="logo">
				<?php if ( ! has_custom_logo() ) { ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<!-- if your page is set to front-page or blog display the site title (appearance > customize) -->
						<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
					<?php else : ?>
						<!-- if your page is not set to front-page or blog display the site title (appearance > customize) -->
						<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				<?php } else {
					the_custom_logo(); 
				}?>
			</div>

			<nav>
				<div class="toggle-icon-close">
					<svg height="512px" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/></svg>
				</div>
				<?php wp_nav_menu( 
					array( 
						'theme_location' => 'main-menu',
						'container_class' => 'main-nav', //class that is applied to the container
						'container_id' => 'main-nav', //id that is applied to the container.
						'menu_class' => 'main-menu', //class used for the ul element which forms the menu. 'Default Menu'
						'menu_id' => 'main-menu', //id used for the ul element which forms the menu. 'Default Menu'
						'fallback_cb' => '' //if the menu doesn't exsist, a callback function will fire. Set to false for no fallback 
					) 
				); ?>
			</nav>

			<a class="cart" href="<?php echo wc_get_cart_url() ?>">
				<svg class="cart-icon" aria-label="shopping cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 483.1 483.1" style="enable-background:new 0 0 483.1 483.1;" xml:space="preserve">
					<g>
						<path d="M434.55,418.7l-27.8-313.3c-0.5-6.2-5.7-10.9-12-10.9h-58.6c-0.1-52.1-42.5-94.5-94.6-94.5s-94.5,42.4-94.6,94.5h-58.6
							c-6.2,0-11.4,4.7-12,10.9l-27.8,313.3c0,0.4,0,0.7,0,1.1c0,34.9,32.1,63.3,71.5,63.3h243c39.4,0,71.5-28.4,71.5-63.3
							C434.55,419.4,434.55,419.1,434.55,418.7z M241.55,24c38.9,0,70.5,31.6,70.6,70.5h-141.2C171.05,55.6,202.65,24,241.55,24z
							M363.05,459h-243c-26,0-47.2-17.3-47.5-38.8l26.8-301.7h47.6v42.1c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h141.2v42.1
							c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h47.6l26.8,301.8C410.25,441.7,389.05,459,363.05,459z"/>
					</g>
				</svg>
				<span class="cart-count hidden"><?php echo $woocommerce->cart->cart_contents_count ?></span>
			</a>

			<!-- toggle-icon-open -->
			<div class="toggle-icon-open">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z"></path></svg>
			</div>
		</div> <!-- End of Inner-container -->
		<span class="header-welcome">Welcome to</span>
		<h1>Letters by Cata Co</h1>
	</header>
<div class="container" id="container">