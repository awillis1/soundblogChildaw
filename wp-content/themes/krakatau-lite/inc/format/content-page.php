<article  id="post-<?php the_ID(); ?>" <?php post_class( 'post hentry clearfix'); ?> itemprop="WebPage" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<meta itemscope="" itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="https://google.com/article">

<div data-scroll-reveal="bottom move" class="post-content clearfix">
        <?php loop_post_thumbnail(); ?> 
                  
            <div class="post-entry">                                                             
                <?php krakatau_lite_post_title();?> 
                <div class="bord"></div>
                <?php krakatau_lite_content(); ?>  
                     
            </div> 
            
</div><!-- post-content -->  

   
</article><!-- #post-<?php the_ID(); ?> -->