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
/*   phpinfo();*/
/*   return "Hello world!"; */
ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache
$client = new SoapClient("http://www.nasjonaltjenestekatalog.no/ws7/katalog?wsdl");
$return = $client->hentTjenestebeskrivelser(100);
print_r($return);
}
add_shortcode( 'phpwdsltest', 'php_wdsl_test' );




function php_wdsl_test2() {
  /* Create a class for your webservice structure, in this case: Contact */
class Beskrivelse {
    function Beskrivelse($id, $name) 
    {
        $this->id = $id;
        $this->name = $name;
    }
}

ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache

/* Initialize webservice with your WSDL */
$client = new SoapClient("http://www.nasjonaltjenestekatalog.no/ws7/katalog?wsdl");



/* Invoke webservice method with your parameters, in this case: Function1 */
$response = $client->__soapCall();

/* Print webservice response */
var_dump($response);

}
add_shortcode( 'phpwdsltest2', 'php_wdsl_test2' );
