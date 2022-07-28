<?php
require_once '../controller/autoload.php';
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Read</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-800">
   <nav class="flex justify-between items-center border-b border-gray-700 px-10
   text-red-500">
        <div>
            LOGO
        </div>
        <div class="flex gap-4">
            <a href="index.php" class="py-3 px-2 flex flex-col items-center cat">
                <i class="material-icons nav-icon">grid_view</i> Categories
            </a>
            <a href="blogs.php" class="py-3 px-2 flex flex-col items-center blog">
                <i class="material-icons nav-icon">history_edu</i> Blogs
            </a>
        </div>
        <a href="logout.php" class="flex items-center gap-1 text-sm py-1 px-3
        bg-gradient-to-r from-red-500 to-gray-700 text-gray-300 rounded-sm 
        hover:shadow-lg">
            <i class="material-icons" style="font-size: 1.3rem;">power_settings_new</i> LOGOUT
        </a>
   </nav>
