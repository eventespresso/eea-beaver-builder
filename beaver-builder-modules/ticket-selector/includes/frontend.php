<?php
$event_id = $settings->select_event_field;
if ( $settings->select_event_field ) {
	if (espresso_display_ticket_selector($event_id)){
		$event = get_post( $event_id );
		$event_content = $event->post_content;
		$event_content = apply_filters('the_content', $event_content);
		$event_content = str_replace(']]>', ']]&gt;', $event_content);
		$event_date = '';
		
		//Build Date
		if ( $settings->event_datetimes == 'yes' ) {
				if ( $settings->date_display == 'single') {
					$event_date = '<p class="event-date espresso_event_date">'.espresso_event_date('','',$event_id, FALSE).'</p>';
				} else {
					$event_date = '<p class="event-date espresso_event_date_range">'.espresso_event_date_range('','','','',$event_id, FALSE).'</p>';
				}
		}

?>
<div class="pp-ee-content">
	<div class="espresso_event_type-single-event">
			<?php 
				//Date Above Title
				if ( $settings->date_location == 'above' ) { 
					echo $event_date;
				}
			?>
			<h3 class="event-title custom-event-title">
				<?php 
				//Custom Title
				if ( $settings->custom_title ) {
				 	echo $settings->custom_title;
				} ?>
			</h3>
			
			<?php 
				//Default Title
				if ( $settings->title_field == 'true') { 
					echo '<h3 class="event-title espresso_event_title">';
				 	echo $event->post_title;
					echo '</h3>';
				}
			?>

			<?php 
				//Date Below Title
				if ( $settings->date_location == 'below' ) {
					echo $event_date;
				}
			?>

			<p class="event-description custom-event-description">
				<?php 
				//Custom Title
				if ( $settings->custom_description ) {
					
					echo $settings->custom_description;
				} ?>
			</p>

			<?php 
			//Event Description
			if ( $settings->description_field == 'true') {
				//Default Description
				echo '<div class="event-description espresso_event_description">';
				echo $event_content;
				echo '</div>';
			}

			//Ticket Selector
			if ( $settings->display_ticket_selector == 'true') {
				echo '<div class="event-tickets">';
			    	echo do_shortcode( '[ESPRESSO_TICKET_SELECTOR event_id='.absint( $event_id ).' ]' );
			    echo '</div>';
			}
		    
		    //Date Time List		
		    if ( $settings->event_datetimes == 'yes') {
				if ( $settings->date_list == 'true') {
			   		echo '<div class="event-datetimes">';
			   			echo espresso_list_of_event_dates($event_id);
			   		echo '</div>';
			   	}
			}		    		
		    		//Event Status Banner
		    		//echo espresso_event_status_banner($event_id);

		    		//Event Status
		    		//echo espresso_event_status($event_id);

		    		//echo espresso_event_date_as_calendar_page($event_id);
		    
		    ?>
	    </div>
	</div>
<?php
	}
}