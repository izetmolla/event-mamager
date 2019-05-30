<?php
adminRequireLogin($logedUser['type']);
get_header(); 

if(isset($_POST['updateTitle'])){
    updateSettings('website_title',$_POST['website_title']);
}elseif(isset($_POST['updateValue'])){
    updateSettings('website_valute',$_POST['website_valute']);
}elseif(isset($_POST['updatehome_opt_message'])){
    updateSettings('home_opt_message',$_POST['home_opt_message']);
}elseif(isset($_POST['updateAddress'])){
    updateSettings('website_opt_address',$_POST['website_opt_address']);
}elseif(isset($_POST['updateEmail'])){
    updateSettings('website_opt_email',$_POST['website_opt_email']);
}elseif(isset($_POST['updateMap'])){
    updateSettings('google_map_url',$_POST['google_map_url']);
}
?>
  <main id="main" style="margin-top:25px;">
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Website Settings</h3>
        </div>

        <div class="row wow fadeInUp text-center">
          <div class="col-2"></div>
          <div class="col-lg-8">
            <div class="form">
              <form action="<?php echo get_fullurl(); ?>" method="post" class="contactForm">
                <div class="form-group row">
                    <div class="col-3"><b>Website Title:</b></div>
                    <div class="col-6"><input type="text" class="form-control" placeholder="Title" name="website_title" value="<?php echo getoptvalue('website_title'); ?>"></div>
                    <div class="col-3"><button type="submit" name="updateTitle" title="Save">Update</button></div>
                </div>
                  <div class="form-group row">
                    <div class="col-3"><b>Paymenth Value:</b></div>
                    <div class="col-6"><input type="text" class="form-control" placeholder="USD" name="website_valute" value="<?php echo getoptvalue('website_valute'); ?>"></div>
                    <div class="col-3"><button type="submit" name="updateValue" title="Save">Update</button></div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-2"></div>
        </div>
      </div>
    </section><!-- #contact -->
      
      
      
      
      

      
    <section id="services" class="section-bg">
      <div class="container">
        <header class="section-header">
          <h3>Home Page Settings</h3>
        </header>
          <div class="col-2"></div>
          <div class="col-8">
            <div class="form">
              <form action="<?php echo get_fullurl(); ?>" method="post" class="contactForm">
                  <div class="form-group row">
                    <div class="col-3"><b>Paymenth Value:</b></div>
                      <div class="col-9">
                          <textarea rows="5" class="form-control" name="home_opt_message"><?php echo getoptvalue('home_opt_message'); ?></textarea>
                      </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-2"><button class="btn btn-primary" type="submit" name="updatehome_opt_message" title="Save">Update</button></div>
      </div>
    </section><!-- #services -->
      
      
      
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Form Settings</h3>
        </div>


        <div class="row wow fadeInUp text-center">
          <div class="col-2"></div>
          <div class="col-lg-8">
            <div class="form">
              <form action="<?php echo get_fullurl(); ?>" method="post" class="contactForm">
                <div class="form-group row">
                    <div class="col-3"><b>Address:</b></div>
                    <div class="col-6"><input type="text" class="form-control" placeholder="Address" name="website_opt_address" value="<?php echo getoptvalue('website_opt_address'); ?>"></div>
                    <div class="col-3"><button type="submit" name="updateAddress" title="Save">Update</button></div>
                </div>
                <div class="form-group row">
                    <div class="col-3"><b>Email:</b></div>
                    <div class="col-6"><input type="email" class="form-control" placeholder="Email" name="website_opt_email" value="<?php echo getoptvalue('website_opt_email'); ?>"></div>
                    <div class="col-3"><button type="submit" name="updateEmail" title="Save">Update</button></div>
                </div>
                  <div class="form-group row">
                    <div class="col-3"><b>Map:</b></div>
                    <div class="col-6"><input type="text" class="form-control" placeholder="USD" name="google_map_url" value="<?php echo getoptvalue('google_map_url'); ?>"></div>
                    <div class="col-3"><button type="submit" name="updateMap" title="Save">Update</button></div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-2"></div>
        </div>
      </div>
    </section><!-- #contact -->
      
      
      
      
      
      

  </main>
<?php get_footer(); ?>