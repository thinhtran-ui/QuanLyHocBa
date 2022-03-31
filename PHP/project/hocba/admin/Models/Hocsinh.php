<?php
      require_once'Connect.php';
      class HocsinhModel{
        function __construct(){

        }
        function getHocsinh(){
            $db=new Connect();
            $sql ="select hocsinh.id_hocsinh, hocsinh.mshs,hocsinh.tenhs,Date_format(hocsinh.namsinh,'%d/%m/%Y') as 'namsinh',hocsinh.gioitinh,hocsinh.diachi
            ,lop.tenlop,giaovien.tengv
            from lop left join giaovien on lop.id_msgv=giaovien.id_giaovien RIGHT JOIN hocsinh on lop.id_lop=hocsinh.id_malop
            ";
            $results= $db->exutedQuery($sql);
            $results->execute();
            return $results;
        }
        function createKetqua($id_hocsinh){
     
            $db=new Connect();
            $sql=" iNSERT INTO `ketqua` 
            (`id_ketqua`, `id_malop`, `id_msgv`, `id_mshs`, `diemhk1`, `diemhk2`, `diemcanam`, `songaynghi`,`hanhkiem`,`xeploai`) 
            VALUES (?, ?, NULL, ?, NULL, NULL, NULL, 0, 'Tốt',NULL);";
            $results =  $db->exutedQuery($sql);
            $results->execute([null,$_POST['lop'],$id_hocsinh]);
        }
        function addhs($id_hocsinh){
            $db=new Connect();
            $sql ="insert into hocsinh (id_hocsinh,mshs,tenhs,namsinh,gioitinh,diachi,id_malop)
            values (?,?,?,?,?,?,?)";
            $results =  $db->exutedQuery($sql);
            $results->execute([$id_hocsinh,$_POST['maso'],$_POST['name'],$_POST['date'],$_POST['gioitinh']
            ,$_POST['diachi'],$_POST['lop']]);
            $results=$db->exutedQuery("Call Cursor_siso ()");
            $results->execute();
        }
         function checkmshs($mshs){
            $db= new Connect();
            $sql ="select * from hocsinh where mshs = '".$mshs."'";
            $results = $db->exutedQuery($sql);
            $results->execute();
            $row=$results->fetchAll();
            return count($row);
        }
        function checklop($lop,$id_hocsinh){
          
            $db= new Connect();
            $sql ="select * from ketqua where id_malop = ? and id_mshs=?";
            $results = $db->exutedQuery($sql);
            $results->execute([$lop,$id_hocsinh]);
            $row=$results->fetchAll();
            return count($row);
        }
        function Get_Hs($id){
            $db= new Connect();
            $getHs= "Select * from hocsinh where id_hocsinh= ".$id;
            $results = $db->exutedQuery($getHs);
            $results->execute();
            return $results;
        }
        function editHs($id){
            $db= new Connect();
            $editGv = "update hocsinh
            set mshs=?,tenhs=?,namsinh=?,gioitinh=?,diachi=?,id_malop=?
            where id_hocsinh=".$id;
            $editResult =$db->exutedQuery($editGv);
            $editResult->execute([$_POST['maso'],$_POST['name'],$_POST['date'],$_POST['gioitinh']
            ,$_POST['diachi'],$_POST['lop']]);
            $results=$db->exutedQuery("Call Cursor_siso ()");
            $results->execute();
        }
        function deleteHs($id){
            $db= new Connect();
            $deleteGv="delete from hocsinh where id_hocsinh=?";
            $deleteResult=$db->exutedQuery($deleteGv);
            $deleteResult->execute([$id]); 
            $results=$db->exutedQuery("Call Cursor_siso ()");
            $results->execute();
        }
        function getLop(){
            $db=new Connect();
            $sql= 'select lop.*,nam.nam,giaovien.tengv from lop,giaovien,nam where giaovien.id_giaovien=lop.id_msgv and lop.id_nam=nam.id_nam';
            $results = $db->exutedQuery($sql);
            $results->execute();
            return $results;
        }
       
     }
?>