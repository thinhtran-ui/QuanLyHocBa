<?php
     require_once'Connect.php';
     class DiemModels{
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
         function getHs($id,$id_gv){
             $sql='select hocsinh.id_hocsinh,hocsinh.id_malop,mshs,tenhs,tenlop,tenmh ,monhoc.id_monhoc,giaovien.id_giaovien
             from hocsinh,lop,monhoc,giaovien
             where hocsinh.id_malop =lop.id_lop and id_malop=? 
             and giaovien.id_monhoc=monhoc.id_monhoc
             and giaovien.id_giaovien=?';
             $db = new Connect();
             $result=$db->exutedQuery($sql);
             $result->execute([$id,$id_gv]);
             return $result;
         }
         function addDiem($id_mshs,$id_msmh,$id_lop,$id_giaovien,$id_hocki){
            $db = new Connect();
            $bangdiem = 'insert into bangdiem(id_bangdiem,id_mshs,id_msmh,id_lop,id_msgv,id_mshk) values(?,?,?,?,?,?)';
            $addbangdiem=$db->exutedQuery($bangdiem);
            $addbangdiem->execute([null,$id_mshs,$id_msmh,$id_lop,$id_giaovien,$id_hocki]);
         }
         function checkDiem($idhs,$idmh,$idgv,$idhk){
            $db = new Connect();
            $sql='select * from bangdiem where id_mshs=? and id_msmh=?and id_msgv=? and id_mshk=?';
            $result=$db->exutedQuery($sql);
            $result->execute([$idhs,$idmh,$idgv,$idhk]);
            return $result->fetch();
         }
         function getDiem($idhs,$idmh,$idgv,$idhk){
          
             $sql='select hocki.tenhk,nam.nam, tenhs,lop.tenlop,monhoc.tenmh,giaovien.tengv,bangdiem.Diemtk1,bangdiem.Diemtk2,bangdiem.Diem15plan1,bangdiem.id_mshk,
             bangdiem.Diem15plan2,bangdiem.Diemgk,bangdiem.Diemck,bangdiem.Diemck,bangdiem.id_bangdiem
             from bangdiem,hocsinh,lop,monhoc,giaovien,hocki,nam
             where          
                          hocki.id_hocki=bangdiem.id_mshk and
                          nam.id_nam=hocki.id_nam and
                          bangdiem.id_mshs =hocsinh.id_hocsinh and
                          hocsinh.id_malop =lop.id_lop and
                          bangdiem.id_msmh=monhoc.id_monhoc and
                          bangdiem.id_msgv=giaovien.id_giaovien and
                          bangdiem.id_mshs=? and bangdiem.id_msmh=? and 
                          bangdiem.id_msgv=? and bangdiem.id_mshk=?';
             $db = new Connect();
             $result=$db->exutedQuery($sql);
             $result->execute([$idhs,$idmh,$idgv,$idhk]);
             return $result->fetch();
         }
         function getListdiem($id_lop,$id_gv,$id_hocki){
             $sql='select bangdiem.id_mshs,bangdiem.id_msmh,bangdiem.id_msgv,bangdiem.id_bangdiem, bangdiem.id_lop, hocsinh.tenhs,lop.tenlop,monhoc.tenmh,giaovien.tengv,hocki.tenhk,
                    Diemtk1,Diemtk2,Diem15plan1,Diem15plan2,Diemgk,Diemck,Diemtb,capnhat
                    from bangdiem,hocsinh,lop,monhoc,giaovien,hocki
                    where 
                   bangdiem.id_mshs=hocsinh.id_hocsinh AND
                   bangdiem.id_lop=lop.id_lop AND
                   bangdiem.id_msmh=monhoc.id_monhoc AND
                   bangdiem.id_msgv = giaovien.id_giaovien AND
                   bangdiem.id_mshk =hocki.id_hocki AND
                   bangdiem.id_lop =? and bangdiem.id_msgv = ? and bangdiem.id_mshk=?';
                   $db = new Connect();
                   $result=$db->exutedQuery($sql);
                   $result->execute([$id_lop,$id_gv,$id_hocki]);
                   return $result ;
         }
         function updateDiem(){
             $sql =" update bangdiem
                     set Diemtk1=?,Diemtk2=?,Diem15plan1=?,Diem15plan2=?,Diemgk=?,Diemck=?
                     where id_mshs=? and id_msmh=? and id_msgv=? and id_mshk=? ";
            $db = new Connect();
           return $result=$db->exutedQuery($sql);
           
         }
         function updateDiemtb(){
            $sql ="call Diemtb(?,?,?,?)";
            $db = new Connect();
          return $result=$db->exutedQuery($sql);
          
        }
        function getDiemhs($id_bangdiem){
          
            $sql='select bangdiem.id_bangdiem,tenhs,lop.tenlop,monhoc.tenmh,giaovien.tengv,bangdiem.Diemtk1,bangdiem.Diemtk2,bangdiem.Diem15plan1,bangdiem.id_mshk,
            bangdiem.Diem15plan2,bangdiem.Diemgk,bangdiem.Diemck,tenhk,nam
            from bangdiem,hocsinh,lop,monhoc,giaovien,hocki,nam
            where       
                         hocki.id_hocki=bangdiem.id_mshk and
                         nam.id_nam=hocki.id_nam and
                         bangdiem.id_mshs =hocsinh.id_hocsinh and
                         hocsinh.id_malop =lop.id_lop and
                         bangdiem.id_msmh=monhoc.id_monhoc and
                         bangdiem.id_msgv=giaovien.id_giaovien and
                         bangdiem.id_bangdiem=?';
            $db = new Connect();
            $result=$db->exutedQuery($sql);
            $result->execute([$id_bangdiem]);
            return $result->fetch();
        }
        function Updatebangdiem(){
            $sql =" update bangdiem
            set Diemtk1=?,Diemtk2=?,Diem15plan1=?,Diem15plan2=?,Diemgk=?,Diemck=?,capnhat=?
            where id_bangdiem=? ";
            $db = new Connect();
            $result=$db->exutedQuery($sql);
            return $result;
        }
        function history($id_bangdiem){
            $sql ='insert into history(id,id_bangdiem,ngaycapnhat) values(?,?,?)';
            $db = new Connect();
            $result=$db->exutedQuery($sql);
            $result->execute([null,$id_bangdiem,date("Y/m/d")]);
        }
        function getHistory($id_bangdiem){
            $sql='select * from history where id_bangdiem=? ';
            $db = new Connect();
            $result=$db->exutedQuery($sql);
            $result->execute([$id_bangdiem]);
            $r= $result->fetchAll();
            return $r;
        }
        function getHk($id_lop){
        
            $sql='select id_hocki,tenhk,nam.nam from lop, hocki,nam where lop.id_nam=nam.id_nam and
                  hocki.id_nam=nam.id_nam and lop.id_lop = ?';
             $db = new Connect(); 
            $result=$db->exutedQuery($sql);
             $result->execute([$id_lop]);
             return $result;
        }
        function updateKQDTB($id_mshs,$id_lop,$tenhk='H???c k?? 1',$id_hocki){
            $r = $this->getTenhk($id_hocki)->fetch();
            $setCol ='diemhk1';
         
            if($r['tenhk']=='H???c k?? 2'){
                $tenhk= 'H???c k?? 2';
                $setCol ='diemhk2';
            }
            $db = new Connect(); 
            $sql= " update ketqua 
                    set ".$setCol." = round ( (
            SELECT   if((To??n!=0 and V??n != 0 and L??!=0 and H??a !=0 and Sinh!=0 ),(To??n+V??n+L??+H??a+Sinh)/5,0) as '??i???m trung b??nh'  
            from (select (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =? 
           and tenmh='To??n' and tenhk = ? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'To??n',
           (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =?
           and tenmh='V??n' and tenhk = ? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'V??n',
           (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =? 
           and tenmh='L??' and tenhk =? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'L??',
           (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =?
           and tenmh='H??a' and tenhk = ? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'H??a', 
            (select diemtb from bangdiem,monhoc,hocki WHERE bangdiem.id_mshs= ? and bangdiem.id_lop =? 
           and tenmh='Sinh' and tenhk =? and bangdiem.id_mshk =hocki.id_hocki and bangdiem.id_msmh=monhoc.id_monhoc  ) as'Sinh')diem) ,1 ) ,
                        diemcanam = round((diemhk1+diemhk2)/2,1),
                        xeploai =  CASE
            
                        WHEN  ketqua.diemcanam < 6.5 or ketqua.hanhkiem='Y???u' then 'Trung b??nh'
                        when(ketqua.diemcanam>=6.5 and ketqua.diemcanam<8) and ketqua.hanhkiem!='Y???u' then 'Ti??n ti???n' 
                        when ketqua.diemcanam >=8  and ketqua.hanhkiem ='T???t' then 'Gi???i'
                        when ketqua.diemcanam >=8  and ketqua.hanhkiem ='Kh??' then 'Kh??'
                        else Null
                        end 
                    where id_malop=".$id_lop." and  id_mshs=".$id_mshs." ";
            $result=$db->exutedQuery($sql);
            $result->execute([$id_mshs,$id_lop,$tenhk,$id_mshs,$id_lop,$tenhk,$id_mshs,$id_lop,$tenhk,$id_mshs,$id_lop,$tenhk,$id_mshs,$id_lop,$tenhk]);
 
        }
        function getTenhk($id_hocki){
            $db = new Connect(); 
            $sql="select tenhk from hocki where id_hocki = ".$id_hocki."";
            $result=$db->exutedQuery($sql);
            $result->execute();
            return $result;
        } 
     }
?>
