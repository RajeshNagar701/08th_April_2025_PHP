<?php

include_once('model.php');   // 1 load model

class control extends model{   // 2 etends model for use of logic

    function __construct()
    {
         model::__construct();  // 3 call model __construct

         $path=$_SERVER['PATH_INFO'];
         
         switch($path){

            case '/index':
            include_once('index.php');
            break;

            case '/about-us':
            include_once('about-us.php');
            break;

            case '/course':
            include_once('course.php');
            break;

            case '/our-services':
            include_once('our-services.php');
            break;

            case '/contact-us':
            include_once('contact-us.php');
            break;

            case '/signup':
            include_once('signup.php');
            break;
            
            case '/login':
            include_once('login.php');
            break;
        

         }
    }

}

$obj=new control;
?>