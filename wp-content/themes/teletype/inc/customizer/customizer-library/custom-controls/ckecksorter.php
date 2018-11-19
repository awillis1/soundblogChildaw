<?php
/**
 * Sortable multi check boxes custom control.
 * @since 0.1.0
 * @author David Chandra Purnama <david@genbu.me>
 * @copyright Copyright (c) 2015, Genbu Media
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

class Customizer_Library_Check_Sortable extends WP_Customize_Control {

	/**
	 * Control Type
	 */
	public $type = 'ckecksorter';

	/**
	 * Enqueue Scripts
	 */
	public function enqueue() {
		wp_enqueue_style( 'ckecksorter', get_template_directory_uri() . '/inc/customizer/customizer-library/assets/ckecksorter.css', '1.0' );
		wp_enqueue_script( 'ckecksorter', get_template_directory_uri() . '/inc/customizer/customizer-library/assets/ckecksorter.js', array( 'jquery', 'jquery-ui-sortable', 'customize-controls' ), '1.0' );
	}

	/**
	 * Render Settings
	 */
	public function render_content() {

		/* if no choices, bail. */
		if ( empty( $this->choices ) ){
			return;
		} ?>

		<?php if ( !empty( $this->label ) ){ ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php } // add label if needed. ?>

		<?php if ( !empty( $this->description ) ){ ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php } // add desc if needed. ?>

		<?php
		/* Data */
		$values = explode( ',', $this->value() );
		$choices = $this->choices;

		/* If values exist, use it. */
		$options = array();
		if( $values ){

			/* get individual item */
			foreach( $values as $value ){

				/* separate item with option */
				$value = explode( ':', $value );

				/* build the array. remove options not listed on choices. */
				if ( array_key_exists( $value[0], $choices ) ){
					$options[$value[0]] = $value[1] ? '1' : '0'; 
				}
			}
		}
		/* if there's new options (not saved yet), add it in the end. */
		foreach( $choices as $key => $val ){

			/* if not exist, add it in the end. */
			if ( ! array_key_exists( $key, $options ) ){
				$options[$key] = '0'; // use zero to deactivate as default for new items.
			}
		}
		?>

		<ul class="ckecksorter-multicheck-sortable-list">

			<?php foreach ( $options as $key => $value ){ ?>

				<li>
					<label>
						<input name="<?php echo esc_attr( $key ); ?>" class="ckecksorter-multicheck-sortable-item" type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( $value ); ?> /> 
						<?php echo esc_html( $choices[$key] ); ?>
					</label>
					<i class="dashicons dashicons-menu ckecksorter-multicheck-sortable-handle"></i>
				</li>

			<?php } // end choices. ?>

				<li class="ckecksorter-hideme">
					<input type="hidden" class="ckecksorter-multicheck-sortable" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
				</li>

		</ul><!-- .ckecksorter-multicheck-sortable-list -->


	<?php
	}
}