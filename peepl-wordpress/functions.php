<?php

// require get_theme_file_path('/peepl/under-construction.php');
require get_theme_file_path('/peepl/enqueue.php');
require get_theme_file_path('/peepl/tidy.php');
require get_theme_file_path('/peepl/post-type-support.php');
require get_theme_file_path('/peepl/colors.php');

add_theme_support( 'post-thumbnails' );

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="wp-block-button__link has-black-color has-text-color"';
}