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
                            <h4 class="card-title">Môn học</h4>
                       
                            <table class="table">
                            <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> ID môn học </th>
                                        <th  style="font-weight: bold;"> Mã môn học </th>
                                        <th style="font-weight: bold;"> Tên môn học</th>
                                        <th  style="font-weight: bold;"> Số tiết </th>
                                      
                                    </tr>
                            </thead>
                            <tbody>
                                <?php      
                                while($row = $r->fetch()):
                                ?>
                                 <tr class="text-center">
                                     <td> <?php echo $row['id_monhoc'] ;?> </td>
                                        <td> <?php echo $row['mamh'] ;?> </td>
                                        <td>  <?php echo $row['tenmh'] ;?> </td>
                                        <td> <?php echo $row['sotiet'] ;?></td>
                                      
                                      
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