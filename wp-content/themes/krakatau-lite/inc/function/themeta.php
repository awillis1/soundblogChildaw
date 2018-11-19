<?php

// akmanda category plug and play
function krakatau_lite_category(){
    echo '<div class="category-wrapper">';
    echo '<span>Category :</span> ';
    the_category(', ');
    echo '</div>';

}

// akmanda author plug and play
function krakatau_lite_author(){
    global $post;
    echo '<div class="author-wrapper">';
    echo '<span class="author-icon">by: </span>';
    echo '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'. get_the_author_meta( 'display_name' ) .'</a>';
    echo '</div>';
}

// akmanda date plug and play
function krakatau_lite_date(){
    global $post; ?>

    <time class="entry-date" datetime="<?php the_modified_date('Y-m-j'); ?>" itemprop="dateModified"><?php echo get_the_date(); ?></time>
    <meta itemprop="datePublished" content="<?php echo get_the_date(); ?>">

<?php }

// akmanda tags plug and play
function krakatau_lite_tags(){
    global $post;
    echo '<div class="tag-wrapper">';
    echo '<span>Tags :</span> ';
    the_tags('',', ','');
    echo '</div>';
}


function krakatau_lite_comments(){
    global $post;

    comments_number( '0 Comments', '1 Comments', '% Comments' );

}

function krakatau_lite_post_type() {

if ( !get_post_format() ) {
    echo '<i class="icon post-type icon-elusive-icons-1"></i>';
}


}

function meta_info(){ ?>
    <div class="post-meta text-center">  

    <ul>
        <li><?php krakatau_lite_post_type(); ?></li>
        <li><?php krakatau_lite_date(); ?> /</li> 
        <li> <?php  krakatau_lite_comments(); ?></li>
    </ul>

    </div>         
    <?php

}