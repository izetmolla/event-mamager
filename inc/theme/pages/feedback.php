<?php
userRequireLogin($logedUser['type']);
get_header();

if(isset($_POST['submitFeedback'])){
    insertFeedback($_POST['feedback_message']);
}

?>
  <main id="main" style="margin-top:25px;">
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Send Feedback To us</h3>
        </div>

        <div class="row wow fadeInUp text-center">
          <div class="col-2"></div>
          <div class="col-lg-8">
            <div class="form">
              <form action="<?php echo get_fullurl(); ?>" method="post" class="contactForm">
                <div class="form-group">
                  <textarea class="form-control" name="feedback_message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" name="submitFeedback" title="Send Message">Send Feedback</button></div>
              </form>
            </div>
          </div>
          <div class="col-2"></div>
        </div>

      </div>
    </section><!-- #contact -->
  </main>
<?php get_footer(); ?>