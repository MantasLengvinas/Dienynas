<?php

require_once 'config.php';
session_start();

function __autoload($class_name){
    require_once 'lib/'.$class_name.'.php';
}