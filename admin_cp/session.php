<?php

require_once __DIR__ . '/../app/inti.php';

if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE and $_SESSION['user']['isAdmin'] == TRUE){

}else{
    header("Location: ../index.php");
}

$cat = $category->displayCategory("ORDER BY id DESC");

$tubes  = $video->displayVideos("ORDER BY id DESC LIMIT 10");

$messages  = $contact->getMessages("ORDER BY id DESC LIMIT 10");