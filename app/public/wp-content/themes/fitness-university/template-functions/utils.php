<?php

// https://codex.wordpress.org/Function_Reference/get_theme_file_uri
// https://developer.wordpress.org/reference/functions/wp_list_pages/
/*
* https://codex.wordpress.org/Function_Reference/wp_get_post_parent_id
* https://developer.wordpress.org/reference/functions/get_the_permalink/
* https://developer.wordpress.org/reference/functions/get_the_title/
* usage $pg = page_data(get_the_id());
*/ 
function page_data($id = NULL){
  if(!$id){ 
    $id = get_the_ID();
  }
  
  $parentId = wp_get_post_parent_id($id);
  
  if($parentId){
  return array(
    "id"    => $id,
    "url"   => get_the_permalink($id),
    "title" => get_the_title($id),
    "parent" => array("id"    => $parentId,
                      "url"   => get_the_permalink($parentId),
                      "title" => get_the_title($parentId)
                      )
  );
  }else{
    return array(
      "id"    => $id,
      "url"   => get_the_permalink($id),
      "title" => get_the_title($id),
      "parent" => NULL
    );
  }

}

function custom_post_data($id = NULL){
  
  if(!$id){ 
    $id = get_the_ID();
  }

  return [
          "url"       => get_the_permalink($id),
          "title"     => get_the_title($id),
          "parent"    => [
                      "url"   => get_post_type_archive_link( get_post_type($id) ),
                      "title" => ucfirst(get_post_type($id) . 's')
                      ]
          ];
}


function theme_image($img){
  return get_template_directory_uri() . '/assets/images/' . $img;
}


function theme_title(){
  $type = get_post_type();
  if($type == 'page' || $type == 'post'){
    return get_the_title();
  }

  if(is_archive()){
    return get_the_archive_title();
  }

}

function dot($key, array $data, $bool=NULL) {

	// @assert $key is a non-empty string
	// @assert $data is a loopable array
  // @otherwise return NULL value
  
	if (!is_string($key) || empty($key) || !count($data))
	{
		return NULL;
	}

	// @assert $key contains a dot notated string
	if (strpos($key, '.') !== false)
	{
		$keys = explode('.', $key);

		foreach ($keys as $innerKey)
		{
			// @assert $data[$innerKey] is available to continue
      // @otherwise return NULL value
      if ($data===NULL){
        return NULL;
      }
			if (!array_key_exists($innerKey, $data))
			{
				return NULL;
			}

			$data = $data[$innerKey];
		}
    if($bool){
      return $data;
    }
    echo $data;
    return TRUE;
	}

	// @fallback returning value of $key in $data or $default value
	if(array_key_exists($key, $data)){
    if($bool){
      return $data[$key];
    }
    echo $data[$key];
    } else{
     return NULL;
    }
}

function show($any) {
  ?>
  <pre>
    <?php  print_r($any);  ?>
  </pre>
  <?php
}
