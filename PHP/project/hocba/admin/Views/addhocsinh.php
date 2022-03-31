<!DOCTYPE html>
<html lang="en">
<?php  include'link.php'; ?>
<body>
    <div class="container-scroller">
        <?php include 'menu.php';?>
        <div class="main-panel">
            <div class="row ">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Học sinh</h4>
                            <main class="my-form">
                                <div class="cotainer">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">Thêm học sinh</div>
                                                <div class="card-body">
                                                    <form name="my-form" onsubmit="return validform()" action="" method="Post">
                                                        <div class="form-group row">
                                                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Mã số học sinh</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="maso"> <br>
                                                                <span class="text-danger"> <?php echo $maso; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Họ và tên</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="name">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $name; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="user_name" class="col-md-4 col-form-label text-md-right">Năm sinh</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="user_name" class="form-control" name="date">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $date; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Giới Tính</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="phone_number" name="gioitinh" class="form-control">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $gioitinh; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="present_address" class="col-md-4 col-form-label text-md-right">Địa chỉ</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="present_address" name="diachi" class="form-control">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $diachi; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Lớp</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="lop" id="">
                                                        
                                                                <?php
                                                                    while($r=$getLop->fetch()):
                                                                ?>
                                                                   <option  value="<?php echo $r['id_lop'];?>"> <?php echo $r['tenlop']."(".$r['nam'].")-".$r['tengv']."" ?></option> 
                                                                
                                                                <?php
                                                                    endwhile;
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" name="submit"class="btn btn-primary">
                                                                Thêm
                                                            </button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>