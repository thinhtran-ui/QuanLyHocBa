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
                            
                            <h4 class="card-title"> Bảng điểm  </h4>
                            <h6> Học kì 1 </h6>
                            <table class="table table table-striped" >
                                <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> Giáo viên </th>
                                        <th style="font-weight: bold;"> Môn học </th>
                                        <th style="font-weight: bold;"> Điểm thường kì 1 </th>
                                        <th style="font-weight: bold;"> Điểm thường kì 2 </th>
                                        <th style="font-weight: bold;"> Điểm 15 phút 1 </th>
                                        <th style="font-weight: bold;"> Điểm 15 phút 2 </th>
                                        <th style="font-weight: bold;"> Điểm giữa kì </th>
                                        <th style="font-weight: bold;"> Điểm cuối kì </th>
                                        <th style="font-weight: bold;"> Điểm trung bình </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php      
                                while($row = $r1->fetch()):
                                ?>
                                    <tr class="text-center">
                                        <td>  <?php echo $row['tengv'] ;?> </td>
                                        <td>   <?php echo $row['tenmh'] ;?> </td>
                                        <td>   <?php echo $row['Diemtk1'] ;?> </td>
                                        <td>   <?php echo $row['Diemtk2'] ;?> </td>
                                        <td>   <?php echo $row['Diem15plan1'] ;?> </td>
                                        <td>   <?php echo $row['Diem15plan2'] ;?> </td>
                                        <td>   <?php echo $row['Diemgk'] ;?> </td>
                                        <td>   <?php echo $row['Diemck'] ;?> </td>
                                        <td>   <?php echo $row['Diemtb'] ;?> </td>
                                    </tr>
                                
                                    <?php
                                    endwhile;
                                    ?>
            
                                </tbody>
                            </table>
                            <h6> Học kì 2 </h6>
                            <table class="table table table-striped" >
                                <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> Giáo viên </th>
                                        <th style="font-weight: bold;"> Môn học </th>
                                        <th style="font-weight: bold;"> Điểm thường kì 1 </th>
                                        <th style="font-weight: bold;"> Điểm thường kì 2 </th>
                                        <th style="font-weight: bold;"> Điểm 15 phút 1 </th>
                                        <th style="font-weight: bold;"> Điểm 15 phút 2 </th>
                                        <th style="font-weight: bold;"> Điểm giữa kì </th>
                                        <th style="font-weight: bold;"> Điểm cuối kì </th>
                                        <th style="font-weight: bold;"> Điểm trung bình </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php      
                                while($row = $r2->fetch()):
                                ?>
                                    <tr class="text-center">
                                        <td>  <?php echo $row['tengv'] ;?> </td>
                                        <td>   <?php echo $row['tenmh'] ;?> </td>
                                        <td>   <?php echo $row['Diemtk1'] ;?> </td>
                                        <td>   <?php echo $row['Diemtk2'] ;?> </td>
                                        <td>   <?php echo $row['Diem15plan1'] ;?> </td>
                                        <td>   <?php echo $row['Diem15plan2'] ;?> </td>
                                        <td>   <?php echo $row['Diemgk'] ;?> </td>
                                        <td>   <?php echo $row['Diemck'] ;?> </td>
                                        <td>   <?php echo $row['Diemtb'] ;?> </td>
                                    </tr>
                                
                                    <?php
                                    endwhile;
                                    ?>
            
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

