<!DOCTYPE html>
<html lang="en">
<head>
<?php  include'link.php'; ?>
<link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper" style="height: 100vh;">
            <?php  include'siderbar.php'; ?>
            <div class="main-panel ">
            <div class="content-wrapper  bg-white">
                  <div class="row">
                    
                  <div class="container">
                 <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php  echo $r['tengv']; ?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mã số giáo viên</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php  echo $r['msgv'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Họ và tên</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php  echo $r['tengv'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Giới tính</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php  echo $r['gioitinh'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Năm sinh</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php  echo $r['namsinh'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Môn giảng dạy</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php  echo $r['tenmh'] ?>
                    </div>
                  </div>
                  <hr>        
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>  
                  </div>           
</div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            
                <!-- partial -->
              </div>
        </div>

    </div>
    
</body>
</html>