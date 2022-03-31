<!DOCTYPE html>
<html lang="en">
    <?php include_once'link.php'; ?>
<body>
<div class="container-scroller">
            <?php  include'menu.php'; ?>
            <div class="main-panel">
                <div class="row ">
                     <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Phân công dạy</h4>
                            <a href="Phancong/add"class="card-description">Thêm</a>
                            <table class="table">
                            <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> ID  </th>
                                        <th  style="font-weight: bold;"> Tên giáo viên </th>
                                        <th style="font-weight: bold;"> Tên lớp </th>
                                        <th  style="font-weight: bold;"> Tên môn học </th>
                                        <th  style="font-weight: bold;"> Học kì </th>
                                        <th  style="font-weight: bold;"> Năm </th>
                                      
                                    </tr>
                            </thead>
                            <tbody>
                                <?php      
                                while($row = $r->fetch()):
                                ?>
                                 <tr class="text-center">
                                     <td> <?php echo $row['id_phancong'] ;?> </td>
                                        <td> <?php echo $row['tengv'] ;?> </td>
                                        <td>  <?php echo $row['tenlop'] ;?> </td>
                                        <td> <?php echo $row['tenmh'] ;?></td>
                                        <td> <?php echo $row['tenhk'] ;?></td>
                                        <td> <?php echo $row['nam'] ;?></td>
                                    
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