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
/* Create a class for your webservice structure, in this case: Contact */
class Contact {
    function Contact($id, $name) 
    {
        $this->id = $id;
        $this->name = $name;
    }
}

/* Initialize webservice with your WSDL */
$client = new SoapClient("http://localhost:10139/Service1.asmx?wsdl");

/* Fill your Contact Object */
$contact = new Contact(100, "John");

/* Set your parameters for the request */
$params = array(
  "Contact" => $contact,
  "description" => "Barrel of Oil",
  "amount" => 500,
);

/* Invoke webservice method with your parameters, in this case: Function1 */
$response = $client->__soapCall("Function1", array($params));

/* Print webservice response */
var_dump($response);
}
add_shortcode( 'phpwdsltest', 'php_wdsl_test' );

?>
