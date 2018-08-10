<?php

/**
 * Plugin Name: Uba custom Api
 * Description: JSON-based REST API for WordPress, originally developed as part of GSoC 2013.
 * Author: Uba custom Api
 * Author URI: http://ubakarasamy.com
 * Version: 2.0-beta15
 * Plugin URI: http://ubakarasamy.com/apitest
 * License: GPL2+
 */


add_action( 'rest_api_init', function () {
	register_rest_route( 'myplugin/v1', '/author/(?P<id>\d+)', array(
	  'methods' => 'GET',
	  'callback' => 'my_awesome_func',
	) );
  } );

  function my_awesome_func( $data ) {
	$posts = get_posts( array(
	  'author' => $data['id'],
	) );
   
	if ( empty( $posts ) ) {
	  return null;
    }
    $arr = [];
    foreach ($posts as $key) {
        array_push($arr, $key->post_name);
    }
   
	return $arr;
  }
