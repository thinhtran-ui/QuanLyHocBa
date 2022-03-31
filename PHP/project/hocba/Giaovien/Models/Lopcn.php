<?php
    require_once'Connect.php';
    class LopcnModels {
        function getLopcn($id_giaovien){
            $db= new connect();
            $sql = 'select lop.*,nam from lop,nam where id_msgv = ? and lop.id_nam=nam.id_nam';
            $result=$db->exutedQuery($sql);
            $result->execute([$id_giaovien]);
            return $result;
        }
        function getHs($id_lop){
            $db = new connect();
            $sql='select hocsinh.*  from hocsinh  where id_malop=?';
            $result=$db->exutedQuery($sql);
            $result->execute([$id_lop]);
            return $result;
        }
        function getDiem($id_mshs,$id_lop,$tenhk='Học kì 1'){
            $db = new connect();
            $sql="  
                    SELECT *,  if((Toán!=0 and Văn != 0 and Lý!=0 and Hóa !=0 and Sinh!=0 ),(Toán+Văn+Lý+Hóa+Sinh)/5,0) as 'Điểm trung bình'  
                    from (select (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =? 
                   and tenmh='Toán' and tenhk = ? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'Toán',
                   (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =?
                   and tenmh='Văn' and tenhk = ? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'Văn',
                   (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =? 
                   and tenmh='Lý' and tenhk =? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'Lý',
                   (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =?
                   and tenmh='Hóa' and tenhk = ? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'Hóa', 
                    (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =? 
                   and tenmh='Sinh' and tenhk =? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'Sinh')diem";
                   $result=$db->exutedQuery($sql);
                    $result->execute([$id_mshs,$id_lop,$tenhk,$id_mshs,$id_lop,$tenhk,$id_mshs,$id_lop,$tenhk,$id_mshs,$id_lop,$tenhk,$id_mshs,$id_lop,$tenhk]);
                   return $result->fetch();
        }
        function getHk($id_lop){
            $db = new connect();
            $sql = "select hocki.*,nam.* from hocki,nam,lop where hocki.id_nam=nam.id_nam and nam.id_nam=lop.id_nam and lop.id_lop=?";
            $result=$db->exutedQuery($sql);
            $result->execute([$id_lop]);
            return $result;
        }
        function getKetqua($id_lop,$id_mshs){
      
            $db = new connect();
            $sql="sELECT hocsinh.tenhs,lop.tenlop,giaovien.tengv,nam.nam ,ketqua.*
                        from hocsinh,lop,ketqua,giaovien,nam
            where hocsinh.id_hocsinh = ketqua.id_mshs and lop.id_lop=ketqua.id_malop and giaovien.id_giaovien =lop.id_msgv and lop.id_nam =nam.id_nam and lop.id_lop = ? and ketqua.id_mshs = ?";
            $result=$db->exutedQuery($sql);
            $result->execute([$id_lop,$id_mshs]);
            return $result->fetch();
        }

    }
?>