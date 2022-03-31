<?php
    require_once'./Models/Ketqua.php';
  
    class KetQua {
        function index(){
            $getKetqua = new KetquaModels();
            $r = $getKetqua->getKetqua($_SESSION['id']);
            require_once'./Views/Ketqua.php';
        }
    
    }
?>