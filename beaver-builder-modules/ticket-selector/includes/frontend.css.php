/**
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
*/


.fl-node-<?php echo $id; ?> .pp-ee-content .espresso_event_type-single-event {
	max-width: 100%;
}

.fl-node-<?php echo $id; ?> .pp-ee-content {
	background-color: <?php echo $settings->form_bg_color ? pp_hex2rgba('#' . $settings->event_bg_color, $settings->event_background_opacity) : 'transparent'; ?>;
    <?php if( $settings->event_bg_image && $settings->form_bg_type == 'image' ) { ?>
	background-image: url('<?php echo $settings->event_bg_image_src; ?>');
    <?php } ?>
    <?php if( $settings->event_bg_size ) { ?>
    background-size: <?php echo $settings->event_bg_size; ?>;
    <?php } ?>
    <?php if( $settings->event_bg_repeat ) { ?>
    background-repeat: <?php echo $settings->event_bg_repeat; ?>;
    <?php } ?>
    <?php if( $settings->event_border_width >= 0 ) { ?>
    border-width: <?php echo $settings->event_border_width; ?>px;
    <?php } ?>
    <?php if( $settings->event_border_color ) { ?>
    border-color: #<?php echo $settings->event_border_color; ?>;
    <?php } ?>
    <?php if( $settings->event_border_style ) { ?>
    border-style: <?php echo $settings->event_border_style; ?>;
    <?php } ?>
    <?php if( $settings->event_border_radius >= 0 ) { ?>
    border-radius: <?php echo $settings->event_border_radius; ?>px;
    <?php } ?>
    <?php if( $settings->event_padding['top'] >= 0 ) { ?>
	padding-top: <?php echo $settings->event_padding['top']; ?>px;
	<?php } ?>
	<?php if( $settings->event_padding['right'] >= 0 ) { ?>
	padding-right: <?php echo $settings->event_padding['right']; ?>px;
	<?php } ?>
	<?php if( $settings->event_padding['bottom'] >= 0 ) { ?>
	padding-bottom: <?php echo $settings->event_padding['bottom']; ?>px;
	<?php } ?>
	<?php if( $settings->event_padding['left'] >= 0 ) { ?>
	padding-left: <?php echo $settings->event_padding['left']; ?>px;
	<?php } ?>
}

<?php if( $settings->event_bg_image && $settings->form_bg_type == 'image' ) { ?>
.fl-node-<?php echo $id; ?> .pp-ee-content:before {
	background-color: <?php echo ( $settings->event_bg_overlay ) ? pp_hex2rgba('#' . $settings->event_bg_overlay, $settings->event_bg_overlay_opacity / 100 ) : 'transparent'; ?>;
}
<?php } ?>


.fl-node-<?php echo $id; ?> .espresso_event_title,
.fl-node-<?php echo $id; ?> .event-title {
    <?php if( $settings->title_color ) { ?>
    color: #<?php echo $settings->title_color; ?>;
    <?php } ?>
	display: <?php echo ($settings->title_field == 'false') ? 'none' : 'block'; ?>;
    <?php if( $settings->title_font_size ) { ?>
    font-size: <?php echo $settings->title_font_size; ?>px;
    <?php } ?>
    <?php if( $settings->title_font_family['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->title_font_family ); ?>
    <?php } ?>
    <?php if( $settings->title_alignment ) { ?>
    text-align: <?php echo $settings->title_alignment; ?>;
    <?php } ?>
}

.fl-node-<?php echo $id; ?> .custom-event-title {
	display: <?php echo ($settings->event_custom_title_desc == 'yes') ? 'block' : 'none'; ?>;
}

.fl-node-<?php echo $id; ?> .espresso_event_title {
	<?php if( $settings->event_custom_title_desc == 'yes' ) { ?>
	display: none;
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .espresso_event_description,
.fl-node-<?php echo $id; ?> .event-description {
    <?php if( $settings->description_font_family['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->description_font_family ); ?>
    <?php } ?>
    <?php if( $settings->description_color ) { ?>
    color: #<?php echo $settings->description_color; ?>;
    <?php } ?>
	display: <?php echo ($settings->description_field == 'false') ? 'none' : 'block'; ?>;
    <?php if( $settings->description_font_size ) { ?>
    font-size: <?php echo $settings->description_font_size; ?>px;
    <?php } ?>
    <?php if( $settings->description_alignment ) { ?>
    text-align: <?php echo $settings->description_alignment; ?>;
    <?php } ?>
}

.fl-node-<?php echo $id; ?> .custom-event-description {
    display: <?php echo ($settings->event_custom_title_desc == 'yes') ? 'block' : 'none'; ?>;
}

.fl-node-<?php echo $id; ?> .espresso_event_description {
	<?php if( $settings->event_custom_title_desc == 'yes' ) { ?>
	display: none;
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .tkt-slctr-tbl {
    border-collapse: collapse;
    margin-bottom: 1.5em;
    width: 99%;
}

.fl-node-<?php echo $id; ?> .tkt-slctr-tbl-wrap-dv {
    /*font-size: 1.1em;*/
}

.fl-node-<?php echo $id; ?> .event-datetimes .ee-event-datetimes-ul li {
    list-style-type: none;
    margin: 0 0 1em;
}

.fl-node-<?php echo $id; ?> .powered-by-event-espresso-credit {
    display: none;
}

.fl-node-<?php echo $id; ?> .event-tickets .display-tckt-slctr-tkt-details {
    
    <?php if( $settings->show_ticket_details == 'false' ) { ?>
            display: none;
    <?php } else { ?>
            display: inline;
            margin: 0 0 0 1em;
    <?php } ?>
}

.fl-node-<?php echo $id; ?> .event-date .espresso_event_date,
.fl-node-<?php echo $id; ?> .event-date .espresso_event_date_range{
    <?php if( $settings->date_color ) { ?>
    color: #<?php echo $settings->date_color; ?> !important;
    <?php } ?>
    <?php if( $settings->date_font_size ) { ?>
    font-size: <?php echo $settings->date_font_size; ?>px;
    <?php } ?>
    <?php if( $settings->date_font_family['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->date_font_family ); ?>
    <?php } ?>
    <?php if( $settings->date_alignment ) { ?>
    text-align: <?php echo $settings->date_alignment; ?>;
    <?php } ?>
}

.fl-node-<?php echo $id; ?> .ticket-selector-submit-btn-wrap {

    <?php if( $settings->button_text_color ) { ?>
    color: #<?php echo $settings->button_text_color; ?> !important;
    <?php } ?>
    <?php if( $settings->button_font_size ) { ?>
    font-size: <?php echo $settings->button_font_size; ?>px;
    <?php } ?>
    <?php if( $settings->button_font_family['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->button_font_family ); ?>
    <?php } ?>
    <?php if( $settings->button_alignment ) { ?>
    text-align: <?php echo $settings->button_alignment; ?>;
    <?php } ?>
    
}

.fl-node-<?php echo $id; ?> .ticket-selector-submit-btn  {
    width: <?php echo ($settings->button_width == 'true') ? '100%' : 'auto'; ?>;

}
