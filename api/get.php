<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('..' . DIRECTORY_SEPARATOR . 'config.php');

require_once('..' . DS . 'core' . DS . 'restapi.php');

$api_key = new ApiKeys($config);

var_dump($api_key->check_key('7%B%4w3d"Cef5kU;'));

//$get_rest = new Players($config);

//var_dump($get_rest->get());

?>