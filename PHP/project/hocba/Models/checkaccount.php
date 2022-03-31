<?php
    require_once'connect.php';
    class Checkaccount{
        function __construct(){}
        function Checkadmin($name,$pass){
            $sql= "select * from account_admin where taikhoan= ? and matkhau=? ";
            $db=new connect();
            $r=$db-> exutedQuery($sql);
            $r->execute([$name,$pass]);
          $row=$r->fetch();
          return $row;
    }
        function Checkgiaovien($name,$pass){
            $sql="select * from account_gv where taikhoan=? and matkhau=?";
            $db=new connect();
            $r=$db-> exutedQuery($sql);
            $r->execute([$name,$pass]);
            $row=$r->fetch();
            return $row;
        }
        function Checkhocsinh($name,$pass){
            $sql="select * from account_hs where taikhoan=? and matkhau=?";
            $db=new connect();
            $r=$db-> exutedQuery($sql);
            $r->execute([$name,$pass]);
            $row=$r->fetch();
            return $row;
        }
}
?>