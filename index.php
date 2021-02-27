<?php

header('Access-Control-Allow-Origin: *');
header('Content-type:application/json;charset=utf-8');

require_once('config.php');

require_once('core' . DS . 'restapi.php');

$Players = new Players($config);

var_dump($Players);
?>