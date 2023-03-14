<?php

namespace OLENA_THEME\Inc;

use OLENA_THEME\Inc\Traits\Singleton;

class Meta_Boxes {

	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_post_meta_data' ] );

	}

	
	public function add_custom_meta_box() {
		$screens = [ 'post' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide-page-title',           // Unique ID
				__( 'Hide page title', 'olena' ),  // Box title
				[ $this, 'custom_meta_box_html' ],  // Content callback, must be of type callable
				$screen,                   // Post type
				'side' // context
			);
		}
	}

	
	public function custom_meta_box_html( $post ) {

		$value = get_post_meta( $post->ID, '_hide_page_title', true );

		
		wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name' );

		?>
		<label for="olena-field"><?php esc_html_e( 'Hide the page title', 'olena' ); ?></label>
		<select name="olena_hide_title_field" id="olena-field" class="postbox">
			<option value=""><?php esc_html_e( 'Select', 'olena' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'olena' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'olena' ); ?>
			</option>
		</select>
		<?php
	}

	
	public function save_post_meta_data( $post_id ) {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		
		if ( ! isset( $_POST['hide_title_meta_box_nonce_name'] ) ||
		     ! wp_verify_nonce( $_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__) )
		) {
			return;
		}

		if ( array_key_exists( 'olena_hide_title_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_hide_page_title',
				$_POST['olena_hide_title_field']
			);
		}
	}

}
