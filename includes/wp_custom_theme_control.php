<?php
/* --------------------------------------------------------------
WP CUSTOMIZE SECTION - CUSTOM SETTINGS
-------------------------------------------------------------- */

add_action( 'customize_register', 'opslens_customize_register' );

function opslens_customize_register( $wp_customize ) {

    /* SOCIAL */
    $wp_customize->add_section('opmp_social_settings', array(
        'title'    => __('Redes Sociales', 'opslens'),
        'description' => __('Agregue aqui las redes sociales de la página, serán usadas globalmente', 'opslens'),
        'priority' => 175,
    ));

    $wp_customize->add_setting('opmp_social_settings[facebook]', array(
        'default'           => '',
        'sanitize_callback' => 'opslens_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'facebook', array(
        'type' => 'url',
        'section' => 'opmp_social_settings',
        'settings' => 'opmp_social_settings[facebook]',
        'label' => __( 'Facebook', 'opslens' ),
    ) );

    $wp_customize->add_setting('opmp_social_settings[twitter]', array(
        'default'           => '',
        'sanitize_callback' => 'opslens_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'twitter', array(
        'type' => 'url',
        'section' => 'opmp_social_settings',
        'settings' => 'opmp_social_settings[twitter]',
        'label' => __( 'Twitter', 'opslens' ),
    ) );

    $wp_customize->add_setting('opmp_social_settings[instagram]', array(
        'default'           => '',
        'sanitize_callback' => 'opslens_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'instagram', array(
        'type' => 'url',
        'section' => 'opmp_social_settings',
        'settings' => 'opmp_social_settings[instagram]',
        'label' => __( 'Instagram', 'opslens' ),
    ) );

    $wp_customize->add_setting('opmp_social_settings[linkedin]', array(
        'default'           => '',
        'sanitize_callback' => 'opslens_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'linkedin', array(
        'type' => 'url',
        'section' => 'opmp_social_settings',
        'settings' => 'opmp_social_settings[linkedin]',
        'label' => __( 'LinkedIn', 'opslens' ),
    ) );

    $wp_customize->add_setting('opmp_social_settings[youtube]', array(
        'default'           => '',
        'sanitize_callback' => 'opslens_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'youtube', array(
        'type' => 'url',
        'section' => 'opmp_social_settings',
        'settings' => 'opmp_social_settings[youtube]',
        'label' => __( 'YouTube', 'opslens' ),
    ) );

    $wp_customize->add_setting('opmp_social_settings[yelp]', array(
        'default'           => '',
        'sanitize_callback' => 'opslens_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'yelp', array(
        'type' => 'url',
        'section' => 'opmp_social_settings',
        'settings' => 'opmp_social_settings[yelp]',
        'label' => __( 'Yelp', 'opslens' ),
    ) );


    $wp_customize->add_section('opmp_cookie_settings', array(
        'title'    => __('Cookies', 'opslens'),
        'description' => __('Opciones de Cookies', 'opslens'),
        'priority' => 176,
    ));

    $wp_customize->add_setting('opmp_cookie_settings[cookie_text]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control( 'cookie_text', array(
        'type' => 'textarea',
        'label'    => __('Cookie consent', 'opslens'),
        'description' => __( 'Texto del Cookie consent.' ),
        'section'  => 'opmp_cookie_settings',
        'settings' => 'opmp_cookie_settings[cookie_text]'
    ));

    $wp_customize->add_setting('opmp_cookie_settings[cookie_link]', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'cookie_link', array(
        'type'     => 'dropdown-pages',
        'section' => 'opmp_cookie_settings',
        'settings' => 'opmp_cookie_settings[cookie_link]',
        'label' => __( 'Link de Cookies', 'opslens' ),
    ) );

}

function opslens_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

/* --------------------------------------------------------------
CUSTOM CONTROL PANEL
-------------------------------------------------------------- */

function register_opslens_settings() {
    register_setting( 'opslens-settings-group', 'monday_start' );
    register_setting( 'opslens-settings-group', 'monday_end' );
    register_setting( 'opslens-settings-group', 'monday_all' );
}

add_action('admin_menu', 'opslens_custom_panel_control');

function opslens_custom_panel_control() {
    add_menu_page(
        __( 'Panel de Control', 'opslens' ),
        __( 'Panel de Control','opslens' ),
        'manage_options',
        'opslens-control-panel',
        'opslens_control_panel_callback',
        'dashicons-admin-generic',
        120
    );
    add_action( 'admin_init', 'register_opslens_settings' );
}

function opslens_control_panel_callback() {
    ob_start();
?>
<div class="opslens-admin-header-container">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="opslens" />
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
</div>
<form method="post" action="options.php" class="opslens-admin-content-container">
    <?php settings_fields( 'opslens-settings-group' ); ?>
    <?php do_settings_sections( 'opslens-settings-group' ); ?>
    <div class="opslens-admin-content-item">
        <table class="form-table">
            <tr valign="center">
                <th scope="row"><?php _e('Monday', 'opslens'); ?></th>
                <td>
                    <label for="monday_start">Starting Hour: <input type="time" name="monday_start" value="<?php echo esc_attr( get_option('monday_start') ); ?>"></label>
                    <label for="monday_end">Ending Hour: <input type="time" name="monday_end" value="<?php echo esc_attr( get_option('monday_end') ); ?>"></label>
                    <label for="monday_all">All Day: <input type="checkbox" name="monday_all" value="1" <?php checked( get_option('monday_all'), 1 ); ?>></label>
                </td>
            </tr>
        </table>
    </div>
    <div class="opslens-admin-content-submit">
        <?php submit_button(); ?>
    </div>
</form>
<?php 
    $content = ob_get_clean();
    echo $content;
}
