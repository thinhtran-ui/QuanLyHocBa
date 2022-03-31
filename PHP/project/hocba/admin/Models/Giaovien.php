<?php
    require_once'Connect.php';
    class GiaovienModel{
        function __construct(){

        }
        function countgv(){
            $sql ="select * from giaovien";    
            $db= new Connect();
            $results = $db->exutedQuery($sql);
            $results->execute();
            $r=$results->fetchAll();
            return $r;
        }
        function getGv(){
            $sql ="Select giaovien.id_giaovien, giaovien.msgv,tengv,Date_format(namsinh,'%d/%m/%Y') as 'namsinh',gioitinh,diachi,tenmh,tenlop 
            from giaovien LEFT JOIN lop on giaovien.id_giaovien=lop.id_msgv,monhoc
            where  giaovien.id_monhoc=monhoc.id_monhoc
                    ";
            $db= new Connect();
            $results = $db->exutedQuery($sql);
            $results->execute();
            return $results;
        }
        function addGv(){
                $db=new Connect();
                $sql ="insert into giaovien (id_giaovien,msgv,tengv,namsinh,gioitinh,diachi,id_monhoc)
                values (?,?,?,?,?,?,?)";
                $results =  $db->exutedQuery($sql);
                $results->execute([null,$_POST['maso'],$_POST['name'],$_POST['date'],$_POST['gioitinh']
                ,$_POST['diachi'],$_POST['monhoc']]);
        }
        function checkmsgv($msgv){
            $db= new Connect();
            $sql ="select * from giaovien where msgv = '".$msgv."'";
            $results = $db->exutedQuery($sql);
            $results->execute();
            $row=$results->fetchAll();
            return count($row);  
        }
        function checkmsmh($msmh){
            $db= new Connect();
            $sql ="select * from monhoc where id_monhoc = ".$msmh;
            $results = $db->exutedQuery($sql);
            $results->execute();
            $row=$results->fetchAll();
            return count($row); 
        }
        function Get_Gv($id){
            $db= new Connect();
            $getGv= "Select * from giaovien where id_giaovien= ".$id;
            $results = $db->exutedQuery($getGv);
            $results->execute();
            return $results;
        }
        function editGv($id){
            $db= new Connect();
            $editGv = "update giaovien 
            set msgv=?,tengv=?,namsinh=?,gioitinh=?,diachi=?,id_monhoc=?
            where id_giaovien=".$id;
            $editResult =$db->exutedQuery($editGv);
            $editResult->execute([$_POST['maso'],$_POST['name'],$_POST['date'],$_POST['gioitinh']
            ,$_POST['diachi'],$_POST['monhoc']]);
        }
        function deleteGv($id){
          
            $db= new Connect();
            $deleteGv="delete from giaovien where id_giaovien=?";
            $deleteResult=$db->exutedQuery($deleteGv);
            $deleteResult->execute([$id]);
        
        }
        function getMonhoc(){
            $db=new Connect();
            $sql= 'select * from monhoc ';
            $results = $db->exutedQuery($sql);
            $results->execute();
            return $results;
        }
        
    }

?>