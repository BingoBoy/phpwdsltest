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
$client = new SoapClient("http://www.nasjonaltjenestekatalog.no/ws7/katalog?wsdl", array('login' => '201128', 'password' => 'test1149'));

$params = array (
    "Tittel" => $title
);

$response = $client->__soapCall(hentAlleTjenestebeskrivelser, array($params));

var_dump($response);


}
add_shortcode( 'phpwdsltest2', 'php_wdsl_test2' );

/*
En funksjon som viser alle tilgjengelige funksjoner og typer
*/
function funksjonsoversikt() {
  /* Initialize webservice with your WSDL */
$client = new SoapClient("http://www.nasjonaltjenestekatalog.no/ws7/katalog?wsdl", array('login' => '201128', 'password' => 'test1149'));

echo "FUNKSJONER";
var_dump($client->__getFunctions()); 
echo "TYPE";
var_dump($client->__getTypes());
}
add_shortcode( 'funksjonsoversikt', 'funksjonsoversikt' );
