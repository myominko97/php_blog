<?php
class Blogs extends Connection{
    use Filter, File;
    private $con;
    function __construct()
    {
        $this->con = $this->connect();
    }

    function getAll(){
        $sql = "SELECT blogs.id, blogs.title, blogs.content, blogs.img,
        blogs.timestamp, blogs.is_publish, categories.name
         FROM blogs INNER JOIN categories ON blogs.categories_id = categories.id";
         $res = $this->con->prepare($sql);
         $res->execute();
         $data = $res->fetchAll(PDO::FETCH_OBJ);
         return $data; 
    }

    function store($post, $file){
        if(empty($post['title']) || !isset($post['title'])
        || empty($post['categories_id']) || !isset($post['categories_id'])
        || empty($post['content']) || !isset($post['content'])
        || empty($file['img']['name'])){
            return (object)['success'=>false,'errors'=>['Something Went Wrong']];
        }
        $this->setFile($file['img']);
        $v = $this->validateFile(['jpg','jpeg','png','gif','webp','svg'],2);
        if(!$v){
            return (object)['success'=>false,'errors'=>$this->errors];
        }
        $this->uploadFile('../blog_img');
        $title = $this->sanitize($post['title'],'string');
        $categories_id = $this->sanitize($post['categories_id'],'int');
        $content = $this->sanitize($post['content'],'string');
        $img = $this->name;
        $is_publish = isset($post['is_publish']) ? '1' : '0';

        $sql = "INSERT INTO blogs(title, categories_id, content, img, is_publish)
        VALUES(:title, :categories_id, :content, :img, :is_publish)";
        $res = $this->con->prepare($sql);
        $res->bindParam(':title',$title);
        $res->bindParam(':categories_id',$categories_id);
        $res->bindParam(':content',$content);
        $res->bindParam(':img',$img);
        $res->bindParam(':is_publish',$is_publish);
        return $res->execute() ? (object)['success'=>true,'errors'=>null] :
        (object)['success'=>false,'errors'=>['Something Went Wrong']];
    }
    function getById(int $id){
        $sql = "SELECT blogs.id, blogs.categories_id, blogs.title, blogs.content, blogs.img,
        blogs.timestamp, blogs.is_publish, categories.name
         FROM blogs INNER JOIN categories ON blogs.categories_id = categories.id WHERE blogs.id = :id";
        $res = $this->con->prepare($sql);
        $res->bindParam(':id',$id);
        $res->execute();
        $data = $res->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    function update(int $id, $post, $file){
        if(empty($post['title']) || !isset($post['title'])
        || empty($post['categories_id']) || !isset($post['categories_id'])
        || empty($post['content']) || !isset($post['content'])){
            return (object)['success'=>false,'errors'=>['Something Went Wrong']];
        }
        $old_img = $this->sanitize($_POST['old_img'],'string');
        if(empty($file['img']['name'])){
            $img = $old_img;
        }else{
            $this->setFile($file['img']);
            $v = $this->validateFile(['jpg','jpeg','png','gif','webp','svg'],2);
            if(!$v){
                return (object)['success'=>false,'errors'=>$this->errors];
            }
            $this->uploadFile('../blog_img');
            unlink("../blog_img/$old_img");
            $img = $this->name;
        }

        $title = $this->sanitize($post['title'],'string');
        $categories_id = $this->sanitize($post['categories_id'],'int');
        $content = $this->sanitize($post['content'],'string');
        $is_publish = isset($post['is_publish']) ? '1' : '0';

        $sql = "UPDATE blogs SET title=:title, content=:content, categories_id=:categories_id, img=:img,
        is_publish=:is_publish WHERE id=:id";
        $res = $this->con->prepare($sql);
        $res->bindParam(':id',$id);
        $res->bindParam(':title',$title);
        $res->bindParam(':categories_id',$categories_id);
        $res->bindParam(':content',$content);
        $res->bindParam(':img',$img);
        $res->bindParam(':is_publish',$is_publish);
        return $res->execute() ? (object)['success'=>true,'errors'=>null] :
        (object)['success'=>false,'errors'=>['Something Went Wrong']];
    }
    function destroy(int $id){
        unlink("../blog_img/".$this->getById($id)->img);
        $sql = "DELETE FROM blogs WHERE id = :id";
        $res = $this->con->prepare($sql);
        $res->bindParam(':id',$id);
        return $res->execute() ? true : false;
    }
}