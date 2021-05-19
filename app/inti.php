<?php
ob_start();
session_start();
require_once __DIR__ . '/../core/config.php';
require_once __DIR__ . '/../app/interfaces/interfaceDatabase.php';

spl_autoload_register(function ($name){
    require_once __DIR__ . "/../classes/{$name}.class.php";
});

if (isset($_GET['logout']) and $_GET['logout'] == true){
    session_unset();
    session_destroy();
    header("Location: index.php");
}

/*
 * for pagination
 */
//if (!isset($page)){
//    $page = 1;
//}else{
//    $page = intval($_GET['page']);
//}


$category = new Category();

$video = new Videos();

$contact = new Contact();

//$pagination = new Pagination();

$users = new Users();