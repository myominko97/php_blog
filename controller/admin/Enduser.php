<?php 
class Enduser extends Connection{
    public $con;
    function __construct()
    {
        $this->con = $this->connect();
    }
    function getAllCategories(){
        // $sql = "SELECT id,name FROM categories WHERE is_publish = '1' ";
        $sql = "SELECT categories.id, categories.name, COUNT(blogs.id) AS blogs_count
        FROM categories INNER JOIN blogs ON categories.id = blogs.categories_id
        WHERE categories.is_publish = '1' AND blogs.is_publish = '1' GROUP BY categories.id";
        $res = $this->con->prepare($sql);
        $res->execute();
        $data = $res->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    function getAllBlogs(int $id){
        if($id == 0){
            $sql = "SELECT * FROM blogs WHERE is_publish = '1'";    
            $res = $this->con->prepare($sql);
        }else{
            $sql = "SELECT * FROM blogs WHERE is_publish = '1' AND categories_id=:id";
            $res = $this->con->prepare($sql);
            $res->bindParam(':id',$id);
        }
        $res->execute();
        $data = $res->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    function getBLogById(int $id){
        $sql = "SELECT * FROM blogs WHERE id=:id";
        $res = $this->con->prepare($sql);
        $res->bindParam(':id',$id);
        $res->execute();
        $data = $res->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    function searchBlogs(string $val){
        $sql = "SELECT id,title FROM blogs WHERE title LIKE '%$val%' AND is_publish = '1'";
        $res = $this->con->prepare($sql);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}