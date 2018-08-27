<?php
//Create Options Menu Link

function ipl_options_menu_link() {
    add_options_page(
        'Instagram Photo List Options',
        'Instagram Photo List',
        'manage_options',
        'ipl-options',
        'ipl_options_content'
    );
}

// Create Content

function ipl_options_content() {

    //Init Global options
    global $ipl_options;
    $redirect_url = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    ?>
        <div class="wrap">
            <h2>Instagram Photo List Settings</h2>
            <p>Settings for the IPL plugin</p>
            <form method="POST" action="options.php">
                <?php
                        settings_fields('ipl_settings_group');
                ?>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="ipl_settings[redirect_url]"><?php _e('Redirect URL', 'ipl-domain'); ?></label></th>
                            <td><input type="text" name="ipl_settings[redirect_url]" id="ipl_settings[redirect_url]" value="<?php echo $redirect_url;?>" class="regular-text" disabled/>
                            <p class="description" id="ipl_settings[redirect_url]"><?php _e( 'Add this URL into your Instagram client redirect url field', 'ipl-domain' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="ipl_settings[client_id]"><?php _e('Client ID', 'ipl-domain'); ?></label></th>
                            <td><input type="text" name="ipl_settings[client_id]" id="ipl_settings[client_id]" value="<?php echo $ipl_options['client_id'];?>" class="regular-text"/>
                            <p class="description" id="ipl_settings[client_id]"><?php _e( 'Get the client id from your Instagram app and put here', 'ipl-domain' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="authenticate"><?php _e('Authenticate', 'ipl-domain'); ?></label></th>
                            <td><a class="btn button" href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo $ipl_options['client_id'];?>&redirect_uri=<?php echo $redirect_url;?>&response_type=token&scope=public_content">Authenticate</a>
                            <p class="description" id="ipl_settings[client_id]"><?php _e( 'IMPORTANT:Click this after you add the redirect url and the client ID', 'ipl-domain' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="ipl_settings[access_token]"><?php _e('Access Token', 'ipl-domain'); ?></label></th>
                            <td><input type="text" name="ipl_settings[access_token]" id="ipl_settings[access_token]" value="<?php echo $ipl_options['access_token'];?>" class="regular-text"/>
                            <p class="description" id="ipl_settings[access_token]"><?php _e( 'Get this from the URL after you authenticate', 'ipl-domain' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="ipl_settings[linked]"><?php _e('Link Photos To Instagram', 'ipl-domain'); ?></label></th>
                            <td><input type="checkbox" name="ipl_settings[linked]" id="ipl_settings[linked]" value="1" <?php checked( '1', $ipl_options['linked']); ?> class="regular-text"/>
                            <p class="description" id="ipl_settings[access_token]"><?php _e( 'Get this from the URL after you authenticate', 'ipl-domain' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="ipl_settings[page_caption]"><?php _e('Page Caption', 'ipl-domain'); ?></label></th>
                            <td><input type="text" name="ipl_settings[page_caption]" id="ipl_settings[page_caption]" value="<?php echo $ipl_options['page_caption'];?>" class="regular-text"/>
                            <p class="description" id="ipl_settings[page_caption]"><?php _e( 'Add some text to the top of the page', 'ipl-domain' ); ?></p>                            
                            </td>
                        </tr>

                    </tbody>                    
                </table>
                <p class="submit"><input type="submit" name="submit" id="submit" class="button" value="<?php _e('Save Changes', 'ipl-domain');?>"/></p>         
            </form>
        </div>
    <?php
}

add_action( 'admin_menu', 'ipl_options_menu_link' );

// Register Settings

function ipl_register_settings() {
    register_setting( 'ipl_settings_group', 'ipl_settings' );
}

add_action( 'admin_init', 'ipl_register_settings' );
?>