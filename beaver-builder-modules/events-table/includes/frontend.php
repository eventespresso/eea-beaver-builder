<div class="pp-ee-content">
	<div class="espresso_events_table">
		<h3 class="events-table-title">
			<?php 
			//Table Title
			if ( $settings->table_title ) {
			 	echo $settings->table_title;
			} ?>
		</h3>

		<p class="events-table-description">
			<?php 
			//Table Title
			if ( $settings->table_description ) {
				echo $settings->table_description;
			} ?>
		</p>

		<?php

		//Events Table
			echo '<div class="events-table">';
		    	echo do_shortcode( '[ESPRESSO_EVENTS_TABLE_TEMPLATE]' );
		    echo '</div>';
		   
		?>
	</div>
</div>
