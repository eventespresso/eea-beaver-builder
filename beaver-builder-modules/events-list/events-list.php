<?php

/**
 * @class PPEspressoEventsListModule
 */
class EspressoEventsListModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => esc_html__('Events List', 'event_espresso'),
            'description'   => esc_html__('An events list view module for Event Espresso.', 'event_espresso'),
            'group'         => esc_html__('Event Espresso', 'event_espresso'),
            'category'		=> esc_html__('Event Styler Modules', 'event_espresso'),
            'dir'           => EE_BEAVER_BUILDER_EVENTS_LIST_MODULE_PATH,
            'url'           => EE_BEAVER_BUILDER_EVENTS_LIST_MODULE_URL,
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
            'icon'				=> 'schedule.svg',
        ));
    }

    /**
     * @method enqueue_scripts
     */
    public function enqueue_scripts()
    {        
        
    }
}

require_once EE_BEAVER_BUILDER_EVENTS_LIST_MODULE_PATH . '/includes/functions.php';

/**
 * Register the module and its event settings.
 */
FLBuilder::register_module('EspressoEventsListModule', array(
    'eventslist'       => array( // Tab
        'title'         => __('List', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections

            //Table Details
            'list_settings'     => array(
                'title'             => __('List Details', 'event_espresso'),
                'fields'            => array( // Section Fields
                    
                    'list_title'      => array(
                        'type'          => 'text',
                        'label'         => __('List Title', 'event_espresso'),
                        'default'       => '',
                        'placeholder'   => 'Add a title to the events list (optional).',
                        'connections'   => array('string'),
						'preview'       => array(
                            'type'      => 'text',
                            'selector'  => '.events-list-title'
                        )
                    ),
                    
                    'list_description'    => array(
                        'type'              => 'textarea',
                        'label'             => __('List Description', 'event_espresso'),
                        'default'           => '',
                        'placeholder'       => 'Add a description to the events list (optional).',
                        'rows'              => '6',
                        'connections'       => array('string', 'html'),
                        'preview'           => array(
                            'type'          => 'text',
                            'selector'      => '.events-list-description'
                        )
                    ),
                )
            ),
            'list_options'    => array( // Section
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
                            'selector'  => '.events-list-title',
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
                            'selector'  => '.events-list-description',
                            'property'  => 'text-align'
                        )
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
                            'selector'  => '.ee-eventslist-content',
                            'property'  => 'background-color'
                        )
                    ),
					'container_background_opacity'    => array(
                        'type'                 => 'text',
                        'label'                => __('Background Opacity', 'event_espresso'),
                        'class'                => 'ee-eventslist-input input-small',
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
                        'class'         => 'ee-eventslist-input input-small',
                        'default'       => 0,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-eventslist-content',
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
                            'selector'  => '.ee-eventslist-content',
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
                            'selector'  => '.ee-eventslist-content',
                            'property'  => 'border-style'
                        )
                    ),
                )
            ),
            'list_container'        => array(
                'title'                 => __('Corners & Padding', 'event_espresso'),
                'fields'                => array(
                    'container_border_radius' 	=> array(
                        'type'          => 'text',
                        'label'         => __('Round Corners', 'event_espresso'),
                        'description'   => 'px',
                        'default'       => 2,
                        'maxlength'     => '3',
                        'size'          => '4',
                        'class'         => 'ee-eventslist-input input-small',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-eventslist-content',
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
                            'selector'  => '.ee-eventslist-content',
                            'property'  => 'padding',
                            'unit'      => 'px'
                        )
                    ),
                    
                )
            ),
            
        )
    ),
    
    'list_typography'       => array( // Tab
        'title'         => __('Typography', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections
            'title_typography'       => array( // Section
                'title'         => __('Title', 'event_espresso'), // Section Title
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
                            'selector'        => '.events-list-title'
                        )
                    ),
                    'title_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventslist-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.events-list-title',
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
                            'selector'  => '.events-list-title',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
            'description_typography'    => array(
                'title' => __('Description', 'event_espresso'),
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
                            'selector'        => '.events-list-description'
                        )
                    ),
                    'description_font_size'    => array(
                        'type'                 => 'text',
                        'label'                => __('Font Size', 'event_espresso'),
                        'description'          => 'px',
                        'class'                => 'ee-eventslist-input input-small',
                        'default'              => '',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.events-list-description',
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
                            'selector'  => '.events-list-description',
                            'property'  => 'color'
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
                            'selector'        => '.espresso-events-list .a_register_link'
                        )
                    ),
                    'link_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventslist-input input-small',
                        'default'       => '',
                        'description'   => 'px',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-events-list .a_register_link',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
                    ),
                    'link_font_color'       => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-events-list .a_register_link',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
        )
    ),

));
