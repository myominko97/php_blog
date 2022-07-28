<?php
class Auth extends Connection{
    use Filter;
    private $con;
    function __construct(){
        $this->con = $this->connect();
    }

    function login($post){
       if(!array_key_exists('email',$post) || !array_key_exists('password',$post) 
       || empty($post['email']) || empty($post['password']) ||
       !filter_var($post['email'],FILTER_VALIDATE_EMAIL)){
           return false;
       }
       $email = $this->sanitize($post['email'],'email');
       $password = $this->sanitize($post['password']);
       $sql = "SELECT * FROM users WHERE email = :email";
       $res = $this->con->prepare($sql);
       $res->bindParam(':email',$email);
       $res->execute();
       $finded = $res->fetch(PDO::FETCH_OBJ);
       if(!$finded){
            return false;
       }else{
            if(password_verify($password,$finded->password)){
                $_SESSION['email'] = $email;
                return true;
            }else{
                return false;
            }
       }

    }
}
