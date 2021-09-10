<?php

function is_taxonomy_assigned_to_post_type( $post_type, $taxonomy = null ) {
	if ( is_object( $post_type ) )
		$post_type = $post_type->post_type;

	if ( empty( $post_type ) )
		return false;

	$taxonomies = get_object_taxonomies( $post_type );

	if ( empty( $taxonomy ) )
		$taxonomy = get_query_var( 'taxonomy' );

	return in_array( $taxonomy, $taxonomies );
}

/**
 * Custom JSON API endpoint.
 * Usage: http://sample-project.com/wp-json/gef-mozambique/v1/list-filters
 */
function post_filters( WP_REST_Request $request ) {
    $parameters = $request->get_query_params();

    $post_type = $parameters['post_type'];

		$excluded_taxonomies = ['translation_priority'];

    /*
      Get taxonomies by post type
    */
    $taxonomies = get_taxonomies( [], 'objects' );

    $args = array(
      'hide_empty' => 0,
			'orderby' => 'term_order',
			'order' => 'ASC'
    );

    $filters = [];

    $index = 0;
    foreach( $taxonomies as $taxonomy ) {
      if (
				in_array($post_type, $taxonomy->object_type, true) &&
				!in_array($taxonomy->name, $excluded_taxonomies)
			) {
        //Get terms by taxonomy
        $terms = get_terms( $taxonomy->name, $args);
        $new_terms = [];

        foreach ($terms as $term) {
          if ($term->count > 0) {
            array_push($new_terms, $term);
          }
        }

        // Buld array of post type taxonomies with terms
        $filters[$index] = array(
          'id' => $index,
          'label' => $taxonomy->label,
          'taxonomy' => $taxonomy->name,
          'terms' => $new_terms
        );
        $index++;
      }
    }

    $result = array(
      'filters' => $filters
    );

    // Return json.
    return $result;
}
add_action('rest_api_init', function () {
    register_rest_route('gef-mozambique/v1', '/list-filters', array(
        'methods' => 'GET',
        'callback' => 'post_filters',
    ));
});




/**
 * Get events by start date
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function get_events_by_date_start( WP_REST_Request $request ) {

	$parameters = $request->get_query_params();

  // Force the posts_per_page to be no more than 12
  if ( isset( $parameters['per_page'] ) && ( (int) $parameters['per_page'] >= 1 && (int) $filter['per_page'] <= 12 ) ) {
    $per_page = intval($parameters['per_page']);
  } else {
    $per_page = 12;
  }

	$args = array(
		'paged' => $parameters['page'],
		'posts_per_page' => $per_page,
		'post_type'		=> 'event',
		'meta_key'			=> 'date_start',
		'orderby'			=> 'meta_value',
		'order'				=> 'ASC'
  );

  $search_query = new WP_Query( $args );

	$controller = new WP_REST_Posts_Controller('post');
  $posts = array();

  while ( $search_query->have_posts() ) : $search_query->the_post();
    $data    = $controller->prepare_item_for_response( $search_query->post, $request );
    $posts[] = $controller->prepare_response_for_collection( $data );
  endwhile;

	// return results
  if(!empty($posts)) {
    $total = $search_query->found_posts;
    $pages = $search_query->max_num_pages;
    $returned = new WP_REST_Response( $posts, 200 );
    $returned->header( 'X-WP-Total', $total );
    $returned->header( 'X-WP-TotalPages', $pages );
    return $returned;
  } else {
    return new WP_Error( 'No results', 'Nothing found' );
  }
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'gef-mozambique/v1', '/events', array(
    'methods' => 'GET',
    'callback' => 'get_events_by_date_start',
  ) );
} );

/**
 * Get courses by start date
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function get_courses_by_date_start( WP_REST_Request $request ) {

	$parameters = $request->get_query_params();

  // Force the posts_per_page to be no more than 12
  if ( isset( $parameters['per_page'] ) && ( (int) $parameters['per_page'] >= 1 && (int) $filter['per_page'] <= 12 ) ) {
    $per_page = intval($parameters['per_page']);
  } else {
    $per_page = 12;
  }

	$args = array(
		'paged' => $parameters['page'],
		'posts_per_page' => $per_page,
		'post_type'		=> 'online_course',
		'meta_key'			=> 'date_start',
		'orderby'			=> 'meta_value',
		'order'				=> 'ASC'
  );

  $search_query = new WP_Query( $args );

	$controller = new WP_REST_Posts_Controller('post');
  $posts = array();

  while ( $search_query->have_posts() ) : $search_query->the_post();
    $data    = $controller->prepare_item_for_response( $search_query->post, $request );
    $posts[] = $controller->prepare_response_for_collection( $data );
  endwhile;

	// return results
  if(!empty($posts)) {
    $total = $search_query->found_posts;
    $pages = $search_query->max_num_pages;
    $returned = new WP_REST_Response( $posts, 200 );
    $returned->header( 'X-WP-Total', $total );
    $returned->header( 'X-WP-TotalPages', $pages );
    return $returned;
  } else {
    return new WP_Error( 'No results', 'Nothing found' );
  }
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'gef-mozambique/v1', '/courses', array(
    'methods' => 'GET',
    'callback' => 'get_courses_by_date_start',
  ) );
} );




/**
 * Get table post data
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function get_table_post_data( WP_REST_Request $request ) {

	$parameters = $request->get_query_params();

	$post_type = $parameters['post_type'];
	// $post_type = 'nbsap_goals';

	$args = array(
		'posts_per_page' => -1,
		'post_type'		=> $post_type,
		'order'				=> 'ASC'
  );

  $search_query = new WP_Query( $args );

	$controller = new WP_REST_Posts_Controller('post');
  $posts = array();

  while ( $search_query->have_posts() ) : $search_query->the_post();
    $data    = $controller->prepare_item_for_response( $search_query->post, $request );
    $posts[] = $controller->prepare_response_for_collection( $data );
  endwhile;

	$formatted_posts = array();
	// Make in to parameter
	$restricted_columns = ['Text', 'Compliance Percentage', 'Progress Ranking', 'Shortcode'];

	foreach ($posts as $post) {
		$post_id = $post['id'];
		$post_title = $post['title']['rendered'];
		$post_data = array();

		$post_acf_data = get_field_objects( $post_id );
		foreach ($post_acf_data as $item) {
			// If value is already show on the table already
			if ( !in_array( $item['label'], $restricted_columns )) {
				array_push($post_data, array(
					'label' => $item['label'],
					'value' => $item['value']
				));
			}
		}

		$new_post = array(
			'id' => $post_id,
			'title' => $post_title,
			'data' => $post_data
		);
		array_push($formatted_posts, $new_post);
	}


	//
	//
	//
	// $post_id = intval($parameters['post_id']);
	// $post_type = $parameters['post_type'];
	//
	// $post_title = get_the_title( $post_id );
	//
  // $acf_data = get_field_objects( $post_id );
	//
  // $post_data = array(
	// 	'title' => $post_title,
	// 	'acf' => $acf_data
	// );

	// return results
  if(!empty($formatted_posts)) {
    $returned = new WP_REST_Response( $formatted_posts, 200 );
    return $returned;
  } else {
    return new WP_Error( 'No results', 'Nothing found' );
  }

}

add_action( 'rest_api_init', function () {
  register_rest_route( 'gef-mozambique/v1', '/table-posts', array(
    'methods' => 'GET',
    'callback' => 'get_table_post_data',
  ) );
} );
