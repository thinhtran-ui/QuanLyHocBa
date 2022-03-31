
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
                            <h4 class="card-title">Lớp</h4>
                            <a href="http://localhost/PHP/project/hocba/admin/Lop/add"class="card-description">Thêm</a>
                            <table class="table">
                            <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> ID </th>
                                        <th  style="font-weight: bold;"> Mã lớp </th>
                                        <th style="font-weight: bold;"> Tên lớp </th>
                                        <th  style="font-weight: bold;"> Giáo viên chủ nhiệm </th>
                                        <th style="font-weight: bold;"> Sỉ số </th>
                                        <th style="font-weight: bold;"> Năm  </th>
                                        <th> </th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php      
                                while($row = $r->fetch()):
                                ?>
                                 <tr class="text-center">
                                     <td> <?php echo $row['id_lop'] ;?> </td>
                                        <td> <?php echo $row['malop'] ;?> </td>
                                        <td>  <?php echo $row['tenlop'] ;?> </td>
                                        <td> <?php echo $row['tengv'] ;?></td>
                                        <td>  <?php echo $row['siso'] ;?></td>  
                                        <td>   <?php echo $row['nam'] ; ?></td>
                                        <td>  
                                            <?php 
                                                echo "<button type='button' class='btn btn-primary btn-sm'>
                                                <a class='text-light' href='Lop/edit/".$row['id_lop']."/".$row['id_nam']."'> Cập nhật </a> </button>";
                                                echo "<button type='button' class='btn btn-danger btn-sm ml-3'>
                                                <a class='text-light' href='Lop/delete/".$row['id_lop']."'>Xóa </a> </button>";
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
    </html>
