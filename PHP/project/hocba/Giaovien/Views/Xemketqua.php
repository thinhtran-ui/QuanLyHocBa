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
                            
                            <h4 class="card-title"> Kết quả học tập  </h4>
                            <table class="table table table-striped" >
                                <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> Họ và tên </th>
                                        <th  style="font-weight: bold;"> lớp </th>
                                        <th style="font-weight: bold;">   Giáo viên </th>
                                        <th style="font-weight: bold;">  Năm học </th>
                                        <th style="font-weight: bold;"> Điểm trung bình học kì 1 </th>
                                        <th style="font-weight: bold;"> Điểm trung bình học kì 2 </th>
                                        <th style="font-weight: bold;"> Điểm trung bình cả năm </th>
                                        <th style="font-weight: bold;"> Số ngày nghĩ </th>
                                        <th style="font-weight: bold;"> Hạnh kiểm  </th>
                                        <th style="font-weight: bold;"> Xếp loại học sinh</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                    <tr class="text-center">
                                        <td> <?php echo $row['tenhs'] ;?> </td>
                                        <td> <?php echo $row['tenlop'] ;?> </td>
                                        <td>  <?php echo $row['tengv'] ;?> </td>
                                        <td>   <?php echo $row['nam'] ;?> </td>
                                        <td>   <?php echo $row['diemhk1'] ;?> </td>
                                        <td>   <?php echo $row['diemhk2'] ;?> </td>
                                        <td>   <?php echo $row['diemcanam'] ;?> </td>
                                        <td>   <?php echo $row['songaynghi'] ;?> </td>
                                        <td>   <?php echo $row['hanhkiem'] ;?> </td>
                                        <td>   <?php echo $row['xeploai'] ;?> </td>
                                      
                                    </tr>
                                
                                 
            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   
        </div> 
    </div>
  
 
</body>
</html>

