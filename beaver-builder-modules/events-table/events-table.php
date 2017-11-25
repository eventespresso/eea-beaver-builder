<?php

/**
 * @class PPEspressoEventsTableModule
 */
class EspressoTableModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => esc_html__('Events Table', 'event_espresso'),
            'description'   => esc_html__('An events table view module for Event Espresso.', 'event_espresso'),
            'group'         => esc_html__('Event Espresso', 'event_espresso'),
            'category'		=> esc_html__('Event Styler Modules', 'event_espresso'),
            'dir'           => EE_BEAVER_BUILDER_EVENTS_TABLE_MODULE_PATH,
            'url'           => EE_BEAVER_BUILDER_EVENTS_TABLE_MODULE_URL,
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
        //add_filter('FHEE__EED_Events_Table__load_tckt_slctr_assets', '__return_true');
    }
}

require_once EE_BEAVER_BUILDER_EVENTS_TABLE_MODULE_PATH . '/includes/functions.php';

/**
 * Register the module and its event settings.
 */
FLBuilder::register_module('EspressoTableModule', array(
    'table'       => array( // Tab
        'title'         => __('General', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections

            //Table Details
            'table_settings'     => array(
                'title'             => __('Table Details', 'event_espresso'),
                'fields'            => array(
                    
                    'table_title'      => array(
                        'type'          => 'text',
                        'label'         => __('Table Title', 'event_espresso'),
                        'default'       => '',
                        'placeholder'   => 'Add a title to the table (optional).',
                        'connections'   => array('string'),
						'preview'       => array(
                            'type'      => 'text',
                            'selector'  => '.events-table-title'
                        )
                    ),
                    
                    'table_description'    => array(
                        'type'              => 'textarea',
                        'label'             => __('Table Description', 'event_espresso'),
                        'default'           => '',
                        'placeholder'       => 'Add a description to the table (optional).',
                        'rows'              => '6',
                        'connections'       => array('string', 'html'),
                        'preview'           => array(
                            'type'          => 'text',
                            'selector'      => '.events-table-description'
                        )
                    ),
                )
            ),
            'table_options'    => array( // Section
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
                            'selector'  => '.events-table-title',
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
                            'selector'  => '.events-table-description',
                            'property'  => 'text-align'
                        )
                    ),
                    'category_filter'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Category Filter', 'event_espresso'),
                        'default'                   => 'true',
                        'options'                   => array(
                            'true'                  => __('Show', 'event_espresso'),
                            'false'                => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'table_search'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Table Search', 'event_espresso'),
                        'default'                   => 'true',
                        'options'                   => array(
                            'true'                  => __('Show', 'event_espresso'),
                            'false'                => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'table_sort'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Table Sorting', 'event_espresso'),
                        'default'                   => 'true',
                        'options'                   => array(
                            'true'                  => __('Show', 'event_espresso'),
                            'false'                => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'table_paging'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Table Paging', 'event_espresso'),
                        'default'                   => 'true',
                        'options'                   => array(
                            'true'                  => __('Show', 'event_espresso'),
                            'false'                => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'table_striping'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Table Striping', 'event_espresso'),
                        'default'                   => 'true',
                        'options'                   => array(
                            'true'                  => __('Show', 'event_espresso'),
                            'false'                => __('Hide', 'event_espresso'),
                        ),
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
                        //'class'                => 'bb-gf-input input-small',
                        'default'              => '1000',
                        'description'          => __('between 1 to 1000', 'event_espresso'),
                    ),

                )
            ),
        ),

    ),
    'style'       => array( // Tab
        'title'         => __('Style', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections
            'table_setting'      => array( // Section
                'title'         => __('Container Background', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    /*'table_bg_type'      => array(
                        'type'          => 'select',
                        'label'         => __('Background Type', 'event_espresso'),
                        'default'       => 'color',
                        'options'       => array(
                            'color'   => __('Color', 'event_espresso'),
                            'image'     => __('Image', 'event_espresso'),
                        ),
                        'toggle'    => array(
                            'color' => array(
                                'fields'    => array('table_bg_color', 'table_background_opacity')
                            ),
                            'image' => array(
                                'fields'    => array('table_bg_image','table_bg_size','table_bg_repeat', 'event_bg_overlay', 'event_bg_overlay_opacity')
                            )
                        )
                    ),*/
                    'table_bg_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-table-content',
                            'property'  => 'background-color'
                        )
                    ),
					'table_background_opacity'    => array(
                        'type'                 => 'text',
                        'label'                => __('Background Opacity', 'event_espresso'),
                        'class'                => 'bb-gf-input input-small',
                        'default'              => '1',
                        'description'          => __('between 0 to 1', 'event_espresso'),
                    ),
                    /*'table_bg_image'     => array(
                        'type'              => 'photo',
                        'label'         => __('Background Image', 'event_espresso'),
                        'default'       => '',
						'show_remove'	=> true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-table-content',
                            'property'  => 'background-image'
                        )
                    ),
                    'table_bg_size'      => array(
                        'type'          => 'select',
                        'label'         => __('Background Size', 'event_espresso'),
                        'default'       => 'cover',
                        'options'       => array(
                            'contain'   => __('Contain', 'event_espresso'),
                            'cover'     => __('Cover', 'event_espresso'),
                        )
                    ),
                    'table_bg_repeat'    => array(
                        'type'          => 'select',
                        'label'         => __('Background Repeat', 'event_espresso'),
                        'default'       => 'no-repeat',
                        'options'       => array(
                            'repeat-x'      => __('Repeat X', 'event_espresso'),
                            'repeat-y'      => __('Repeat Y', 'event_espresso'),
                            'no-repeat'     => __('No Repeat', 'event_espresso'),
                        )
                    ),*/
					
                )
            ),
            'table_border'       => array(
                'title'             => __('Container  Border', 'event_espresso'),
                'fields'            => array(
                    'table_border_width'      => array(
                        'type'          => 'text',
                        'label'         => __('Border Width', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-table-input input-small',
                        'default'       => 0,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-table-content',
                            'property'  => 'border-width',
                            'unit'      => 'px'
                        )
                    ),
                    'table_border_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-table-content',
                            'property'  => 'border-color'
                        )
                    ),
                    'table_border_style' 	=> array(
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
                            'selector'  => '.ee-table-content',
                            'property'  => 'border-style'
                        )
                    ),
                )
            ),
            'table_container'        => array(
                'title'                 => __('Corners & Padding', 'event_espresso'),
                'fields'                => array(
                    'table_border_radius' 	=> array(
                        'type'          => 'text',
                        'label'         => __('Round Corners', 'event_espresso'),
                        'description'   => 'px',
                        'default'       => 2,
                        'class'         => 'ee-table-input input-small',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-table-content',
                            'property'  => 'border-radius',
                            'unit'      => 'px'
                        )
                    ),
                    'table_padding' 	=> array(
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
                                    'selector'  => '.ee-table-content',
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
                                    'selector'  => '.ee-table-content',
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
                                    'selector'  => '.ee-table-content',
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
                                    'selector'  => '.ee-table-content',
                                    'property'  => 'padding-right',
                                    'unit'      => 'px'
                                )
                            ),
                        ),
                        'fallback'			=> array(
                            'top'				=> 'table_padding',
                            'bottom'			=> 'table_padding',
                            'left'				=> 'table_padding',
                            'right'				=> 'table_padding',
                        )
                    )
                )
            ),
            
        )
    ),
    
    'table_typography'       => array( // Tab
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
                            'selector'        => '.events-table-title'
                        )
                    ),
                    'title_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-table-input input-small',
                        'default'       => '',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.events-table-title',
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
                            'selector'  => '.events-table-title',
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
                            'selector'        => '.events-table-description'
                        )
                    ),
                    'description_font_size'    => array(
                        'type'                 => 'text',
                        'label'                => __('Font Size', 'event_espresso'),
                        'description'          => 'px',
                        'class'                => 'ee-table-input input-small',
                        'default'              => '',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.events-table-description',
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
                            'selector'  => '.events-table-description',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
        )
    ),

));
