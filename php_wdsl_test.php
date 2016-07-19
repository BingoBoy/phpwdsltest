<?php
/*
Plugin Name: PHPwdslTest
Plugin URI: http://tyfon.no
Description: Try to consume a web service with php in Wordpress
Author: Truls Dahl
Version: 0.51
Author URI: http://tyfon.no
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function php_wdsl_test() {
   return "Hello world!"; 
   phpinfo();
}
add_shortcode( 'phpwdsltest', 'php_wdsl_test' );
