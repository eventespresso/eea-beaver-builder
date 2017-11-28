<?php

/**
 * @class PPEspressoTicketModule
 */
class EspressoTicketModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => esc_html__('Event Ticket', 'event_espresso'),
            'description'   => esc_html__('A ticket selector module for Event Espresso.', 'event_espresso'),
            'group'         => esc_html__('Event Espresso', 'event_espresso'),
            'category'		=> esc_html__('Event Styler Modules', 'event_espresso'),
            'dir'           => EE_BEAVER_BUILDER_TICKET_SELECTOR_MODULE_PATH,
            'url'           => EE_BEAVER_BUILDER_TICKET_SELECTOR_MODULE_URL,
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
            'icon'				=> 'editor-table.svg',
        ));
    }

    /**
     * @method enqueue_scripts
     */
    public function enqueue_scripts()
    {
        add_filter('FHEE__EED_Ticket_Selector__load_tckt_slctr_assets', '__return_true');
    }
}

require_once EE_BEAVER_BUILDER_TICKET_SELECTOR_MODULE_PATH . '/includes/functions.php';

add_action('fl_builder_control_event-picker', 'ee_event_picker', 10, 4);


/**
 * Register the module and its event settings.
 */
FLBuilder::register_module('EspressoTicketModule', array(
    'event'       => array( // Tab
        'title'         => __('General', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections
            'select_event'       => array( // Section
                'title'         => '', // Section Title
                'fields'        => array( // Section Fields
                    'select_event_field' => array(
                        'type'          => 'select',
                        'label'         => __('Select Event', 'event_espresso'),
                        'default'       => '',
                         'options'       => 'espresso_module_event_titles'
                    ),
                
                )
            ),
            //Event Details
            'event_settings'     => array(
                'title'             => __('Event Details', 'event_espresso'),
                'fields'            => array(
                    'event_custom_title_desc'   => array(
                        'type'          => 'select',
                        'label'         => __('Custom Title & Description', 'event_espresso'),
                        'default'       => 'no',
                        'options'       => array(
                            'yes'      => __('Yes', 'event_espresso'),
                            'no'     => __('No', 'event_espresso'),
                        ),
                        'toggle' => array(
                            'yes'      => array(
                                'fields'  => array('custom_title', 'custom_description'),
                            ),
                            'no'    => array(
                                'fields'    => array('title_field', 'description_field')
                            )
                        )
                    ),
                    'title_field'   => array(
                        'type'          => 'select',
                        'label'         => __('Title', 'event_espresso'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Show', 'event_espresso'),
                            'false'     => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'custom_title'      => array(
                        'type'          => 'text',
                        'label'         => __('Custom Title', 'event_espresso'),
                        'default'       => '',
                        'description'   => '',
                        'connections'   => array('string'),
						'preview'       => array(
                            'type'      => 'text',
                            'selector'  => '.event-title'
                        )
                    ),
                    'description_field' => array(
                        'type'          => 'select',
                        'label'         => __('Description', 'event_espresso'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Show', 'event_espresso'),
                            'false'     => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'custom_description'    => array(
                        'type'              => 'textarea',
                        'label'             => __('Custom Description', 'event_espresso'),
                        'default'           => '',
                        'placeholder'       => '',
                        'rows'              => '6',
                        'connections'       => array('string', 'html'),
                        'preview'           => array(
                            'type'          => 'text',
                            'selector'      => '.event-description'
                        )
                    ),

                    'display_ticket_selector' => array(
                        'type'      => 'select',
                        'label'     => __('Ticket Selector', 'event_espresso'),
                        'default'   => 'true',
                        'options'   => array(
                            'true'       => __('Show', 'event_espresso'),
                            'false'        => __('Hide', 'event_espresso')
                        ),
                        'toggle' => array(
                            'true'      => array(
                                'fields'  => array('show_ticket_details'),
                            )
                        )
                    ),
                    'show_ticket_details' => array(
                        'type'      => 'select',
                        'label'     => __('Ticket Details', 'event_espresso'),
                        'default'   => 'true',
                        'options'   => array(
                            'true'       => __('Show', 'event_espresso'),
                            'false'        => __('Hide', 'event_espresso')
                        )
                    ),
                )
            ),

        'date_settings'     => array(
                'title'             => __('Event Dates', 'event_espresso'),
                'fields'            => array( 
                    //Let's show/hide the date
                    'event_datetimes'   => array(
                        'type'          => 'select',
                        'label'         => __('Enable Event Dates', 'event_espresso'),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'      => __('Yes', 'event_espresso'),
                            'no'     => __('No', 'event_espresso'),
                        ),
                        'toggle' => array(
                            'yes'      => array(
                                'fields'  => array('date_under_title', 'date_list', 'date_display', 'date_location'),
                            ),
                            'no'    => array(
                                //'fields'    => array('title_field', 'description_field')
                            )
                        )
                    ),
                  

                    'date_display'   => array(
                        'type'         => 'select',
                        'label'        => __('Date Display', 'event_espresso'),
                        'default'      => 'single',
                        'options'      => array(
                            'range'    => __('Range', 'event_espresso'),
                            'single'     => __('Single', 'event_espresso'),
                        ),
                    ),

                    'date_location'   => array(
                        'type'         => 'select',
                        'label'        => __('Date Location', 'event_espresso'),
                        'default'      => 'below',
                        'options'      => array(
                            'above'    => __('Above Title', 'event_espresso'),
                            'below'     => __('Below Title', 'event_espresso'),
                        ),
                        
                    ),

                    'date_list' => array(
                        'type'      => 'select',
                        'label'     => __('Date List', 'event_espresso'),
                        'default'   => 'false',
                        'options'   => array(
                            'true'       => __('Show', 'event_espresso'),
                            'false'        => __('Hide', 'event_espresso')
                        )
                    ),
                    

                )
            ),
        )
    ),
    'style'       => array( // Tab
        'title'         => __('Style', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections
            'event_setting'      => array( // Section
                'title'         => __('Event Background', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'event_bg_type'      => array(
                        'type'          => 'select',
                        'label'         => __('Background Type', 'event_espresso'),
                        'default'       => 'color',
                        'options'       => array(
                            'color'   => __('Color', 'event_espresso'),
                            'image'     => __('Image', 'event_espresso'),
                        ),
                        'toggle'    => array(
                            'color' => array(
                                'fields'    => array('event_bg_color', 'event_background_opacity')
                            ),
                            'image' => array(
                                'fields'    => array('event_bg_image','event_bg_size','event_bg_repeat', 'event_bg_overlay', 'event_bg_overlay_opacity')
                            )
                        )
                    ),
                    'event_bg_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-ee-content',
                            'property'  => 'background-color'
                        )
                    ),
					'event_background_opacity'    => array(
                        'type'                 => 'text',
                        'label'                => __('Background Opacity', 'event_espresso'),
                        'class'                => 'bb-gf-input input-small',
                        'default'              => '1',
                        'description'          => __('between 0 to 1', 'event_espresso'),
                    ),
                    'event_bg_image'     => array(
                        'type'              => 'photo',
                        'label'         => __('Background Image', 'event_espresso'),
                        'default'       => '',
						'show_remove'	=> true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-ee-content',
                            'property'  => 'background-image'
                        )
                    ),
                    'event_bg_size'      => array(
                        'type'          => 'select',
                        'label'         => __('Background Size', 'event_espresso'),
                        'default'       => 'cover',
                        'options'       => array(
                            'contain'   => __('Contain', 'event_espresso'),
                            'cover'     => __('Cover', 'event_espresso'),
                        )
                    ),
                    'event_bg_repeat'    => array(
                        'type'          => 'select',
                        'label'         => __('Background Repeat', 'event_espresso'),
                        'default'       => 'no-repeat',
                        'options'       => array(
                            'repeat-x'      => __('Repeat X', 'event_espresso'),
                            'repeat-y'      => __('Repeat Y', 'event_espresso'),
                            'no-repeat'     => __('No Repeat', 'event_espresso'),
                        )
                    ),
					'event_bg_overlay'     => array(
                        'type'          => 'color',
                        'label'         => __('Background Overlay Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                    ),
                    'event_bg_overlay_opacity'    => array(
                        'type'                 => 'text',
                        'label'                => __('Background Overlay Opacity', 'event_espresso'),
                        'class'                => 'bb-gf-input input-small',
                        'default'              => '50',
                        'description'          => __('%', 'event_espresso'),
                    ),
                )
            ),
            'event_border'       => array(
                'title'             => __('Event Border', 'event_espresso'),
                'fields'            => array(
                    'event_border_width'      => array(
                        'type'          => 'text',
                        'label'         => __('Border Width', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'bb-gf-input input-small',
                        'default'       => 0,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-ee-content',
                            'property'  => 'border-width',
                            'unit'      => 'px'
                        )
                    ),
                    'event_border_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-ee-content',
                            'property'  => 'border-color'
                        )
                    ),
                    'event_border_style' 	=> array(
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
                            'selector'  => '.pp-ee-content',
                            'property'  => 'border-style'
                        )
                    ),
                )
            ),
            'event_container'        => array(
                'title'                 => __('Corners & Padding', 'event_espresso'),
                'fields'                => array(
                    'event_border_radius' 	=> array(
                        'type'          => 'text',
                        'label'         => __('Round Corners', 'event_espresso'),
                        'description'   => 'px',
                        'default'       => 2,
                        'class'         => 'bb-gf-input input-small',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-ee-content',
                            'property'  => 'border-radius',
                            'unit'      => 'px'
                        )
                    ),
                    'event_padding' 	=> array(
                        'type' 			=> 'pp-multitext',
                        'label' 		=> __('Padding', 'event_espresso'),
                        'description'   => 'px',
                        'default'       => array(
                            'top' => 15,
                            'right' => 15,
                            'bottom' => 15,
                            'left' => 15,
                        ),
                        'options' 		=> array(
                            'top' => array(
                                'maxlength' => 3,
                                'placeholder'   =>  __('Top', 'event_espresso'),
                                'tooltip'       => __('Top', 'event_espresso'),
                                'icon'		=> 'fa-long-arrow-up',
                                'preview'       => array(
                                    'type'      => 'css',
                                    'selector'  => '.pp-ee-content',
                                    'property'  => 'padding-top',
                                    'unit'      => 'px'
                                )
                            ),
                            'bottom' => array(
                                'maxlength' => 3,
                                'placeholder'   =>  __('Bottom', 'event_espresso'),
                                'tooltip'       => __('Bottom', 'event_espresso'),
                                'icon'		=> 'fa-long-arrow-down',
                                'preview'       => array(
                                    'type'      => 'css',
                                    'selector'  => '.pp-ee-content',
                                    'property'  => 'padding-bottom',
                                    'unit'      => 'px'
                                )
                            ),
                            'left' => array(
                                'maxlength' => 3,
                                'placeholder'   =>  __('Left', 'event_espresso'),
                                'tooltip'       => __('Left', 'event_espresso'),
                                'icon'		=> 'fa-long-arrow-left',
                                'preview'       => array(
                                    'type'      => 'css',
                                    'selector'  => '.pp-ee-content',
                                    'property'  => 'padding-left',
                                    'unit'      => 'px'
                                )
                            ),
                            'right' => array(
                                'maxlength' => 3,
                                'placeholder'   =>  __('Right', 'event_espresso'),
                                'tooltip'       => __('Right', 'event_espresso'),
                                'icon'		=> 'fa-long-arrow-right',
                                'preview'       => array(
                                    'type'      => 'css',
                                    'selector'  => '.pp-ee-content',
                                    'property'  => 'padding-right',
                                    'unit'      => 'px'
                                )
                            ),
                        ),
                        'fallback'			=> array(
                            'top'				=> 'event_padding',
                            'bottom'			=> 'event_padding',
                            'left'				=> 'event_padding',
                            'right'				=> 'event_padding',
                        )
                    )
                )
            ),
            'general_style'    => array( // Section
                'title'         => __('General', 'event_espresso'), // Section Title
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
                            'selector'  => '.event-title',
                            'property'  => 'text-align'
                        )
                    ),

                    'date_alignment'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Date Alignment', 'event_espresso'),
                        'default'                   => 'left',
                        'options'                   => array(
                            'left'                  => __('Left', 'event_espresso'),
                            'center'                => __('Center', 'event_espresso'),
                            'right'                 => __('Right', 'event_espresso'),
                        ),
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.event-date',
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
                            'selector'  => '.event-description',
                            'property'  => 'text-align'
                        )
                    ),

                )
            ),
        )
    ),
    
    
    'event_typography'       => array( // Tab
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
                            'selector'        => '.event-title'
                        )
                    ),
                    'title_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'bb-ee-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.event-title',
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
                            'selector'  => '.event-title',
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
                            'selector'        => '.event-description'
                        )
                    ),
                    'description_font_size'    => array(
                        'type'                 => 'text',
                        'label'                => __('Font Size', 'event_espresso'),
                        'description'          => 'px',
                        'class'                => 'bb-ee-input input-small',
                        'default'              => '',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.event-description',
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
                            'selector'  => '.event-description',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
			'date_typography'	=> array(
				'title'	=> __( 'Date', 'event_espresso' ),
				'fields'	=> array(
                    'date_font_family' => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.event-date'
                        )
                    ),
					'date_font_size'      => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'bb-gf-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.event-date',
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
                            'selector'      => '.event-date',
                            'property'      => 'color'
                        )
                    ),
				)
			),
            'ticket_typography'   => array(
                'title' => __( 'Ticket', 'event_espresso' ),
                'fields'    => array(
                    'ticket_font_family' => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.tckt-slctr-tbl-td-name'
                        )
                    ),
                    'ticket_font_size'      => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'bb-ee-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.tckt-slctr-tbl-td-name',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
                    ),
                    'ticket_text_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'           => array(
                            'type'          => 'css',
                            'selector'      => '.tckt-slctr-tbl-td-name',
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
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
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
                        'class'         => 'bb-ee-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ticket-selector-submit-btn',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
                    ),
                )
            )
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
                        'class'                => 'bb-gf-input input-small',
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
                        'class'              => 'bb-ee-input input-small',
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
                        'default'       => 'left',
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
                        'class'               => 'bb-ee-input input-small',
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
                        'class'         => 'bb-ee-input input-small',
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
                        'class'         => 'bb-ee-input input-small',
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
