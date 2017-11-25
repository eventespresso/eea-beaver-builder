<div class="ee-table-content">
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
		//Testing
			//echo '<p>RESULTS: '.$settings->table_striping.'</p>';

		//Events Table
		//Shortcode Parameters: footable = false (disables FooTable), table_search = false (turn off search), 
		//  table_style = standalone (alternate styles: metro), table_sort = false (disables FooTable sorting), 
		//  table_striping = false (turn off striping), table_paging = false (hide paging), table_pages = 10, 
		//  limit = 1000, show_expired = FALSE, month = NULL, category_slug = NULL, category_filter = false, 
		//  order_by = start_date, sort = ASC, 
		//  template_file = espresso-events-table-template-toggle.template.php (creates a table with two columns and a toggle to expand the row) (users can upload custom templates to wp-content/uploads/espresso/templates/)

			echo '<div class="events-table">';
		    	echo do_shortcode( '[ESPRESSO_EVENTS_TABLE_TEMPLATE category_filter = '.$settings->category_filter.' table_search = '.$settings->table_search.' table_sort = '.$settings->table_sort.' table_paging=true table_striping = '.$settings->table_striping.' show_expired='.$settings->show_expired.' limit='.$settings->limit.'  footable=true table_sort=true]' );
		    echo '</div>';
		   
		?>
	</div>
</div>
