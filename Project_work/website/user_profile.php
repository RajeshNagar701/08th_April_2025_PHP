<?php
  
	include_once('header.php');
	if(isset($_SESSION['u_id']))
	{
		
	}
	else
	{
		echo "<script>
			window.location='index';
		</script>";
	}	
	
  ?>
  
  

  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h4>My Account</h4>
            <h1>Edit Profile</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="get-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="assets/images/customers/<?php echo $fetch->image?>" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h6>Edit info</h6>
            <h4>Hi ..<em><?php echo $_SESSION['u_name'];?></em></h4>
            <p>Id : <?php echo $fetch->id?></p>
			<p>Name : <?php echo $fetch->name?></p>
			<p>Email : <?php echo $fetch->email?></p> 
			<p>Mobile : <?php echo $fetch->mobile?></p> 
			<p>Launguges : <?php echo $fetch->lag?></p> 
			<p>Gender : <?php echo $fetch->gender?></p> 
			
			<a href="edit_profile?edit_customer=<?php echo $fetch->id?>" class="btn btn-primary mt-5">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  <?php
  include_once('footer.php');
  ?>