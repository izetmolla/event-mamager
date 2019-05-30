<?php 
        session_start();
        require_once('main-functions.php');
userRequireLogin();
get_header(); 


    $book = getOptSingle('bookings','id',$_GET['BookID']);

$message = '';
if(isset($_POST['paynow'])){
    if($_POST['ccnr'] == '4242424242424242'){
        updateOpt('bookings','book_status','paid',$book['id'],'my-bookings');
    }else{
        $message = "<b style='color:red'>Credit Card Not Work</b>";
    }
}
?>


  <main id="main">
    <section id="services" class="section-bg" style="margin-top:25px">
      <div class="container">
          <div class="section-header">
          <h3>Pay Now</h3>
          </div>  
          
    <form method="post" action="<?php echo get_fullurl(); ?>">
       <div class="row">
            <div class="col-4"></div>
            <div class="col-4" style="border:1px solid black;border-radius:20px;padding:25px;">
                
                <div class="form-group text-center;">PRICE: <?php echo $book['book_prices']; ?></div>
                
                <div class="form-group text-center;"><?php echo $message; ?></div>
                
                <div class="form-group"><input class="form-control" type="text" placeholder="Credit card Number" name="ccnr" required></div>
                <div class="row">
                    <div class="col-8"><input class="form-control" type="date" placeholder="Date" name="date" required></div>
                    <div class="col-4"><input class="form-control" type="number" maxlength="3" placeholder="CVC" name="cvc" required></div>
                </div>
                <br>
                <div class="form-input text-center"><button type="submit" class="btn btn-primary" name="paynow">Pay Now</button></div>
           
            </div>
            <div class="col-4"></div>
        
       </div>
        
    </form>
      </div>
    </section>
  </main>
<?php get_footer(); ?>