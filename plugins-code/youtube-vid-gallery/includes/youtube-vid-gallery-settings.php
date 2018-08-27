<?php
//Create a settings for youtube

function yvg_settings_npi_init() {

    add_settings_section (
        'yvg_setting_section',
        'YouTube Vid Gallery Settings',
        'yvg_settings_section_callback',
        'reading'
    );

    add_settings_field (
        'yvg_setting_disable_fullscreen',
        'Disable Fullscreen',
        'yvg_setting_disable_fullscreen_callback',
        'reading',
        'yvg_setting_section'
    );

    register_setting( 'reading','yvg_setting_disable_fullscreen' );
}

add_action( 'admin_init', 'yvg_settings_npi_init' );

function yvg_settings_section_callback() {
    echo '<p>Setting for Youtube Vid Gallery</p>';
}

function yvg_setting_disable_fullscreen_callback() {
    echo '<input name="yvg_setting_disable_fullscreen" id="yvg_setting_disable_fullscreen" type="checkbox" value="1" class="code"' . checked( 1, get_option( 'yvg_setting_disable_fullscreen' ), false ) . '/>';
}
?>