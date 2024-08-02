<?php

include("../../../../wp-load.php");

$postid = $_POST['postid']; 
$getPostDetail = apies_function(apibaseurl."getallSectionsDetailbyPostid.php?postid=$postid");
$producttitle = $getPostDetail->postdetail[0]->post_title;
if(!empty($getPostDetail->postdetail[0]->download_link)){
    $download_link = $getPostDetail->postdetail[0]->download_link;
}else{
    $download_link = $getPostDetail->postdetail[0]->json_template_file;
}
$layout_json = file_get_contents($download_link);
$post_id = import_divi_layout($layout_json);
if (is_wp_error($post_id)) {
    echo 'Error' . $post_id->get_error_message();
} else {
    echo 'Layout imported successfully';
}


function import_divi_layout($layout_json) {
    // Decode the layout JSON data
    $layout_data = json_decode($layout_json, true);

    if (is_null($layout_data)) {
        return new WP_Error('invalid_json', 'Invalid JSON data');
    }

    // Extract layout data
    $layout_info = $layout_data['data'][array_key_first($layout_data['data'])];
    $layout_title = wp_strip_all_tags($layout_info['post_title']);
    $layout_slug = $layout_info['post_name'];

    // Check if the layout already exists by title or slug
    $existing_post = get_page_by_path($layout_slug, OBJECT, 'et_pb_layout');

    if ($existing_post) {
        // Layout already exists, return its ID
        return $existing_post->ID;
    }

    // Prepare the post data
    $post_data = array(
        'post_title'    => $layout_title,
        'post_content'  => $layout_info['post_content'],
        'post_status'   => $layout_info['post_status'],
        'post_type'     => $layout_info['post_type'],
        'post_name'     => $layout_slug,
    );

    // Insert the post into the database
    $post_id = wp_insert_post($post_data);

    if (is_wp_error($post_id)) {
        return $post_id;
    }

    // Update post meta
    foreach ($layout_info['post_meta'] as $meta_key => $meta_value) {
        update_post_meta($post_id, $meta_key, maybe_unserialize($meta_value[0]));
    }

    // Set the theme builder area if specified
    if (isset($layout_info['theme_builder_area'])) {
        update_post_meta($post_id, '_theme_builder_area', $layout_info['theme_builder_area']);
    }

    // Assign terms
    foreach ($layout_info['terms'] as $term_id => $term_info) {
        wp_set_object_terms($post_id, $term_info['slug'], $term_info['taxonomy'], true);
    }

    return $post_id;
}

