<?php 
 require_once 'layout/header.php';
 $cat = new Categories();
 $categories = $cat->getForBlogs();

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
      $blog = new Blogs();
      $b = $blog->store($_POST,$_FILES);

      if($b->success){
         header('Location:blogs.php');
      }else{
         $errors = $b->errors;
      }
   }

?>
   <section class="grid grid-cols-12 mt-10 gap-4 mb-10">
       <a href="blogs.php" class="col-start-3 col-span-8 flex items-center text-red-500">
           <i class="material-icons">arrow_back</i> Back
       </a>
        <div class="col-start-5 col-span-4 text-justify">
           
            <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>"
            method="POST" enctype="multipart/form-data"
            class="shadow-lg border border-gray-700 rounded-sm py-2 px-5 flex flex-col gap-8"
            autocomplete="off">
               <h1 class="mx-auto w-max text-xl text-gray-300">New Blogs</h1>
               <?php 
               if(isset($errors)){
                  foreach($errors as $e){
                     ?>
                     <p class='text-red-500 text-center'>
                        <?php echo $e; ?>
                     </p>
                     <?php
                  }
               }
               ?>
               <div class="w-full flex justify-center">
                  <label for="img" id="preview" class="w-2/5 text-gray-500 border border-dotted border-gray-500 text-center">
                     <p class="py-10">Upload Image</p>
                  </label>
                  <input type="file" id="img" onchange="previewImg(event)" name="img" accept="image/*"
                        class="hidden w-full bg-transparent pl-8 pb-1 outline-none text-gray-300
                        border-b border-gray-500">
               </div>

               <div class="relative">
                  <i class="material-icons absolute text-gray-400">history_edu</i>
                  <input type="text" name="title" placeholder="Enter Blog's Title"
                        class="w-full bg-transparent pl-8 pb-1 outline-none text-gray-300
                        border-b border-gray-500" autofocus>
               </div>
               <div class="relative">
                  <i class="material-icons absolute text-gray-400">category</i>
                  <select name="categories_id"
                        class="w-full bg-transparent pl-8 pb-1 outline-none text-gray-500
                        border-b border-gray-500">
                        <option selected disabled>Select Category</option>
                        <?php
                           foreach($categories as $cat){
                        ?>
                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>   

                        <?php
                           }
                        ?>
                    </select>
               </div>
               <div class="relative">
                  <i class="material-icons absolute text-gray-400">border_color</i>
                  <textarea name="content" placeholder="Enter Blog's Content"
                        class="w-full bg-transparent pl-8 pb-1 outline-none text-gray-300
                        border-b border-gray-500" rows="5"></textarea>
               </div>
               <div class="flex items-center gap-2">
                  <!-- Rounded switch -->
                     <label class="switch">
                        <input type="checkbox" name="is_publish" checked>
                        <span class="slider round"></span>
                     </label>
                     <span class="text-gray-400 text-sm">Is Publish</span>
               </div>
               <button type="submit" name="create" class="w-full text-center mb-2 text-sm py-1 px-3
                  bg-gradient-to-r from-red-500 to-gray-700 text-gray-300 rounded-sm 
                  hover:shadow-lg">
                        Create
               </button>
            </form>

        </div>
   
   </section>
   
<script>
   let previewImg = (event)=>{
      let file = event.target.files[0];
     let blobURL = URL.createObjectURL(file);
      document.querySelector('#preview').innerHTML = `<img src="${blobURL}" class="w-full">`;
//   document.querySelector("video").src = blobURL;
   }
</script>
<?php 
 require_once 'layout/footer.php';
?>

