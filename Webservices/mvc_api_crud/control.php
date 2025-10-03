
<?php

include_once('model.php'); // step 1


class control extends model   // step 2
{
	function __construct()
	{
		
		session_start();
		
		model::__construct();   // step 3
		
		$url=$_SERVER['PATH_INFO']; 
		
		switch($url)
		{
			
			case '/contacts_get':	
				$res=$this->select('contacts');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Contact Found.", "status" => false));
				}
			break;
			
			case '/contacts_post':	
			
				$name = $_POST["name"]; 
				$email = $_POST["email"];
				$mobile = $_POST["mobile"];
				$comment = $_POST["comment"];
				
				$arr=array("name"=>$name,"email"=>$email,"mobile"=>$mobile,"comment"=>$comment);
				
				$res=$this->insert('contacts',$arr);
				if($res or die("Insert Query Failed"))
				{
					echo json_encode(array("message" => "Contacts Inserted Successfully", "status" => true));	
				}
   
				else
				{
					echo json_encode(array("message" => "Failed Contacts Not Inserted ", "status" => false));	
				}
				
			break;
			
			case '/contacts_delete':	
				$id = $_GET['id'];
				$where=array("id"=>$id);
				$res=$this->delete('contacts',$where);
				if($res or die("Delete Query Failed"))
				{	
					echo json_encode(array("message" => "Contacts Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed Contacts Not Deleted", "status" => false));	
				}
			break;
			
		
			//  Blog ============================================================================================

			//http://localhost/RajviApi/blog_get
			case '/blog_get':	
				$res=$this->select('blog');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Blog Found.", "status" => false));
				}
			break;
			
			case '/blog_single_get':	
	
				$id = $_GET['id'];			
				$where=array("id"=>$id);
				$res=$this->select_where_arr('blog',$where);
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Blog Found.", "status" => false));
				}
			break;
			
			case '/blog_post':	
			
				$title = $_POST["title"]; 
				$description = $_POST["description"];
				
				$blog_img=time().'_'.$_FILES['blog_img']['name'];
			    $path=$_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/blog/'.$blog_img;
			    $tblog_img=$_FILES['blog_img']['tmp_name'];
	        			
				$arr=array("title"=>$title,"description"=>$description,"blog_img"=>$blog_img);
				
				$res=$this->insert('blog',$arr);
				if($res or die("Insert Query Failed"))
				{
				    move_uploaded_file($tblog_img,$path);
					echo json_encode(array("message" => "Blog Inserted Successfully", "status" => true));	
				}
				else
				{
					echo json_encode(array("message" => "Blog Contacts Not Inserted ", "status" => false));	
				}
			break;
			
			case '/blog_delete':	
			    
			    $id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('blog',$where);
				$fetch=$getdata->fetch_object();
				$blog_old_img=$fetch->blog_img;
				
				
				$res=$this->delete('blog',$where);
				if($res or die("Delete Query Failed"))
				{	
				    unlink($_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/blog/'.$blog_old_img);
					echo json_encode(array("message" => "Blog Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed Blog Not Deleted", "status" => false));	
				}
			 break;
			   
		    	case '/blog_put':	
		        
		        $id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('blog',$where);
				$fetch=$getdata->fetch_object();
				$blog_old_img=$fetch->blog_img;
				
				$title=$_POST['title'];
				$description=$_POST['description'];
				
				if($_FILES['blog_img']['size']>0)
				{
    			    $blog_img=time().'_'.$_FILES['blog_img']['name'];
    			    $path=$_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/blog/'.$blog_img;
    			    $tblog_img=$_FILES['blog_img']['tmp_name'];
			        move_uploaded_file($tblog_img,$path);
			        
				    $arr=array("title"=>$title,"description"=>$description,"blog_img"=>$blog_img);
    				
    				$res=$this->update_where('blog',$arr,$where);
    				if($res or die("Update Query Failed"))
    				{	
    				    unlink($_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/blog/'.$blog_old_img);
    					echo json_encode(array("message" => "Blog Update Successfully", "status" => true));	
    				}
				}
				else
				{
				    $arr=array("title"=>$title,"description"=>$description);
    				
    				$res=$this->update_where('blog',$arr,$where);
    				if($res or die("Update Query Failed"))
    				{	
    					echo json_encode(array("message" => "Blog Update Successfully", "status" => true));	
    				}
				}
				
			break;
			
			//  Categories ============================================================================================ 
			
			case '/categories_get':	
				$res=$this->select('categories');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Categories Found.", "status" => false));
				}
			break;
			
			case '/categories_single_get':	
	
				$id = $_GET['id'];			
				$where=array("id"=>$id);
				$res=$this->select_where_arr('categories',$where);
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Categories Found.", "status" => false));
				}
			break;
			
			case '/categories_post':	
			
			    $cate_name=$_POST['cate_name'];
			    
			    $cate_img=time().'_'.$_FILES['cate_img']['name'];
			    $path=$_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/categories/'.$cate_img;
			    $tcate_img=$_FILES['cate_img']['tmp_name'];
			
				$arr=array("cate_name"=>$cate_name,"cate_img"=>$cate_img);
				
				$res=$this->insert('categories',$arr);
				if($res or die("Insert Query Failed"))
				{
				    move_uploaded_file($tcate_img,$path);
					echo json_encode(array("message" => "Categories Inserted Successfully", "status" => true));	
				}
				else
				{
					echo json_encode(array("message" => "Categories Contacts Not Inserted ", "status" => false));	
				}
				
			break;
			
			case '/categories_delete':	
			
				$id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('categories',$where);
				$fetch=$getdata->fetch_object();
				$cate_img=$fetch->cate_img;
				
				
				$res=$this->delete('categories',$where);
				if($res or die("Delete Query Failed"))
				{	
				    unlink($_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/categories/'.$cate_img);
					echo json_encode(array("message" => "categories Delete Successfully", "status" => true));	
				}
				else
				{	
					json_encode(array("message" => "Failed categories Not Deleted", "status" => false));	
				}
			break;
			
			case '/categories_put':	
				
				$id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('categories',$where);
				$fetch=$getdata->fetch_object();
				$cate_old_img=$fetch->cate_img;
				
				$cate_name=$_POST['cate_name'];
				
				if($_FILES['cate_img']['size']>0)
				{
    			    $cate_img=time().'_'.$_FILES['cate_img']['name'];
    			    $path=$_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/categories/'.$cate_img;
    			    $tcate_img=$_FILES['cate_img']['tmp_name'];
			        move_uploaded_file($tcate_img,$path);
			        
				    $arr=array("cate_name"=>$cate_name,"cate_img"=>$cate_img);
    				
    				$res=$this->update_where('categories',$arr,$where);
    				if($res or die("Update Query Failed"))
    				{	
    				    unlink($_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/categories/'.$cate_old_img);
    					json_encode(array("message" => "Categories Update Successfully", "status" => true));	
    				}
				}
				else
				{
				    $arr=array("cate_name"=>$cate_name);
    				
    				$res=$this->update_where('categories',$arr,$where);
    				if($res or die("Update Query Failed"))
    				{	
    					json_encode(array("message" => "Categories Update Successfully", "status" => true));	
    				}
				}
				
			break;
			
			
			//  services ============================================================================================ 
			
			case '/services_get':	
				$res=$this->select('services');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					json_encode(array("message" => "No Services Found.", "status" => false));
				}
			break;
			// get service by categories
			case '/services_single_get':	
				
				$id = $_GET['id'];			
				$where=array("cate_id"=>$id);
				$res=$this->select_where_arr('services',$where);
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Services Found.", "status" => false));
				}
			break;
			
				// get service single by id
				
			case '/services_single':	
				
				$id = $_GET['id'];			
				$where=array("id"=>$id);
				$res=$this->select_where_arr('services',$where);
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Services Found.", "status" => false));
				}
			break;
			
			
			case '/services_post':	

			    $cate_id = $_POST["cate_id"]; 
				$service_name = $_POST["service_name"];
				$description = $_POST["description"]; 
				$price = $_POST["price"];
				
				$ser_img=time().'_'.$_FILES['ser_img']['name'];
			    $path=$_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/services/'.$ser_img;
			    $tser_img=$_FILES['ser_img']['tmp_name'];
	        			
				$arr=array("cate_id"=>$cate_id,"service_name"=>$service_name,"description"=>$description,"price"=>$price,"ser_img"=>$ser_img);
				
				$res=$this->insert('services',$arr);
				if($res or die("Insert Query Failed"))
				{
				    move_uploaded_file($tser_img,$path);
					echo json_encode(array("message" => "Services Inserted Successfully", "status" => true));	
				}
				else
				{
					echo json_encode(array("message" => "Services Not Inserted ", "status" => false));	
				}
			break;
			
			case '/services_delete':	
			    
			    $id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('services',$where);
				$fetch=$getdata->fetch_object();
				$ser_old_img=$fetch->ser_img;
				
				
				$res=$this->delete('services',$where);
				if($res or die("Delete Query Failed"))
				{	
				    unlink($_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/services/'.$ser_old_img);
					echo json_encode(array("message" => "Services Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed Services Not Deleted", "status" => false));	
				}
			break;
			
			case '/services_put':	
			    
			    $id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('services',$where);
				$fetch=$getdata->fetch_object();
				$ser_old_img=$fetch->ser_img;
				
				$cate_id=$_POST['cate_id'];
				$service_name = $_POST["service_name"]; 
				$description = $_POST["description"];
				$price = $_POST["price"];
				
				if($_FILES['ser_img']['size']>0)
				{
    			    $ser_img=time().'_'.$_FILES['ser_img']['name'];
    			    $path=$_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/services/'.$ser_img;
    			    $tser_img=$_FILES['ser_img']['tmp_name'];
			        move_uploaded_file($tser_img,$path);
			        
				    $arr=array("cate_id"=>$cate_id,"service_name"=>$service_name,"description"=>$description,"price"=>$price,"ser_img"=>$ser_img);
    				
    				$res=$this->update_where('services',$arr,$where);
    				if($res or die("Update Query Failed"))
    				{	
    				    unlink($_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/services/'.$ser_old_img);
    					return json_encode(array("message" => "Services Update Successfully", "status" => true));	
    				}
				}
				else
				{
				    $arr=array("cate_id"=>$cate_id,"service_name"=>$service_name,"description"=>$description,"price"=>$price);
    				
    				$res=$this->update_where('services',$arr,$where);
    				if($res or die("Update Query Failed"))
    				{	
    					return json_encode(array("message" => "Services Update Successfully", "status" => true));	
    				}
				}
			break;
			
				
			//  appointment ============================================================================================ 
			
			case '/appointment_get':	
				$res=$this->select('appointment');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Appointment Found.", "status" => false));
				}
			break;
			
			case '/appointment_single_get':	
	            $id = $_GET['id'];			
				$where=array("userid"=>$id);
				$res=$this->select_where_arr('appointment',$where);
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Appointment Found.", "status" => false));
				}
			break;
			
			case '/appointment_single_get_pending':	
				$where=array("status"=>"Pending");
				$res=$this->select_where_arr('appointment',$where);
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Appointment Found.", "status" => false));
				}
			break;
			
			case '/appointment_single_get_approved':	
	            $where=array("status"=>"Approved");
				$res=$this->select_where_arr('appointment',$where);
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Appointment Found.", "status" => false));
				}
			break;
			
			
    			case '/appointment_status':
				$id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('user',$where);
				$fetch=$getdata->fetch_object();
				$status=$fetch->status;
				
			    if($status=="Pending")
			    {
			        $arr=array("status"=>"Approved");
    				$res=$this->update_where('appointment',$arr,$where);
    				echo json_encode(array("status" => true));	
				}
				else
				{
				    $arr=array("status"=>"Pending");
    				$res=$this->update_where('appointment',$arr,$where);
    				echo json_encode(array("status" => true));	
				}
				
			break;
			
			case '/appointment_post':	
			
				$service_id = $_POST["service_id"]; 
				$userid = $_POST["userid"];
				$app_Date = $_POST["app_Date"];
				
				$arr=array("service_id"=>$service_id,"userid"=>$userid,"app_Date"=>$app_Date);
				
				$res=$this->insert('appointment',$arr);
				if($res or die("Insert Query Failed"))
				{
					echo json_encode(array("message" => "Appointment Registered Successfully", "status" => true));	
				}
				else
				{
					echo json_encode(array("message" => "Appointment Not Registered Successfully ", "status" => false));	
				}
			break;
			
			case '/appointment_delete':	
			
				$id = $_GET['id'];
				$where=array("id"=>$id);
				$res=$this->delete('appointment',$where);
				if($res or die("Delete Query Failed"))
				{	
					echo json_encode(array("message" => "Appointment Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed Appointment Not Deleted", "status" => false));	
				}
			break;
			
			
			//  user ============================================================================================ 
			
			case '/user_get':	
				$res=$this->select('user');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No user Found.", "status" => false));
				}
			break;
			
			case '/user_single_get':	
	            
	            $id = $_GET['id'];			
				$where=array("id"=>$id);
				$res=$this->select_where_arr('user',$where);
			    $count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No user Found.", "status" => false));
				}
			break;
			
			
			case '/user_login':	
	            
	            $email = $_POST['email'];
	            $password = $_POST['password'];
				$where=array("email"=>$email,"password"=>$password);
				
				$res=$this->select_where('user',$where);
				$chk=$res->num_rows; // 0 means false & 1 means true  check row wise condition
				if($chk==1)
				{
					
					$data=$res->fetch_object(); // single data fetch 
					
					if($data->status=="Unblock")
					{
					    
					    echo json_encode($data);
					}
					else
					{
						echo json_encode(array("message" => "Login Failed due Blocked Account", "status" => false));
					}
				}
				else
				{
					echo json_encode(array("message" => "Login Failed due wrong credential", "status" => false));
				}
		
			break;
			
			
			case '/user_post':	
			
				$name = $_POST["name"];
				$email = $_POST["email"];
				$password = $_POST["password"];
				$mobile = $_POST["mobile"];
				
				$img=time().'_'.$_FILES['img']['name'];
			    $path=$_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/user/'.$img;
			    $timg=$_FILES['img']['tmp_name'];
			
				$arr=array("name"=>$name,"email"=>$email , "password"=>$password, "mobile"=>$mobile,"img"=>$img);
				
				$res=$this->insert('user',$arr);
				if($res or die("Insert Query Failed"))
				{
				    move_uploaded_file($timg,$path);
					echo json_encode(array("message" => "User Signup Successfully", "status" => true));	
				}   
				else
				{
					echo json_encode(array("message" => "User Contacts Not Inserted ", "status" => false));	
				}
			break;
			
			case '/user_delete':	
			   
			    $id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('user',$where);
				$fetch=$getdata->fetch_object();
				$old_img=$fetch->img;
				
				
				$res=$this->delete('user',$where);
				if($res or die("Delete Query Failed"))
				{	
				    unlink($_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/user/'.$old_img);
					echo json_encode(array("message" => "User Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed User Not Deleted", "status" => false));	
				}
			break;
			
			case '/user_put':
				$id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('user',$where);
				$fetch=$getdata->fetch_object();
				$old_img=$fetch->img;
				
				$name=$_POST['name'];
				$email = $_POST["email"]; 
				$password = $_POST["password"]; 
				$mobile = $_POST["mobile"];
				
				if($_FILES['img']['size']>0)
				{
    			    $img=time().'_'.$_FILES['img']['name'];
    			    $path=$_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/user/'.$img;
    			    $timg=$_FILES['img']['tmp_name'];
			        move_uploaded_file($timg,$path);
			        
				    $arr=array("name"=>$name,"email"=>$email,"password"=>$password,"mobile"=>$mobile,"img"=>$img);
    				
    				$res=$this->update_where('user',$arr,$where);
    				if($res or die("Update Query Failed"))
    				{	
    				    unlink($_SERVER['DOCUMENT_ROOT'].'/RajviApi/upload/user/'.$old_img);
    					echo json_encode(array("message" => "User Profile Update Successfully", "status" => true));	
    				}
				}
				else
				{
				     $arr=array("name"=>$name,"email"=>$email,"password"=>$password,"mobile"=>$mobile);
    				
    				$res=$this->update_where('user',$arr,$where);
    				if($res or die("Update Query Failed"))
    				{	
    					echo json_encode(array("message" => "User Profile Update Successfully", "status" => true));	
    				}
				}
				
			break;
			
			
			case '/user_status':
				$id = $_GET['id'];
				$where=array("id"=>$id);
				
				$getdata=$this->select_where('user',$where);
				$fetch=$getdata->fetch_object();
				$status=$fetch->status;
				
				
			    if($status=="Block")
			    {
			        $arr=array("status"=>"Unblock");
    				$res=$this->update_where('user',$arr,$where);
    				echo json_encode(array("status" => true));	
				}
				else
				{
				    $arr=array("status"=>"Block");
    				$res=$this->update_where('user',$arr,$where);
    				echo json_encode(array("status" => true));	
				}
				
			break;
			
			
			// admin work
			
			case '/admin_login':	
	            
	            $email = $_POST['email'];
	            $password = $_POST['password'];
				$where=array("email"=>$email,"password"=>$password);
				
				$res=$this->select_where('admin',$where);
				$chk=$res->num_rows; // 0 means false & 1 means true  check row wise condition
				if($chk==1)
				{
					
					$data=$res->fetch_object(); // single data fetch 
					
					if($data->status=="Unblock")
					{
					    
					    echo json_encode($data);
					}
					else
					{
						echo json_encode(array("message" => "Login Failed due Blocked Account", "status" => false));
					}
				}
				else
				{
					echo json_encode(array("message" => "Login Failed due wrong credential", "status" => false));
				}
		
			break;
			
			default:
				
			break;	
		}
	}
}


$obj=new control;

?>