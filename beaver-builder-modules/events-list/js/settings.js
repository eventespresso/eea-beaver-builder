(function($){

    /**
     * Use this file to register a module helper that
     * adds additional logic to the settings form. The
     * method 'FLBuilder._registerModuleHelper' accepts
     * two parameters, the module slug (same as the folder name)
     * and an object containing the helper methods and properties.
     */
    FLBuilder._registerModuleHelper('pp-espresso-eventslist', {

        /**
         * The 'rules' property is where you setup
         * validation rules that are passed to the jQuery
         * validate plugin (http://jqueryvalidation.org).
         *
         * @property rules
         * @type object
         */
        rules: {
            'form_border_width': {
                number: true
            },
            'title_font_size': {
                number: true
            },
            'description_font_size': {
                number: true
            },
            'button_width_size': {
                number: true
            },
            'button_font_size': {
                number: true
            },
            'button_padding_top_bottom': {
                number: true
            },
            'button_padding_top_bottom': {
                number: true
            },
            'button_padding_left_right': {
                number: true
            },
            'button_border_radius': {
                number: true
            },
            'button_border_width': {
                number: true
            },
           
        }
    });

})(jQuery);
