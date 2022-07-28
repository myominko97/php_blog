<?php
class Connection
{
    private $server = '127.0.0.1';
    private $user = 'root';
    private $password = '';
    private $db = 'blog_sayar';

    protected function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
}
