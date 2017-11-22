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
 * Beaver Builder settings field custom renderer function.
 * See https://www.wpbeaverbuilder.com/custom-module-documentation/#create-custom-fields
 * @param string $name
 * @param mixed $value
 * @param array $field
 * @param array $settings
 */
function ee_event_picker($name, $value, $field, $settings)
{
    $input = new EE_Select_Input(
        espresso_module_event_titles(),
        array(
            'html_name' => $name,
            'html_label_text' => '',
            'default'   => $value,
        )
    );
    $mini_form = new EE_Form_Section_Proper(
        array(
            'name'            => 'unused',
            'layout_strategy' => new EE_No_Layout(),
            'subsections'     => array(
                'event' => $input
            )
        )
    );
    echo $mini_form->get_html();
}
/*
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
