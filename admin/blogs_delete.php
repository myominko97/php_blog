<?php 
    require_once 'layout/header.php';
    
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('Location:blogs.php');
        die();
    }
    $blogs = new Blogs();
    $blog = $blogs->destroy($_GET['id']);

    if($blog){
        header('Location:blogs.php');
    }else{
        echo "Something wrong on delete blog";
    }


?>

