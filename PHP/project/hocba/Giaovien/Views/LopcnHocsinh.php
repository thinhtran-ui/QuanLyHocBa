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
                            
                            <h4 class="card-title"> Danh sách học sinh</h4>
                            <table class="table ">
                                <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> ID </th>
                                        <th  style="font-weight: bold;"> Mã số học sinh </th>
                                        <th style="font-weight: bold;"> Họ và tên </th>
                                        <th style="font-weight: bold;"> Năm sinh </th>
                                        <th style="font-weight: bold;"> Giới tính </th>
                                        <th style="font-weight: bold;"> Địa chỉ </th>

                                        <th></th>
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
                                        <td>   <?php echo  date('d/m/Y', strtotime($row['namsinh'])) ;?> </td>
                                        <td>   <?php echo $row['gioitinh'] ;?> </td>
                                        <td>   <?php echo $row['diachi'] ;?> </td>
                    
                                        <td>  
                                            <?php 
                                                /*echo "<button onclick='data(".$row['id_hocsinh'].",".$row['id_monhoc'].",".$row['id_giaovien'].")' type='submit' href='' class='btn btn-primary btn-sm hocsinh'  data-toggle='modal' data-target='#exampleModal'>
                                                Thêm điểm  </button>"; */
                                                 echo "<button type='submit' style='margin-right:10px' href='' class='btn btn-primary btn-sm hocsinh' type='button' class='btn btn-danger btn-sm mr-3'>
                                                 <a class='text-light'  href='http://localhost/PHP/project/hocba/Giaovien/Lopchunhiem/Xemdiem/".$id_lop."/".$row['id_hocsinh']."'>Xem điểm </a> </button>";
                                                 echo "<button type='submit' href='' class='btn btn-primary btn-sm hocsinh' type='button' class='btn btn-danger btn-sm '>
                                                 <a class='text-light' href='http://localhost/PHP/project/hocba/Giaovien/Lopchunhiem/Ketqua/".$id_lop."/".$row['id_hocsinh']."'>Kết quả học tập </a> </button>";
                                            ?> 
                                            
                    
                                            </div>
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

