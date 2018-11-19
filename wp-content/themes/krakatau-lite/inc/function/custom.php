<?php
function krakatau_lite_social_profile() {

if ( current_user_can( 'edit_theme_options' ) ) {

  $krakatau_lite_twitter_url   = get_theme_mod( 'krakatau_lite_twitter_url', esc_url( '#' ) );
  $krakatau_lite_googlep_url   = get_theme_mod( 'krakatau_lite_googlep_url', esc_url( '#' ) );
  $krakatau_lite_facebook_url  = get_theme_mod( 'krakatau_lite_facebook_url', esc_url( '#' ) );
  $krakatau_lite_linkedin_url  = get_theme_mod( 'krakatau_lite_linkedin_url', esc_url( '#' ) );
  $krakatau_lite_pinterest_url = get_theme_mod( 'krakatau_lite_pinterest_url', esc_url( '#' ) );
} else {
  $krakatau_lite_twitter_url   = get_theme_mod( 'krakatau_lite_twitter_url' );
  $krakatau_lite_googlep_url   = get_theme_mod( 'krakatau_lite_googlep_url' );
  $krakatau_lite_facebook_url  = get_theme_mod( 'krakatau_lite_facebook_url' );
  $krakatau_lite_linkedin_url  = get_theme_mod( 'krakatau_lite_linkedin_url' );
  $krakatau_lite_pinterest_url = get_theme_mod( 'krakatau_lite_pinterest_url' );
}

if (!empty($krakatau_lite_twitter_url)) { ?>
    <li class="twitter"><a title="Twitter" href="<?php echo esc_url( $krakatau_lite_twitter_url ); ?>" class="icon icon-twitter-alt"></a></li>
<?php } 

if (!empty($krakatau_lite_googlep_url)) { ?>
  <li class="google"><a title="Googlep" href="<?php echo esc_url( $krakatau_lite_googlep_url ); ?>" class="icon icon-google"></a></li>
<?php } 

if (!empty($krakatau_lite_facebook_url)) { ?>
  <li class="facebook"><a title="Facebook" href="<?php echo esc_url( $krakatau_lite_facebook_url ); ?>" class="icon icon-facebook-1"></a></li>
<?php } 

if (!empty($krakatau_lite_linkedin_url)) { ?>
  <li class="linkedin"><a title="LinkedIn" href="<?php echo esc_url( $krakatau_lite_linkedin_url ); ?>" class="icon icon-linkedin"></a></li>
<?php } 

if (!empty($krakatau_lite_pinterest_url)) { ?>
  <li class="pinterest"><a title="Pinterest" href="<?php echo esc_url( $krakatau_lite_pinterest_url ); ?>" class="icon icon-path"></a></li>
<?php } 

 }