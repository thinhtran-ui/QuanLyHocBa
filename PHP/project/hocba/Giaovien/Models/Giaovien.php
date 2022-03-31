<?php
    require_once'Connect.php';

    class GiaovienModel{
        function getGv($id){
            $db=new Connect();
            $sql="SELect giaovien.msgv,giaovien.tengv,Date_format(namsinh,'%d/%m/%Y') as 'namsinh',giaovien.gioitinh,giaovien.diachi,monhoc.tenmh,giaovien.id_monhoc,lop.tenlop
            from giaovien LEFT JOIN lop on giaovien.id_giaovien=lop.id_msgv LEFT JOIN monhoc on giaovien.id_monhoc = monhoc.id_monhoc
            where giaovien.id_giaovien = ?";
            $results = $db->exutedQuery($sql);
            $results->execute([$id]);
            $r= $results->fetch();
            return $r; 
   }
}
?>