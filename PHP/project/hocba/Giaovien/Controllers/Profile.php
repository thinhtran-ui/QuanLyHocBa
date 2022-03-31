<?php
    require_once'./Models/Giaovien.php';
    class Profile {
       function index(){
            $getGv = new GiaovienModel();
            $r = $getGv->getGv($_SESSION['id']);
            $_SESSION['monhoc']= $r['id_monhoc'];
            require_once'./Views/Profile.php';
        }
    }
?>