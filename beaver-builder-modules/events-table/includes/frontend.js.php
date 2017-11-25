/**
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
*/
(function($) {

        $(".fl-node-<?php echo $id; ?> table.espresso-table tbody tr:nth-child(odd)").addClass("odd");
        $(".fl-node-<?php echo $id; ?> table.espresso-table tbody tr:nth-child(even)").addClass("even");


})(jQuery);

<?php
    // do_action('wp_enqueue_scripts');
    // do_action('wp_print_scripts');
// EED_Ticket_Selector::translate_js_strings();
// EED_Ticket_Selector::load_tckt_slctr_assets();
// $a = 1;