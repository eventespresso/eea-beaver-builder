/**
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
*/
<?php
$headerfamily = $settings->header_font;
$rowfamily = $settings->row_font;
$linkfamily = $settings->link_font_family;
?>
.fl-node-<?php echo $id; ?> .ee-eventslist-content {
	max-width: 100%;
}

.fl-node-<?php echo $id; ?> .ee-eventslist-content {
	background-color: <?php echo $settings->container_bg_color ? espresso_hex2rgba('#' . $settings->container_bg_color, $settings->container_background_opacity) : 'transparent'; ?>;
    <?php if( $settings->container_border_width >= 0 ) { ?>
    border-width: <?php echo $settings->container_border_width; ?>px;
    <?php } ?>
    <?php if( $settings->container_border_color ) { ?>
    border-color: #<?php echo $settings->container_border_color; ?>;
    <?php } ?>
    <?php if( $settings->container_border_style ) { ?>
    border-style: <?php echo $settings->container_border_style; ?>;
    <?php } ?>
    <?php if( $settings->container_border_radius >= 0 ) { ?>
    border-radius: <?php echo $settings->container_border_radius; ?>px;
    <?php } ?>
    <?php if( $settings->container_padding >= 0 ) { ?>
	padding: <?php echo $settings->container_padding; ?>px;
	<?php } ?>
	
}

<?php if( !empty($settings->list_title) ) { ?>
    .fl-node-<?php echo $id; ?> .events-list-title {
        <?php if( $settings->title_color ) { ?>
        color: #<?php echo $settings->title_color; ?>;
        <?php } ?>
        display: block;
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
<?php }

if( !empty($settings->list_description) ) { ?>
    .fl-node-<?php echo $id; ?> .events-list-description {
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
<?php }?>

.fl-node-<?php echo $id; ?> .espresso-events-list .a_register_link {
    <?php if($settings->link_font_size != 'default') { ?>
        font-size: <?php echo $settings->link_font_size; ?>px;
    <?php } ?>
    <?php if( $linkfamily['family'] != 'Default' ) { ?><?php FLBuilderFonts::font_css( $linkfamily ); ?><?php } ?>
    color: #<?php echo $settings->link_font_color; ?>;
}

.fl-node-<?php echo $id; ?> .event-header h2.entry-title {
    
}

.fl-node-<?php echo $id; ?> .event-header h2.entry-title, .event-header h2.entry-title a {
    <?php if( $settings->event_title_color ) { ?>
    color: #<?php echo $settings->event_title_color; ?>;
    <?php } ?>
    display: block;
    <?php if( $settings->event_title_font_size ) { ?>
    font-size: <?php echo $settings->event_title_font_size; ?>px;
    <?php } ?>
    <?php if( $settings->event_title_font_family['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->event_title_font_family ); ?>
    <?php } ?>
    <?php if( $settings->event_title_alignment ) { ?>
    text-align: <?php echo $settings->event_title_alignment; ?>;
    <?php } ?>
}
.fl-node-<?php echo $id; ?> .espresso-events-list .event-content > p {
    <?php if( $settings->event_description_font_family['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->event_description_font_family ); ?>
    <?php } ?>
    <?php if( $settings->event_description_color ) { ?>
    color: #<?php echo $settings->event_description_color; ?>;
    <?php } ?>
    display: <?php echo ($settings->event_description_field == 'false') ? 'none' : 'block'; ?>;
    <?php if( $settings->event_description_font_size ) { ?>
    font-size: <?php echo $settings->event_description_font_size; ?>px;
    <?php } ?>
    <?php if( $settings->event_description_alignment ) { ?>
    text-align: <?php echo $settings->event_description_alignment; ?>;
    <?php } ?>
}

/* Event Dates */
.fl-node-<?php echo $id; ?> .event-datetimes .ee-event-datetimes-ul li {
    list-style-type: none;
    margin: 0 0 1em;
    <?php if( $settings->date_text_color ) { ?>
    color: #<?php echo $settings->date_text_color; ?> !important;
    <?php } ?>
}

.fl-node-<?php echo $id; ?> .event-content .event-datetimes {
    
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

/* Button */
.event-content .ticket-selector-submit-btn {
      
}

.fl-node-<?php echo $id; ?> .event-content .ticket-selector-submit-btn {
    <?php 
    //EE4 Core styles are overriding everything so I had to resort to this
    if( $settings->button_alignment ) { 
            switch ($settings->button_alignment){
                case 'center':
                    ?>
                    display: table;
                    float: unset;
                    margin: 0 auto;
                    text-align: center;
                    <?php
                break;
                case 'left':
                    ?>
                    float: left;
                    text-align: left;
                    <?php
                break;
                case 'right':
                    ?>
                    float: rigth;
                    text-align: right;
                    <?php
                break;
            }
    } ?>

    <?php if ($settings->button_width == 'true') {
        echo 'float: unset;';
        echo 'text-align: center;';
    } ?>
    width: <?php echo ($settings->button_width == 'true') ? '100%' : 'auto'; ?>;
}

.fl-node-<?php echo $id; ?> .event-content .ticket-selector-submit-btn {
    <?php if ($settings->button_width == 'true') {echo 'float: unset;';} ?>
    width: <?php echo ($settings->button_width == 'true') ? '100%' : 'auto'; ?>;
    <?php if( $settings->button_text_color ) { ?>
    color: #<?php echo $settings->button_text_color; ?>;
    <?php } ?>
    background-color: <?php echo $settings->button_bg_color ? espresso_hex2rgba('#' . $settings->button_bg_color, $settings->button_background_opacity) : 'transparent'; ?>;
    border: <?php echo $settings->button_border_width; ?>px solid <?php echo $settings->button_border_color ? '#' . $settings->button_border_color : 'transparent'; ?>;
    <?php if( $settings->button_border_radius >= 0 ) { ?>
    border-radius: <?php echo $settings->button_border_radius; ?>px;
    -moz-border-radius: <?php echo $settings->button_border_radius; ?>px;
    -webkit-border-radius: <?php echo $settings->button_border_radius; ?>px;
    -ms-border-radius: <?php echo $settings->button_border_radius; ?>px;
    -o-border-radius: <?php echo $settings->button_border_radius; ?>px;
    <?php } ?>
    <?php if( $settings->button_padding_top_bottom >= 0 ) { ?>
    padding-top: <?php echo $settings->button_padding_top_bottom; ?>px;
    padding-bottom: <?php echo $settings->button_padding_top_bottom; ?>px;
    <?php } ?>
    <?php if( $settings->button_padding_left_right >= 0 ) { ?>
    padding-left: <?php echo $settings->button_padding_left_right; ?>px;
    padding-right: <?php echo $settings->button_padding_left_right; ?>px;
    <?php } ?>
    <?php if( $settings->button_font_family['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->button_font_family ); ?>
    <?php } ?>
    <?php if( $settings->button_font_size ) { ?>
    font-size: <?php echo $settings->button_font_size; ?>px;
    <?php } ?>
    white-space: normal;
}

.fl-node-<?php echo $id; ?> .ticket-selector-submit-btn {
    <?php if( $settings->button_width == 'true' ) { ?>
        margin-bottom: 5px !important;
    <?php } ?>
}
.fl-node-<?php echo $id; ?> .ticket-selector-submit-btn {
    <?php if( $settings->button_padding_top_bottom >= 0 ) { ?>
    padding-top: <?php echo $settings->button_padding_top_bottom; ?>px;
    padding-bottom: <?php echo $settings->button_padding_top_bottom; ?>px;
    <?php } ?>
    <?php if( $settings->button_padding_left_right >= 0 ) { ?>
    padding-left: <?php echo $settings->button_padding_left_right; ?>px;
    padding-right: <?php echo $settings->button_padding_left_right; ?>px;
    <?php } ?>
}
.fl-node-<?php echo $id; ?> .ticket-selector-submit-btn:hover {
    <?php if( $settings->button_hover_text_color ) { ?>
    color: #<?php echo $settings->button_hover_text_color; ?>;
    <?php } ?>
    background: <?php echo $settings->button_hover_bg_color ? '#' . $settings->button_hover_bg_color : 'transparent'; ?>;
    <?php if( $settings->button_border_width >= 0 ) { ?>
    border-width: <?php echo $settings->button_border_width; ?>px;
    <?php } ?>
}
