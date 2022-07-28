</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    let url = location.pathname;
    let filename = url.split('/');
    let activePage = filename[filename.length - 1];
    if(activePage.includes('index') || activePage.includes('categories')){
        $('.cat').addClass('active');
    }else if(activePage.includes('blogs')){
        $('.blog').addClass('active');
    }

</script>
</html>