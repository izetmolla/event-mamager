<?php
userRequireLogin($logedUser['type']);
get_header(); ?>

  <main id="main">
    <section id="services" class="section-bg" style="margin-top:25px">
      <div class="container">
          <div class="section-header">
          <h3>My Bookings</h3>
          </div>  
    <div class="col-12 text-right p-2"><a href="/book.php" type="button" class="btn btn-dark">Book New EVENT</a></div>
    <form method="post" action="<?php echo get_fullurl(); ?>">
        <table class="table table-bordered bg-white">
          <thead>
            <tr>
              <th scope="col-1" style="width:5%">ID</th>
              <th scope="col" style="text-align:center;">Event Name</th>
              <th scope="col-1" style="width:5%">Capacity</th>
              <th scope="col" style="">Date</th>
              <th scope="col" style="">Products</th>
              <th scope="col" style="">Total Price</th>
              <th scope="col" style="text-align:center;">Status</th>
              <th scope="col" style="text-align:center">Actions</th>
            </tr>
          </thead>
          <tbody>
        <?php $bookings = getMyBookingsList($_SESSION['id']);
              if(!$bookings){echo '<tr><td colspan="8" style="text-align:center;"><h1>No Booked Event Found</h1></td></tr>';}else{
              foreach($bookings as $book): ?>
            <tr class="events-list">
              <th scope="row"><?php echo $book['id']; ?></th>
              <td><?php echo displayOpt('events','id',$book['book_event_id'],'event_name'); ?></td>
              <td class="text-center"><?php echo $book['book_event_capacity']; ?></td>
              <td class="text-center"><?php echo $book['book_event_date']; ?></td>
              <td>
                 <?php $products = getProductsList('product_event_id',$book['book_event_id'],'product'); foreach($products as $product): ?> 
                        <?php echo $product['product_name']; ?>,
                 <?php endforeach; ?>
              </td>
              <td class="text-center"><?php echo $book['book_prices'].' '.getoptvalue('website_valute'); ?></td>
              <td class="text-center">
                  <?php if($book['book_status'] == 'aproved'){
                        echo '<b style="background-color:green;padding:5px;color:white;">APROVED</b><b> => <a target="_blank" href="/pay.php?BookID='.$book['id'].'" class="btn btn-dark btn-sm">Pay</a></b>';
                    }elseif($book['book_status'] == 'disaproved'){
                        echo '<b style="background-color:red;padding:5px;">DISAPROVED</b>';
                    }elseif($book['book_status'] == 'pending'){
                        echo '<b style="background-color:yellow;padding:5px;">PENDING</b>';
                    }elseif($book['book_status'] == 'paid'){
                        echo '<b style="background-color:green;padding:5px;">PAID</b>';
                    } ?>
               </td>
                <td class="text-center">
                <div class="row">
                    <div class="col-6"><a target="_blank" href="/invoice.php?BookID=<?php echo $book['id']; ?>" class="btn btn-primary btn-sm">Invoice</a></div>
                    <div class="col-6"><a href="/book.php?BookID=<?php echo $book['id']; ?>" class="btn btn-secondary btn-sm">Edit</a></div>
                </div>
                    
                </td>
              
            </tr>
        <?php endforeach; }?>
          </tbody>
        </table>
    </form>
      </div>
    </section>
  </main>
<?php get_footer(); ?>