/**
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
*/


.fl-node-<?php echo $id; ?> .ee-table-content {
	max-width: 100%;
}

.fl-node-<?php echo $id; ?> .espresso_events_table {
	background-color: <?php echo $settings->table_bg_color ? espresso_hex2rgba('#' . $settings->table_bg_color, $settings->table_background_opacity) : 'transparent'; ?>;
    <?php if( $settings->table_bg_image && $settings->table_bg_image == 'photo' ) { ?>
	background-image: url('<?php echo $settings->table_bg_image_src; ?>');
    <?php } ?>
    <?php if( $settings->table_bg_size ) { ?>
    background-size: <?php echo $settings->table_bg_size; ?>;
    <?php } ?>
    <?php if( $settings->v_bg_repeat ) { ?>
    background-repeat: <?php echo $settings->table_bg_repeat; ?>;
    <?php } ?>
    <?php if( $settings->table_border_width >= 0 ) { ?>
    border-width: <?php echo $settings->table_border_width; ?>px;
    <?php } ?>
    <?php if( $settings->table_border_color ) { ?>
    border-color: #<?php echo $settings->table_border_color; ?>;
    <?php } ?>
    <?php if( $settings->table_border_style ) { ?>
    border-style: <?php echo $settings->table_border_style; ?>;
    <?php } ?>
    <?php if( $settings->table_border_radius >= 0 ) { ?>
    border-radius: <?php echo $settings->table_border_radius; ?>px;
    <?php } ?>
    <?php if( $settings->table_padding['top'] >= 0 ) { ?>
	padding-top: <?php echo $settings->table_padding['top']; ?>px;
	<?php } ?>
	<?php if( $settings->table_padding['right'] >= 0 ) { ?>
	padding-right: <?php echo $settings->table_padding['right']; ?>px;
	<?php } ?>
	<?php if( $settings->table_padding['bottom'] >= 0 ) { ?>
	padding-bottom: <?php echo $settings->table_padding['bottom']; ?>px;
	<?php } ?>
	<?php if( $settings->table_padding['left'] >= 0 ) { ?>
	padding-left: <?php echo $settings->table_padding['left']; ?>px;
	<?php } ?>
}

<?php if( $settings->table_bg_image && $settings->table_bg_type == 'photo' ) { ?>
.fl-node-<?php echo $id; ?> .ee-table-content:before {
	background-color: <?php echo ( $settings->table_bg_overlay ) ? espresso_hex2rgba('#' . $settings->table_bg_overlay, $settings->table_bg_overlay_opacity / 100 ) : 'transparent'; ?>;
}
<?php } ?>

<?php if( $settings->title_field ) { ?>
    .fl-node-<?php echo $id; ?> .events-table-title {
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
<?php } ?>

.fl-node-<?php echo $id; ?> .events-table-description {
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

