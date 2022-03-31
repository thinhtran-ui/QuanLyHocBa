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
                            
                            <h4 class="card-title"> Điểm trung bình </h4>
                            <select class="mb-5" name="hocki" id="hocki">
                                 <?php
                                    while($r=$getHk->fetch()):
                                 ?>
                                    <option value="<?php echo $r['tenhk'];?>"> <?php echo $r['tenhk']."(".$r['nam'].")" ?></option> 
                                                                
                                 <?php
                                 endwhile;
                                 ?>
                           </select>
                            <table class="table table table-striped" >
                                <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> Toán  </th>
                                        <th  style="font-weight: bold;"> Văn </th>
                                        <th style="font-weight: bold;">  Lý</th>
                                        <th style="font-weight: bold;"> Hóa </th>
                                        <th style="font-weight: bold;">Sinh </th>
                                        <th style="font-weight: bold;"> Điểm trung bình  </th>
                                    </tr>
                                </thead>
                                <tbody>
                        
                                    <tr class="text-center diem">
                                        <td> <?php echo $row['Toán'] ;?> </td>
                                        <td> <?php echo $row['Văn'] ;?> </td>
                                        <td>  <?php echo $row['Lý'] ;?> </td>
                                        <td>   <?php echo $row['Hóa'] ;?> </td>
                                        <td>   <?php echo $row['Sinh'] ;?> </td>
                                        <td>   <?php  echo round($row['Điểm trung bình'],1) ;?> </td>
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
<script>
      $('#hocki').on('change', function() {
        var tenhk = this.value;
        $.ajax({
            url : '',
            type :'post',
            data : {tenhk : tenhk},
            success: function(response){ 
                $('.diem').html(response);
    }
        })
});
</script>
</html>

