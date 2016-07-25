<?php
/*
Plugin Name: PHPwdslTest
Plugin URI: http://tyfon.no
Description: Try to consume a web service with php in Wordpress
Author: Truls Dahl
Version: 0.52
Author URI: http://tyfon.no
*/
/*defined( 'ABSPATH' ) or die( 'No script kiddies please!' );*/
require('nusoap/lib/nusoap.php');


function php_wdsl_test2() {
  
/* Initialize webservice with your WSDL */
$client = new SoapClient("http://www.nasjonaltjenestekatalog.no/ws7/katalog?wsdl");

$params = array(
  "hentOversikt" => "",
  "hentOversiktResponse" => "",
);

/* Invoke webservice method with your parameters */
/*$response = $client->__soapCall(array($params));*/
$response = $client;
/* Print webservice response */
var_dump($response);

}
add_shortcode( 'phpwdsltest2', 'php_wdsl_test2' );
