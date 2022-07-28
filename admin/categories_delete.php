<?php
 require_once 'layout/header.php';

if(!isset($_GET['id'])
|| !is_numeric($_GET['id'])){
    header('Location:index.php');
    die();
}

$cat = new Categories();
if($cat->destroy($_GET['id'])){
    header('Location:index.php');
}else{
    echo "Something went wrong";
}