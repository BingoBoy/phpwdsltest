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

require_once 'nusoap/lib/nusoap.php';





/**
 * php_wdsl_nusoap function.
 *
 * @access public
 * @return void
 */
function php_wdsl_nusoap() {

	/* Initialize webservice with your WSDL */
	$client = new SoapClient("http://www.nasjonaltjenestekatalog.no/ws7/katalog?wsdl", true);

	$proxy = $soap->getProxy();

	$response = $proxy->hentAlleTjenestebeskrivelser();

	echo $response;


}
add_shortcode( 'phpwdslnusoap', 'php_wdsl_nusoap' );








/**
 * php_wdsl_test2 function.
 *
 * @access public
 * @return void
 */
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



/**
 * funksjonsoversikt function.
 * En funksjon som viser alle tilgjengelige funksjoner og typer
 * @access public
 * @return void
 */
function funksjonsoversikt() {
	/* Initialize webservice with your WSDL */
	$client = new SoapClient("http://www.nasjonaltjenestekatalog.no/ws7/katalog?wsdl", array('login' => '201128', 'password' => 'test1149'));


	$allefunksjoner = $client->__getFunctions();
	echo str_replace(array('&lt;?php&nbsp;','?&gt;'), '', highlight_string( '<?php ' .     var_export($allefunksjoner, true) . ' ?>', true ) );


	$allefunksjoner = $client->__getTypes();
	echo str_replace(array('&lt;?php&nbsp;','?&gt;'), '', highlight_string( '<?php ' .     var_export($allefunksjoner, true) . ' ?>', true ) );
}
add_shortcode( 'funksjonsoversikt', 'funksjonsoversikt' );
