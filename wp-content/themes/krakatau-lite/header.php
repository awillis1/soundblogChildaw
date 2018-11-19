<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> > <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if ie]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<?php wp_head(); ?>

</head>

<body <?php body_class() ;?>>

<?php
$logo_id    = get_theme_mod( 'custom_logo' );
$logo_image = wp_get_attachment_image_src( $logo_id, 'full' );
$text_logo 	= get_theme_mod( 'krakatau_lite_text_logo', __( 'Krakatau', 'krakatau-lite' ) );
?>

<div class="container">

<header id="header" class="header col-md-3" data-scroll-reveal="bottom move">
<div id="sidebar-header" class="clearfix">
<div class="logo">
	<div class="logo-title">
        <?php if ( ! empty( $logo_image ) ) { ?>
    	<div class="logo-image">
			<?php echo '<a href="' . esc_url( home_url() ) . '"><img src="' . esc_url( $logo_image[0] ) . '" /></a>'; ?>
		</div>
		<?php } else { ?>
			<?php if ( get_option( 'show_on_front' ) == 'page' ) { ?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $text_logo ); ?>" class="header-logo"><?php echo esc_html( $text_logo ); ?></a>
			</h1>
			<?php } else { // front-page option ?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="header-logo"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
			</h1>
			<?php } ?>
		<?php } ?>
    </div>
</div><!-- logo -->
<div class="bord-widget"></div>
<nav id="mainmenu" class="menu">
	<?php krakatau_lite_top_nav_menu(); ?>
</nav> 
<div class="bord-widget"></div>
<ul class="footer-social">
<?php krakatau_lite_social_profile(); ?>
</ul>
<?php get_sidebar(); ?>

</div>


</header>








<div id="main" class="site-main col-md-9 clearfix">

