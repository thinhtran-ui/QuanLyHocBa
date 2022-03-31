<?php
    require_once'./Models/Diem.php';
  
    class Diem {
        function index(){
  
            $getLop = new DiemModels();
            $r = $getLop->Getlop($_SESSION['id']);
            require_once'./Views/Danhsachlop.php';
        }
        function Xemdiem($id_hocsinh,$id_lop){
           $getDiem = new DiemModels();
           $r1 = $getDiem->getDiemhk1($id_hocsinh,$id_lop);
           $r2 = $getDiem->getDiemhk2($id_hocsinh,$id_lop);
           require_once'./Views/Diem.php';
        }
    }
?>