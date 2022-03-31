<?php
    require_once'./Models/Diemdanh.php';
    class Diemdanh{
        function index(){
       
            $getLop = new DiemdanhModels();
            $r = $getLop->Getlop($_SESSION['id']);
            require_once'./Views/diemdanh.php';
          
        }
        function lop($id_lop){
            $diemdanh = new DiemdanhModels;
            if(isset($_POST['submit'])){
                unset($_POST['submit']); 
                foreach($_POST as $x => $x_value) {
                   if($x_value=='co'){
                    unset($_POST[$x]); 
                   }
                  }
                  foreach($_POST as $x => $x_value) {
                    $diemdanh-> updateNgaynghi($x,$id_lop);
                 } 
                 echo "<script> alert('Điểm danh thành công') </script>";
                 $getHocsinh = new DiemdanhModels();
                 $r = $getHocsinh-> geths($id_lop);
                 require_once'./Views/Danhsachhs.php';
               
            }
            else {
            $getHocsinh = new DiemdanhModels();
            $r = $getHocsinh-> geths($id_lop);
            require_once'./Views/Danhsachhs.php';
            }
        }
    }
?>