<?php
ob_start();
session_start();
require_once 'core/config.php';
require_once 'app/interfaces/interfaceDatabase.php';

spl_autoload_register(function ($name){
    require_once "classes/{$name}.class.php";
});