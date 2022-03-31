<?php
    require_once'./Models/Giaovien.php';
    class Giaovien {
       function  __construct(){
          
       }
       function index(){
          $datagv= new GiaovienModel(); 
          $r =  $datagv->getGv();
         require_once'./Views/Giaovien.php';
       }
       function add(){
        $insertgv = new GiaovienModel();
         $maso=$name=$date=$gioitinh=$diachi=$monhoc=$lop="";
         if(isset($_POST['submit']))
         {
            if(empty($_POST['maso'])){
              $maso="Vui lòng nhập mã số";
            }
            elseif(!preg_match('/^[G][V][0-9]{5}$/',$_POST['maso']))
            $maso="Mã số phải bắt đầu bằng kí tự 'GV' và 5 chữ số ";
           if($insertgv->checkmsgv($_POST['maso'])!=0){
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
            if(empty($_POST['monhoc'])){
              $monhoc="Vui lòng nhập môn học";
            }
            if($insertgv->checkmsmh($_POST['monhoc'])==0){
              $monhoc="Môn học không tồn tại";
            }
    
            if(preg_match('/^[G][V][0-9]{5}$/',$_POST['maso'])&&$insertgv->checkmsgv($_POST['maso'])==0&&$insertgv->checkmsmh($_POST['monhoc'])>0&&!empty($_POST['maso'])&&!empty($_POST['name'])&&!empty($_POST['date'])&&!empty($_POST['gioitinh'])
            &&!empty($_POST['diachi'])&&!empty($_POST['monhoc'])){
              $r =$insertgv->addGv();
              echo "<script> alert('Thêm thành công') </script>";
            }
         }
  
        $getMonhoc = $insertgv->getMonhoc();
        require_once'./Views/addGiaovien.php';  
      
       }
       function delete($id){
         $deleteGv= new GiaovienModel;
         $r=$deleteGv-> deleteGv($id);
         $datagv= new GiaovienModel();
         $r =  $datagv->getGv();
         echo "<script> alert('Xóa thành công') </script>";
         echo "<script> window.location.href='http://localhost/PHP/project/hocba/admin/Giaovien'</script>";
      }
      function edit($id){
        $editGv = new GiaovienModel();
        $maso=$name=$date=$gioitinh=$diachi=$monhoc=$lop="";
        if(!isset($_POST['submit'])){
          $result = $editGv->Get_Gv($id);
          $row = $result->fetch();
          $getMonhoc =  $editGv->getMonhoc();
          require_once'./Views/editGiaovien.php';  
        }
        else
        {
           if(empty($_POST['maso'])){
             $maso="Vui lòng nhập mã số";
           }
           if($editGv->checkmsgv($_POST['maso'])>1){
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
           if(empty($_POST['monhoc'])){
             $monhoc="Vui lòng nhập môn học";
           }
           if(($editGv->checkmsgv($_POST['maso'])==1||$editGv->checkmsgv($_POST['maso'])==0)&&!empty($_POST['maso'])&&!empty($_POST['name'])&&!empty($_POST['date'])&&!empty($_POST['gioitinh'])
           &&!empty($_POST['diachi'])&&!empty($_POST['monhoc'])){
             $r= $editGv->editGv($id);
             echo "<script> alert('Cập nhật thành công') </script>"; 
             $result = $editGv->Get_Gv($id);
             $row = $result->fetch();
             $getMonhoc =  $editGv->getMonhoc();
             require_once'./Views/editGiaovien.php';  
           }
           else {
           $result = $editGv->Get_Gv($id);
           $row = $result->fetch();
           require_once'./Views/editGiaovien.php';  
           }
          } 
      }
      
      
      
   }
?>
