<?php
class Categories extends Connection{
    use Filter;
    private $con;
    function __construct()
    {
        $this->con = $this->connect();
    }

    function getAll(){
        $sql = "SELECT * FROM categories";
        $res = $this->con->prepare($sql);
        $res->execute();
        $data = $res->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    function getForBlogs(){
        $sql = "SELECT id,name FROM categories";
        $res = $this->con->prepare($sql);
        $res->execute();
        $data = $res->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    function store($post){
        if(empty($post['name']) || !isset($post['name'])){
            return (object)['success'=>false,'error'=>'Name can\'t be empty'];
        }
        
        $name = $this->sanitize($post['name'],'string');
        $is_publish = isset($post['is_publish']) ? '1' : '0';

        $sql = "INSERT INTO categories(name,is_publish) VALUES(:name,:is_publish)";
        $res = $this->con->prepare($sql);
        $res->bindParam(':name',$name);
        $res->bindParam(':is_publish',$is_publish);
        if($res->execute()){
            return (object)['success'=>true,'error'=>null];
        }else{
            return (object)['success'=>false,'error'=>'Can\'t create category'];
        }   
    }
    function getById(int $id){
        $sql = "SELECT * FROM categories WHERE id = :id";
        $res = $this->con->prepare($sql);
        $res->bindParam(':id',$id);
        $res->execute();
        $data = $res->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    function update(int $id, $post){
        if(empty($post['name']) || !isset($post['name'])){
            return (object)['success'=>false,'error'=>'Name can\'t be empty'];
        }
        
        $name = $this->sanitize($post['name'],'string');
        $is_publish = isset($post['is_publish']) ? '1' : '0';

        $sql = "UPDATE categories SET name=:name, is_publish=:is_publish
        WHERE id=:id";
        $res = $this->con->prepare($sql);
        $res->bindParam(':name',$name);
        $res->bindParam(':is_publish',$is_publish);
        $res->bindParam(':id',$id);
        if($res->execute()){
            return (object)['success'=>true,'error'=>null];
        }else{
            return (object)['success'=>false,'error'=>'Can\'t update category'];
        }
    }

    function destroy(int $id){
        $sql = "DELETE FROM categories WHERE id = :id";
        $res = $this->con->prepare($sql);
        $res->bindParam(':id',$id);
        return $res->execute() ? true : false;
    }



}