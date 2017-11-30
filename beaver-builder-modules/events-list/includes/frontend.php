<div class="ee-eventslist-content">
	<div class="espresso_events_list">
		<h3 class="events-list-title">
			<?php 
			//Table Title
			if ( $settings->list_title ) {
			 	echo $settings->list_title;
			} ?>
		</h3>

		<p class="events-list-description">
			<?php 
			//Table Title
			if ( $settings->list_description ) {
				echo $settings->list_description;
			} ?>
		</p>

		<?php
		
		//Events List
		//Shortcode Parameters: [ESPRESSO_EVENTS] (Show a list of all of your events)
		// title="My Super Event List" (Set a custom title for the event list)
		// show_title=false (Don't display a title/heading before the event list)
		// limit=5 (Limit (paginate) the number of events that are shown in the event list on a page or post)
		// css_class=my-custom-class (Add a custom CSS class to each event post/article)
		// month="November 2017" (Filter the event list by month and year)
		// show_expired=true (Show expired events in the event list)
		// sort=ASC (Sorts the event list in ascending order)
		// sort=DESC (Sorts the event list in descending order)
		// order_by=start_date,id (Order the event list by a specific set of parameters (refer to available options below))

		if ($settings->month != ''){
			$month = 'month='.$settings->month;
		}

		echo '<div class="espresso-events-list">';
		echo do_shortcode( '[ESPRESSO_EVENTS show_expired='.$settings->show_expired.' limit='.$settings->limit.' '.$month.']' );
		echo '</div>';
		   
		?>
	</div>
</div>
