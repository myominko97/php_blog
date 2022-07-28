<?php
require_once 'layout/header.php';
$blog = new Blogs();
$data = $blog->getAll();
?>
<section class="grid grid-cols-12 mt-10 gap-4">
    <div class="col-start-3 col-span-8">
        <a href="blogs_create.php" class="flex w-max items-center gap-1
        bg-gradient-to-r from-red-500 to-gray-700 text-gray-300 py-1.5 px-4 rounded-sm shadow-lg">
            <i class="material-icons" style="font-size: 1.15rem;">add_circle</i> Create New</a>
    </div>
    <div class="col-start-3 col-span-8 grid grid-cols-12 gap-3">

        <?php
        foreach ($data as $d) {
        ?>
            <div class="card col-span-4 text-gray-200 shadow-lg
                border border-gray-700 rounded-sm relative
                pb-2">
                <!-- card -->
                <div class="absolute right-0 top-0 mr-1 mt-1">
                    <i class="menu-btn material-icons p-1 bg-gray-700 text-gray-200 rounded-full cursor-pointer">
                        more_vert
                    </i>
                    <div class="menu-content hidden shadow-lg flex flex-col bg-gray-900 text-red-500 rounded text-sm absolute">
                        <a href="blogs_detail.php?id=<?php echo $d->id; ?>" class="py-1.5 pl-2 pr-10 border-b border-gray-700 flex items-center gap-1">
                            <i class="material-icons">info</i> Detail
                        </a>
                        <a href="blogs_edit.php?id=<?php echo $d->id; ?>" class="py-1.5 pl-2 pr-10 border-b border-gray-700 flex items-center gap-1">
                            <i class="material-icons">edit</i> Edit
                        </a>
                        <span onclick="deleteBlog(<?php echo $d->id; ?>)"
                        class="py-1.5 pl-2 pr-10  flex items-center gap-1 cursor-pointer">
                            <i class="material-icons">delete</i> Delete
                        </span>
                    </div>
                </div>
                <img src="../blog_img/<?php echo $d->img; ?>" alt="Web development" class="w-full">
                <div class="p-2">
                    <a href="blogs_detail.php?id=<?php echo $d->id; ?>"
                    class="block font-bold text-gray-300 text-center text-lg">
                        <i class="material-icons <?php echo $d->is_publish == '1' ? 'text-green-400' : 'text-gray-600' ?> publish">circle</i>
                        <?php echo $d->title;  ?>
                    </a>
                    <div class="flex items-center justify-between text-sm my-2">
                        <div class="flex items-center">
                            <i class="material-icons">category</i>
                            <?php echo $d->name; ?>
                        </div>

                        <div class="flex items-center">
                            <i class="material-icons">hourglass_bottom</i>
                            <?php
                                echo explode(' ',$d->timestamp)[0];
                            ?>
                        </div>
                    </div>
                    <p class="text-justify text-gray-400">
                        <?php
                            echo substr($d->content,0,170);
                        ?>
                        <a href="blogs_detail.php?id=<?php echo $d->id; ?>" class="font-bold">See More..</a>
                    </p>

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
<script>
    $(document).mouseup(function(e) 
    {
        let container = $('.menu-content, .menu-btn');

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            $('.menu-content').addClass('hidden');
        }
    });
    $('.menu-btn').click((e)=>{
        $('.menu-content').addClass('hidden');
        let menuClasses =  e.target.parentElement.children[1].classList.remove('hidden');
        // menuClasses.splice(0,1);
        // $(this).siblings('.menu').removeClass('hidden');
    });

    $(document).keydown(function(e){
        if(e.key == "Escape"){
            $('.menu-content').addClass('hidden');
        }
    });
    function deleteBlog(id){
        let isDelete = confirm('Are you sure to delete?');
        if(isDelete){
            location.href = `blogs_delete.php?id=${id}`;
        }
    }
    
</script>