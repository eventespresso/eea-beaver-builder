<?php
/**
 * Select field
 * Setup attributes example:
 *   'select_field_name' => array(
 *     'type'         => 'select',
 *     'label'        => esc_html__( 'Select Field', 'fl-builder' ),
 *     'default'      => 'option-1',
 *     'className'    => '',
 *     'multi-select' => false,
 *     'options'      => array(
 *       'option-1' => esc_html__( 'Option 1', 'fl-builder' ),
 *       'option-2' => array(
 *         'label'   => esc_html__( 'Premium Option 2', 'fl-builder' ),
 *         'premium' => true,
 *       ),
 *       'optgroup-1' => array(
 *         'label'   => esc_html__( 'Optgroup 1', 'fl-builder' ),
 *         'options' => array( *
 *           'option-3' => esc_html__( 'Option 3', 'fl-builder' ),
 *           'option-4' => array(
 *             'label'   => esc_html__( 'Premium Option 4', 'fl-builder' ),
 *             'premium' => true,
 *           ),
 *         ),
 *         'premium' => false,
 *       ),
 *     ),
 *     'toggle' => array(
 *       'option-1' => array(
 *         'fields'   => array( 'my_field_1', 'my_field_2' ),
 *         'sections' => array( 'my_section' ),
 *         'tabs'     => array( 'my_tab' ),
 *       ),
 *       'option-2' => array(),
 *     ),
 *     'hide'    => '', @todo Write example setup attribute value
 *     'trigger' => '', @todo Write example setup attribute value
 *   );
 */
?>
<#

        var atts  = '',
        field = data.field,
        name  = data.name,
        value = data.value;

        // Multiselect?
        if ( field['multi-select'] ) {
        atts += ' multiple';
        name += '[]';
        }

        // Class
        if ( field.className ) {
        atts += ' class="' + field.className + '"';
        }

        // Toggle data
        if ( field.toggle ) {
        atts += " data-toggle='" + JSON.stringify( field.toggle ) + "'";
        }

        // Hide data
        if ( field.hide ) {
        atts += " data-hide='" + JSON.stringify( field.hide ) + "'";
        }

        // Trigger data
        if ( field.trigger ) {
        atts += " data-trigger='" + JSON.stringify( field.trigger ) + "'";
        }

        #>
    <select name="{{name}}" {{{atts}}}>
        <#
                field.options = <?php echo wp_json_encode(espresso_module_event_titles()); ?>;
                // Loop through the options
                for ( var optionKey in field.options ) {

                var optionVal = field.options[ optionKey ];

                // Do not display premium options if using lite plugin version
                if ( 'object' === typeof optionVal && optionVal.premium && true === FLBuilderConfig.lite ) {
                continue;
                }

                if ( 'object' === typeof optionVal && optionVal.label && optionVal.options ) {

                #>
            <optgroup label="{{optionVal.label}}">
                <#

                        for ( var groupKey in optionVal.options ) {

                        var groupVal = optionVal.options[ groupKey ],
                        selected = '';

                        // Do not display premium optgroup options if using lite plugin version
                        if ( 'object' === typeof groupVal && groupVal.premium && true === FLBuilderConfig.lite ) {
                        continue;
                        }

                        // Is selected?
                        if ( 'object' === typeof value && jQuery.inArray( groupKey, value ) != -1 ) {
                        // Multi select
                        selected = ' selected="selected"';
                        } else if ( 'string' === typeof value && groupKey == value ) {
                        // Single select
                        selected = ' selected="selected"';
                        }

                        // Option label
                        var label = 'object' === typeof groupVal ? groupVal.label : groupVal;

                        // Output option
                        #>
                    <option value="{{groupKey}}" {{{selected}}}>{{{label}}}</option>
                    <#
                            }
                            #>
            </optgroup>
            <#

                    } else {

                    // Is selected?
                    var selected = '';

                    if ( 'object' === typeof value && jQuery.inArray( optionKey, value ) != -1 ) {
                    // Multi select
                    selected = ' selected="selected"';
                    } else if ( 'string' === typeof value && optionKey == value ) {
                    // Single select
                    selected = ' selected="selected"';
                    }

                    // Option label
                    var label = 'object' === typeof optionVal ? optionVal.label : optionVal;

                    // Output option
                    #>
                <option value="{{optionKey}}" {{{selected}}}>{{{label}}}</option>
                <#
                        }
                        }

                        #>
    </select>
