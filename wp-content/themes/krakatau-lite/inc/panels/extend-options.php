<?php

class KRAKATAU_LITE_Customize_Header_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

	class KRAKATAU_LITE_Customize_Text_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="textfield"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

    class KRAKATAU_LITE_Customize_Button_Control extends WP_Customize_Control {
        public function render_content() {  ?>
			<p>
				<a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'AuthorURI' ); ?>/products/wordpress-themes/krakatau/" target="_blank" class="button button-secondary"><?php echo esc_html($this->label); ?></a>
			</p> <?php
        }
    }

	$wp_customize->add_section('krakatau_lite_upgrade', array('title' => esc_html__('Need More Features?', 'krakatau-lite'), 'capability' => 'edit_theme_options', 'theme_supports' => '', 'priority' => 2));

    /***** Add Settings *****/

	$wp_customize->add_setting('krakatau_lite_options[premium_version_label]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_setting('krakatau_lite_options[premium_version_text]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_setting('krakatau_lite_options[premium_version_button]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));

    /***** Add Controls *****/
	$wp_customize->add_control(new KRAKATAU_LITE_Customize_Header_Control($wp_customize, 'premium_version_label', array('label' => esc_html__('Need more features and options?', 'krakatau-lite'), 'section' => 'krakatau_lite_upgrade', 'settings' => 'krakatau_lite_options[premium_version_label]', 'priority' => 1)));
	$wp_customize->add_control(new KRAKATAU_LITE_Customize_Text_Control($wp_customize, 'premium_version_text', array('label' => esc_html__('Check out the Premium version of this theme which comes with additional features and advanced customization options for your website.', 'krakatau-lite'), 'section' => 'krakatau_lite_upgrade', 'settings' => 'krakatau_lite_options[premium_version_text]', 'priority' => 2)));
	$wp_customize->add_control(new KRAKATAU_LITE_Customize_Button_Control($wp_customize, 'premium_version_button', array('label' => esc_html__('Learn more about the Premium version', 'krakatau-lite'), 'section' => 'krakatau_lite_upgrade', 'settings' => 'krakatau_lite_options[premium_version_button]', 'priority' => 3)));


/***** Return Theme Options / Set Default Options *****/

if (!function_exists('krakatau_lite_theme_options')) {
	function krakatau_lite_theme_options() {
		$theme_options = wp_parse_args(
			get_option('krakatau_lite_options', array()),
			krakatau_lite_default_options()
		);
		return $theme_options;
	}
}

if (!function_exists('krakatau_lite_default_options')) {
	function krakatau_lite_default_options() {
		$default_options = array(
			'excerpt_length' => '50',
			'excerpt_more' => esc_html__('Read More', 'krakatau-lite'),
			'sidebar' => 'right',
			'premium_version_label' => '',
			'premium_version_text' => '',
			'premium_version_button' => ''
		);
		return $default_options;
	}
}