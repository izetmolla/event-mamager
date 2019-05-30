<?php get_header();


if(isset($_POST['sendSms'])){
    
  
    echo '<br>123';
    
    insertMessage($_POST['email'],$_POST['subject'],$_POST['name'],$_POST['message'],'unread',get_fullurl());
}
?>
  <main id="main">

      
      
      
      <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="/assets/img/intro-img.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2><?php echo getoptvalue('home_opt_message'); ?></h2>
        <div>
          <a href="/book.php" class="btn-get-started scrollto">Book An Event Now</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
              <iframe src="<?php echo getoptvalue('google_map_url'); ?>" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p><?php echo getoptvalue('website_opt_address'); ?></p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p><?php echo getoptvalue('website_opt_email'); ?></p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p><?php echo getoptvalue('website_opt_phone'); ?></p>
              </div>
            </div>

            <div class="form">
              <form method="POST" action="<?php echo get_fullurl(); ?>" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" name="sendSms" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->


  </main>
<?php get_footer(); ?>