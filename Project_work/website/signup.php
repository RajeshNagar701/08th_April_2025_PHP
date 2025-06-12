<?php
  
	include_once('header.php');
	
  ?>

  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h4>Say Hello EduWell</h4>
            <h1>Signup Us</h1>
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
                  <h4>Signup <em>Here</em></h4>
                </div>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Full Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
			  <div class="col-lg-6">
				<a href="login.php">If you already registered then Login Here</a>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-gradient-button">Signup</button>
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