<?php
    require_once'./Models/Lopcn.php';
    class Lopchunhiem{
        function index(){
         $getLop = new LopcnModels();
         $r=$getLop->getLopcn($_SESSION['id']);
        require_once'./Views/Lopcn.php';
    }
        function chitiet($id_lop){

            $getHs = new LopcnModels();
            $r=$getHs->getHs($id_lop);
             require_once'./Views/LopcnHocsinh.php';  
        }
        function Xemdiem($id_lop,$id_mshs){
            $getDiem = new LopcnModels();
            if(isset($_POST['tenhk'])){

                $row=$getDiem->getDiem($id_mshs,$id_lop,$_POST['tenhk']);
                $row['Điểm trung bình']= round($row['Điểm trung bình'],1);
                $reponese=" 
                <td> ". $row['Toán']."  </td>
                <td>  ". $row['Văn']."  </td>
                <td>  ".$row['Lý']." </td>
                <td>   ". $row['Hóa']."  </td>
                <td>   ".$row['Sinh']."  </td>
                <td>    ".$row['Điểm trung bình']." </td>";
                echo $reponese;
                return 0;
            }
            $row=$getDiem->getDiem($id_mshs,$id_lop);
            $getHk =$getDiem->getHk($id_lop);
            require_once'./Views/XemdiemAll.php';  
        }
        function Ketqua($id_lop,$id_mshs){
            $getKetqua = new LopcnModels();
            $row=$getKetqua->getKetqua($id_lop,$id_mshs);
            require_once'./Views/Xemketqua.php';  
        }
}
?>