<!DOCTYPE html>
<html lang="en">

<?php  include'link.php'; ?>
<body>
    <div class="container-scroller">
    
        <?php  include'menu.php'; ?>

        <div class="main-panel">
            <div class="row ">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Học sinh</h4>
                            <a href="http://localhost/PHP/project/hocba/admin/Hocsinh/add"class="card-description"> Thêm</a>
                            </p>
                            <table class="table ">
                                <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> ID </th>
                                        <th  style="font-weight: bold;"> Mã số </th>
                                        <th style="font-weight: bold;"> Họ và tên </th>
                                        <th  style="font-weight: bold;"> Năm sinh </th>
                                        <th style="font-weight: bold;"> Giới Tính </th>
                                        <th style="font-weight: bold;"> Địa chỉ </th>
                                        <th style="font-weight: bold;"> Lớp </th>
                                        <th style="font-weight: bold;"> Giáo viên chủ nhiệm </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php      
                                while($row = $r->fetch()):
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['id_hocsinh'] ;?> </td>
                                        <td> <?php echo $row['mshs'] ;?> </td>
                                        <td>  <?php echo $row['tenhs'] ;?> </td>
                                        <td> <?php echo $row['namsinh'] ;?></td>
                                        <td>  <?php echo $row['gioitinh'] ;?></td>
                                        <td> <?php echo $row['diachi'] ;?> </td>
                                        <td>  <?php echo $row['tenlop'] ;?> </td>
                                        <td>  <?php  if($row['tengv']==null){
                                                            echo" ";
                                                        }
                                                      else echo $row['tengv'];
                                                ?> 
                                        </td>
                                      
                                        <td>  
                                            <?php 
                                                echo "<button type='button' class='btn btn-primary btn-sm'>
                                                <a class='text-light' href='Hocsinh/edit/".$row['id_hocsinh']."'> Cập nhật </a> </button>";
                                                echo "<button type='button' class='btn btn-danger btn-sm ml-3'>
                                                <a class='text-light' href='Hocsinh/delete/".$row['id_hocsinh']."'>Xóa </a> </button>";
                                            ?> 
                                        </td>
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
</head>