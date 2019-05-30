<?php
adminRequireLogin($logedUser['type']);
get_header(); 


if(isset($_POST['insertEvent'])){
    if(isset($_POST['imgUpload'])){
         $bannerpath="uploads/";
        move_uploaded_file($_FILES["banner"]["tmp_name"],$bannerpath);
    }
     insertEvent($_POST['event_title'],$_POST['event_capacity'],$_POST['event_description'],$_GET['editevent']);
}
?>
  <main id="main">
    <section id="services" class="section-bg" style="margin-top:25px">
      <div class="container">
          <div class="section-header">
          <h3>Add New Event</h3>
          </div>
          
        <form action="<?php echo get_fullurl(); ?>" method="post" class="contactForm">
          <div class="row">
            <div class="col-12">
                <div class="form">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="form-group">
                              <input type="text" class="form-control" name="event_title" placeholder="Event Title" required>
                            </div>
                            <div class="form-row">
                              <div class="col-3 pt-2 text-right"><b>Capacity: </b></div>
                              <div class="form-group col-lg-6">
                                  <input type="number" class="form-control" name="event_capacity" placeholder="Enter Capacity" required>
                              </div>
                              <div class="col-3 pt-2 text-left"><b>Persons</b></div>
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" name="event_description" rows="5" placeholder="Event Description"></textarea>
                              <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit" name="insertEvent" class="btn btn-primary">Add Event</button></div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
<?php get_footer(); ?>