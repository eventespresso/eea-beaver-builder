<div class="ee-eventcalendar-content">
	<div class="espresso_events_calendar">
		<h3 class="events-calendar-title">
			<?php 
			//Table Title
			if ( $settings->calendar_title ) {
			 	echo $settings->calendar_title;
			} ?>
		</h3>

		<p class="events-calendar-description">
			<?php 
			//Table Title
			if ( $settings->calendar_description ) {
				echo $settings->calendar_description;
			} ?>
		</p>

		<?php
		
		//Events Calendar
		//Shortcode Parameters: [ESPRESSO_CALENDAR] (Show a calendar with of all of your events)
		// show_expired = FALSE
		// cal_view = NULL
		// event_category_id = NULL
		// event_venue_id=your_venue_id
		// cal_view=basicWeek
		// cal_view=basicDay
		// cal_view=agendaWeek
		// cal_view=agendaDay
		$month = NULL;
		if ($settings->month != ''){
			$month = 'month='.$settings->month;
		}

		echo '<div class="espresso-events-calendar">';
		echo do_shortcode( '[ESPRESSO_CALENDAR show_expired='.$settings->show_expired.' '.$month.']' );
		echo '</div>';
		   
		?>
	</div>
</div>
