<?php 
    if(isset($_GET['cat']) && !is_numeric($_GET['cat'])){
        header('Location:index.php');
    }
 require_once 'layout/header.php';
 $enduser = new Enduser();
 $categories = $enduser->getAllCategories();

 $cat_id = isset($_GET['cat']) ? filter_var($_GET['cat'],FILTER_SANITIZE_NUMBER_INT) : 0;
 $blogs = $enduser->getAllBlogs($cat_id);

?>
    <div class="slider bg-gray-200">
        <h2>THE BEST FORM OF<br><span class="uline">EXPRESSION IS</span><br><span class="bl">BLOGGING!</span></h2>
        <div class="slider-wrapper">
                        <?php
                            foreach($blogs as $b){
                                ?>

                        <div class="slider-content slides">
                            <div class="text-gray-200  rounded-sm relative
                                grid grid-cols-12 card-slide">
                                <!-- card -->
                                
                                <div class="col-span-7 px-4 py-4">
                                <?php 
                                    foreach($categories as $cat){
                                    ?>
                                        <?php 
                                            if($cat->id==$b->categories_id){
                                                ?>
                                    <span class="font-bold bg-gray-800 text-gray-100 text-sm pl-3 pr-10 py-2 text-center">
                                                <?php
                                                echo $cat->name;
                                                ?>
                                    </span>
                                            <!-- // elseif($cat->id==9){
                                            //     echo $cat->name;
                                            // }
                                            // elseif($cat->id==8){
                                            //     echo $cat->name;
                                            // }
                                             -->
                                        

                                    <?php
                                            }
                                    }
                                    ?>
                                    <a href="blogs_detail.php?id=<?php echo $b->id; ?>"
                                    class="block font-bold text-gray-100 text-lg mt-4">
                                        <?php echo $b->title; ?>
                                    </a>
                                    <p class="text-gray-300 py-2 mb-2">
                                    <?php echo substr($b->content,0,210); ?>
                                    <span>...</span>
                                    </p>
                                    <div class="w-28 drop-shadow-2xl flex bg-gray-800 items-center px-2 py-1 justify-center hover:text-red-500 ease-in-out duration-300">
                                        <a href="blogs_detail.php?id=<?php echo $b->id; ?>" class="font-bold text-gray-100 rounded-sm text-sm block">See More</a>
                                        <i class="material-icons hover:text-red-500">play_arrow</i>
                                    </div>
                                </div>
                                <div class="w-full col-span-5">
                                <img src="blog_img/<?php echo $b->img; ?>" alt="Web development" class="w-full h-full">
                                </div>
                            </div>  
                        </div>
                        <?php
                            }
                        
                        ?>
        </div>
    </div>
   <section class="grid grid-cols-12 gap-4 clear-right py-10 bg-gray-200">
       <div class="col-start-1 col-span-12 grid grid-cols-12 px-20">
           <div class="col-span-3">
               <h1 class="font-bold text-2xl text-gray-800 w-max border-b-2 border-red-600 pb-1">Categories</h1>
               <div class="text-gray-800 py-6 flex flex-col gap-3 -ml-2">
                   
                    <a href="index.php" class="flex items-center
                    <?php echo $cat_id == 0 ? 'text-red-500' : ''; ?> 
                    transform hover:translate-x-2 transition ease-in duration-500">
                        <i class="material-icons">arrow_right</i> All
                        <span class="ml-2 bg-red-500 text-gray-300 rounded-sm text-xs px-1">
                           <?php
                               echo array_reduce($categories,function($total,$val){
                                    $total += $val->blogs_count;
                                    return $total;
                                });
                           ?>
                        </span>
                    </a>
                    <?php 
                        foreach($categories as $cat){
                            ?>
                        <a href="index.php?cat=<?php echo $cat->id; ?>" class="flex items-center
                    transform hover:translate-x-2 transition eas-in duration-500
                    <?php echo $cat->id == $cat_id ? 'text-red-500' : '';  ?>">
                            <i class="material-icons">arrow_right</i> <?php echo $cat->name; ?>
                            <span class="ml-2 bg-red-500 text-gray-300 rounded-sm text-xs px-1">
                                <?php echo $cat->blogs_count; ?>
                            </span>
                        </a>
                            <?php
                        }
                    ?>
               </div>
           </div>
           <div class="col-span-9">
               <h1 class="font-bold text-2xl text-gray-800 w-max b-tit">Tech Blog</h1>
               <div class="grid grid-cols-12 gap-3 mt-6">
                        <?php
                            foreach($blogs as $b){
                                ?>

                        <div class="col-span-4">
                            <div class="card text-gray-800 shadow-lg
                                border-none border-gray-700 rounded-sm relative
                                pb-2 bg-gray-800">
                                <!-- card -->
                                
                                <img src="blog_img/<?php echo $b->img; ?>" alt="Web development" class="w-full">
                                <div class="p-2">
                                    <a href="blogs_detail.php?id=<?php echo $b->id; ?>"
                                    class="block font-bold text-gray-300 text-center text-lg">
                                        <?php echo $b->title; ?>
                                    </a>
                                    <p class="text-gray-400 py-2 px-1">
                                    <?php echo substr($b->content,0,170); ?>
                                    <a href="blogs_detail.php?id=<?php echo $b->id; ?>" class="font-bold">See More...</a>
                                    </p>

                                </div>
                            </div>  
                        </div>
                        <?php
                            }
                        
                        ?>
               </div>
           </div>
       </div>
   </section>
<?php 
 require_once 'layout/footer.php';
?>
