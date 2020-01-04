<?php
/* OCDI
---------------------------------------------------------------- */
function ocdi_import_files() {
	return array(
		array(
			'import_file_name'          	=> 'Cristiano Demo Data',
			'local_import_file'           	=> trailingslashit( get_template_directory() ) . 'lib/demo/cristiano.wordpress.xml',
			'local_import_customizer_file'	=> trailingslashit( get_template_directory() ) . 'lib/demo/customizer.dat',
			'local_import_widget_file'		=> trailingslashit( get_template_directory() ) . 'lib/demo/widgets.json',
			'import_codestar'           	=> array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/demo/codestar.txt',
				),
			),
		),
	);
}

/* SETUP HOMEPAGE
---------------------------------------------------------------- */
function ocdi_after_import_setup() {
    // Assign menus to their locations.
    $primary = get_term_by( 'name', 'Navigation', 'nav_menu' );
    $top_nav = get_term_by( 'name', 'Top Nav', 'nav_menu' );
    
    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $primary->term_id,
            'top_menu' => $top_nav->term_id, 
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Our News' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'blogdescription', 'Restaurant' );
    //update_option( 'permalink_structure', '/%postname%/' );
    wp_delete_post('1');
}

/* CODESTAR IMPORT
---------------------------------------------------------------- */
function restocore_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {
	$downloader = new OCDI\Downloader();
	if( ! empty( $import_files[$selected_index]['import_codestar'] ) ) {
		foreach( $import_files[$selected_index]['import_codestar'] as $index => $import ) {
			$file_path = $import['file_path'];
			$file_raw  = file_get_contents($file_path);
			$decoded_data = cs_decode_string( $file_raw );
			update_option( '_cs_options', $decoded_data );
		}
	}
	
	$ocdi       = OCDI\OneClickDemoImport::get_instance();
	$log_path   = $ocdi->get_log_file_path();
	OCDI\Helpers::append_to_file( 'Custom Framework file loaded.', $log_path );
}

add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
add_action( 'pt-ocdi/after_content_import_execution', 'restocore_after_content_import_execution', 3, 99 );

add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );