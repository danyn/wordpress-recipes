<?php 


function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyCCJYnbGoVqRXq_j-hV2e6AcDE1wrR3tUs';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');