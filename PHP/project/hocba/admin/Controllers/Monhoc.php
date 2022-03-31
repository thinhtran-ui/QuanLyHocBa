<?php
        require_once'./Models/Monhoc.php';
        class Monhoc{
            function  __construct(){
          
            }
            function index(){
                $monhoc =  new MonhocModel();
                $r = $monhoc->getMonhoc();
                require_once'./Views/Monhoc.php';
             }
        }

?>