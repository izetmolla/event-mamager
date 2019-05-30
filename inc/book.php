<?php 
        session_start();
        require_once('main-functions.php');
userRequireLogin();
get_header(); 
?>
    <section id="services" class="section-bg">
      <div class="container">
        <?php
          if(isset($_GET['eventID'])){
                include('theme/booking/add-capacity-date.php');
          }elseif(isset($_GET['BookID'])){
                include('theme/booking/booking-products.php');
          }else{ ?> 
        <header class="section-header pt-5">
          <h3 style="font-size:50px;">Select Event to Book</h3>
        </header>
      <div class="row" style="text-align:center;">
          <div class="col-3"></div>
          <div class="col-6">
            <form action="<?php echo get_fullurl(); ?>" method="GET">
                    <select name="eventID" onchange="this.form.submit()" class="form-control">
                            <option>-- SELECT--</option>
                       <?php $events = getBookingEventList(); foreach($events as $event): ?>
                            <option value="<?php echo $event['id']; ?>"><?php echo $event['event_name']; ?></option>
                        <?php endforeach; ?>
                        <?php  ?>
                    </select>
             </form>
          </div>
          <div class="col-3"></div> 
        </div>
          <?php } ?>
      </div>
    </section><!-- #services -->
<?php get_footer(); ?>