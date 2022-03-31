<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once'link.php'; ?>
  

</head>
<body>
    <div class="container-scroller">
            <?php  include'Menu.php'; ?>
        <div class="main-panel">
            <div class="row ">
                <div class="col-lg-12 grid-margin stretch-card">
            
                    <div class="card">
                        <div class="card-body">
                            
                            <h4 class="card-title"> Danh sách học sinh </h4>
                            <form action="" method="post">
                            <table class="table table table-striped" >
                                <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> Họ và tên </th>
                                        <th  style="font-weight: bold;"> lớp  </th>
                                        <th style="font-weight: bold;">Điểm danh</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                 

                                  
                                <?php      
                                while($row = $r->fetch()):
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['tenhs'] ;?> </td>
                                        <td> <?php echo $row['tenlop'] ;?> </td>
                                        <td>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="co" name="<?php echo $row['id_hocsinh'];  ?>" checked>Có
                                            </label>
                                            </div>
                                            <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="khong" name="<?php echo $row['id_hocsinh'];  ?>">Không
                                            </label>
                                        </div>
                                        </td>
                                     
                                    </tr>
                                
                                    <?php
                                    endwhile;
                                    ?>
                                
                                </tbody>
                            </table>
                            <div class="col-md-6 offset-md-5" >
                                <button type="submit" name="submit"class="btn btn-primary">
                                          Điểm danh
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        </div> 
    </div>
  
 
</body>
</html>

