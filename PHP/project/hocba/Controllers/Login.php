<?php
    require_once './Models/checkaccount.php';
    class Login{
        var $err="";
        function index(){
        if(!isset($_POST['submit']))
        require_once'./Views/Login.php';
        else
        {
            switch($_POST['role']){
                case "admin":
                    $this->checkAdmin();
                    break;
                case "giaovien":
                    $this->checkGiaovien();
                    break;
                case "hocsinh":
                    $this->checkHocsinh();
                    break;

            }

        }
      
        }
        function checkAdmin(){
            if(isset($_POST['name'])&&isset($_POST['pass'])){
               $name =$_POST['name'];
               $pass= $_POST['pass'];
               $check = new Checkaccount();
               $row= $check->Checkadmin($_POST['name'],$_POST['pass']);
             if(!$row) {
                $this->err="Tai khoan hoac mat khau khong dung";
                require_once'./Views/Login.php';
             } 
             else {
                $_SESSION['taikhoan']=$row['taikhoan'];
                $_SESSION['matkhau']=$row['matkhau'];
               header('location:http://localhost/PHP/project/hocba/admin');
            }
        
        }
    }
        function checkGiaovien(){   
            if(isset($_POST['name'])&&isset($_POST['pass'])){
                $name =$_POST['name'];
                $pass= $_POST['pass'];
                $check = new Checkaccount();
                $row= $check->Checkgiaovien($_POST['name'],$_POST['pass']);
                if(!$row) {
                   $this->err="Tai khoan hoac mat khau khong dung";
                   require_once'./Views/Login.php';
                } 
                else {
                   $_SESSION['id']=$row['id'];
                   $_SESSION['taikhoan']=$row['taikhoan'];
                   $_SESSION['matkhau']=$row['matkhau'];
                   header('location:http://localhost/PHP/project/hocba/Giaovien');
                 
               }
            }
        }
        function checkHocsinh(){   
            if(isset($_POST['name'])&&isset($_POST['pass'])){
                $name =$_POST['name'];
                $pass= $_POST['pass'];
                $check = new Checkaccount();
                $row= $check->Checkhocsinh($_POST['name'],$_POST['pass']);
                if(!$row) {
                   $this->err="Tai khoan hoac mat khau khong dung";
                   require_once'./Views/Login.php';
                } 
                else {
                   $_SESSION['id']=$row['id'];
                   $_SESSION['taikhoan']=$row['taikhoan'];
                   $_SESSION['matkhau']=$row['matkhau'];
                  header('location:http://localhost/PHP/project/hocba/Hocsinh');
               }
            }
        }
}
?>