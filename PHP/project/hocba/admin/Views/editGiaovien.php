<!DOCTYPE html>
<html lang="en">

<?php  include'link.php'; ?>

<body>
    <div class="container-scroller">
        <?php include 'menu.php'; ?>
        <div class="main-panel">
            <div class="row ">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Giáo viên</h4>
                            <main class="my-form">
                                <div class="cotainer">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">Cập nhật Giáo viên</div>
                                                <div class="card-body">
                                                    <form name="my-form" onsubmit="return validform()" action="" method="Post">
                                                        <div class="form-group row">
                                                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Mã số giáo viên</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" value="<?php echo $row['msgv']; ?>" name="maso"> <br>
                                                                <span class="text-danger"> <?php echo $maso; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Họ và tên</label>
                                                            <div class="col-md-6">
                                                                <input type="text" value="<?php echo $row['tengv'];?>" class="form-control" name="name">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $name; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="user_name" class="col-md-4 col-form-label text-md-right">Năm sinh</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="user_name" value="<?php echo $row['namsinh'];?>"  class="form-control" name="date">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $date; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Giới Tính</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="phone_number" value="<?php echo $row['gioitinh'];?>"    name="gioitinh" class="form-control">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $gioitinh; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="present_address" class="col-md-4 col-form-label text-md-right">Địa chỉ</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="present_address" value="<?php echo $row['diachi'];?>  " name="diachi" class="form-control">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $diachi; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Môn giảng dạy</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="monhoc" id="">
                                                                <?php
                                                                    while($r=$getMonhoc->fetch()):
                                                                ?>
                                                                   <option <?php if($row['id_monhoc']==$r['id_monhoc']) echo 'selected'; ?> value="<?php echo $r['id_monhoc'];?>"> <?php echo $r['tenmh'] ?></option> 
                                                                
                                                                <?php
                                                                    endwhile;
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" name="submit"class="btn btn-primary">
                                                                Cập nhật
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