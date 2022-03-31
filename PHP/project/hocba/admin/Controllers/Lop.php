<?php
    require_once'./Models/Lop.php';
    class Lop{
        function  __construct(){
          
        }
        function index(){
           $datalop =  new LopModel();
           $r = $datalop->getLop();
           require_once'./Views/Lop.php';
        }
        function add(){
            
            if(isset($_POST['select'])){
              $data =  new LopModel();
              $getGvaddnam = $data->getGvaddnam($_POST['id_nam']);
             while($row=$getGvaddnam->fetch()){
                echo "<option value='".$row['id_giaovien']."'> ".$row['tengv']." </option> ";
             }  
       
              return 0;
            }
            $insertlop= new LopModel();
            $maso=$name=$id="";
            if(isset($_POST['submit']))
      
            {
               if(empty($_POST['maso'])){
                 $maso="Vui lòng nhập mã số";
               }
               elseif(!preg_match('/^[L][H][A-Z0-9]{0,5}$/',$_POST['maso']))
              $maso="Mã số phải bắt đầu bằng kí tự 'LH' và tối đa 5 kí tự ";
              else{
                if($insertlop->checkmslop($_POST['maso'])>0){
                    $maso="Mã số đã tồn tại";
                  }
              } 
               if(empty($_POST['name'])){
                 $name="Vui lòng nhập tên lớp";
               }
               if(empty($_POST['id'])){
                 $id="Vui lòng nhập mã giáo viên";
               }
               else{
                if($insertlop->checkgv($_POST['id'])>0){
                    $id="Giáo viên đã chủ nhiệm lớp khác";
                  }
                  if($insertlop->checkgv_tontai($_POST['id'])==0){
                    $id="Giáo viên không tồn tại";
                  }
               }
               if(preg_match('/^[L][H][A-Z0-9]{0,5}$/',$_POST['maso'])&&$insertlop->checkmslop($_POST['maso'])==0&&!empty($_POST['maso'])&&!empty($_POST['name'])
               &&!empty($_POST['id'])){
                $r =$insertlop->addLop();
                 echo "<script> alert('Thêm thành công') </script>";
               }
             
            
            }
            $getNam=$insertlop->getNam();
            $getGv=$insertlop->getGvadd();
           require_once'./Views/addLop.php';  
        }
        function edit($id1,$id_nam){
            $editLop = new LopModel();
            $maso=$name=$id="";
            if(!isset($_POST['submit'])){
              $result = $editLop->Get_Lop($id1);
              $row = $result->fetch();
              $getGv=$editLop->getGv($id1,$id_nam);
              require_once'./Views/editLop.php'; 
            }
            else{
              if(empty($_POST['maso'])){
                $maso="Vui lòng nhập mã số";
              }
             else{
               if($editLop->checkmslop($_POST['maso'])>1){
                   $maso="Mã số đã tồn tại";
                 }
             } 
              if(empty($_POST['name'])){
                $name="Vui lòng nhập tên lớp";
              }
              if(empty($_POST['id'])){
                $id="Vui lòng nhập mã giáo viên";
              }
              else{
               if($editLop->checkgv($_POST['id'])>1){
                   $id="Giáo viên đã chủ nhiệm lớp khác";
                 }
                 if($editLop->checkgv_tontai($_POST['id'])==0){
                   $id="Giáo viên không tồn tại";
                 }
              }
            
              if(($editLop->checkmslop($_POST['maso'])==0||$editLop->checkmslop($_POST['maso'])==1)&&!empty($_POST['maso'])&&!empty($_POST['name'])
              &&!empty($_POST['id'])){
                $r= $editLop->editLop($id1);
                echo "<script> alert(' Cập nhật thành công') </script>";
                $result = $editLop->Get_Lop($id1);
                $row = $result->fetch();
                $getGv=$editLop->getGv($id1,$id_nam);
                $getHk=$editLop->getNam();
                require_once'./Views/editLop.php'; 
             
              }
              else{
                $result = $editLop->Get_Lop($id1);
                $row = $result->fetch();
                require_once'./Views/editLop.php'; 
              }
            }
        }
        function delete($id1){
            $deletelop= new LopModel;
            $r=$deletelop-> deletelop($id1);
            header('location:http://localhost/PHP/project/hocba/admin/Lop');
        }
    }
?>