<?php
        $event = getOptSingle('events','id',$_GET['eventID']); 

$message = '';
if(isset($_POST['insertBooking'])){
    $date = getOptSingle('bookings','book_event_date',$_POST['eventDate']);
    if($_POST['eventCapacity'] > $event['event_capacity']){
        $message = '<h3 style="font-size:20px;background-color:red;color:white;padding:5px;">Max Of persons in this event is '.$event['event_capacity'].' persons.</h3>';
    }elseif(isset($date)){
        $message = '<h3 style="font-size:20px;background-color:red;color:white;padding:5px;">This date is not avaible for your event. Select another Day.</h3>';
    }else{
        insertBooking($_SESSION['id'],$_POST['eventCapacity'],$_POST['eventDate'],$_POST['eventID']);
    }
}
?>
<header class="section-header pt-5">
          <h3 style="font-size:50px;"><?php echo $event['event_name']; ?>
          <?php echo $message; ?></h3>
          </header>
          <div class="row" style="text-align:center;">
            <div class="col-4" style="vertical-align:middle;text-align:center;">
                <img src="<?php if(!$event['event_image']){echo '/assets/img/no-image.jpg';}else{echo '/inc/theme/uploads/'.$event['event_image'];} ?>" style="width:100%;max-width:400px;min-width:250px;">  
            </div>
            <div class="col-8">
                <form method="POST" action="<?php echo get_fullurl(); ?>">
                    <input type="number" name="eventID" value="<?php echo $_GET['eventID']; ?>" hidden style="display:none;">
                    <div class="row">
                        <div class="col-6">
                            <b>Capacity: </b>
                        </div>
                        <div class="col-6">
                              <div class="form-group">
                                <input type="number" name="eventCapacity" class="form-control" placeholder="MAX <?php echo $event['event_capacity']; ?> Persons" required>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <b>Enter Date: </b>
                        </div>
                        <div class="col-6">
                              <div class="form-group">
                                <input type="date" name="eventDate" class="form-control" required>
                              </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="insertBooking" class="btn btn-primary btn-lg">Next Step</button>
                    </div>
                </form>
              </div>
          </div>
          