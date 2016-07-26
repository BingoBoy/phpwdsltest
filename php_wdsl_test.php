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

echo "FUNKSJONER
";
$allefunksjoner = $client->__getFunctions();
echo str_replace(array('&lt;?php&nbsp;','?&gt;'), '', highlight_string( '<?php ' .     var_export($allefunksjoner, true) . ' ?>', true ) );

echo "TYPE
";
$allefunksjoner = $client->__getTypes();
echo str_replace(array('&lt;?php&nbsp;','?&gt;'), '', highlight_string( '<?php ' .     var_export($allefunksjoner, true) . ' ?>', true ) );
}
add_shortcode( 'funksjonsoversikt', 'funksjonsoversikt' );
