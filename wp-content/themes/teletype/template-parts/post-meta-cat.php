<span class="post-metacat"><?php printf( esc_html__( 'By ', 'teletype' ) ); the_author_posts_link(); ?></span>

<?php
$categories_list = get_the_category_list( ', ' );
			
if ( 'post' == get_post_type() && $categories_list ) : ?>
	<span class="post-metacat">
		<?php printf( esc_html__( 'In ', 'teletype' ) ); echo $categories_list; ?>
	</span>
<?php endif; ?>