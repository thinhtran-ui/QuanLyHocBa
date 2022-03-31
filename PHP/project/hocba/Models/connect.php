<?php
    class Connect{
        var $db=null;
        public function __construct(){
            $dsn='mysql:host=localhost;dbname=hocba';
            $user='root';
            $pass= "";
            try {
                $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            } catch (PDOException $e) {
                echo $e->getMessage();
                // echo "Ko thành công";
                exit();
            }
        }
        function exutedQuery($sql){
            $results=$this->db->prepare($sql);
            return $results;
        }
    }
?>