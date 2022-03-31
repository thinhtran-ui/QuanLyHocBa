<?php
class app{
    private $controller;
    private $action;
    private $params ;
   function __construct(){
    $this->controller="Home";
    $this->action="index";
    $this->params=[];
    $this->handelUrl();
   }
   function getUrl(){
       if(isset($_SERVER["PATH_INFO"])){
           $url = $_SERVER["PATH_INFO"];
         //  $url= explode("/", filter_var(trim($_SERVER["PATH_INFO"],"/"),));
        // $url=array_values($url);
       }
       else
           $url="/";
        return $url;
   }
   function handelUrl(){
       
        $url =$this->getUrl();
      
        $url= explode("/", filter_var(trim($url,"/"),));
        $url=array_values($url);
      
        //Xu ly controller
        if(!empty($url[0])){
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }
            if(file_exists('Controllers/'.$this->controller.'.php')){
              
            require_once('Controllers/'.$this->controller.'.php');
            }
            else 
            echo "file khong ton tai";
        //Xu li action
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->action=ucfirst($url[1]);
                $_SESSION['action']=$this->action;
            }
            unset($url[1]);
        }
      //Xu li param
      
        $this->params=$url?array_values($url):[];
             if(method_exists($this->controller,$this->action)){
            call_user_func_array([new $this->controller,$this->action], $this->params);
        }
      
}
}
?>