<?php
    require_once'Connect.php';

    class DiemModels{
        function getLop($id){
         
                $sql= 'select lop.*,hocsinh.*,nam.nam,giaovien.*
                       from  lop,giaovien,nam,ketqua,hocsinh
                       where ketqua.id_malop = lop.id_lop and ketqua.id_mshs=hocsinh.id_hocsinh and 
                       lop.id_nam = nam.id_nam 
                       and ketqua.id_mshs=? and lop.id_msgv = giaovien.id_giaovien
                ';
                $db = new Connect();
                $result=$db->exutedQuery($sql);
                $result->execute([$id]);
                return $result;
            
        }
        function getDiemhk1($id_hocsinh,$id_lop){
        
                $sql = " select bangdiem.*,monhoc.tenmh ,lop.tenlop,giaovien.tengv 
                        from bangdiem,monhoc,lop,giaovien,hocki,hocsinh
                        where bangdiem.id_mshs = hocsinh.id_hocsinh and bangdiem.id_msmh = monhoc.id_monhoc
                        and bangdiem.id_lop = lop.id_lop and giaovien.id_giaovien= bangdiem.id_msgv and 
                        hocki.tenhk= 'Học kì 1' and hocki.id_hocki = bangdiem.id_mshk
                        and bangdiem.id_mshs = ? and bangdiem.id_lop=? ";
                        $db = new Connect();
                        $result=$db->exutedQuery($sql);
                        $result->execute([$id_hocsinh,$id_lop]);
                        return $result;
        }
        function getDiemhk2($id_hocsinh,$id_lop){
        
            $sql = " select bangdiem.*,monhoc.tenmh ,lop.tenlop,giaovien.tengv 
                    from bangdiem,monhoc,lop,giaovien,hocki,hocsinh
                    where bangdiem.id_mshs = hocsinh.id_hocsinh and bangdiem.id_msmh = monhoc.id_monhoc
                    and bangdiem.id_lop = lop.id_lop and giaovien.id_giaovien= bangdiem.id_msgv and 
                    hocki.tenhk= 'Học kì 2' and hocki.id_hocki = bangdiem.id_mshk
                    and bangdiem.id_mshs = ? and bangdiem.id_lop=? ";
                    $db = new Connect();
                    $result=$db->exutedQuery($sql);
                    $result->execute([$id_hocsinh,$id_lop]);
                    return $result;
    }
}
?>