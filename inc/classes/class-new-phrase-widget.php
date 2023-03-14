<?php

namespace OLENA_THEME\Inc;

use OLENA_THEME\Inc\Traits\Singleton;
use WP_Widget;

class New_Phrase_Widget extends WP_Widget {
	use Singleton;

	public function __construct() {
		parent::__construct(
			'new_phrase_widget', // Base ID
			'New Ukrainian Phrase', // Name
			array( 'description' => __( 'New Phrase Widget', 'olena' ) ) // Args
		);
	}

    public function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;

		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		?>
		<section class="card">
			<div class="new-phrase card-body">
				<span id="phrase"></span>
				<span id="transcription"></span>
				<span id="translation"></span>
			</div>
		</section>
		<?php
		echo $after_widget;
	}

	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'olena' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'olena' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<?php
	}

    public function update( $new_instance, $old_instance ) {
		$instance          = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	
}





?>