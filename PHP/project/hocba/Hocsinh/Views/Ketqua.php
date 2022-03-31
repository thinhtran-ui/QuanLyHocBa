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
                            
                            <h4 class="card-title"> Kết quả </h4>
                            <?php      
                                while($row = $r->fetch()):
                            ?>
                            <h6> Học sinh : <?php echo $row['tenhs']; ?> </h6>
                            <h6> Lớp : <?php echo $row['tenlop']; ?> </h6>
                            <h6> Giáo viên chủ nhiệm : <?php echo $row['tengv']; ?> </h6>
                            <h6> Năm học : <?php echo $row['nam']; ?> </h6>
                            
                            <table class="table table table-striped" >
                                <thead>
                                    <tr class="text-center">
                                        <th style="font-weight: bold;"> Điểm trung bình học kì 1 </th>
                                        <th style="font-weight: bold;"> Điểm trung bình học kì 2 </th>
                                        <th style="font-weight: bold;"> Điểm trung bình cả năm </th>
                                        <th style="font-weight: bold;"> Số tiết học nghĩ  </th>
                                        <th style="font-weight: bold;"> Hạnh kiểm </th>
                                        <th style="font-weight: bold;"> Xếp loại học sinh</th>
                                    </tr>
                                </thead>
                                <tbody>
                              
                                    <tr class="text-center">
                                        <td>  <?php echo $row['diemhk1'] ;?> </td>
                                        <td>   <?php echo $row['diemhk2'] ;?> </td>
                                        <td>   <?php echo $row['diemcanam'] ;?> </td>
                                        <td>   <?php echo $row['songaynghi'] ;?> </td>
                                        <td>   <?php echo $row['hanhkiem'] ;?> </td>
                                        <td>   <?php echo $row['xeploai'] ;?> </td>
                                    </tr>
                                
                                   
            
                                </tbody>
                            </table>
                            <?php
                             endwhile;
                             ?>
                        
                        </div>
                    </div>
                </div>
            </div>   
        </div> 
    </div>
  
 
</body>
</html>

