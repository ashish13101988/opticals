<?php 


function url_encode($str){
   $str = serialize($str);
   $str = urlencode($str);
   return $str;
}
function url_decode($str){
   
   return unserialize(urldecode($str));;
}

function isLogIn($name= null){
   
   if(isset($_SESSION['id']) && urlCheck($name)==true){
      header('location:index.php');
      exit;
      
   }elseif(!isset($_SESSION['id'])  && urlCheck($name)==false){
      header('location:user-login.php');
     echo 'other page'.$_SESSION['id'];
   }
  
  
}

function urlCheck($name){
    $url =  $_SERVER['REQUEST_URI'];

    $position = stripos($url,$name);
    
    if($position > 0){
      return true;
    }
    
}





