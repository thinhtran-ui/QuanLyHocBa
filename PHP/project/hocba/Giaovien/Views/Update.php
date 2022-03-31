<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once'link.php'; ?>
    <style>
       input:read-only {
         background-color: red;
}
    </style>
</head>
<body>
    <div class="container-scroller">
            <?php  include'Menu.php'; ?>
        <div class="main-panel">
            <div class="row ">
                <div class="col-lg-12 grid-margin stretch-card">
            
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Tên học sinh: <?php echo $r['tenhs']; ?> </h4>
                            <h4>Lớp :  <?php echo $r['tenlop']; ?> </h4>
                            <h4>Giáo viên: <?php echo $r['tengv']; ?> </h4>
                            <h4>Môn:<?php echo $r['tenmh']; ?> </h4>
                            <h4><?php echo $r['tenhk']; ?> </h4>
                            <h4>Năm:<?php echo $r['nam']; ?> </h4>
                            <table class="table ">
                                <thead>
                                    <tr class="text-center">
                                        <th  style="font-weight: bold;"> Điểm thường kì 1  </th>
                                        <th  style="font-weight: bold;"> Điểm thường kì 2 </th>
                                        <th style="font-weight: bold;">Điểm 15 phút 1 </th>
                                        <th style="font-weight: bold;"> Điểm 15 phút 2 </th>
                                        <th style="font-weight: bold;"> Điểm giữa kì </th>
                                        <th style="font-weight: bold;"> Điểm cuối kì </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php      
                               
                                ?>
                                    <tr class="text-center">
                                    <form name="my-form" onsubmit="return validform()" action="" method="Post">
                                        <td class="" > 
                                            <input style="margin-left:50px" class="col-md-6 form-control text-center input"type="number" id="diemtk1"  value="<?php echo $r['Diemtk1'];?>"  class="form-control" min="0" max="10" name="Diemtk1" require>
                                        </td>
                                    
                                        <td>         
                                            <input  style="margin-left:50px" class=" col-md-6 form-control text-center input"type="number" id="diemtk2"  value="<?php echo $r['Diemtk2'];?>"  class="form-control" min="0" max="10" name="Diemtk2" require>
                                        </td> 
                                        <td>         
                                            <input  style="margin-left:50px" class=" col-md-6 form-control text-center input"type="number" id="diem15p1"  value="<?php echo $r['Diem15plan1'];?>"  class="form-control" min="0" max="10" name="Diem15plan1" require>
                                        </td> 
                                        <td>         
                                            <input  style="margin-left:50px" class=" col-md-6 form-control text-center input"type="number" id="diem15p2"  value="<?php echo $r['Diem15plan2'];?>"  class="form-control" min="0" max="10" name="Diem15plan2" require>
                                        </td> 
                                        <td>         
                                            <input  style="margin-left:50px" class=" col-md-6 form-control text-center input"type="number" id="diemgk"  value="<?php echo $r['Diemgk'];?>"  class="form-control" min="0" max="10" name="Diemgk" require>
                                        </td> 
                                        <td>         
                                            <input  style="margin-left:50px" class=" col-md-6 form-control text-center input"type="number" id="diemck"  value="<?php echo $r['Diemck'];?>"  class="form-control" min="0" max="10" name="Diemck" require>
                                        </td> 
            
                                        <td> <button type='submit'   name="submit"  class='btn btn-danger btn-sm ml-3'>
                                             Cập nhật </button> </td>
                                        
                                    </form>
                                    <td> <button type='button' data-id="<?php echo $r['id_bangdiem'] ; ?>" id='click'    class='btn btn-primary btn-sm ml-3'>
                                            Lịch sử</button> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal fade" id="empModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Thông báo</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" id='yeucau' data-="" data-dismiss="modal"   class="btn btn-default"> Đồng ý</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
           
            </div>   
        </div> 
    </div>
 
</body>
<script type="text/javascript" >
      $(document).ready(function(){
        $('#click').click(function(){
            var id_bangdiemUpdate  = $(this).data('id');
            $.ajax({
                url: '',
                type: 'post',
                data: {history:'history',id_bangdiemUpdate:id_bangdiemUpdate},
                 success: function(response){ 
     // Add response in Modal body
                      $('.modal-body').html(response);

     // Display Modal
                     $('#empModal').modal('show'); 
   }
 });
        })
      })
</script>
</html>

