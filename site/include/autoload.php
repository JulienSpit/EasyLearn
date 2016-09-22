<?php
define("APP_PATH", "../site");
session_start();
function __autoload($class_name){
    if(!@include_once APP_PATH."/include/".mb_strtolower($class_name).".php"){
        if(!@include_once "../include/".mb_strtolower($class_name).".php") {
            include_once "../../include/" . mb_strtolower($class_name) . ".php";
        }
    }
}
if(!isset($bd)) {
	$bd = new Bd(APP_PATH . '/DataBase.db');
}

