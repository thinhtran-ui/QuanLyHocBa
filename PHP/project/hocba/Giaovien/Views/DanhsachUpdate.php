<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'link.php'; ?>

</head>

<body>
    <div class="container-scroller">
        <?php include 'Menu.php'; ?>
        <div class="main-panel">
            <div class="row ">
                <div class="col-lg-12 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title"> Danh sách điểm </h4>
                            <table class="table table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th style="font-weight: bold;"> Họ và tên </th>
                                        <th style="font-weight: bold;"> lớp </th>
                                        <th style="font-weight: bold;"> Giáo viên </th>
                                        <th style="font-weight: bold;"> Môn học </th>
                                        <th style="font-weight: bold;"> Điểm thường kì 1 </th>
                                        <th style="font-weight: bold;"> Điểm thường kì 2 </th>
                                        <th style="font-weight: bold;"> Điểm 15 phút 1 </th>
                                        <th style="font-weight: bold;"> Điểm 15 phút 2 </th>
                                        <th style="font-weight: bold;"> Điểm giữa kì </th>
                                        <th style="font-weight: bold;"> Điểm cuối kì </th>
                                        <th style="font-weight: bold;"> Điểm trung bình </th>
        

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $r->fetch()) :
                                   
                                    ?> 
                                        <tr class="text-center">
                                            
                                            <td> <?php echo $row['tenhs']; ?> </td>
                                            <td> <?php echo $row['tenlop']; ?> </td>
                                            <td> <?php echo $row['tengv']; ?> </td>
                                            <td> <?php echo $row['tenmh']; ?> </td>
                                            <td> <?php echo $row['Diemtk1']; ?> </td>
                                            <td> <?php echo $row['Diemtk2']; ?> </td>
                                            <td> <?php echo $row['Diem15plan1']; ?> </td>
                                            <td> <?php echo $row['Diem15plan2']; ?> </td>
                                            <td> <?php echo $row['Diemgk']; ?> </td>
                                            <td> <?php echo $row['Diemck']; ?> </td>
                                            <td> <?php echo $row['Diemtb']; ?> </td>
                                            <td> <?php
                                                    /*echo "<button onclick='data(".$row['id_hocsinh'].",".$row['id_monhoc'].",".$row['id_giaovien'].")' type='submit' href='' class='btn btn-primary btn-sm hocsinh'  data-toggle='modal' data-target='#exampleModal'>
                                                Thêm điểm  </button>"; */
                                                    echo "<button data-hocki='".$id_hocki."' data-lop='". $row['id_lop']."' data-capnhat='". $row['capnhat']."' data-hocsinh='".  $row['id_mshs']."'  data-id='".  $row['id_bangdiem']."'  data-monhoc='".  $row['id_msmh']."' data-giaovien='".  $row['id_msgv']."'  href='' class='btn btn-primary btn-sm hocsinh' type='button' class='btn btn-danger btn-sm ml-3'>
                                                         Sữa  </button>";
                                                    ?> </td>
                                        </tr>

                                    <?php
                                    endwhile;
                                    ?>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript">
    $(document).ready(function(){

$('.hocsinh').click(function(){
  
  var capnhat = $(this).data('capnhat');
  var id  = $(this).data('id');
  var id_lop  = $(this).data('lop');
  var id_hocki  = $(this).data('hocki');
  var id_hocsinh  = $(this).data('hocsinh');
  var id_giaovien  = $(this).data('giaovien');
  var id_monhoc  = $(this).data('monhoc');
 
  // AJAX request
  if(capnhat=='Không'){ 
    $.ajax({
    url: '',
    type: 'post',
    data: {capnhat: capnhat,id:id},
   success: function(response){ 
     // Add response in Modal body
     $('.modal-body').html(response);

     // Display Modal
     $('#empModal').modal('show'); 
   }
 });
 $('#yeucau').click(function(){
    Email.send({
            Host: "smtp.gmail.com",
            Username: "tt6208966@gmail.com",
            Password: "thinhno123",
            To: `thinhtran6012@gmail.com`,
            From: "tt6208966@gmail.com",
            Subject: "Yêu cầu cấp quyền cập nhật điểm ",
            Body: `ID bảng điểm cần yêu cầu cấp quyền ${id}`
                    ,
        })
        .then(function (message) {
            alert("Gửi thành công")
            }); 

});
 
}
else{
    window.location.href = `${id_hocki}/${id}/${id_hocsinh}/${id_monhoc}/${id_giaovien}`;
}
 
});

});
</script>
</html>