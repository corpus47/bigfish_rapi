<?php
header('Access-Control-Allow-Origin: *');
header('Content-type:application/json;charset=utf-8');

require_once('..' . DIRECTORY_SEPARATOR . 'config.php');

require_once('..' . DS . 'core' . DS . 'restapi.php');

$get_rest = new Players($config);

var_dump($get_rest->get());

?>