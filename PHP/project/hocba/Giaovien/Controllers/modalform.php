

         <form name="my-form" onsubmit="return validform()" action="" method="Post">
            <input type="hidden" class="form-control"  name="'.$_POST['id_hocsinh'].'" id="id_hocsinh" value="" require>
            <input type="hidden" class="form-control" name="'.$_POST['id_monhoc'].'" id="id_monhoc" require>
            <input type="hidden" class="form-control"  name="'.$_POST['id_giaovien'].'" id="id_giaovien" value="10" require>
        
            <div class="form-group row">
                <label for="full_name" class="col-md-4 col-form-label text-md-right">Điểm thường kì 1</label>
                <div class="col-md-6" id="diemtk1">
                    <input type="number" id="diemtk1"  value="10"  class="form-control" min="0" max="10" name="diemtk1" require> <br>
            
                </div>
            </div>
        
            <div class="form-group row">
                <label for="email_address" class="col-md-4 col-form-label text-md-right">Điểm thường kì 2</label>
                <div class="col-md-6">
                    <input type="number" value="<?php echo $diemtk2; ?>"  id="diemtk2" class="form-control"  min="0" max="10"  name="diemtk2">
                    <br>
               
                </div>
            </div>
        
            <div class="form-group row">
                <label for="user_name" class="col-md-4 col-form-label text-md-right">Điểm 15 phút lần 1</label>
                <div class="col-md-6">
                    <input type="number" id="diem15p1" class="form-control"  min="0" max="10"  name="diem15p1">
                    <br>
                 
                </div>
            </div>
        
            <div class="form-group row">
                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Điểm 15 phút lần 2</label>
                <div class="col-md-6">
                    <input type="number" id="diem15p2"  min="0" max="10"  name="diem15p2" class="form-control">
                    <br>
               
                </div>
            </div>
        
            <div class="form-group row">
                <label for="present_address" class="col-md-4 col-form-label text-md-right">Điểm giữa kì</label>
                <div class="col-md-6 diemtk1">
                    <input type="number" id="present_address"  min="0" max="10"  name="diemgk" class="form-control">
                    <br>
             
                </div>
            </div>
        
            <div class="form-group row">
                <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Điểm cuối kì</label>
                <div class="col-md-6">
                    <input type="text" id="permanent_address" class="form-control"  min="0" max="10"  name="diemck">
                    <br>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="permanent_address" class="col-md-4 col-form-label text-md-right">ID học kì</label>
                <div class="col-md-6">
                    <input type="number" id="hocki" class="form-control"  min="0" max="10"  name="hocki">
                    <br>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-6 offset-md-4">
            <button type="submit" name="submit" id="click"  class="btn btn-primary  ">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>';
           
