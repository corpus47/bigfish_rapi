<?php
header('Access-Control-Allow-Origin: *');
header('Content-type:application/json;charset=utf-8');

require_once('config.php');

require_once('core' . DS . 'restapi.php');

$api_key = '9)dy.C5hF>GVuD';

$Players = new Players($config);

$res = json_encode($Players->get());

echo $res;

echo 'Salt: ' . substr( md5(rand()), 0, 10);
echo 'Pw: ' . sha1($api_key. $salt);

/*
    $salt = substr( md5(rand()), 0, 10);
	$password = sha1($inserted['pwd-one']. $salt);
*/
?>