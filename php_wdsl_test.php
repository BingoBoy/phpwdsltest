<?php
/*
Plugin Name: PHPwdslTest
Plugin URI: http://tyfon.no
Description: Try to consume a web service with php in Wordpress
Author: Truls Dahl
Version: 0.52
Author URI: http://tyfon.no
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
require('nusoap/lib/nusoap.php');

function php_wdsl_test() {
   phpinfo();
   return "Hello world!"; 
}
add_shortcode( 'phpwdsltest', 'php_wdsl_test' );
