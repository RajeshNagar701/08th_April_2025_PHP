<?php

include_once('header.php');

?>

<section class="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="header-text">
          <h4>Say Hello EduWell</h4>
          <h1>Login Us</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="contact-us" id="contact-section">
  <div class="container">
    <div class="row">

      <div class="offset-md-2 col-lg-8 mb-5">
        <form id="contact" action="" method="post">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h4>Login <em>Here</em></h4>
              </div>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="password" name="password" id="password" placeholder="Enter Password" autocomplete="on" required>
              </fieldset>
            </div>

            <div class="col-lg-6">
              <a href="signup">If you already Not registered then Signup Here</a>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <button type="submit" name="submit" id="form-submit" class="main-gradient-button">Login</button>
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