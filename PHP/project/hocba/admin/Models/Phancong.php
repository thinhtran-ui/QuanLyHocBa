<?php
    require_once'Connect.php';
    class PhancongModel{
        function __construct(){

        }
        function getPhancong(){
            $db= new Connect();
            $sql = 'select phancong.id_phancong,giaovien.tengv,lop.tenlop,monhoc.tenmh,hocki.tenhk,nam
            from phancong , giaovien,lop,monhoc,hocki,nam
            where phancong.id_hocki =hocki.id_hocki and giaovien.id_monhoc=monhoc.id_monhoc AND 								phancong.id_gv=giaovien.id_giaovien and 																phancong.id_lop=lop.id_lop and lop.id_nam=nam.id_nam
           ' ;
            $results= $db->exutedQuery($sql);
            $results->execute();
            return $results;     
        }
        function addPhancong(){
            $db= new Connect();
            $insert= 'insert into phancong(id_phancong,id_gv,id_lop,id_hocki)
                      values(?,?,?,?)';
            $results =  $db->exutedQuery($insert);
            $results->execute([null,$_POST['id_giaovien'],$_POST['id_lop'],$_POST['id_hocki']]);
            $update ='update phancong set id_monhoc=(SELECT giaovien.id_monhoc from giaovien where giaovien.id_giaovien=?)
                    where id_gv=?';
            $resultsupdate=$db->exutedQuery($update);
            $resultsupdate->execute([$_POST['id_giaovien'],$_POST['id_giaovien']]);
            
        }
        function getGv(){
            $sql = 'select * from giaovien';
            $db= new Connect();
            $results= $db->exutedQuery($sql);
            $results->execute();
            return $results;     
        }
        function getLop(){
            $sql = 'select lop.id_nam, id_lop,tenlop,nam.nam from lop, nam where lop.id_nam=nam.id_nam';
            $db= new Connect();
            $results= $db->exutedQuery($sql);
            $results->execute();
            return $results;     
        }
        function getHk($id_nam){
            $sql ='select id_hocki,tenhk,nam.nam from hocki,nam  where hocki.id_nam = nam.id_nam and hocki.id_nam=?';
            $db= new Connect();
            $results= $db->exutedQuery($sql);
            $results->execute([$id_nam]);
            return $results;     
        }
    }

?>