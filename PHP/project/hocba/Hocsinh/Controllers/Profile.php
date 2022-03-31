<?php
    require_once'./Models/Hocsinh.php';
    class Profile {
       function index(){
            $getHs = new HocsinhModel();
            $r = $getHs->getHs($_SESSION['id']);
            require_once'./Views/Profile.php';
        }
    }
?>