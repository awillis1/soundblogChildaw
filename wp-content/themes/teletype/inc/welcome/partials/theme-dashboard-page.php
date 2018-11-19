<?php

$teletype_theme = wp_get_theme();
$active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'getting_started';

?>

<div class="wrap teletype-dashboard">

    <div class="page-header wp-clearfix">
        <div class="theme-info">
            <div class="inner">
                <h1><?php esc_html_e( 'Welcome to Teletype!', 'teletype' ) ?></h1>
                <?php printf( '<p class="ver">%1$s %2$s</p>', esc_html__( 'Version:', 'teletype' ), esc_html( $teletype_theme->Version ) ); ?>
                <p class="theme-description"><?php echo esc_html( $teletype_theme->Description ); ?></p>
            </div><!-- .inner -->
        </div><!-- .theme-info -->

        <div class="theme-screenshot">
            <img src="<?php echo esc_url( TELETYPE_DIR_URI . '/screenshot.png' ); ?>" alt="<?php echo esc_attr( $teletype_theme->Name ); ?>" />
        </div><!-- .theme-screenshot -->
    </div><!-- .page-header -->

    <h2 class="nav-tab-wrapper wp-clearfix">
        <?php Teletype_Welcome_Screen::get_dashboard_page_tabs( $active_tab ); ?>
    </h2><!-- .nav-tab-wrapper -->

    <div class="tab-content wp-clearfix">
        <div class="tab-primary">
            <div class="inner">
                <?php Teletype_Welcome_Screen::get_dashboard_page_tab_content( $active_tab ); ?>
            </div><!-- .inner -->
        </div><!-- .tab-primary -->

        <div class="tab-secondary">
            <div class="inner">
                <?php require_once TELETYPE_DIR . '/inc/welcome/partials/theme-dashboard-sidebar.php'; ?>
            </div><!-- .inner -->
        </div><!-- .tab-secondary -->
    </div><!-- .tab-content -->
</div><!-- .wrap.about-wrap -->
