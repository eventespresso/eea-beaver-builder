<?php

/**
 * @class PPEspressoEventsCalendarModule
 */
class EspressoEventsCalendarModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => esc_html__('Events Calendar', 'event_espresso'),
            'description'   => esc_html__('An events calendar module for Event Espresso.', 'event_espresso'),
            'group'         => esc_html__('Event Espresso', 'event_espresso'),
            'category'		=> esc_html__('Event Styler Modules', 'event_espresso'),
            'dir'           => EE_BEAVER_BUILDER_EVENTS_CALENDAR_MODULE_PATH,
            'url'           => EE_BEAVER_BUILDER_EVENTS_CALENDAR_MODULE_URL,
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
            'icon'				=> 'clock.svg',
        ));
    }

    /**
     * @method enqueue_scripts
     */
    public function enqueue_scripts()
    {        
        
    }
}

require_once EE_BEAVER_BUILDER_EVENTS_CALENDAR_MODULE_PATH . '/includes/functions.php';

/**
 * Register the module and its event settings.
 */
FLBuilder::register_module('EspressoEventsCalendarModule', array(
    'eventscalendar'       => array( // Tab
        'title'         => __('Calendar', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections

            //Calendar Details
            'calendar_settings'     => array(
                'title'             => __('Calendar Details', 'event_espresso'),
                'fields'            => array( // Section Fields
                    
                    'calendar_title'      => array(
                        'type'          => 'text',
                        'label'         => __('Calendar Title', 'event_espresso'),
                        'default'       => '',
                        'placeholder'   => 'Add a title to the events calendar (optional).',
                        'connections'   => array('string'),
						'preview'       => array(
                            'type'      => 'text',
                            'selector'  => '.events-calendar-title'
                        )
                    ),
                    
                    'calendar_description'    => array(
                        'type'              => 'textarea',
                        'label'             => __('Calendar Description', 'event_espresso'),
                        'default'           => '',
                        'placeholder'       => 'Add a description to the events calendar (optional).',
                        'rows'              => '6',
                        'connections'       => array('string', 'html'),
                        'preview'           => array(
                            'type'          => 'text',
                            'selector'      => '.events-calendar-description'
                        )
                    ),

                    'button_text'      => array(
                        'type'          => 'text',
                        'label'         => __('Button Text', 'event_espresso'),
                        'default'       => '',
                        'placeholder'   => 'Title of the register now text (default: "Register Now").',
                        //'connections'   => array('string'),
                        /*'preview'       => array(
                            'type'      => 'text',
                            'selector'  => '.events-calendar-title'
                        )*/
                    ),
                )
            ),
            'calendar_options'    => array( // Section
                'title'         => __('Options', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'title_alignment'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Title Alignment', 'event_espresso'),
                        'default'                   => 'left',
                        'options'                   => array(
                            'left'                  => __('Left', 'event_espresso'),
                            'center'                => __('Center', 'event_espresso'),
                            'right'                 => __('Right', 'event_espresso'),
                        ),
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.events-calendar-title',
                            'property'  => 'text-align'
                        )
                    ),
                    'description_alignment'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Description Alignment', 'event_espresso'),
                        'default'                   => 'left',
                        'options'                   => array(
                            'left'                  => __('Left', 'event_espresso'),
                            'center'                => __('Center', 'event_espresso'),
                            'right'                 => __('Right', 'event_espresso'),
                        ),
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.events-calendar-description',
                            'property'  => 'text-align'
                        )
                    ),
                    'show_expired'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Expired Events', 'event_espresso'),
                        'default'                   => 'true',
                        'options'                   => array(
                            'true'                  => __('Show', 'event_espresso'),
                            'false'                => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'limit'    => array(
                        'type'                 => 'text',
                        'label'                => __('Limit', 'event_espresso'),
                        'class'                => 'ee-eventcalendar-input input-small',
                        'default'              => '20',
                        'maxlength'     => '4',
                        'size'          => '4',
                        'description'          => __('between 1 to 1000', 'event_espresso'),
                    ),
                    'month'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Month', 'event_espresso'),
                        'help'                      => __('Displays a single month.', 'event_espresso'),
                        'default'                   => '',
                        'options'                   => array(
                            ''                      => __('All', 'event_espresso'),
                            'january'               => __('January', 'event_espresso'),
                            'february'              => __('February', 'event_espresso'),
                            'march'                 => __('March', 'event_espresso'),
                            'april'                 => __('April', 'event_espresso'),
                            'may'                   => __('May', 'event_espresso'),
                            'june'                  => __('June', 'event_espresso'),
                            'july'                  => __('July', 'event_espresso'),
                            'august'                => __('August', 'event_espresso'),
                            'september'             => __('September', 'event_espresso'),
                            'october'               => __('October', 'event_espresso'),
                            'november'              => __('November', 'event_espresso'),
                            'december'              => __('December', 'event_espresso'),
                        ),
                    ),
                )
            ),        
        ),

    ),
    'style'       => array( // Tab
        'title'         => __('Container', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections
            'container_setting'      => array( // Section
                'title'         => __('Container Background', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'container_bg_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.fl-node-content, .espresso-calendar',
                            'property'  => 'background-color'
                        )
                    ),
					'container_background_opacity'    => array(
                        'type'                 => 'text',
                        'label'                => __('Background Opacity', 'event_espresso'),
                        'class'                => 'ee-eventgcalendar-input input-small',
                        'default'              => '1',
                        'description'          => __('between 0 to 1', 'event_espresso'),
                    ),
					
                )
            ),
            'container_border'       => array(
                'title'             => __('Container  Border', 'event_espresso'),
                'fields'            => array(
                    'container_border_width'      => array(
                        'type'          => 'text',
                        'label'         => __('Border Width', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventcalendar-input input-small',
                        'default'       => 0,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.fl-node-content',
                            'property'  => 'border-width',
                            'unit'      => 'px'
                        )
                    ),
                    'container_border_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.fl-node-content',
                            'property'  => 'border-color'
                        )
                    ),
                    'container_border_style' 	=> array(
                        'type'          => 'select',
                        'label'         => __('Border Style', 'event_espresso'),
                        'default'       => 'solid',
                        'options'		=> array(
                            'solid'		=> __('Solid', 'event_espresso'),
                       		'dashed'	=> __('Dashed', 'event_espresso'),
                       		'dotted'	=> __('Dotted', 'event_espresso'),
                        ),
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.fl-node-content',
                            'property'  => 'border-style'
                        )
                    ),
                )
            ),
            'calendar_container'        => array(
                'title'                 => __('Corners & Padding', 'event_espresso'),
                'fields'                => array(
                    'container_border_radius' 	=> array(
                        'type'          => 'text',
                        'label'         => __('Round Corners', 'event_espresso'),
                        'description'   => 'px',
                        'default'       => 2,
                        'maxlength'     => '3',
                        'size'          => '4',
                        'class'         => 'ee-eventcalendar-input input-small',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.fl-node-content',
                            'property'  => 'border-radius',
                            'unit'      => 'px'
                        )
                    ),
                    'container_padding'   => array(
                        'type'          => 'text',
                        'label'         => __( 'Padding', 'event_espresso' ),
                        'default'       => 10,
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.fl-node-content',
                            'property'  => 'padding',
                            'unit'      => 'px'
                        )
                    ),
                    
                )
            ),
            
        )
    ),
    
    'calendar_typography'       => array( // Tab
        'title'         => __('Typography', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections
            'title_typography'       => array( // Section
                'title'         => __('Calendar Title', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'title_font_family' => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.events-calendar-title'
                        )
                    ),
                    'title_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventcalendar-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.events-calendar-title',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
                    ),
                    'title_color'       => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.events-calendar-title',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
            'description_typography'    => array(
                'title' => __('Calendar Description', 'event_espresso'),
                'fields'    => array(
                    'description_font_family' => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.events-calendar-description'
                        )
                    ),
                    'description_font_size'    => array(
                        'type'                 => 'text',
                        'label'                => __('Font Size', 'event_espresso'),
                        'description'          => 'px',
                        'class'                => 'ee-eventcalendar-input input-small',
                        'default'              => '',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.events-calendar-description',
                            'property'         => 'font-size',
                            'unit'             => 'px'
                        )
                    ),
                    'description_color' => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.events-calendar-description',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
            'event_title_typography'       => array( // Section
                'title'         => __('Event Title', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'event_title_font_family' => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.event-header h2.entry-title'
                        )
                    ),
                    'event_title_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventcalendar-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.event-header h2.entry-title',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
                    ),
                    'event_title_color'       => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.event-header h2.entry-title a',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
            
            'date_typography'   => array(
                'title' => __( 'Event Date', 'event_espresso' ),
                'fields'    => array(
                    'date_font_family' => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.event-datetimes'
                        )
                    ),
                    'date_font_size'      => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventcalendar-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.event-datetimes',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
                    ),
                    'date_text_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'           => array(
                            'type'          => 'css',
                            'selector'      => '.event-datetimes .ee-event-datetimes-ul li',
                            'property'      => 'color'
                        )
                    ),
                )
            ),
            'link_typography'       => array( // Section
                'title'         => __('Register Link', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'link_font_family' => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.ticket-selector-submit-btn'
                        )
                    ),
                    'link_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventlist-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ticket-selector-submit-btn',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
                    ),
                    'link_text_color' => array(
                        'type'          => 'color',
                        'label'         => __('Text Color', 'event_espresso'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ticket-selector-submit-btn',
                            'property'  => 'color'
                        )
                    ),
                )
            ),

        )
    ),


));
