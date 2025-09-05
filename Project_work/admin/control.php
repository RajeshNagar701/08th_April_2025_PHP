<?php

include_once('../website/model.php');  // 1 load model

class control extends model
{   // 2 etends model for use of logic

    function __construct()
    {

        session_start();

        model::__construct();  // 3 call model __construct

        $path = $_SERVER['PATH_INFO'];

        switch ($path) {

            case '/admin-login':
                if (isset($_REQUEST['submit'])) {

                    $email = $_REQUEST['email'];
					$pass=$_REQUEST['password'];
					
                    $password = md5($pass);
                    $data = array(
                        "email" => $email,
                        "password" => $password
                    );
                    $res = $this->select_where('admin', $data);

                    $chk = $res->num_rows; // login checj row wise condition 
                    if ($chk == 1) // 1 means true & 0 false
                    {
                        $data = $res->fetch_object(); // data fetch single
                        //CREATE SESSION
                        $_SESSION['a_name'] = $data->name;
                        $_SESSION['a_email'] = $data->email;
                        $_SESSION['a_id'] = $data->id;
						
						if(isset($_REQUEST['rem']))
						{
							setcookie('cookie_email',$email,time()+15);
							setcookie('cookie_pass',$pass,time()+15);
						}
						
                        echo "<script>
                            alert('Login Success!');
                            window.location='dashboard';
                        </script>";
                    } else {
                        echo "<script>
                            alert('Login Failed!');
                            window.location='admin-login';
                        </script>";
                    }
                }
                include_once('admin_login.php');
                break;

            case '/admin_logout':
                unset($_SESSION['a_id']);
                unset($_SESSION['a_name']);
                unset($_SESSION['a_email']);

                //session_destroy();
                echo "<script>
                            alert('Logout Success!');
                            window.location='admin-login';
                        </script>";
                break;

            case '/dashboard':
                include_once('dashboard.php');
                break;

            case '/add_categories':
                if (isset($_REQUEST['submit'])) {

                    $cate_name = $_REQUEST['cate_name'];
                    $cate_image = $_FILES['cate_image']['name'];

                    $path = 'assets/images/categories/' . $cate_image;
                    $dup_img = $_FILES['cate_image']['tmp_name'];
                    move_uploaded_file($dup_img, $path);

                    $data = array("cate_name" => $cate_name, "cate_image" => $cate_image);

                    $res = $this->insert('categories', $data);
                    if ($res) {
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
				
			 case '/edit_categories':
				 if (isset($_REQUEST['edit_cate'])) {
                    $id = $_REQUEST['edit_cate'];
                    $where = array("id" => $id);
                    $res = $this->select_where('categories', $where);
                    $fetch=$res->fetch_object();
					
					 if (isset($_REQUEST['submit'])) {

						$cate_name = $_REQUEST['cate_name'];
						
						if($_FILES['cate_image']['size']>0)
						{
							
							unlink('assets/images/categories/' . $fetch->cate_image);
							
							$cate_image = $_FILES['cate_image']['name'];
							$path = 'assets/images/categories/' . $cate_image;
							$dup_img = $_FILES['cate_image']['tmp_name'];
							move_uploaded_file($dup_img, $path);

							$data = array("cate_name" => $cate_name, "cate_image" => $cate_image);

							$res = $this->update('categories', $data, $where);
							if ($res) {
								echo "<script>
									alert('Category Updated Success!');
									window.location='manage_categories';
								</script>";
							}
						}
						else
						{
							$data = array("cate_name" => $cate_name);

							$res = $this->update('categories', $data, $where);
							if ($res) {
								echo "<script>
									alert('Category Updated Success!');
									window.location='manage_categories';
								</script>";
							}
						}
						
                }
					
                }
                include_once('edit_categories.php');
                break;	

            case '/add_product':
                $cate_arr = $this->select('categories');
                if (isset($_REQUEST['submit'])) {

                    $cate_id = $_REQUEST['cate_id'];
                    $pro_name = $_REQUEST['pro_name'];
                    $price = $_REQUEST['price'];
                    $description = $_REQUEST['description'];

                    $image = $_FILES['image']['name'];

                    $path = 'assets/images/products/' . $image;
                    $dup_img = $_FILES['image']['tmp_name'];
                    move_uploaded_file($dup_img, $path);

                    $data = array(
                        "cate_id" => $cate_id,
                        "pro_name" => $pro_name,
                        "price" => $price,
                        "description" => $description,
                        "image" => $image
                    );

                    $res = $this->insert('products', $data);
                    if ($res) {
                        echo "<script>
                            alert('Products Added Success!');
                        </script>";
                    }
                }
                include_once('add_product.php');
                break;

            case '/manage_product':
                $prod_arr = $this->double_select('products', 'categories', 'cate_name', 'categories.id=products.cate_id');
                include_once('manage_product.php');
                break;

            case '/manage_cart':
                include_once('manage_cart.php');
                break;

            case '/manage_contact':
                $cont_arr = $this->select_orderby('contact', 'name');
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

            case '/delete':
                if (isset($_REQUEST['del_contact'])) {
                    $id = $_REQUEST['del_contact'];
                    $where = array("id" => $id);
                    $res = $this->delete_where('contact', $where);
                    if ($res) {
                        echo "<script>
                            alert('Contact Deleted Success!');
                        </script>";
                    }
                }

                if (isset($_REQUEST['del_category'])) {
                    $id = $_REQUEST['del_category'];
                    $where = array("id" => $id);
					
					// get del image first then delete data
					$res = $this->select_where('categories', $where);
                    $fetch=$res->fetch_object();
					$old_img=$fetch->cate_image;
					
                    $res = $this->delete_where('categories', $where);
                    if ($res) {
						
						unlink('assets/images/categories/' . $old_img);
                        echo "<script>
                            alert('Contact Deleted Success!');
                        </script>";
                    }
                }

                if (isset($_REQUEST['del_customer'])) {
                
                }

                if (isset($_REQUEST['del_product'])) {
                }
                break;
				
				case '/status':
                if (isset($_REQUEST['status_customer'])) {
					
                    $id = $_REQUEST['status_customer'];
                    $where = array("id" => $id);
                    $res = $this->select_where('customer', $where);
					$fetch=$res->fetch_object();
					
					//echo $fetch->status;
						
					if($fetch->status=="Unblock")
					{
						$arr=array("status"=>"Block");
						$res=$this->update('customer', $arr, $where);
						if ($res) {
							
							unset($_SESSION['u_id']);
							unset($_SESSION['u_name']);
							unset($_SESSION['u_email']);
							echo "<script>
								alert('Customer Blocked Success!');
								window.location='manage_customer';
							</script>";
						}
					}
					else
					{
						$arr=array("status"=>"Unblock");
						$res=$this->update('customer', $arr, $where);
						if ($res) {
							echo "<script>
								alert('Customer Unblock Success!');
								window.location='manage_customer';
							</script>";
						}
					}
					
					
                }

                
                break;
				
				
        }
    }
}

$obj = new control;
