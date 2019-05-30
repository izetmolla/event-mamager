<?php
adminRequireLogin($logedUser['type']);
get_header(); 


if(isset($_POST['updateEvent'])){
     updateEvent($_POST['event_title'],$_POST['event_capacity'],$_POST['event_description'],$_GET['editevent']);
}
if(isset($_POST['uploadImg'])){
     uploadImage($_GET['editevent'],'administrator/edit-event');
}
if(isset($_POST['insert_product'])){
    insertProduct($_POST['product_name'],$events['id']);
}
if(isset($_POST['insert_package'])){
    insertPackage($_POST['product_package_name'],$_POST['product_package_price'],$_POST['insert_package'],'administrator/edit-event/'.$events['id']);
}
if(isset($_POST['deleteProduct'])){
    $id = $events['id'];
     deleteOpt('products','id',$_POST['deleteProduct'],'administrator/edit-event/'.$events['id']);
}
if(isset($_POST['deletePackage'])){
    $id = $events['id'];
     deleteOpt('products','id',$_POST['deletePackage'],'administrator/edit-event/'.$events['id']);
}

?>
  <main id="main">
    <section id="services" class="section-bg" style="margin-top:25px">
      <div class="container">
          <div class="section-header">
          <h3>Edit Event</h3>
          </div>    
          <div class="row">
            <div class="col-8">
                <div class="form">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                          <form action="<?php echo get_fullurl(); ?>" method="post" class="contactForm">
                            <div class="form-group">
                              <input type="text" class="form-control" name="event_title" placeholder="Event Title" value="<?php echo $events['event_name']; ?>" required>
                            </div>
                            <div class="form-row">
                              <div class="col-3 pt-2 text-right"><b>Capacity: </b></div>
                              <div class="form-group col-lg-6">
                                  <input type="number" class="form-control" name="event_capacity" placeholder="Enter Capacity" value="<?php echo $events['event_capacity']; ?>" required>
                              </div>
                              <div class="col-3 pt-2 text-left"><b>Persons</b></div>
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" name="event_description" rows="5" placeholder="Event Description"><?php echo $events['event_description']; ?></textarea>
                              <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit" name="updateEvent" class="btn btn-primary">Update Event</button></div>
                          </form>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                
                
                
                
              
            </div>
            <div class="col-4 row">
                <form method="POST" action="<?php echo get_fullurl(); ?>" enctype="multipart/form-data">
                    <div class="col-12 text-center pb-2">
                        <input type="file" name="myfile" id="fileToUpload">
                    </div>
                    <div class="col-12 text-center">
                        <img src="<?php if(!$events['event_image']){echo '/assets/img/no-image.jpg';}else{echo '/inc/theme/uploads/'.$events['event_image'];} ?>" style="width:250px;height:250px;max-width:250px;max-height:250px;min-width:250px;">
                    </div>
                    <div class="col-12 text-center pt-2">
                        <input class="btn btn-primary" type="submit" name="uploadImg" value="Upload Image" >
                    </div>
                </form>
            </div>
          
          
          </div>
          
          
          
      </div>
    </section>
    <section id="team">
      <div class="container">
        <div class="section-header">
            <h3>Add Products</h3>
        </div>
        <section class="section-bg p-2" style="border-radius:30px;">
            <div class="container p-3">
                <form method="POST" action="<?php echo get_fullurl(); ?>">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-4"><input class="form-control" type="text" name="product_name" placeholder="Product Name" required></div>
                        <div class="col-2"><button type="submit" name="insert_product" class="btn btn-primary">Create Product</button></div>
                        <div class="col-3"></div>
                    </div>
                </form>
            
            </div>
          </section>
      </div>
    </section>
    <section class="section-bg pt-5 pb-5">
        <div class="container">
                <table class="table table-bordered bg-white">
                  <thead>
                    <tr>
                      <th scope="col-1" style="width:5%">ID</th>
                      <th scope="col" style=" width:25%">Product Name</th>
                      <th scope="col" style="">Product Packages</th>
                      <th scope="col" style="">Option</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php $products = getProductsList('product_event_id',$events['id'],'product');
              if(!$products){echo '<tr><td colspan="5" style="text-align:center;"><h1>No Products Found</h1></td></tr>';}else{
              foreach($products as $product): ?>
            <tr class="events-list">
              <th scope="row" style="vertical-align : middle;"><?php echo $product['id']; ?></th>
              <td style="text-align:center;vertical-align : middle;">
                  <?php echo $product['product_name']; ?>
                  
                  <form method="post" action="<?php echo get_fullurl(); ?>">
                      <div class="row p-2">
                        <div class="col-7 text-center">
                          <input class="form-control" type="text" name="product_package_name" placeholder=" Name" required>
                        </div>
                        <div class="col-5 text-center">
                          <input class="form-control" type="number" name="product_package_price" placeholder="Price" required>
                        </div>
                        <div class="col-12 m-2">
                          <button type="submit" name="insert_package" class="btn btn-primary" value="<?php echo $product['id']; ?>">Add Package</button>
                        </div>
                      </div>
                  </form>
                  
                
                </td>
              <td style="vertical-align : middle;">
                  
                  
                  
                  
        <table class="table table-striped">
           <thead>
            <tr>
              <th scope="col" style="width:50%;text-align:center;">Package Name</th>
              <th scope="col-2" style="width:20%;text-align:center;">Price</th>
              <th scope="col-1" style="width:10%;"></th>
            </tr>
          </thead>
          <tbody>
                  <?php $packages = getProductsList('product_package_id',$product['id'],'product_package');
                   if(!$packages){echo '<td class="text-center" colspan="3">No Package Found</td>';}else{
                   foreach($packages as $package): ?>
                    <tr>
                        <td><?php echo $package['product_name']; ?></td>
                        <td style="text-align:center;"><?php echo $package['product_package_price']; ?></td>
                        <td>
                         <form method="post" action="<?php echo get_fullurl(); ?>">
                            <button type="submit" class="btn btn-danger btn-sm" name="deletePackage" value="<?php echo $package['id']; ?>">Delete</button>
                        </form>
                        </td>
                    </tr>
                  <?php endforeach; }?>
          </tbody>
        </table>
                </td>
              <td style="text-align:center;vertical-align:middle;width:10%">
                  <form method="post" action="<?php echo get_fullurl(); ?>">
                        <button type="submit" class="btn btn-danger" name="deleteProduct" value="<?php echo $product['id']; ?>">Delete</button>
                  </form>
                </td>
            </tr>
        <?php endforeach; }?>
                  </tbody>
                </table>
            
        </div>
    </section>
  </main>
<?php get_footer(); ?>