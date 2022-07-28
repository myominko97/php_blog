<?php
require_once '../controller/autoload.php';
if(isset($_SESSION['email'])){
    header('Location:index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    $auth = new Auth();
    if($auth->login($_POST)){
        header('Location:index.php');
    }else{
        $error = '! Email or Password Wrong';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Read | LOGIN</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <section class="w-screen h-screen bg-gray-800 flex justify-center items-center">
        <div class="w-full mx-5 lg:mx-0 lg:w-1/3 flex flex-col items-center gap-4
        border border-gray-600 rounded shadow-lg pb-5">
           <img src="assets/img/youread.png" alt="" class="w-1/4 -mt-14">
           <h1 class="text-xl text-gray-400 font-bold">Admin Login</h1>
           <?php 
            if(isset($error)){
                ?>
                <p class="text-red-500"> <?php echo $error; ?> </p>
                <?php
            }
            ?>
           <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" method="POST"
           class="flex flex-col gap-4 w-full px-16">
               <div class="relative">
                    <i class="material-icons absolute text-gray-400">email</i>
                    <input type="email" name="email" placeholder="Enter Email"
                        class="w-full bg-transparent pl-8 pb-1 outline-none text-gray-300
                        border-b border-gray-500" required autofocus>
               </div>
               <div class="relative">
                    <i class="material-icons absolute text-gray-400">key</i>
                    <input type="password" name="password" placeholder="Enter Password"
                        class="w-full bg-transparent pl-8 pb-1 outline-none text-gray-300
                        border-b border-gray-500" required>
               </div>
               <button type="submit" name="login" class="w-max mx-auto flex items-center gap-1 text-sm py-1.5 px-10
                bg-gradient-to-r from-red-500 to-gray-700 text-gray-400 font-bold rounded-sm 
                hover:shadow-lg">
                <i class="material-icons" style="font-size:1rem">login</i> LOGIN</button>
           </form>
        </div>
    </section>
</body>

</html>