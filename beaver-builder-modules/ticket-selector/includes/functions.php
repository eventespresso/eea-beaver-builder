<?php
/**
 * Functions file for Espresso Ticket module
 */

function espresso_module_event_titles() {

    $options = array( '' => __('None', 'event_espresso') );
    if ( class_exists( 'EE_Registry' ) ) {
        $events = EEM_Event::instance()->get_active_and_upcoming_events(array());
        if ( ! empty( $events )) {
            foreach ( $events as $event ) {
                //echo $event->ID();
                $options[$event->ID()] = $event->name();
            }
        }
    }

    return $options;
}

/**
 * Hex to Rgba
 */
function espresso_hex2rgba( $hex, $opacity )
{
    $hex = str_replace( '#', '', $hex );

    if ( strlen($hex) == 3 ) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgba = array($r, $g, $b, $opacity);

    return 'rgba(' . implode(', ', $rgba) . ')';
}
