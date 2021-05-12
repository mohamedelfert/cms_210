<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['id'])){
    require_once __DIR__ . '/../../app/inti.php';
    $video->deleteCommentWithAjax($_POST['id']);
}
