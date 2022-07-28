<?php
require_once 'controller/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Read</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
  <header class="bg-gray-800">
  <nav class="flex justify-between items-center px-10
   text-gray-400 pb-3 pt-2">
    <img src="admin/assets/img/youread.png" alt="" style="width:100px">
    <div>
      <div class="relative flex items-center">
        <i class="material-icons absolute ml-1.5">search</i> 
        <input type="text" placeholder="Search..." onkeyup="search(this.value)" class="bg-gray-600 text-gray-300 py-1 pl-8 rounded-sm
       focus:shadow-lg outline-none border-none">
        <div id="searchedArea" class="w-full bg-gray-600 rounded-sm shadow absolute top-0 transform translate-y-10 z-10">
        
        </div>
      </div>
    </div>
   </nav>
  </header>
   
