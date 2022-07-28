<?php
require_once 'controller/autoload.php';
$enduser = new Enduser();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchKey']) && !empty($_POST['searchKey'])){
    $searchKey = filter_var($_POST['searchKey'],FILTER_SANITIZE_STRING);
    $data = $enduser->searchBlogs($searchKey);
    echo json_encode(['success'=>true, 'data' => $data]);
}else{
    echo json_encode(['success'=>false]);
}