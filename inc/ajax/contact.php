<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['email'])){
    require_once __DIR__ . '/../../app/inti.php';
    $contact->setMessageInput($_POST['email'],$_POST['username'],$_POST['message']);
}