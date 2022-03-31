<?php
        require_once'./Models/Phancong.php';
        class Phancong{
            function  __construct(){
          
            }
            function index(){
                $phancong =  new PhancongModel();
                $r = $phancong->getPhancong();
                require_once'./Views/Phancong.php';
            }
            function add(){
                if(isset($_POST['id_nam'])){
                    $dataHk = new PhancongModel();
                    $getHk  = $dataHk->getHK($_POST['id_nam']);
                    while($row=$getHk->fetch()){
                        echo "<option value='".$row['id_hocki']."'> ".$row['tenhk']."-(".$row['nam'].") </option> ";
                     }  
                    return 0;
                }
                if(isset($_POST['change'])){
                   $dataHk = new PhancongModel();
                    $getHk  = $dataHk->getHK($_POST['id_nam']);
                    while($row=$getHk->fetch()){
                        echo "<option value='".$row['id_hocki']."'> ".$row['tenhk']." </option> ";
                     }  
                    return 0;
                }
                $insert= new PhancongModel();
                $idgv=$idlop="";
                if(isset($_POST['submit']))
                {
                  $r= $insert->addPhancong();
                  echo "<script> alert('Thêm thành công') </script>";
                    
                }
                $getGv = $insert->getGv();
                $getLop = $insert->getLop();
                require_once'./Views/addPhancong.php'; 

            }
        }

?>