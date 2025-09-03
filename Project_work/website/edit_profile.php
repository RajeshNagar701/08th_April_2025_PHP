<?php
if(isset($_SESSION['u_id']))
{
 
}
else
{
	 echo "<script>
		  window.location='index';
	  </script>";
}
include_once('header.php');

?>

<section class="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="header-text">
          <h4>Edit Profile</h4>
          <h1>Edit Profile</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="contact-us" id="contact-section">
  <div class="container">
    <div class="row">

      <div class="offset-md-2 col-lg-8 mb-5">
        <form  method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h4>Edit <em>Profile</em></h4>
              </div>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="name" value="<?php echo $fetch->name;?>" name="name" class="form-control mb-3" id="name" placeholder="Full Name" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="emai;" value="<?php echo $fetch->email;?>" name="email" class="form-control mb-3" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
              </fieldset>
            </div>
         
            <div class="col-lg-12">
              <fieldset>
                <input type="number" value="<?php echo $fetch->mobile;?>" name="mobile" class="form-control mb-3" placeholder="Enter mobile Number" required="">
              </fieldset>
            </div>

            <div class="col-lg-12 mb-3">
              <fieldset>
                Laungages : <br>
				<?php 
				$lag=$fetch->lag;
				$lag_arr=explode(",",$lag); // strig to arr
				?>
                Hindi: <input type="checkbox" name="lag[]" value="Hindi"  <?php
				if(in_array('Hindi',$lag_arr))
				{
					echo "checked";
				}
				?>>
                English: <input type="checkbox" name="lag[]" value="English" <?php
				if(in_array('English',$lag_arr))
				{
					echo "checked";
				}
				?>>
                Gujarati: <input type="checkbox" name="lag[]" value="Gujarati" <?php
				if(in_array('Gujarati',$lag_arr))
				{
					echo "checked";
				}
				?>>
              </fieldset>
            </div>

            <div class="col-lg-12 mb-3">
              <fieldset>
               Gender : <br>
			   <?php 
				$gender=$fetch->gender;
				?>
               Male : <input type="radio" name="gender" value="Male" <?php
				if($gender=="Male")
				{
					echo "checked";
				}
				?>>
               Female : <input type="radio" name="gender" value="Female" <?php
				if($gender=="Female")
				{
					echo "checked";
				}
				?>>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="file" name="image" class="form-control mb-3"  >
				<img src="assets/images/customers/<?php echo $fetch->image?>" style="width:50px" alt="">
              </fieldset>
            </div>
            <div class="col-lg-6 mt-5">
              <fieldset>
                <button type="submit" name="save" class="btn btn-danger">Save</button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>



<?php
include_once('footer.php');
?>