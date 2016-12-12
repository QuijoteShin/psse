<?php

@session_start();

require_once ('../src/woz/psse.php');

$sse = new \woz\PSSE();

$sse->run(function($condition, $psse) {

    $h =  getallheaders();
    $serverTime = time();
    $data = json_encode(array('ts' => time(), "h" => $h));
    $psse->send($serverTime, $data, "woz");


    return $condition;
});