</body>
<footer class="flex justify-between items-center">
   <div class="contact">
     <a href=""><i class="fab fa-facebook-square text-3xl"></i></a>
     <a href=""><i class="fab fa-twitter-square text-2xl"></i></a>
     <a href=""><i class="fas fa-phone-square-alt text-1xl"></i></a>
     <p class="text-sm"><a href="#" class="term">TERMS && CONDITION </a></p>
   </div>
   <div>    
     <img src="admin/assets/img/youread.png" alt="" style="width:140px">
  </div>
   <div class="copyright">
     <p class="text-sm px-16 text-gray-300">CREATED BY <span>MHK</span></p>
     <!-- <p class="text-sm">Copied By <span>YYA</span></p> -->
    </div>
</footer>
<div class="bg-gray-800">
  <small class="text-center block text-gray-100">Copyright &copy; 2021 Read Me.All Right Reserved</small>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function search(val){
        $.ajax({
            type: "POST",
            url: 'search.php',
            data: {
                searchKey : val 
            } ,
            success: function(response){
                let res = JSON.parse(response);
                if(res.success){
                    let data = res.data;
                    $('#searchedArea').html('');
                    data.forEach(function(val, index, array){
                        $('#searchedArea').append(`
                                <a href="blogs_detail.php?id=${val.id}"
                                class="w-full block py-2 px-4 hover:bg-red-500 hover:text-gray-300
                    transition ease-in duration-100">${val.title}</a>
                                `)
                    })
                }else{
                    $('#searchedArea').html('');
                }
           }
       });
    };
    var slideIndex = 0;
    showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1} 
  console.log(slideIndex);
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 5000);
}


    
</script>
</html>