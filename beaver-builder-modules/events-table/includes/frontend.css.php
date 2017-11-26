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
.fl-node-<?php echo $id; ?> .ee-table-content {
	max-width: 100%;
}

.fl-node-<?php echo $id; ?> .ee-table-content {
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

<?php if( !empty($settings->table_title) ) { ?>
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
<?php }

if( !empty($settings->table_description) ) { ?>
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
<?php }?>

.fl-node-<?php echo $id; ?> .espresso-table thead tr th {
    <?php if($settings->header_font_size != 'default') { ?>
        font-size: <?php echo $settings->header_font_size; ?>px;
    <?php } ?>
    <?php if( $headerfamily['family'] != 'Default' ) { ?><?php FLBuilderFonts::font_css( $headerfamily ); ?><?php } ?>
    color: #<?php echo $settings->header_font_color; ?>;
    text-transform: <?php echo $settings->header_text_transform; ?>;
}

.fl-node-<?php echo $id; ?> .espresso-table tbody tr td {
    <?php if($settings->row_font_size != 'default') { ?>
        font-size: <?php echo $settings->row_font_size; ?>px;
    <?php } ?>
    <?php if( $rowfamily['family'] != 'Default' ) { ?><?php FLBuilderFonts::font_css( $rowfamily ); ?><?php } ?>
    color: #<?php echo $settings->rows_font_color; ?>;
    text-transform: <?php echo $settings->rows_text_transform; ?>;
    text-align: <?php echo $settings->rows_text_alignment; ?>;
}

.fl-node-<?php echo $id; ?> .espresso-table .a_register_link {
    <?php if($settings->link_font_size != 'default') { ?>
        font-size: <?php echo $settings->link_font_size; ?>px;
    <?php } ?>
    <?php if( $linkfamily['family'] != 'Default' ) { ?><?php FLBuilderFonts::font_css( $linkfamily ); ?><?php } ?>
    color: #<?php echo $settings->link_font_color; ?>;
}

.fl-node-<?php echo $id; ?> .espresso-table .odd {
    <?php if( $settings->rows_odd_background ) { ?>background: #<?php echo $settings->rows_odd_background; ?>;<?php } ?>
}

.fl-node-<?php echo $id; ?> .espresso-table .odd td {
    <?php if( $settings->rows_font_odd ) { ?>color: #<?php echo $settings->rows_font_odd; ?>;<?php } ?>
}

.fl-node-<?php echo $id; ?> .espresso-table .even {
    <?php if( $settings->rows_even_background ) { ?>background: #<?php echo $settings->rows_even_background; ?>;<?php } ?>
}

.fl-node-<?php echo $id; ?> .espresso-table .even td {
    <?php if( $settings->rows_font_even ) { ?>color: #<?php echo $settings->rows_font_even; ?>;<?php } ?>
}
