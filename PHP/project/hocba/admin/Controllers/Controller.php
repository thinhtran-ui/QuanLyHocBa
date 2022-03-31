<?php
    class Controller {
        public function model($model){
            require_once"./Models/".$model.".php";
        }
        public function view($view,$data=[]){
            require_once"./Views/".$view.".php";
        }
        
    }
?>