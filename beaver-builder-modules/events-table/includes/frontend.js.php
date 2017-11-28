/**
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
*/
(function($) {

        $(".fl-node-<?php echo $id; ?> table.espresso-table tbody tr:nth-child(odd)").addClass("odd");
        $(".fl-node-<?php echo $id; ?> table.espresso-table tbody tr:nth-child(even)").addClass("even");


})(jQuery);
jQuery(document).ready(function($){

	$("#ee_filter_cat").change(function() {
		var ee_filter_cat_id = $(this).find("option:selected").attr('class');
		var ee_filter_table_rows = $(".espresso-table-row");
		// console.log(ee_filter_cat_id);
		ee_filter_table_rows.each(function() {
			if ( $(this).hasClass( ee_filter_cat_id ) ) {
				$(this).show();
			} else  {
				$(this).hide();
			}
		});
		if( ee_filter_cat_id === 'ee_filter_show_all') {
			ee_filter_table_rows.show();
		}
	});

	if ( $.isFunction($.fn.footable) ) {
		$('.footable').footable();
	}
});
<?php
    // do_action('wp_enqueue_scripts');
    // do_action('wp_print_scripts');
// EED_Ticket_Selector::translate_js_strings();
// EED_Ticket_Selector::load_tckt_slctr_assets();
// $a = 1;