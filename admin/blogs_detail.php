<?php 
    require_once 'layout/header.php';
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('Location:blogs.php');
        die();
    }

 $blogs = new Blogs();
 $blog = $blogs->getById($_GET['id']);

?>
 <section class="grid grid-cols-12 mt-10 gap-4 mb-10">
       <a href="blogs.php" class="col-start-3 col-span-8 flex items-center text-red-500">
           <i class="material-icons">arrow_back</i> Back
       </a>

       <div class="col-start-4 col-span-6 flex flex-col gap-3">
            <div class="flex items-center gap-2 justify-center">
                <i class="material-icons <?php echo $blog->is_publish == '1' ? 'text-green-400' : 'text-gray-600' ?> publish">circle</i>
                <h1 class="text-xl font-bold text-gray-300"><?php echo $blog->title; ?></h1>
            </div>
            <div>
                <img src="../blog_img/<?php echo $blog->img; ?>" alt="" class="w-full">
            </div>
            <div class="flex justify-between text-gray-300 font-bold">
                <div class="flex items-center">
                    <i class="material-icons">category</i>
                    <?php echo $blog->name; ?>
                </div>

                <div class="flex items-center">
                    <i class="material-icons">hourglass_bottom</i>
                    <?php
                        echo $blog->timestamp;
                    ?>
                </div>
            </div>
            <div>
                <p class="text-gray-300 text-justify">
                    <?php 
                        echo $blog->content;
                    ?>
                </p>
            </div>
       </div>
      
 </section>


<?php
    require_once 'layout/footer.php'
?>