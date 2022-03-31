<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include'link.php'; ?>
    <link rel="stylesheet" href="../public/style.css">  
</head>
<body>
<div class="container-scroller">
        <div class="container-fluid page-body-wrapper" >
            <?php  include'siderbar.php'; ?>
            <div class="main-panel ">
         
            <div class="content-wrapper  bg-white">
            <h4 class="mb-5 font-weight-bold">Danh sách lớp </h4>
                  <div class="row">
                    <?php      
                     while($row = $r->fetch()):
                    ?>
                     <div class="col-md-4 stretch-card grid-margin">
                      <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                          <h3 class="font-weight-bold mb-3">
                            <?php if($row['lopchunhiem']=='Co')
                                     echo "Lớp chủ nhiệm";
                                  else
                                      echo "";
                             ?>
                             <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                          </h3>
                          <h4 class="font-weight-normal mb-3"><?php echo $row['tenlop']; ?><i class="mdi mdi-chart-line mdi-24px float-right"></i> </h4>
                          <h4 class="font-weight-normal mb-3"> Sỉ số <?php echo $row['siso']; ?><i class="mdi mdi-chart-line mdi-24px float-right"></i>
                          <h4 class="font-weight-normal mb-3"><?php echo $row['tenhk']; ?><i class="mdi mdi-chart-line mdi-24px float-right"></i> </h4>
                          <h4 class="font-weight-normal mb-3"><?php  echo 'Năm học: '. $row['nam']; ?><i class="mdi mdi-chart-line mdi-24px float-right"></i> </h4>
                          </h4>
                          <h2 class="mb-5"> </h2>
                          <h6 class="card-text"><a href="<?php echo $_SESSION['action'];?>/<?php echo $row['id_lop'];?>/<?php echo $row['id_hocki']; ?>" class="text-light">Chi tiết</a></h6>
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