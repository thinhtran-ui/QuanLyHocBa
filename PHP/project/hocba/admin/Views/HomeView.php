<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <title>Document</title>
<style>
  <?php include'./public/style.css'; ?>
</style>
</head>
<body>
    <div class="container-scroller">
    <?php  include'header.php'; ?>
        <div class="container-fluid page-body-wrapper" style="height: 100vh;">
            <?php  include'siderbar.php'; ?>
            <div class="main-panel">
            <div class="content-wrapper">
                  <div class="row">
                    <div class="col-md-4 stretch-card grid-margin">
                      <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                          <h4 class="font-weight-normal mb-3">Giáo viên<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                          </h4>
                          <h2 class="mb-5"> </h2>
                          <h6 class="card-text"><a href="" class="text-light">Chi tiết</a></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                      <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                          <h4 class="font-weight-normal mb-3">Học sinh <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                          </h4>
                          <h2 class="mb-5"></h2>
                          <h6 class="card-text"><a href="" class="text-light">Chi tiết</a></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                      <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                          <h4 class="font-weight-normal mb-3">Lớp <i class="mdi mdi-diamond mdi-24px float-right"></i>
                          </h4>
                          <h2 class="mb-5"></h2>
                          <h6 class="card-text"><a href="" class="text-light">Chi tiết</a></h6>
                        </div>
                      </div>
                    </div>
                  </div>           
</div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                  <div class="container-fluid clearfix">
                  
                </footer>
                <!-- partial -->
              </div>
        </div>

    </div>
    
</body>
</html>