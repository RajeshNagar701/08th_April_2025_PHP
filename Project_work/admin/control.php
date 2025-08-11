<?php

include_once('../website/model.php');  // 1 load model

class control extends model
{   // 2 etends model for use of logic

    function __construct()
    {

        model::__construct();  // 3 call model __construct

        $path = $_SERVER['PATH_INFO'];

        switch ($path) {

            case '/admin':
                include_once('admin_login.php');
                break;

            case '/dashboard':
                include_once('dashboard.php');
                break;

            case '/add_categories':
                if (isset($_REQUEST['submit'])) {

                   $cate_name=$_REQUEST['cate_name'];
                   $cate_image=$_FILES['cate_image']['name'];

                   $path='assets/images/categories/'.$cate_image;
                   $dup_img=$_FILES['cate_image']['tmp_name']; 
                   move_uploaded_file($dup_img,$path);

                   $data=array("cate_name"=>$cate_name,"cate_image"=>$cate_image);

                   $res=$this->insert('categories',$data);
                   if($res)
                   {
                        echo "<script>
                            alert('Category Added Success!');
                        </script>";
                   }
                }
                include_once('add_categories.php');
                break;

            case '/manage_categories':
                $cate_arr = $this->select('categories');
                include_once('manage_categories.php');
                break;

            case '/add_product':
                
                include_once('add_product.php');
                break;

            case '/manage_product':
                $prod_arr = $this->select('products');
                include_once('manage_product.php');
                break;

            case '/manage_cart':
                include_once('manage_cart.php');
                break;

            case '/manage_contact':
                $cont_arr = $this->select('contact');
                include_once('manage_contact.php');
                break;

            case '/manage_customer':
                $cust_arr = $this->select('customer');
                include_once('manage_customer.php');
                break;

            case '/manage_order':
                include_once('manage_order.php');
                break;

            case '/manage_feedback':
                include_once('manage_feedback.php');
                break;

            case '/admin_account':
                include_once('admin_account.php');
                break;
        }
    }
}

$obj = new control;
