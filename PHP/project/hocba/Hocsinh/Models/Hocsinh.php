<?php
    require_once'Connect.php';

    class HocsinhModel{
        function getHs($id){
            $db=new Connect();
            $sql="SELect hocsinh.mshs,hocsinh.tenhs,Date_format(namsinh,'%d/%m/%Y') as 'namsinh',hocsinh.gioitinh,hocsinh.diachi
            from  hocsinh
            where hocsinh.id_hocsinh = ?";
            $results = $db->exutedQuery($sql);
            $results->execute([$id]);
            $r= $results->fetch();
            return $r; 
   }
}
?>