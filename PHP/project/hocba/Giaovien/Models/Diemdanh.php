<?php
         require_once'Connect.php';
         class DiemdanhModels{
             function Getlop($id){
                 $sql= 'select phancong.id_lop,lop.tenlop,lop.siso,phancong.id_hocki,hocki.tenhk,nam.nam,
                 CASE phancong.id_gv  
                 WHEN (SELECT lop.id_msgv from lop where phancong.id_lop=lop.id_lop  ) THEN "Co"
                 ELSE "Khong"
                 END AS lopchunhiem 
                 from phancong,lop,giaovien,hocki,nam
                 where phancong.id_lop=lop.id_lop and phancong.id_gv = giaovien.id_giaovien 
                 and phancong.id_gv=? and hocki.id_hocki=phancong.id_hocki and hocki.id_nam=nam.id_nam
                 order by tenlop
                 ';
                 $db = new Connect();
                 $result=$db->exutedQuery($sql);
                 $result->execute([$id]);
                 return $result;
             }
             function geths($id_lop){
               
                 $sql= '
                 select hocsinh.*,lop.tenlop,giaovien.tengv,monhoc.tenmh
                 FROM hocsinh,lop,giaovien,monhoc
                 WHERE lop.id_msgv = giaovien.id_giaovien and giaovien.id_monhoc = monhoc.id_monhoc AND
                 hocsinh.id_malop = lop.id_lop and
                 hocsinh.id_malop = ?
                 ';
                 $db = new Connect();
                 $result=$db->exutedQuery($sql);
                 $result->execute([$id_lop]);
                 return $result;
             }
             function updateNgaynghi($id_hocsinh,$id_lop){ 
                $db = new Connect();
                    $sql ="update ketqua 
                         set songaynghi = songaynghi+1,
                         hanhkiem = case 
                         when songaynghi <=10 then 'Tốt'
                        when songaynghi >10 and songaynghi <=15 then 'Khá'
                           ELSE 'Yếu'
                        end,
                        xeploai =  CASE
                        WHEN  ketqua.diemcanam < 6.5 or ketqua.hanhkiem='Yếu' then 'Trung bình'
                        when(ketqua.diemcanam>=6.5 and ketqua.diemcanam<8) and ketqua.hanhkiem!='Yếu' then 'Tiên tiến' 
                        when ketqua.diemcanam >=8  and ketqua.hanhkiem ='Tốt' then 'Giỏi'
                        when ketqua.diemcanam >=8  and ketqua.hanhkiem ='Khá' then 'Khá'
                        else Null
                        end 
                              
                    where id_mshs=? and id_malop=? ";
                $result=$db->exutedQuery($sql);
                $result->execute([$id_hocsinh,$id_lop]);
             }
    }
?>