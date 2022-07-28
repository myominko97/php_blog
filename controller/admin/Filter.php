<?php
trait Filter{
    protected function sanitize($value,$datatype = 'string'){
        switch($datatype){
            case 'string':
            return filter_var($value,FILTER_SANITIZE_STRING);
            die();
            
            case 'int':
            return filter_var($value,FILTER_SANITIZE_NUMBER_INT);
            die();

            case 'email':
            return filter_var($value,FILTER_SANITIZE_EMAIL);
            die();
        }
    }

}