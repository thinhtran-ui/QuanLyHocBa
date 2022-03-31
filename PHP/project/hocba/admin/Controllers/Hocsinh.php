<?php
      require_once'./Models/Hocsinh.php';
    class Hocsinh{
        function  __construct(){
          
        }
        function index(){
            $datahs= new HocsinhModel();
            $r = $datahs->getHocsinh();
            require_once'./Views/Hocsinh.php';
        }
        function add(){
            $inserths = new HocsinhModel();
            $maso=$name=$date=$gioitinh=$diachi=$lop="";
            if(isset($_POST['submit']))
            {
               if(empty($_POST['maso'])){
                 $maso="Vui lòng nhập mã số";
               }
              elseif(!preg_match('/^[H][S][0-9]{5}$/',$_POST['maso']))
              $maso="Mã số phải bắt đầu bằng kí tự 'HS' và 5 chữ số ";
              if($inserths->checkmshs($_POST['maso'])>0){
                 $maso="Mã số đã tồn tại";
               }
               if(empty($_POST['name'])){
                 $name="Vui lòng nhập họ và tên";
               }
               if(empty($_POST['date'])){
                 $date="Vui lòng nhập ngày sinh";
               }
               if(empty($_POST['gioitinh'])){
                 $gioitinh="Vui lòng nhập giới tính";
               }
               if(empty($_POST['diachi'])){
                 $diachi="Vui lòng nhập địa chỉ";
               }
        
   
               if(preg_match('/^[H][S][0-9]{5}$/',$_POST['maso'])&&$inserths->checkmshs($_POST['maso'])==0&&!empty($_POST['maso'])&&!empty($_POST['name'])&&!empty($_POST['date'])&&!empty($_POST['gioitinh'])
               &&!empty($_POST['diachi'])&&!empty($_POST['lop'])){
                $id_hocsinh= rand(100000,999999);
                 $r =$inserths->addHs($id_hocsinh);
                 $create = $inserths-> createKetqua($id_hocsinh);
                 echo "<script> alert('Thêm thành công') </script>";
               }
            }
           $getLop =$inserths->getLop();
           require_once'./Views/addhocsinh.php';  
          }
          function edit($id){
            $editHs = new HocsinhModel();
            $maso=$name=$date=$gioitinh=$diachi=$monhoc=$lop="";
            if(!isset($_POST['submit'])){
              $result = $editHs->Get_Hs($id);
              $row = $result->fetch();
              $getLop =$editHs->getLop();
              require_once'./Views/editHocsinh.php';  
            }
            else{
                if(empty($_POST['maso'])){
                    $maso="Vui lòng nhập mã số";
                  }
                 if($editHs->checkmshs($_POST['maso'])>1){
                    $maso="Mã số đã tồn tại";
                  }

                  if(empty($_POST['name'])){
                    $name="Vui lòng nhập họ và tên";
                  }
                  if(empty($_POST['date'])){
                    $date="Vui lòng nhập ngày sinh";
                  }
                  if(empty($_POST['gioitinh'])){
                    $gioitinh="Vui lòng nhập giới tính";
                  }
                  if(empty($_POST['diachi'])){
                    $diachi="Vui lòng nhập địa chỉ";
                  }
              
               
                 if(($editHs->checkmshs($_POST['maso'])==1||$editHs->checkmshs($_POST['maso'])==0)&&!empty($_POST['maso'])&&!empty($_POST['name'])&&!empty($_POST['date'])&&!empty($_POST['gioitinh'])
                 &&!empty($_POST['diachi'])&&!empty($_POST['lop'])){
                   if($editHs->checklop($_POST['lop'],$id)==0){
                     echo 789;
                    $editHs->createKetqua($id);
                   }
                   $r= $editHs->editHs($id);
                   echo "<script> alert('Cập nhật thành công') </script>"; 
                   $result = $editHs->Get_Hs($id);
                   $row = $result->fetch();
                   $getLop =$editHs->getLop();
                   require_once'./Views/editHocsinh.php';  
                 }
                 else {
                 $result = $editHs->Get_Hs($id);
                 $row = $result->fetch();
                 $getLop =$editHs->getLop();
                 require_once'./Views/editHocsinh.php';  
                 }
                } 
            }
            function delete($id){
                $deleteHs= new HocsinhModel;
                $r=$deleteHs-> deleteHs($id);
                header('location:http://localhost/PHP/project/hocba/admin/Hocsinh');
            }
    }
?>