<?php
if (function_exists('simplexml_load_string')){
// include SimpleXLSX class
require_once get_template_directory() . '/inc/classes/SimpleXLSX.php';

add_action('init', 'loading_analytics_file_to_relevanssi');

function loading_analytics_file_to_relevanssi(){
    // check if file exits and if can add data to relevanssi
    if(!empty(get_field('upload_excel_file_analytics', 'options')) && get_field('load_data_to_relevanssi_plugin', 'options')){
        $file = parse_url(get_field('upload_excel_file_analytics', 'options'), PHP_URL_PATH);
        $full_file_path = $_SERVER["DOCUMENT_ROOT"].$file;
        $loaded_data = array();
        if ( $xlsx = SimpleXLSX::parse($full_file_path)) {
            foreach($xlsx->rows() as $cells){
               $value = "$cells[0] = $cells[1]";
               array_push($loaded_data, $value);
            }
            unset($loaded_data[0]);
            $save_data = implode(";",$loaded_data);
            // insert loaded data
            $synonyms = get_option( 'relevanssi_synonyms' );
            if ( isset( $synonyms ) ) {
                $synonyms .= $save_data;
                update_option( 'relevanssi_synonyms', $synonyms );
            } else {
                update_option( 'relevanssi_synonyms', $save_data );
            }

        }
    }
}
}