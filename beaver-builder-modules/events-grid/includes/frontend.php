<div class="ee-eventgrid-content">
	<div class="espresso_events_grid">
		<h3 class="events-grid-title">
			<?php 
			//Table Title
			if ( $settings->grid_title ) {
			 	echo $settings->grid_title;
			} ?>
		</h3>

		<p class="events-grid-description">
			<?php 
			//Table Title
			if ( $settings->grid_description ) {
				echo $settings->grid_description;
			} ?>
		</p>

		<?php
		
		//Events Grid
		//Shortcode Parameters: [ESPRESSO_GRID_TEMPLATE] (Show a grid of all of your events)
		// button_text = "Register Now!"
		// alt_button_text = "View Details"
		// default_image = image URL
		// limit = 10
		// show_expired = FALSE
		// month = NULL
		// category_slug = NULL
		// order_by = start_date
		// sort = ASC
		$month = NULL;
		if ($settings->month != ''){
			$month = 'month='.$settings->month;
		}
		$button_text = NULL;
		if ($settings->button_text != ''){
			$button_text = 'button_text="'.$settings->button_text.'"';
		}

		echo '<div class="espresso-events-grid">';
		echo do_shortcode( '[ESPRESSO_GRID_TEMPLATE '.$button_text.' show_expired='.$settings->show_expired.' limit='.$settings->limit.' '.$month.']' );
		echo '</div>';
		   
		?>
	</div>
</div>
