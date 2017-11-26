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
        
    }
}

require_once EE_BEAVER_BUILDER_EVENTS_TABLE_MODULE_PATH . '/includes/functions.php';

/**
 * Register the module and its event settings.
 */
FLBuilder::register_module('EspressoTableModule', array(
    'table'       => array( // Tab
        'title'         => __('Table', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections

            //Table Details
            'table_settings'     => array(
                'title'             => __('Table Details', 'event_espresso'),
                'fields'            => array( // Section Fields
                    
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

                )
            ),
            'row_style' => array(
                'title' => __( 'Rows', 'event_espresso' ),
                'fields'    => array(
                    
                    'header_background'     => array(
                        'type'          => 'color',
                        'default'          => 'ffffff',
                        'label'         => __('Header Background Color', 'event_espresso'),
                        'help'          => __('Change the tables rows background color', 'event_espresso'),
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table thead tr th',
                            'property'  => 'background'
                        )
                    ),

                    'rows_even_background'     => array(
                        'type'          => 'color',
                        'default'          => 'ffffff',
                        'label'         => __('Even Rows Background Color', 'event_espresso'),
                        'help'          => __('Change the tables even rows background color', 'event_espresso'),
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table .even',
                            'property'  => 'background'
                        )
                    ),
                    'rows_odd_background'     => array(
                        'type'          => 'color',
                        'default'          => 'ffffff',
                        'label'         => __('Odd Rows Background Color', 'event_espresso'),
                        'help'          => __('Change the tables odd rows background color', 'event_espresso'),
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table .odd',
                            'property'  => 'background'
                        )
                    ),
                    'rows_padding_top'   => array(
                        'type'      => 'text',
                        'label'     => __( 'Top Padding', 'event_espresso' ),
                        'description'   => 'px',
                        'default'       => 10,
                        'maxlength'     => 3,
                        'size'          => 4,
                        'placeholder'   =>  __('Top', 'event_espresso'),
                        'tooltip'       => __( 'Top', 'event_espresso' ),
                        'icon'          => 'fa-long-arrow-up',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table tbody tr td',
                            'property'  => 'padding-top',
                            'unit'      => 'px'
                         )
                    ),
                    'rows_padding_right'   => array(
                        'type'      => 'text',
                        'label'     => __( 'Right Padding', 'event_espresso' ),
                        'description'   => 'px',
                        'default'       => 10,
                        'maxlength'     => 3,
                        'size'          => 4,
                        'placeholder'   =>  __('Rigth', 'event_espresso'),
                        'tooltip'       => __( 'Right', 'event_espresso' ),
                        'icon'          => 'fa-long-arrow-right',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table tbody tr td',
                            'property'  => 'padding-right',
                            'unit'      => 'px'
                         )
                    ),
                    'rows_padding_bottom'   => array(
                        'type'      => 'text',
                        'label'     => __( 'Bottom Padding', 'event_espresso' ),
                        'description'   => 'px',
                        'default'       => 10,
                        'maxlength'     => 3,
                        'size'          => 4,
                        'placeholder'   =>  __('Bottom', 'event_espresso'),
                        'tooltip'       => __( 'Bottom', 'event_espresso' ),
                        'icon'          => 'fa-long-arrow-down',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table tbody tr td',
                            'property'  => 'padding-bottom',
                            'unit'      => 'px'
                         )
                    ),
                    'rows_padding_left'   => array(
                        'type'      => 'text',
                        'label'     => __( 'Left Padding', 'event_espresso' ),
                        'description'   => 'px',
                        'default'       => 10,
                        'maxlength'     => 3,
                        'size'          => 4,
                        'placeholder'   =>  __('Left', 'event_espresso'),
                        'tooltip'       => __( 'Left', 'event_espresso' ),
                        'icon'          => 'fa-long-arrow-left',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table tbody tr td',
                            'property'  => 'padding-left',
                            'unit'      => 'px'
                         )
                    ),
                    'rows_text_alignment' => array(
                        'type'      => 'select',
                        'label'     => __('Horizontal Alignment', 'bb-powerpack'),
                        'default'   => 'left',
                        'options'       => array(
                            'left'          => __('Left', 'bb-powerpack'),
                            'center'         => __('Center', 'bb-powerpack'),
                            'right'         => __('Right', 'bb-powerpack'),
                        ),
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table tbody tr td',
                            'property'  => 'text-align'
                        )
                    ),
                    'rows_vertical_alignment' => array(
                        'type'      => 'select',
                        'label'     => __('Vertical Alignment', 'bb-powerpack'),
                        'default'   => 'middle',
                        'options'       => array(
                            'top'          => __('Top', 'bb-powerpack'),
                            'middle'         => __('Center', 'bb-powerpack'),
                            'bottom'         => __('Bottom', 'bb-powerpack'),
                        ),
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table tbody tr td',
                            'property'  => 'vertical-align'
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
                            'selector'  => '.ee-table-content',
                            'property'  => 'background-color'
                        )
                    ),
					'container_background_opacity'    => array(
                        'type'                 => 'text',
                        'label'                => __('Background Opacity', 'event_espresso'),
                        'class'                => 'ee-table-input input-small',
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
                        'class'         => 'ee-table-input input-small',
                        'default'       => 1,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-table-content',
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
                            'selector'  => '.ee-table-content',
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
                            'selector'  => '.ee-table-content',
                            'property'  => 'border-style'
                        )
                    ),
                )
            ),
            'table_container'        => array(
                'title'                 => __('Corners & Padding', 'event_espresso'),
                'fields'                => array(
                    'container_border_radius' 	=> array(
                        'type'          => 'text',
                        'label'         => __('Round Corners', 'event_espresso'),
                        'description'   => 'px',
                        'default'       => 2,
                        'maxlength'     => '3',
                        'size'          => '4',
                        'class'         => 'ee-table-input input-small',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.ee-table-content',
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
                            'selector'  => '.ee-table-content',
                            'property'  => 'padding',
                            'unit'      => 'px'
                        )
                    ),
                    
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
            'tools_typography'    => array(
                'title' => __('Category & Search Labels', 'event_espresso'),
                'fields'    => array(
                    'tools_font_family' => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.events-table > p, .events-table > label'
                        )
                    ),
                    'tools_font_size'    => array(
                        'type'                 => 'text',
                        'label'                => __('Font Size', 'event_espresso'),
                        'description'          => 'px',
                        'class'                => 'ee-table-input input-small',
                        'default'              => '',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.events-table > p, .events-table > label',
                            'property'         => 'font-size',
                            'unit'             => 'px'
                        )
                    ),
                    'tools_color' => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'event_espresso'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.events-table > p, .events-table > label',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
            
            'header_typography' => array(
                'title' =>  __('Table Header', 'event_espresso'),
                'fields'    => array(
                    'header_font'          => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.espresso-table thead tr th'
                        )
                    ),
                    'header_font_size'     => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'default'       => 'default',
                        'class'                => 'ee-table-input input-small',
                        'default'              => '',
                        'description'   => 'px',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.espresso-table thead tr th',
                            'property'         => 'font-size',
                            'unit'             => 'px'
                        )
                    ),
                    
                    'header_font_color'     => array(
                        'type'          => 'color',
                        'default'          => '',
                        'label'         => __('Text Color', 'event_espresso'),
                        'help'          => __('Change the table header font color', 'event_espresso'),
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table thead tr th',
                            'property'  => 'color'
                        )
                    ),
                    'header_text_transform' => array(
                        'type'      => 'select',
                        'label'     => __('Text Transform', 'event_espresso'),
                        'default'   => 'none',
                        'options'       => array(
                            'none'          => __('None', 'event_espresso'),
                            'lowercase'     => __('lowercase', 'event_espresso'),
                            'uppercase'     => __('UPPERCASE', 'event_espresso'),
                        ),
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table thead tr th',
                            'property'  => 'text-transform'
                        )
                    ),
                )
            ),
            'rows_typography'   => array(
                'title' => __('Rows', 'event_espresso'),
                'fields'    => array(
                    'row_font'          => array(
                        'type'          => 'font',
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 300
                        ),
                        'label'         => __('Font', 'event_espresso'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.espresso-table tbody tr td'
                        )
                    ),
                    'row_font_size'     => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'default'       => 'default',
                        'class'                => 'ee-table-input input-small',
                        'default'              => '',
                        'description'   => 'px',
                        'preview'              => array(
                            'type'             => 'css',
                            'selector'         => '.espresso-table tbody tr td',
                            'property'         => 'font-size',
                            'unit'             => 'px'
                        )
                    ),
                    'rows_font_color'     => array(
                        'type'          => 'color',
                        'default'       => '',
                        'label'         => __('Text Color', 'bb-powerpack'),
                        'help'          => __('Change the table row text color', 'event_espresso'),
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table tbody tr td',
                            'property'  => 'color'
                        )
                    ),
                    'rows_font_even'     => array(
                        'type'          => 'color',
                        'default'       => '',
                        'label'         => __('Even Rows Text Color', 'event_espresso'),
                        'help'          => __('Change the tables even rows text color', 'event_espresso'),
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table .even td',
                            'property'  => 'color'
                        )
                    ),
                    'rows_font_odd'     => array(
                        'type'          => 'color',
                        'default'       => '',
                        'label'         => __('Odd Rows Text Color', 'bb-powerpack'),
                        'help'          => __('Change the tables odd rows text color', 'event_espresso'),
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table .odd td',
                            'property'  => 'color'
                        )
                    ),
                    'rows_text_transform' => array(
                        'type'      => 'select',
                        'label'     => __('Text Transform', 'event_espresso'),
                        'default'   => 'none',
                        'options'       => array(
                            'none'          => __('None', 'event_espresso'),
                            'lowercase'     => __('lowercase', 'event_espresso'),
                            'uppercase'     => __('UPPERCASE', 'event_espresso'),
                        ),
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table tbody tr td',
                            'property'  => 'text-transform'
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
                            'selector'        => '.espresso-table .a_register_link'
                        )
                    ),
                    'link_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'event_espresso'),
                        'description'   => 'px',
                        'class'         => 'ee-table-input input-small',
                        'default'       => '',
                        'description'   => 'px',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.espresso-table .a_register_link',
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
                            'selector'  => '.espresso-table .a_register_link',
                            'property'  => 'color'
                        )
                    ),
                )
            ),
        )
    ),

    'extras'       => array( // Tab
        'title'         => __('Extras', 'event_espresso'), // Tab title
        'sections'      => array( // Tab Sections
            'extra_settings'      => array( // Section
                'title'         => __('Extra Settings', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'footable'     => array(
                        'type'          => 'select',
                        'label'         => __('Show Tools', 'event_espresso'),
                        'help'          => __('Displays category filter, paging, and search tools.', 'event_espresso'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Yes', 'event_espresso'),
                            'false'     => __('No', 'event_espresso'),
                        ),
                        'toggle' => array(
                            'true'      => array(
                                'fields'  => array('category_filter', 'table_search', 'table_sort', 'table_paging'),
                            ),
                            /*'false'    => array(
                                'fields'    => array('title_field', 'description_field')
                            )*/
                        )
                    ),
                    'category_filter'   => array(
                        'type'          => 'select',
                        'label'         => __('Category Filter', 'event_espresso'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Show', 'event_espresso'),
                            'false'     => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'table_search'      => array(
                        'type'          => 'select',
                        'label'         => __('Table Search', 'event_espresso'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Show', 'event_espresso'),
                            'false'     => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'table_sort' => array(
                        'type'          => 'select',
                        'label'         => __('Table Sort', 'event_espresso'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Show', 'event_espresso'),
                            'false'     => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'table_paging' => array(
                        'type'          => 'select',
                        'label'         => __('Table Paging', 'event_espresso'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Show', 'event_espresso'),
                            'false'     => __('Hide', 'event_espresso'),
                        ),
                    ),
                    
                )
            ),
            'Extra Settings'      => array( // Section
                'title'         => __('Extra Settings', 'event_espresso'), // Section Title
                'fields'        => array( // Section Fields
                    'show_expired'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Expired Events', 'event_espresso'),
                        'default'                   => 'true',
                        'options'                   => array(
                            'true'                  => __('Show', 'event_espresso'),
                            'false'                => __('Hide', 'event_espresso'),
                        ),
                    ),
                    'show_venue'    => array(
                        'type'                      => 'select',
                        'label'                     => __('Venue', 'event_espresso'),
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
            
        )
    ),

));
