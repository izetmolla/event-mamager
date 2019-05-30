<?php
    $book = getOptSingle('bookings','id',$_GET['BookID']);
    $event = getOptSingle('events','id',$book['book_event_id']);
$message = '';
if(isset($_POST['bookNow'])){
    
    if($_POST['eventCapacity'] > $event['event_capacity']){
        $message = '<h3 style="font-size:20px;background-color:red;color:white;padding:5px;">Max Of persons in this event is '.$event['event_capacity'].' persons.</h3>';
    }elseif(isset($date)){
        $message = '<h3 style="font-size:20px;background-color:red;color:white;padding:5px;">This date is not avaible for your event. Select another Day.</h3>';
    }else{
        
        
    $values=$_POST['productt'];  
    $value="";  
    foreach($values as $value1){ $value += $value1;} 
     getBookNow($_GET['BookID'],$_POST['eventCapacity'],$_POST['eventDate'],$value*$_POST['eventCapacity']);
    
    }  
}
?>
<header class="section-header pt-5">
          <h3 style="font-size:50px;"><?php echo $event['event_name']; ?></h3>
        </header>
        <form method="POST" action="<?php echo get_fullurl(); ?>">
            
            
            
            <div class="row p-5" style="text-align:center;background-color:#fff;border-radius:30px;">
                <div class="col-12" style="text-align:center">
                 <?php echo $message; ?>   
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <span style="font-weight:bold">Capacity: </span>
            <input type="number" name="eventCapacity" class="form-control" value="<?php echo $book['book_event_capacity']; ?>" required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <span style="font-weight:bold">Data </span>
            <input type="date" name="eventDate" class="form-control" value="<?php echo $book['book_event_date']; ?>" required>
        </div>
    </div>
</div>
<hr>
                    
                    <ul>
                        <?php $products = getProductsList('product_event_id',$event['id'],'product'); 
                            if(!$products){echo '<h1>No Products for this Event';}else{ 
                                foreach($products as $product): ?>
                        
                        
                        
                        
                        
                        
                        <li style="text-align:left;">
                            <h2><?php echo $product['product_name']; ?></h2>
<div class="row col-10 text-left">
    <div class="col-4 text-center">
        <b>Select Product Package:</b>
    </div>
    <div class="col- text-left">
        <select  class="form-control" name="productt[]" required="" required>
            <option value="">--- Select Package ---</option> 
        <?php $packages = getProductsList('product_package_id',$product['id'],'product_package'); foreach($packages as $package): ?>
            <option value="<?php echo $package['product_package_price']; ?>"><?php echo $package['product_name']; ?> (<?php echo $package['product_package_price']; ?>$)</option>
        <?php endforeach; ?>                 
        </select>
    </div>
</div>
 
                        </li>
                        <?php  endforeach; } ?>
                    </ul>
                  </div>
                <div class="col-12 text-center"> 
                    <button type="submit" name="bookNow" class="btn btn-lg btn-primary">Book Now</button>
                </div>
              </div>
         </form>
          
          
          
          