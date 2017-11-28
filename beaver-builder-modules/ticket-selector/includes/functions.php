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
