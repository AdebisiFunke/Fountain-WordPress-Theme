<?php
/* 
 *Fountain Hooks
 */
/*header icon action hooks*/
add_action('fountain_header_icon', 'fountain_header_icon_hook');
function fountain_header_icon_hook()
{ ?>
 <a class="skip-link screen-reader-text" href="#content" id="skipToMain"><?php esc_html_e('Skip to content', 'fountain'); ?></a>
<div class="container-fluid">
<div class="row social-icon">
    <div class="col-md-6 text-center"><a class="btn btn-dark btn-social mx-2" href="mailto:support@fountain.com"><i class="fa fa-sm fa-envelope"></i> support@fountain.com</a>
        <a class="btn btn-dark btn-social mx-2" href="tel:+1(000)-000-000"><i class="fa fa-sm fa-phone"></i> +1(000)-000-000</a>
        </div>
    <div class="col-md-6 text-center"><a class="btn btn-dark btn-social border" href="https://twitter.com" aria-label="twitter url"><i class="fa fa-twitter"></i></a>
        <a class="btn btn-dark btn-social border" href="https://facebook.com" aria-label="facebook url"><i class="fa fa-facebook"></i></a>
        <a class="btn btn-dark btn-social border" href="https://linkedln.com" aria-label="linkedin url"><i class="fa fa-linkedin"></i></a>
  </div>
</div><!--row-->
  </div><!--container-fluid-->
<?php }
/*header menu action hooks*/
add_action('fountain_header_menu', 'fountain_menu_hook');
function fountain_menu_hook()
{ ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 text-center">
                <?php
                the_custom_logo();
                if (is_front_page() && is_home()) :
                ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
                else :
                ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;
                $fountain_description = get_bloginfo('description', 'display');
                if ($fountain_description || is_customize_preview()) :
                ?>
                <small class="site-description"><?php echo $fountain_description;?></small>
                <?php endif; ?>
                <div class="fountain-responsive-menu"></div>
                <button class="screen-reader-text menu-close"><?php esc_html_e('Close Menu', 'fountain') ?></button>
            </div>
            <div class="col-lg-8">
                <nav class="mainmenu">
                    <?php wp_nav_menu(array('theme_location' => 'fountain-menu', 'menu_id' => 'primary-menu',)); ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="text-center">
        <div class="section-0"></div>
        <div class="section-1 pt-3">
            <p>WE PROVIDE EXCEPTIONAL SERVICES </p>
        </div>
    </div>
<?php }
add_action('fountain_header_image', 'fountain_headerimage_hook');
function fountain_headerimage_hook()
{ ?>
<?php if ( get_header_image() ) : ?>
	<?php
	$custom_header_sizes = apply_filters( 'fountain_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );?>
	<div class="header-img-area">
	<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" alt="" />
	</div><!-- .header-image -->
	<?php endif;?>
</div><!--banner-->
<main  class="site-content" tabindex="-1" id="content">
<?php }?>

<?php
add_action('fountain_footer', 'fountain_footer_hook');
function fountain_footer_hook()
{ ?>
<footer id="footer">
    <div class="container-fluid">
        <div class="row text-white">
        <div class="col-lg-12 p-5">
            <p>Copyright &copy; <?php echo date('Y'); ?>&nbsp;<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>. All Rights Reserved.</p></div>
                <div class="col-lg-12 border-top text-muted p-2">
                <a href="<?php echo esc_url(__('https://wordpress.org/', 'fountain')); ?>">
                <?php printf(esc_html__('Proudly Powered By %s', 'fountain'), 'WordPress'); ?></a><span class="divider" arial-hidden="true"></span>
                <a href="<?php echo esc_url(__('https://wpdevtechsupport.com/', 'fountain')); ?>">
                <?php printf(esc_html__('Theme By: %s', 'fountain'), 'WPDevTechSupport'); ?></a>
            </div>
        </div>
    </div>
</footer>
<?php }
