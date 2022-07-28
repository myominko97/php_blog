<?php 

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header('Location:index.php');
}
 require_once 'layout/header.php';
 $enduser = new Enduser();
 $categories = $enduser->getAllCategories();

 $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
 $blog = $enduser->getBLogById($id);

?>
   <section class="grid grid-cols-12 my-10 gap-4">
       <div class="col-start-1 col-span-12 grid grid-cols-12 px-12">
           <div class="col-span-3">
               <h1 class="font-bold text-2xl text-gray-800 w-max border-b-2 border-gray-300 pb-1">Categories</h1>
               <div class="text-gray-800 py-6 flex flex-col gap-3 -ml-2">
                    <a href="index.php" class="flex items-center transform hover:translate-x-2 transition eas-in duration-500">
                        <i class="material-icons">arrow_right</i> All
                        <span class="ml-2 bg-red-500 text-gray-200 rounded-sm text-xs px-1">
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
                    <?php echo $cat->id == $blog->categories_id ? 'text-red-500' : '';  ?>">
                            <i class="material-icons">arrow_right</i> <?php echo $cat->name; ?>
                            <span class="ml-2 bg-red-500 text-gray-800 rounded-sm text-xs px-1">
                                <?php echo $cat->blogs_count; ?>
                            </span>
                        </a>
                            <?php
                        }
                    ?>
               </div>
           </div>
           <div class="col-span-9">
               <h1 class="font-bold text-2xl text-gray-800 border-l-4 border-red-600 pl-3 pt-2 pb-2">
                <?php echo $blog->title; ?>
               </h1>
               <div class="grid grid-cols-12 gap-2 mt-6">
                    <div class="col-span-12 flex gap-3">
                        <div class="w-1/3">
                            <img src="blog_img/<?php echo $blog->img; ?>" alt="" class="w-max">
                        </div>
                        <div class="w-2/3">
                            <div class="flex items-center gap-3 mb-2 text-gray-100 font-blod">
                                <?php 
                                        $timestamp = explode(" ",$blog->timestamp); 
                                    ?>
                                <span class="flex items-center gap-1 px-3 py-1 bg-gray-800 rounded-md w-30">
                                    <i class="material-icons" style="font-size:1em;">calendar_month</i>
                                    <?php 
                                    echo $timestamp[0]; ?>
                                </span>
                                <span class="flex items-center gap-1 px-4 py-1 bg-gray-800 rounded-md">
                                    <i class="material-icons" style="font-size:1em;">hourglass_bottom</i>
                                    <?php 
                                    echo $timestamp[1]; ?>
                                </span>
                            </div>
                            <div class="col-span-12">
                                    <p class="text-gray-800 text-justify">
                                    <?php echo $blog->content; ?>
                                    </p>
                                </div>
                        </div>
                    </div>
               </div>
           </div>
       </div>
   </section>
<?php 
 require_once 'layout/footer.php';
?>
