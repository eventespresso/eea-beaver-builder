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
                        'class'                => 'ee-table-input input-small',
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
            'list_templates'    => array( // Section
                'title'         => __('Template Settings', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'template_info'    => array(
                        'type'                      => 'additional-layout-options',
                        'label'                     => '<p><strong>'.__('Additional Layout Options', 'event_espresso').'</strong></p><p>'.sprintf( esc_html__('%sClick here%s to manage a wider range of event list layout options.', 'event_espresso'),'<em><a href="?page=espresso_events&action=template_settings">','</a></em>').'</p>',
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
                'title'         => __('List Title', 'event_espresso'), // Section Title
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
                'title' => __('List Description', 'event_espresso'),
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
                        'class'         => 'ee-eventslist-input input-small',
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
            'event_description_typography'    => array(
                'title' => __('Event Description', 'event_espresso'),
                'fields'    => array(
                    'event_description_font_family' => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.event-content > p'
                        )
                    ),
                    'event_description_font_size'    => array(
                        'type'                 => 'text',
                        'label'                => __('Font Size', 'event_espresso'),
                        'description'          => 'px',
                        'class'                => 'ee-eventslist-input input-small',
                        'default'              => '',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.event-content > p',
                            'property'         => 'font-size',
                            'unit'             => 'px'
                        )
                    ),
                    'event_description_color' => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.event-content > p',
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
                        'class'         => 'ee-eventlist-input input-small',
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
            'button_typography'       => array( // Section
                'title'         => __('Button', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'button_font_family' => array(
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
                    'button_font_size'   => array(
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
                )
            ),
        )
    ),
    
    'button_style'      => array(
        'title'             => __('Button', 'event_espresso'),
        'sections'          => array(
            'button_bg'         => array(
                'title'             => __('Colors', 'event_espresso'),
                'fields'            => array(
                    'button_text_color' => array(
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
                    'button_hover_text_color'    => array(
                        'type'                   => 'color',
                        'label'                  => __('Text Color Hover', 'event_espresso'),
                        'default'                => 'eeeeee',
                        'show_reset'             => true,
                        'preview'                => array(
                            'type'               => 'css',
                            'selector'           => '.ticket-selector-submit-btn:hover',
                            'property'           => 'color'
                        )
                    ),
                    'button_bg_color'   => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'event_espresso'),
                        'default'       => '333333',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ticket-selector-submit-btn',
                            'property'  => 'background-color'
                        )
                    ),
                    'button_background_opacity'    => array(
                        'type'                 => 'text',
                        'label'                => __('Background Opacity', 'event_espresso'),
                        'class'                => 'ee-eventlist input-small',
                        'default'              => '1',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.ticket-selector-submit-btn',
                            'property'         => 'opacity',
                        )
                    ),
                    'button_hover_bg_color'    => array(
                        'type'                 => 'color',
                        'label'                => __('Background Color Hover', 'event_espresso'),
                        'default'              => '',
                        'show_reset'           => true,
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.ticket-selector-submit-btn:hover',
                            'property'         => 'background-color'
                        )
                    ),
                )
            ),
            'button_border'     => array(
                'title'             => __('Border', 'event_espresso'),
                'fields'            => array(
                    'button_border_width'    => array(
                        'type'               => 'text',
                        'label'              => __('Border Width', 'event_espresso'),
                        'description'        => 'px',
                        'class'              => 'ee-eventlist input-small',
                        'default'            => '1',
                        'preview'            => array(
                            'type'           => 'css',
                            'selector'       => '.ticket-selector-submit-btn',
                            'property'       => 'border-width',
                            'unit'           => 'px'
                        )
                    ),
                    'button_border_color'    => array(
                        'type'               => 'color',
                        'label'              => __('Border Color', 'event_espresso'),
                        'default'            => '333333',
                        'show_reset'         => true,
                        'preview'            => array(
                            'type'           => 'css',
                            'selector'       => '.ticket-selector-submit-btn',
                            'property'       => 'border-color'
                        )
                    ),
                )
            ),
            'button_settings'       => array( // Section
                'title'             => __('Size & Alignment', 'event_espresso'), // Section Title
                'fields'            => array( // Section Fields
                    'button_width'  => array(
                        'type'      => 'select',
                        'label'     => __('Full Width', 'event_espresso'),
                        'default'   => 'false',
                        'options'   => array(
                            'true'  => __('Yes', 'event_espresso'),
                            'false' => __('No', 'event_espresso'),
                        ),
                        'toggle'    => array(
                            'false' => array(
                                'fields'    => array('button_alignment')
                            )
                        )
                    ),
                    'button_alignment'  => array(
                        'type'          => 'select',
                        'label'         => __('Button Alignment', 'event_espresso'),
                        'default'       => 'right',
                        'options'       => array(
                            'left'      => __('Left', 'event_espresso'),
                            'center'    => __('Center', 'event_espresso'),
                            'right'     => __('Right', 'event_espresso'),
                        )
                    ),
                )
            ),
            'button_corners'        => array(
                'title'                 => __('Corners & Padding', 'event_espresso'),
                'fields'                => array(
                    'button_border_radius'    => array(
                        'type'                => 'text',
                        'label'               => __('Round Corners', 'event_espresso'),
                        'description'         => 'px',
                        'class'               => 'ee-eventlist input-small',
                        'default'             => '2',
                        'preview'             => array(
                            'type'            => 'css',
                            'selector'        => '.ticket-selector-submit-btn',
                            'property'        => 'border-radius',
                            'unit'            => 'px'
                        )
                    ),
                    'button_padding_top_bottom'    => array(
                        'type'          => 'text',
                        'label'         => __('Top/Bottom Padding', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventlist input-small',
                        'default'       => '10',
                        'preview'             => array(
                            'type'            => 'css',
                            'rules'           => array(
                                array(
                                    'selector'        => '.ticket-selector-submit-btn',
                                    'property'        => 'padding-top',
                                    'unit'            => 'px'
                                ),
                                array(
                                    'selector'        => '.ticket-selector-submit-btn',
                                    'property'        => 'padding-bottom',
                                    'unit'            => 'px'
                                ),
                            ),
                        )
                    ),
                    'button_padding_left_right'    => array(
                        'type'          => 'text',
                        'label'         => __('Left/Right Padding', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-eventlist-input input-small',
                        'default'       => '10',
                        'preview'             => array(
                            'type'            => 'css',
                            'rules'           => array(
                                array(
                                    'selector'        => '.ticket-selector-submit-btn',
                                    'property'        => 'padding-left',
                                    'unit'            => 'px'
                                ),
                                array(
                                    'selector'        => '.ticket-selector-submit-btn',
                                    'property'        => 'padding-right',
                                    'unit'            => 'px'
                                ),
                            ),
                        )
                    ),
                )
            ),
        )
    ),


));
