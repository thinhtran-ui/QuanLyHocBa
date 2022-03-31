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
                                                <div class="card-header">Cập nhật Lớp</div>
                                                <div class="card-body">
                                                    <form name="my-form" onsubmit="return validform()" action="" method="Post">
                                                        <div class="form-group row">
                                                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Mã số lớp học</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" value="<?php echo $row['malop'];  ?>" name="maso"> <br>
                                                                <span class="text-danger"> <?php echo $maso; ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Tên lớp học</label>
                                                            <div class="col-md-6">
                                                                <input type="text"  value="<?php echo $row['tenlop'];  ?>" class="form-control" name="name">
                                                                <br>
                                                                <span class="text-danger"> <?php echo $name; ?> </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Giáo viên chủ nhiệm</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="id" id="">
                                                                <?php
                                                                    while($r=$getGv->fetch()):
                                                                ?>
                                                                   <option <?php if($row['id_msgv']==$r['id_giaovien']) echo 'selected'; ?> value="<?php echo $r['id_giaovien'];?>"> <?php echo $r['tengv'] ?></option> 
                                                                
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