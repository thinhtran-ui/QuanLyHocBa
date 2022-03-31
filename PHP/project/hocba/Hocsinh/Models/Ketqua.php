<?php
    require_once'Connect.php';

    class KetquaModels{
        function getKetqua($id){
         
                $sql= 'select ketqua.*,hocsinh.tenhs,nam.nam,giaovien.tengv,lop.tenlop
                       from ketqua,hocsinh,nam,giaovien,lop
                       where id_mshs = ? and ketqua.id_mshs = hocsinh.id_hocsinh and
                       ketqua.id_malop = lop.id_lop and giaovien.id_giaovien = lop.id_msgv
                       and lop.id_nam = nam.id_nam
                       ORDER BY id_malop
                ';
                $db = new Connect();
                $result=$db->exutedQuery($sql);
                $result->execute([$id]);
                return $result;
            
        }
 
}
?>