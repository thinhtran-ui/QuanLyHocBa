<?php
require_once'./Models/Diem.php';
class Diem {
    function index(){
    require_once'./Views/Diem.php';
    }
    function Xemdiem($id_lop=null,$id_hocki=null){
         if(empty($id_lop)){
             $getLop = new DiemModels();
             $r = $getLop->Getlop($_SESSION['id']);
             require_once'./Views/Danhsachlop.php';
            }
         else{
             $getListdiem = new DiemModels();
             $r= $getListdiem->getListdiem($id_lop,$_SESSION['id'],$id_hocki);
             require_once'./Views/Xemdiem.php';
            }
    }
    function Update($id_lop=null,$id_hocki=null,$id_bangdiem=null,$id_hocsinh=null,$id_monhoc=null,$id_giaovien=null){
        if(empty($id_lop)){
            $getLop = new DiemModels();
            $r = $getLop->Getlop($_SESSION['id']);
            require_once'./Views/Danhsachlop.php';
        }
        else{
            if(isset($_POST['capnhat'])&&$_POST['capnhat']=='Không'){
                        echo 'Bạn chưa được cấp quyền cập nhật điểm <br>';
                        echo 'Chọn đồng ý để gửi yêu cầu cấp quyền   <br>' ;
                        echo '<i>Chú ý : Bạn chỉ được cập nhật 1 lần với mỗi yêu cầu được gửi đi</i>';
            }
            elseif(!empty($id_bangdiem)){
                if(isset($_POST['history'])){
                    $history = new DiemModels();
                    $getHistory=$history->getHistory($id_bangdiem);
                    if(count($getHistory)==0){
                        echo '<h5> Chưa cập nhật lần nào </h5>';
                    }
                    else{
                        echo '<h5> Số lần đã cập nhật :'.count($getHistory).' </h5>';
                         for($i=0;$i<count($getHistory);$i++){
                             echo ' <h6>Lần thứ '.($i+1).' ngày giờ cập nhật : '.date('d/m/Y',strtotime($getHistory[$i]['ngaycapnhat'])).' '.date('h:i:s',strtotime($getHistory[$i]['giocapnhat'])).' </h6>';
                         } 
                    }
                 return 0;
                }
                elseif(isset($_POST['submit'])){
                
                    $update = new DiemModels();
                    $result = $update->Updatebangdiem($id_hocsinh,$id_monhoc,$id_hocki);
                    $result->execute([$_POST['Diemtk1'],$_POST['Diemtk2'],$_POST['Diem15plan1'],$_POST['Diem15plan2'],
                    $_POST['Diemgk'],$_POST['Diemck'],"Không",$id_bangdiem]);
                    $updateDiemtb= $update->updateDiemtb();
                    $updateDiemtb->execute([$id_hocsinh,$id_monhoc,$id_giaovien,$id_hocki]);
                    $insertHistory= $update->history($id_bangdiem);
                    $updateKQDTB = $update-> updateKQDTB($id_hocsinh,$id_lop,'Học kì 1',$id_hocki);
                    echo  "<script  type='text/javascript'> alert('Cập nhật thành công')   </script>";
                    echo  "<script type='text/javascript'>  window.location.href='http://localhost/PHP/project/hocba/Giaovien/Diem/Update/".$id_lop."/".$id_hocki."'   </script>";
                }
                $GetDiem = new DiemModels();
                $r=$GetDiem->getDiemhs($id_bangdiem);
                require_once'./Views/Update.php';
            }
            else{
                $getListdiem = new DiemModels();
                $r= $getListdiem->getListdiem($id_lop,$_SESSION['id'],$id_hocki);
                require_once'./Views/DanhsachUpdate.php';
            }
            
     }
   }
   function Add($id_lop=null,$id_hocki=null,$id_hocsinh=null,$id_monhoc=null,$id_giaovien=null){
       
    if(empty($id_lop)){
        $getLop = new DiemModels();
        $r = $getLop->Getlop($_SESSION['id']);
        require_once'./Views/Danhsachlop.php';
       }
    else{
        if($id_hocsinh==null){
            $GetHs = new DiemModels();
            $r= $GetHs->getHs($id_lop,$_SESSION['id']);
             require_once'./Views/danhsachdiem.php';
        }
        else{
      
            if(isset($_POST['submit'])){

                $update = new DiemModels();
                $result = $update->updateDiem();
                $result->execute([$_POST['Diemtk1'],$_POST['Diemtk2'],$_POST['Diem15plan1'],$_POST['Diem15plan2'],
                $_POST['Diemgk'],$_POST['Diemck'],$id_hocsinh,$id_monhoc,$id_giaovien,$id_hocki]);
                $updateDiemtb= $update->updateDiemtb();
                $updateDiemtb->execute([$id_hocsinh,$id_monhoc,$id_giaovien,$id_hocki]);
                $r=$update->getDiem($id_hocsinh,$id_monhoc,$id_giaovien,$id_hocki);
                $getHk =$update->getHk($id_lop);
                $updateKQDTB = $update-> updateKQDTB($id_hocsinh,$id_lop,'Học kì 1',$id_hocki);
                require_once'./Views/Adddiem.php';
                echo "<script> alert('Thêm thành công') </script>";
            }
            $GetDiem = new DiemModels();
            
            $r= $GetDiem->checkDiem($id_hocsinh,$id_monhoc,$id_giaovien,$id_hocki);
            if(!$r){
                $GetDiem->addDiem($id_hocsinh,$id_monhoc,$id_lop,$id_giaovien,$id_hocki); 
                $r=$GetDiem->getDiem($id_hocsinh,$id_monhoc,$id_giaovien,$id_hocki);
                require_once'./Views/Adddiem.php';
            }
            else{  
                $r=$GetDiem->getDiem($id_hocsinh,$id_monhoc,$id_giaovien,$id_hocki);
                require_once'./Views/Adddiem.php';
            }
            
        }
    }

}
   }

