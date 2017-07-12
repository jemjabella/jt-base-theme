<?php

class jtThemeBackend {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'register_theme_admin_page' ) );
	}


	public function register_theme_admin_page() {
		add_theme_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'theme_settings', array( $this, 'display_theme_admin' ) );
	}

	public function display_theme_admin() {
?>
		<div class="wrap">
			<h1><?php _e( 'Theme Settings', 'jtbt' ); ?></h1>

<?php
			if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
				if ( !empty( $_POST ) && check_admin_referer( 'change_theme_settings', 'theme-settings-nonce' ) ) {
					foreach( $_POST as $field => $values ) {
						$options[$field] = $values;
					}
					
					update_option( 'jt_base_options', $options );
				}
			}
			$jt_base_options = get_option( 'jt_base_options' );
?>

			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
				<?php wp_nonce_field( 'change_theme_settings', 'theme-settings-nonce' ); ?>
				
				<h3><?php _e( 'Address Details', 'jtbt' ); ?></h3>
				
				<table class="form-table">
				<tr>
					<th scope="row"><label>Company Name</label></th>
					<td><input type="text" name="company_name" class="regular-text" value="<?php if ( isset( $jt_base_options['company_name'] ) ) echo esc_attr( $jt_base_options['company_name'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Address 1</label></th>
					<td><input type="text" name="address_1" class="regular-text" value="<?php if ( isset( $jt_base_options['address_1'] ) ) echo esc_attr( $jt_base_options['address_1'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Address 2</label></th>
					<td><input type="text" name="address_2" class="regular-text" value="<?php if ( isset( $jt_base_options['address_2'] ) ) echo esc_attr( $jt_base_options['address_2'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Town/City</label></th>
					<td><input type="text" name="town_city" class="regular-text" value="<?php if ( isset( $jt_base_options['town_city'] ) ) echo esc_attr( $jt_base_options['town_city'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>County/Country</label></th>
					<td><input type="text" name="county_country" class="regular-text" value="<?php if ( isset( $jt_base_options['county_country'] ) ) echo esc_attr( $jt_base_options['county_country'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Postcode</label></th>
					<td><input type="text" name="postcode" class="regular-text" value="<?php if ( isset( $jt_base_options['postcode'] ) ) echo esc_attr( $jt_base_options['postcode'] ); ?>"></td>
				</tr>
				</table>
				
				<h3><?php _e( 'Social Media Accounts', 'jtbt' ); ?></h3>
				
				<table class="form-table">
				<tr>
					<th scope="row"><label>Facebook</label></th>
					<td><input type="text" name="facebook" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['facebook'] ) ) echo esc_attr( $jt_base_options['facebook'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Twitter</label></th>
					<td><input type="text" name="twitter" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['twitter'] ) ) echo esc_attr( $jt_base_options['twitter'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>LinkedIn</label></th>
					<td><input type="text" name="linkedin" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['linkedin'] ) ) echo esc_attr( $jt_base_options['linkedin'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Google Plus</label></th>
					<td><input type="text" name="gplus" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['gplus'] ) ) echo esc_attr( $jt_base_options['gplus'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Pinterest</label></th>
					<td><input type="text" name="pinterest" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['pinterest'] ) ) echo esc_attr( $jt_base_options['pinterest'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Instagram</label></th>
					<td><input type="text" name="instagram" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['instagram'] ) ) echo esc_attr( $jt_base_options['instagram'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>YouTube</label></th>
					<td><input type="text" name="youtube" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['youtube'] ) ) echo esc_attr( $jt_base_options['youtube'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Additional Link 1</label></th>
					<td><input type="text" name="additional_1" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['additional_1'] ) ) echo esc_attr( $jt_base_options['additional_1'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Additional Link 2</label></th>
					<td><input type="text" name="additional_2" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['additional_2'] ) ) echo esc_attr( $jt_base_options['additional_2'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Additional Link 3</label></th>
					<td><input type="text" name="additional_3" class="regular-text" placeholder="http://" value="<?php if ( isset( $jt_base_options['additional_3'] ) ) echo esc_attr( $jt_base_options['additional_3'] ); ?>"></td>
				</tr>
				</table>
				
				<h3><?php _e( 'Contact Details', 'jtbt' ); ?></h3>
				
				<table class="form-table">
				<tr>
					<th scope="row"><label>Telephone</label></th>
					<td><input type="text" name="telephone" class="regular-text" value="<?php if ( isset( $jt_base_options['telephone'] ) ) echo esc_attr( $jt_base_options['telephone'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Fax</label></th>
					<td><input type="text" name="fax" class="regular-text" value="<?php if ( isset( $jt_base_options['fax'] ) ) echo esc_attr( $jt_base_options['fax'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Public E-mail</label></th>
					<td><input type="text" name="email" class="regular-text" value="<?php if ( isset( $jt_base_options['email'] ) ) echo esc_attr( $jt_base_options['email'] ); ?>"></td>
				</tr>
				</table>
				
				<h3><?php _e( 'Legal Details', 'jtbt' ); ?></h3>
				
				<table class="form-table">
				<tr>
					<th scope="row"><label>Company Number</label></th>
					<td><input type="text" name="company_no" class="regular-text" value="<?php if ( isset( $jt_base_options['company_no'] ) ) echo esc_attr( $jt_base_options['company_no'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>VAT No.</label></th>
					<td><input type="text" name="vat_no" class="regular-text" value="<?php if ( isset( $jt_base_options['vat_no'] ) ) echo esc_attr( $jt_base_options['vat_no'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label>Registered Address</label></th>
					<td><textarea name="registered_address" class="large-text"><?php if ( isset( $jt_base_options['registered_address'] ) ) echo esc_textarea( $jt_base_options['registered_address'] ); ?></textarea></td>
				</tr>
				</table>
				
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'jtbt' ); ?>"></p>
			</form>
			
		</div>
<?php
	}
}

$jtThemeBackend = new jtThemeBackend();