<?php
adminRequireLogin($logedUser['type']);
get_header(); 

if(isset($_POST['deleteEvent'])){
    deleteOpt('events','id',$_POST['deleteEvent'],'administrator/events');
}

?>
  <main id="main">
    <section id="services" class="section-bg" style="margin-top:25px">
      <div class="container">
          <div class="section-header">
          <h3>Events</h3>
          </div>  
    <div class="col-12 text-right p-2"><a href="/administrator/new-event/" type="button" class="btn btn-dark">Add New EVENT</a></div>
    <form method="post" action="<?php echo get_fullurl(); ?>">
        <table class="table table-bordered bg-white">
          <thead>
            <tr>
              <th scope="col-1" style="width:5%">ID</th>
              <th scope="col" style="width:55px;height:55px;text-align:center;">Image</th>
              <th scope="col" style="width:20%;text-align:center;">Name</th>
              <th scope="col-1" style="width:5%">Capacity</th>
              <th scope="col" style="">Event Products</th>
              <th scope="col" style="">Option</th>
            </tr>
          </thead>
          <tbody>
        <?php $events = displayOptList('events');
              if(!$events){echo '<tr><td colspan="6" style="text-align:center;"><h1>No Event Found</h1></td></tr>';}else{
              foreach($events as $event): ?>
            <tr class="events-list">
              <th scope="row"><?php echo $event['id']; ?></th>
              <td style="text-align:center;"><img style="max-width:50px;max-heigh:50px;height:50px;width:50px;" src="<?php if(!$event['event_image']){echo '/assets/img/no-image.jpg';}else{echo '/inc/theme/uploads/'.$event['event_image'];} ?>"></td>
              <td style="text-align:center;"><?php echo $event['event_name']; ?></td>
              <td style="text-align:center;"><?php echo $event['event_capacity']; ?></td>
              <td style="text-align:center;"></td>
              <td>
                  <a href="/administrator/edit-event/<?php echo $event['id']; ?>/" class="btn btn-secondary">Edit</a>
                  <button type="submit" class="btn btn-danger" name="deleteEvent" value="<?php echo $event['id']; ?>">Del</button>
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