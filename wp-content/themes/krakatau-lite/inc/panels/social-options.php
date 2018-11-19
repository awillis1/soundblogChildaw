<?php
// Set Panel ID
$panel_id = 'krakatau_lite_social_options';

// Set prefix
$prefix = 'krakatau_lite';

/***********************************************/
/**************** CONTACT US  ******************/
/***********************************************/

$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 109,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Social Profile Links', 'krakatau-lite' ),
        'description'       => __( 'Control various options for contact us section from front page.', 'krakatau-lite' ),
    )
);

    /***********************************************/
    /************** Contact Details  ***************/
    /***********************************************/


    $wp_customize->add_section( $prefix.'_social_section' ,
        array(
            'title'         => __( 'Social Links', 'krakatau-lite' ),
            'description'   => __( 'These are the contact details displayed in the Contact us section from front page.', 'krakatau-lite' ),
            'priority'      => 3,
            'panel'         => $panel_id
        )
    );

    /* Facebook URL */
    $wp_customize->add_setting( $prefix.'_facebook_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            =>  esc_url_raw('#'),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_facebook_url',
        array(
            'label'          => __( 'Facebook URL', 'krakatau-lite' ),
            'description'    => __( 'Will be displayed in the contact section from front page.', 'krakatau-lite' ),
            'section'        => $prefix.'_social_section',
            'settings'       => $prefix.'_facebook_url',
            'priority'       => 10
        )
    );

    /* Twitter URL */
    $wp_customize->add_setting( $prefix.'_twitter_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            =>  esc_url_raw('#'),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_twitter_url',
        array(
            'label'          => __( 'Twitter URL', 'krakatau-lite' ),
            'description'    => __('Will be displayed in the contact section from front page.', 'krakatau-lite'),
            'section'        => $prefix.'_social_section',
            'settings'       => $prefix.'_twitter_url',
            'priority'       => 10
        )
    );

    /* LinkedIN URL */
    $wp_customize->add_setting( $prefix.'_linkedin_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            => esc_url_raw('#'),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_linkedin_url',
        array(
            'label'          => __( 'LinkedIN URL', 'krakatau-lite' ),
            'description'    => __('Will be displayed in the contact section from front page.', 'krakatau-lite'),
            'section'        => $prefix.'_social_section',
            'settings'       => $prefix.'_linkedin_url',
            'priority'       => 10
        )
    );

	/* Google+ URL */
	$wp_customize->add_setting( $prefix.'_googlep_url',
		array(
			'sanitize_callback'  => 'esc_url_raw',
			'default'            => esc_url_raw('#'),
			'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_googlep_url',
		array(
			'label'          => __( 'Google+ URL', 'krakatau-lite' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'krakatau-lite'),
			'section'        => $prefix.'_social_section',
			'settings'       => $prefix.'_googlep_url',
			'priority'       => 10
		)
	);

	/* Pinterest URL */
	$wp_customize->add_setting( $prefix.'_pinterest_url',
		array(
			'sanitize_callback'  => 'esc_url_raw',
			'default'            => esc_url_raw('#'),
			'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_pinterest_url',
		array(
			'label'          => __( 'Pinterest URL', 'krakatau-lite' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'krakatau-lite'),
			'section'        => $prefix.'_social_section',
			'settings'       => $prefix.'_pinterest_url',
			'priority'       => 10
		)
	);