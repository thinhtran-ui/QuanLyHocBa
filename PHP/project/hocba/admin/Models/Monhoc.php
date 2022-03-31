<?php
    require_once'Connect.php';
    class MonhocModel{
        function __construct(){

        }
        function getMonhoc(){
            $db= new Connect();
            $sql = 'select * from monhoc';
            $results= $db->exutedQuery($sql);
            $results->execute();
            return $results;     
        }
    }

?>