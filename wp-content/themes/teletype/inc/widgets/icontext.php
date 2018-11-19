<?php
/**
 * Custom Widget Image-Icon
 * @package Teletype
 * @require font-icons.php
 */

require_once ( get_template_directory() . '/inc/widgets/assets/font-icons.php' );

add_action('widgets_init', create_function('', 'register_widget("Teletype_Icon_Widget");'));

class Teletype_Icon_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'teletype_icon_widget',
			'Teletype - ' . __( 'Icon and Text', 'teletype' ),
			array(
				'classname' => 'teletype_icon_widget', 
				'description' => __( 'Show icon, text and link. To create services or features block.', 'teletype' ),
				'width' => 250,
				'height' => 350
			)
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	function admin_enqueue_scripts( $hook ) {
	    if ( 'widgets.php' == $hook ) {
    		wp_enqueue_media();
    		wp_enqueue_script( 'icon_widget_js', get_template_directory_uri() . '/inc/widgets/assets/icon-widget.js', array( 'jquery' ), '', true );

    		wp_enqueue_style( 'icon_widget_css', get_template_directory_uri() . '/inc/widgets/assets/icon-widget.css' );
    		wp_enqueue_style(  'etlinefont', get_template_directory_uri() . '/css/etlinefont.css?v=1.0' );
        }
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$icon =  ( empty( $instance['icon'] ) ) ? '' : '<i class="icon ' . strip_tags( $instance['icon'] ). '"></i>';
		$url = ( empty( $instance['url'] ) ) ? '' : esc_url( $instance['url'] );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$button_text = ( empty( $instance['button_text'] ) ) ? '' : $instance['button_text'];

		$icon_string = $icon;
		$title_string = $title;

		echo $before_widget . '<div class="services-widget">';

		if ( $icon ) {
			echo $icon_string;
		}

		if ( $title ) {
			 echo '<h4>' . $title_string . '</h4>';
		}

		if ( $text ) {
			echo '<p>' . $text . '</p>';
		}

		if ( $url && $button_text ) {
			echo '<p class="text-right"><a href="' . $url . '" class="read-more">' . $button_text . '</a></p>';
		}

		echo '</div>' . $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['icon'] = strip_tags( $new_instance['icon'] );
		$instance['url'] = esc_url( $new_instance['url'] );

		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] =  $new_instance['text'];
			$instance['button_text'] =  $new_instance['button_text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
			$instance['button_text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['button_text'] ) ) );
		}

		$instance['filter'] = isset( $new_instance['filter'] );

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'icon' => '', 'url' => '', 'button_text' => '' ) );
		extract( $instance );
		$icon_tag = ( $icon ) ? '<i class="icon ' . esc_attr( $icon ) . '"></i>' : '';
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'teletype' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label><?php _e( 'Icon:', 'teletype' ); ?></label>
		<span class="custom-icon-container"><?php echo $icon_tag; ?></span>
		<a href="#" class="view-icons"><?php _e( 'View Icons', 'teletype' ); ?></a> | <a href="#" class="delete-icon"><?php _e( 'Remove', 'teletype' ); ?></a>
		<?php teletype_font_icons(); ?>
		<input class="image-widget-custom-icon" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="hidden" value="<?php echo esc_attr( $icon ); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:', 'teletype' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:', 'teletype' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" /></p>

		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $text ); ?></textarea>
		<?php
	}
}