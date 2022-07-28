<?php 
 require_once 'layout/header.php';
 $cat = new Categories();
 $data = $cat->getAll();
?>
   <section class="grid grid-cols-12 mt-10 gap-4">
       <div class="col-start-3 col-span-8">
           <a href="categories_create.php" class="flex w-max items-center gap-1
           bg-gradient-to-r from-red-500 to-gray-700 text-gray-300 py-1.5 px-4 rounded-sm shadow-lg">
              <i class="material-icons" style="font-size: 1.15rem;">add_circle</i> Create New</a>
       </div>
        <div class="col-start-3 col-span-8 grid grid-cols-12 gap-3">
            <?php
                foreach($data as $d){
                    ?>
                    <div class="card col-span-4 text-gray-200 shadow-lg border border-gray-700 rounded-sm
                        py-2 px-5"> <!-- card -->
                        <h4 class="text-center text-lg font-bold text-gray-300">
                            <?php echo $d->name; ?>
                        </h4>
                        <div class="flex justify-between mt-4 text-gray-400">
                            <div>
                                <i class="material-icons publish <?php 
                                    echo $d->is_publish == '1' ? 'text-green-500' : 'text-ray-800';
                                ?>">circle</i>
                                <?php 
                                    echo $d->is_publish == '1' ? 'Published' : 'Unpublished';
                                ?>
                            </div>
                            <div class="action mt-0.5">
                                <a href="categories_edit.php?id=<?php echo $d->id; ?>" class="material-icons">edit</a>
                                <a href="categories_delete.php?id=<?php echo $d->id; ?>" class="material-icons">delete</a>
                            </div>
                        </div>
                    </div>

            <?php
                }

            ?>



        </div>
   </section>
<?php 
 require_once 'layout/footer.php';
?>
