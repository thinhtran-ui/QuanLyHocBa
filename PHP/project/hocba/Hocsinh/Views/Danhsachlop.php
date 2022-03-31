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
                    <?php      
                     while($row = $r->fetch()):
                    ?>
                     <div class="col-md-4 stretch-card grid-margin">
                      <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                          <h3 class="font-weight-bold mb-3">
                            Lớp :
                            <?php
                              echo $row['tenlop'];
                             ?>
                             <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                          </h3>
                    
                          <h4 class="font-weight-normal mb-3"> GVCN : <?php echo $row['tengv']; ?><i class="mdi mdi-chart-line mdi-24px float-right"></i>
                          <h4 class="font-weight-normal mb-3"><?php  echo 'Năm học: '. $row['nam']; ?><i class="mdi mdi-chart-line mdi-24px float-right"></i> </h4>
                          </h4>
                          <h2 class="mb-5"> </h2>
                          <h6 class="card-text"><a href="Diem/Xemdiem/<?php echo $row['id_hocsinh']; ?>/<?php echo $row['id_lop']; ?>" class="text-light">Chi tiết</a></h6>
                        </div>
                      </div>
                    </div>
                    <?php
                     endwhile;
                     ?>
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