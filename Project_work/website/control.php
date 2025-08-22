<?php

include_once('model.php');   // 1 load model

class control extends model
{   // 2 etends model for use of logic

    function __construct()
    {
        session_start();
        model::__construct();  // 3 call model __construct

        $path = $_SERVER['PATH_INFO'];

        switch ($path) {

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
                if (isset($_REQUEST['submit'])) {

                    $name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $password = md5($_REQUEST['password']);
                    $mobile = $_REQUEST['mobile'];
                    $lag = implode(",", $_REQUEST['lag']); // checkbox arr to string
                    $gender = $_REQUEST['gender'];

                    $image = $_FILES['image']['name'];

                    $path = 'assets/images/customers/' . $image;
                    $dup_img = $_FILES['image']['tmp_name'];
                    move_uploaded_file($dup_img, $path);

                    $data = array(
                        "name" => $name,
                        "email" => $email,
                        "password" => $password,
                        "mobile" => $mobile,
                        "lag" => $lag,
                        "gender" => $gender,
                        "image" => $image
                    );

                    $res = $this->insert('customer', $data);
                    if ($res) {
                        echo "<script>
                            alert('Signup Success!');
                            window.location='login';
                        </script>";
                    } else {
                        echo "Not succeess";
                    }
                }
                include_once('signup.php');
                break;

            case '/login':
                if (isset($_REQUEST['submit'])) {

                    $email = $_REQUEST['email'];
                    $password = md5($_REQUEST['password']);
                    $data = array(
                        "email" => $email,
                        "password" => $password
                    );
                    $res=$this->select_where('customer',$data);
                    $chk=$res->num_rows; 
                    if($chk==1) // 1 means true & 0 false
                    {
                        $data=$res->fetch_object(); // data fetch single
                        //CREATE SESSION
                        $_SESSION['u_name']=$data->name;
                        $_SESSION['u_email']=$data->email;
                        $_SESSION['u_id']=$data->id;


                        echo "<script>
                            alert('Login Success!');
                            window.location='index';
                        </script>";
                    }
                    else
                    {
                        echo "<script>
                            alert('Login Failed!');
                            window.location='login';
                        </script>";
                    }
                }
                include_once('login.php');
                break;

                case '/user_logout':
                
                    unset($_SESSION['u_id']);
                    unset($_SESSION['u_name']);
                    unset($_SESSION['u_email']);

                    //session_destroy();
                     echo "<script>
                            alert('Logout Success!');
                            window.location='index';
                        </script>";
                break;

        }
    }
}

$obj = new control;
