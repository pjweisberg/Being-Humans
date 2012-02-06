<?php

add_action( 'admin_init', 'typo_theme_options_init' );
add_action( 'admin_menu', 'typo_theme_options_add_page' );

/**
 * Init theme options to white list our options
 */
function typo_theme_options_init(){
	register_setting( 'typo_options', 'typo_theme_options', 'typo_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function typo_theme_options_add_page() {
	add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'typo_theme_options', 'typo_theme_options_do_page' );
}


/**
 * Create the options page
 */
function typo_theme_options_do_page() {

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'typo_options' ); ?>
			<?php $options = get_option( 'typo_theme_options' ); ?>

			<table class="form-table">

				<tr valign="top"><th scope="row"><?php _e('Facebook', 'typo-o-graphy'); ?></th>
					<td>
						<input id="typo_theme_options[facebook]" class="regular-text" type="text" name="typo_theme_options[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" />
						<label class="description" for="typo_theme_options[facebook]"><?php _e('Enter Facebook  account name, <br />for example(http://www.facebook.com/?ref=logo#!/<strong>mazurtomek</strong>)', 'typo-o-graphy'); ?></label>
					</td>
				</tr>
								
				 <tr valign="top"><th scope="row"><?php _e('LastFM', 'typo-o-graphy'); ?></th>
					<td>
						<input id="typo_theme_options[lastfm]" class="regular-text" type="text" name="typo_theme_options[lastfm]" value="<?php esc_attr_e( $options['lastfm'] ); ?>" />
						<label class="description" for="typo_theme_options[lastfm]"><?php _e('Enter LastFM  account name, <br />for example(http://www.lastfm.pl/user/<strong>tommek</strong>)', 'typo-o-graphy'); ?></label>
					</td>
				</tr>
				
				 <tr valign="top"><th scope="row"><?php _e('YouTube', 'typo-o-graphy'); ?></th>
					<td>
						<input id="typo_theme_options[tube]" class="regular-text" type="text" name="typo_theme_options[tube]" value="<?php esc_attr_e( $options['tube'] ); ?>" />
						<label class="description" for="typo_theme_options[tube]"><?php _e('Enter YouTube  account name,<br /> for example(http://www.youtube.com/user/<strong>tommek1977</strong>)', 'typo-o-graphy'); ?></label>
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options', 'typo-o-graphy'); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function typo_theme_options_validate( $input ) {
	// Say our text option must be safe text with no HTML tags
	$input['facebook'] = wp_filter_nohtml_kses( $input['facebook'] );
	$input['tube'] = wp_filter_nohtml_kses( $input['tube'] );
	$input['lastfm'] = wp_filter_nohtml_kses( $input['lastfm'] );
	
	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/