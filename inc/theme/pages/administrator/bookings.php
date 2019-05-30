<?php
adminRequireLogin($logedUser['type']);
get_header(); 

if(isset($_POST['deleteBook'])){
    deleteOpt('bookings','id',$_POST['deleteBook'],'administrator/bookings');
}
if(isset($_POST['aproveBook'])){
    updateOpt('bookings','book_status','aproved',$_POST['aproveBook'],'administrator/bookings');
}
if(isset($_POST['disaproveBook'])){
    updateOpt('bookings','book_status','disaproved',$_POST['disaproveBook'],'administrator/bookings');
}
?>
  <main id="main">
    <section id="services" class="section-bg" style="margin-top:25px">
      <div class="container">
          <div class="section-header">
          <h3>Admin Bookings Manager</h3>
          </div>  
    
    <form method="post" action="<?php echo get_fullurl(); ?>">
        <table class="table table-bordered bg-white">
          <thead>
            <tr>
              <th scope="col-1" style="width:5%">ID</th>
              <th scope="col" style="">User</th>
              <th scope="col" style="text-align:center;">Event Name</th>
              <th scope="col-1" style="width:5%">Capacity</th>
              <th scope="col" style="">Date</th>
              <th scope="col" style="">Products</th>
              <th scope="col" style="">Total Price</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
        <?php $bookings = getBookingsList();
              if(!$bookings){echo '<tr><td colspan="8" style="text-align:center;"><h1>No Booked Event Found</h1></td></tr>';}else{
              foreach($bookings as $book): ?>
            <tr class="events-list">
              <th scope="row"><?php echo $book['id']; ?></th>
              <td><?php echo displayOpt('users','id',$book['book_user_id'],'username'); ?></td>
              <td><?php echo displayOpt('events','id',$book['book_event_id'],'event_name'); ?></td>
              <td class="text-center"><?php echo $book['book_event_capacity']; ?></td>
              <td class="text-center"><?php echo $book['book_event_date']; ?></td>
              <td>
                 <?php $products = getProductsList('product_event_id',$book['book_event_id'],'product'); foreach($products as $product): ?> 
                        <?php echo $product['product_name']; ?>,
                 <?php endforeach; ?>
              </td>
              <td class="text-center"><?php echo $book['book_prices'].' '.getoptvalue('website_valute'); ?></td>
              <td class="text-center" style="background-color:#aaafb3">
                  <?php if($book['book_status'] == 'aproved'){
                        echo '<b style="color:green;">APROVED</b>';
                    }elseif($book['book_status'] == 'disaproved'){
                        echo '<b style="color:red;">DISAPROVED</b>';
                    }elseif($book['book_status'] == 'pending'){
                        echo '<b style="color:yellow;">PENDING</b>';
                    }elseif($book['book_status'] == 'paid'){
                        echo '<b style="color:green;">Paid</b>';
                    } ?>
                </td>
                <td class="text-center" style="vertical-align : middle">
                    <form method="post" action="<?php echo get_fullurl(); ?>">
                    <div  class="row">
                    <div class="col-6">
                    <?php if($book['book_status'] == 'pending'){
                        echo '<button type="submit" name="aproveBook" value="'. $book['id'].'" class="btn btn-success btn-sm">Aprove</button>';
                    }elseif($book['book_status'] == 'aproved'){
                        echo '<button type="submit" name="disaproveBook" value="'.$book['id'].'" class="btn btn-danger btn-sm">Disaprove</button>';
                    }elseif($book['book_status'] == 'disaproved'){
                        echo '<button type="submit" name="aproveBook" value="'.$book['id'].'" class="btn btn-success btn-sm">Aprove</button>';
                    }elseif($book['book_status'] == 'paid'){
                        echo '<a target="_blank" href="/invoice.php?BookID='.$book['id'].'" class="btn btn-primary btn-sm">Invoice</a>';
                    }
                        ?></div>
                        <div class="col-6">
                            <button type="submit" name="deleteBook" value="<?php echo $book['id']; ?>" class="btn btn-dark btn-sm">Del</button>
                        </div>
                        </div>
                    </form>
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