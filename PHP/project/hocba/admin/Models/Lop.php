<?php
     require_once'Connect.php';
     class LopModel{
        function __construct(){

        }
        function getLop(){
            $db= new Connect();
            $sql = "select lop.id_lop,nam.nam,lop.malop,lop.tenlop,giaovien.tengv,siso,lop.id_nam
            from lop left join giaovien on lop.id_msgv=giaovien.id_giaovien left join
            nam on lop.id_nam=nam.id_nam
            order by tenlop ";
            $results= $db->exutedQuery($sql);
            $results->execute();
            return $results;     
        }
        function checkmslop($mslop){
            $db= new Connect();
            $sql ="select * from lop where malop = '".$mslop."' ";
            $results = $db->exutedQuery($sql);
            $results->execute();
            $row=$results->fetchAll();
            return count($row);
        }
        function checkgv($idgv){
            $db= new Connect();
            $sql ="select * from lop where id_msgv = ".$idgv;
            $results = $db->exutedQuery($sql);
            $results->execute();
            $row=$results->fetchAll();
            return count($row);
        }
        function checkgv_tontai($idgv){
            $db= new Connect();
            $sql ="select * from giaovien where id_giaovien = ".$idgv;
            $results = $db->exutedQuery($sql);
            $results->execute();
            $row=$results->fetchAll();
            return count($row);
        }
        function addLop(){
            $db=new Connect();
            $sql ="insert into lop (id_lop,malop,tenlop,id_msgv,id_nam)
            values (?,?,?,?,?)";
            $results =  $db->exutedQuery($sql);
            $results->execute([null,$_POST['maso'],$_POST['name'],$_POST['id'],$_POST['nam']]);
        }
        function Get_Lop($id){
            $db= new Connect();
            $getLop= "Select * from lop where id_lop= ".$id;
            $results = $db->exutedQuery($getLop);
            $results->execute();
            return $results;
        }
        function editLop($id){
            $db= new Connect();
            $editLop = "update Lop
            set malop=?,tenlop=?,id_msgv=?
            where id_lop=".$id;
            $editResult =$db->exutedQuery($editLop);
            $editResult->execute([$_POST['maso'],$_POST['name'],$_POST['id']]);
        }
        function deleteLop($id){
            $db= new Connect();
            $deletelop="delete from lop where id_lop=?";
            $deleteResult=$db->exutedQuery($deletelop);
            $deleteResult->execute([$id]); 
        }
        function getNam(){
            $db=new Connect();
            $sql= 'select id_nam,nam.nam from nam ';
            $results = $db->exutedQuery($sql);
            $results->execute();
            return $results;
        }
        function getGvadd(){
            $db=new Connect();
            $sql= 'select * from giaovien where id_giaovien not in (select id_msgv from lop )';
            $results = $db->exutedQuery($sql);
            $results->execute();
            return $results;
        }
        function getGvaddnam($id_nam){
            $db=new Connect();
            $sql= 'select * from giaovien where id_giaovien not in (select id_msgv from lop where  id_nam = ? )';
            $results = $db->exutedQuery($sql);
            $results->execute([$id_nam]);
            return $results;
        }

        function getGv($id_gv,$id_nam){
            $db=new Connect();
            $sql= 'select * from giaovien where id_giaovien not in (select id_msgv from lop where id_lop != ? and id_nam = ?)';
            $results = $db->exutedQuery($sql);
            $results->execute([$id_gv,$id_nam]);
            return $results;
        }
     }
?>