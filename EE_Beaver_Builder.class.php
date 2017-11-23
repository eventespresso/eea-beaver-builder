<?php if (! defined('EVENT_ESPRESSO_VERSION')) {
    exit();
}
// define the plugin directory path and URL
define('EE_BEAVER_BUILDER_BASENAME', plugin_basename(EE_BEAVER_BUILDER_PLUGIN_FILE));
define('EE_BEAVER_BUILDER_PATH', plugin_dir_path(__FILE__));
define('EE_BEAVER_BUILDER_URL', plugin_dir_url(__FILE__));
define('EE_BEAVER_BUILDER_MODULE_PATH', EE_BEAVER_BUILDER_PATH . 'beaver-builder-modules' . DS);
define('EE_BEAVER_BUILDER_MODULE_URL', EE_BEAVER_BUILDER_URL . 'beaver-builder-modules' . DS);
define('EE_BEAVER_BUILDER_TICKET_SELECTOR_MODULE_PATH', EE_BEAVER_BUILDER_MODULE_PATH . 'ticket-selector' . DS);
define('EE_BEAVER_BUILDER_TICKET_SELECTOR_MODULE_URL', EE_BEAVER_BUILDER_MODULE_URL . 'ticket-selector' . DS);
define('EE_BEAVER_BUILDER_ADMIN', EE_BEAVER_BUILDER_PATH . 'admin' . DS . 'beaver_builder' . DS);



/**
 * Class  EE_Beaver_Builder
 *
 * @package     Event Espresso
 * @subpackage  eea-beaver-builder
 * @author      Brent Christensen
 */
Class  EE_Beaver_Builder extends EE_Addon
{

    /**
     * EE_Beaver_Builder constructor.
     * !!! IMPORTANT !!!
     * you should NOT run any logic in the constructor for addons
     * because addon construction should NOT result in code execution.
     * Successfully registering the addon via the EE_Register_Addon API
     * should be the ONLY way that code should execute.
     * This prevents errors happening due to incompatibilities between addons and core.
     * If you run code here, but core deems it necessary to NOT activate this addon,
     * then fatal errors could happen if this code attempts to reference
     * other classes that do not exist because they have not been loaded.
     * That said, it's still a better idea to any extra code
     * in the after_registration() method below.
     */
    // public function __construct()
    // {
    //     // if for some reason you absolutely, positively NEEEED a constructor...
    //     // then at least make sure to call the parent class constructor,
    //     // or things may not operate as expected.
    //     parent::__construct();
    // }
    /**
     * !!! IMPORTANT !!!
     * this is not the place to perform any logic or add any other filter or action callbacks
     * this is just to bootstrap your addon; and keep in mind the addon might be DE-registered
     * in which case your callbacks should probably not be executed.
     * EED_Beaver_Builder is typically the best place for most filter and action callbacks
     * to be placed (relating to the primary business logic of your addon)
     * IF however for some reason, a module does not work because you have some logic
     * that needs to run earlier than when the modules load,
     * then please see the after_registration() method below.
     *
     * @throws \EE_Error
     */
    public static function register_addon()
    {

        if (class_exists('FLBuilder')) {
            add_action('init', array('EE_Beaver_Builder', 'init_beaver_builder_module'));
        }
        // // register addon via Plugin API
        EE_Register_Addon::register(
            'Beaver_Builder',
            array(
                'version'          => EE_BEAVER_BUILDER_VERSION,
                'plugin_slug'      => 'espresso_beaver_builder',
                'min_core_version' => EE_BEAVER_BUILDER_CORE_VERSION_REQUIRED,
                'main_file_path'   => EE_BEAVER_BUILDER_PLUGIN_FILE,
                'module_paths'     => array(EE_BEAVER_BUILDER_PATH . 'EED_Beaver_Builder_Module_Fields.module.php'),
            )
        );
        // 		'namespace'             => array(
        // 			'FQNS' => 'EventEspresso\NewAddon',
        // 			'DIR'  => __DIR__,
        // 		),
        // 		'admin_path'            => EE_BEAVER_BUILDER_ADMIN,
        // 		'admin_callback'        => '',
        // 		'autoloader_paths'      => array(
        // 			'EE_Beaver_Builder_Config'       => EE_BEAVER_BUILDER_PATH . 'EE_Beaver_Builder_Config.php',
        // 			'Beaver_Builder_Admin_Page'      => EE_BEAVER_BUILDER_ADMIN . 'Beaver_Builder_Admin_Page.core.php',
        // 			'Beaver_Builder_Admin_Page_Init' => EE_BEAVER_BUILDER_ADMIN . 'Beaver_Builder_Admin_Page_Init.core.php',
        // 		),
        // 		// if plugin update engine is being used for auto-updates. not needed if PUE is not being used.
        // 		'pue_options'           => array(
        // 			'pue_plugin_slug' => 'eea-beaver-builder',
        // 			'plugin_basename' => EE_BEAVER_BUILDER_BASENAME,
        // 			'checkPeriod'     => '24',
        // 			'use_wp_update'   => false,
        // 		),
        // 	)
        // );
    }



    public static function init_beaver_builder_module()
    {
        require_once 'beaver-builder-modules/ticket-selector/espresso-ticket.php';
    }



    /**
     * uncomment this method and use it as
     * a safe space to add additional logic like setting hooks
     * that will run immediately after addon registration
     * making this a great place for code that needs to be "omnipresent"
     *
     * @since 4.9.26
     */
    public function after_registration()
    {
        // your logic here
    }



}
// End of file EE_Beaver_Builder.class.php
// Location: wp-content/plugins/eea-beaver-builder/EE_Beaver_Builder.class.php
