<?php
defined('EVENT_ESPRESSO_VERSION') || exit('No direct script access allowed');



/**
 * Class EE_Module_Fields
 * Description
 *
 * @package        Event Espresso
 * @author         Mike Nelson
 * @since          $VID:$
 */
class EED_Beaver_Builder_Module_Fields extends EED_Module
{
    public static function set_hooks()
    {
        self::setHooksBoth();
    }

    public static function set_hooks_admin()
    {
        self::setHooksBoth();
    }

    protected static function setHooksBoth()
    {
        // add_action('fl_builder_custom_fields', array('EED_Beaver_Builder_Module_Fields', 'add_custom_fields'), 10, 1 );
        add_action('fl_builder_control_event-picker', array('EED_Beaver_Builder_Module_Fields', 'ee_event_picker'), 10, 4);
        add_action('plugins_loaded',array('EED_Beaver_Builder_Module_Fields', 'plugins_loaded'));
    }

    public static function plugins_loaded()
    {
        // add_filter('fl_builder_custom_fields', array('EED_Beaver_Builder_Module_Fields', 'add_custom_fields'), 1 );
        // add_action('fl_builder_control_event-picker', array('EED_Beaver_Builder_Module_Fields', 'ee_event_picker'), 10, 4);
    }

    public static function add_custom_fields($fields)
    {
        $fields['event-picker'] = __DIR__ . '/includes/ui-field-event-picker.php';
        return $fields;
    }

    /**
     * Beaver Builder settings field custom renderer function.
     * See https://www.wpbeaverbuilder.com/custom-module-documentation/#create-custom-fields
     * @param string $name
     * @param mixed $value
     * @param array $field
     * @param array $settings
     */
    public static function ee_event_picker($name, $value, $field, $settings)
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



    /**
     *    run - initial module setup
     *    this method is primarily used for activating resources in the EE_Front_Controller thru the use of filters
     *
     * @access    public
     * @var            WP $WP
     * @return    void
     */
    public function run($WP)
    {

    }
}
// End of file EE_Module_Fields.php
// Location: ${NAMESPACE}/EE_Module_Fields.php