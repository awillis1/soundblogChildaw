<article  id="post-<?php the_ID(); ?>" <?php post_class( 'post hentry clearfix'); ?> itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
<meta itemscope="" itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="https://google.com/article">

<?php
$logo_id    = get_theme_mod( 'custom_logo' );
$logo_image = wp_get_attachment_image_src( $logo_id, 'full' );
?>
<div itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
	<meta itemprop="name" content="<?php $krakatau_lite_theme = wp_get_theme(); echo $krakatau_lite_theme->get( 'Name' ); ?>">
	<?php if ( ! empty( $logo_image ) ) { 

	$logo_meta = wp_get_attachment_metadata( $logo_id );
  	$logo_width = $logo_meta["width"];
 	$logo_height = $logo_meta["height"]; ?>
	<div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
		<meta itemprop="url" content="<?php echo esc_url( $logo_image[0] ); ?>">
        <?php echo '<meta itemprop="width" content="'.$logo_width.'"><meta itemprop="height" content="'.$logo_height.'">'; ?>
	</div>
	<?php } ?>
</div>

<span class="blog-author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
    <span class="author vcard" itemprop="name">
    	<?php echo get_the_author_meta( 'display_name' ); ?>
   	</span>
</span>


<div data-scroll-reveal="bottom move" class="post-content clearfix">
        <?php loop_post_thumbnail(); ?> 
                  
            <div class="post-entry">                                                             
                <?php krakatau_lite_post_title();?> 
                
                <?php meta_info(); ?>
                <div class="bord"></div>
                <?php krakatau_lite_content(); ?>  
                <?php get_template_part( 'inc/part/layout', 'meta' ); ?>           
                     
            </div>

             <?php if(is_singular()){krakatau_lite_content_nav( 'nav-below' );} ?>
 
            
</div><!-- post-content -->            

</article><!-- #post-<?php the_ID(); ?> -->