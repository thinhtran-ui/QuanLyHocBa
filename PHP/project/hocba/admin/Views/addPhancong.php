<!DOCTYPE html>
<html lang="en">

<?php  include'link.php'; ?>
<body>
    <div class="container-scroller">
        <?php include 'menu.php';?>
        <div class="main-panel">
            <div class="row ">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Giáo viên</h4>
                            <main class="my-form">
                                <div class="cotainer">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">Phân công giảng dạy</div>
                                                <div class="card-body">
                                                    <form name="my-form" onsubmit="return validform()" action="" method="Post">
                                                    <div class="form-group row">
                                                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Giáo viên chủ nhiệm</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="id_giaovien" id="giaovien">
                                                                <?php
                                                                    while($r=$getGv->fetch()):
                                                                ?>
                                                                   <option   value="<?php echo $r['id_giaovien'];?>"> <?php echo $r['tengv'] ?></option> 
                                                                
                                                                <?php
                                                                    endwhile;
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Lớp</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="id_lop" id="id_lop">
                                                        
                                                                <?php
                                                                    while($r=$getLop->fetch()):
                                                                ?>
                                                                   <option data-id="<?php echo $r['id_nam'];?>"  value="<?php echo $r['id_lop'];?>"> <?php echo "".$r['tenlop']."(".$r['nam'].")" ?></option> 
                                                                
                                                                <?php
                                                                    endwhile;
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Học kì</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="id_hocki" id="hocki">
                                                        
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" name="submit"class="btn btn-primary">
                                                                Thêm
                                                            </button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>
<script>
    $( document ).ready(function() {
     var id_nam = $('#id_lop').find('option:selected').data('id')
     $.ajax({
            url : '',
            type :'post',
            data : {id_nam : id_nam },
            success: function(response){ 
                $('#hocki').html(response);
    }
        })
});
$('#id_lop').on('change', function() {
    var id_nam = $(this).find('option:selected').data('id')
        $.ajax({
            url : '',
            type :'post',
            data : {id_nam : id_nam , change :'change'},
            success: function(response){ 
            $('#hocki').html(response);
    }
        })
});
</script>
</html>