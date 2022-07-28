<?php
trait File{
    public $file = null;
    public $name = null;
    public $size = null;
    public $ext = null;
    public $tmp_name = null;
    public $errors = null;
    function setFile($file){
        $this->file = $file;
        $this->name = time().$file['name'];
        $this->size = $file['size'];
        $this->ext = pathinfo($this->name,
        PATHINFO_EXTENSION);
        $this->tmp_name = $file['tmp_name'];
    }
    function errors(){
        return $this->errors;
    }
    function validateFile(array $extension, int $size){
        $success = true;
        if(!in_array($this->ext,$extension)){
            $errors[] = 'Extension not allowed. Allowed extension are '
            .implode(',',$extension);
            $success = false;
        }
        $fileSize = ($this->size / (1024 * 1000)); // user input file size by mb
        if($fileSize > $size){
            $errors[] = "Allowed file size is $size MB";
            $success = false;
        }
        if($success){
            return true;
        }else{
            $this->errors = $errors;
            return false;
        }
    }
    function uploadFile(string $path){
        if(!is_dir($path)){
            mkdir($path);
        }
        move_uploaded_file($this->tmp_name,
        $path."/".$this->name);
    }
   
}
