<?php
adminRequireLogin($logedUser['type']);
get_header(); 

if(isset($_POST['deleteFeedback'])){
    deleteOpt('feedbacks','id',$_POST['deleteFeedback'],'administrator/feedbacks');
}

?>
  <main id="main">
    <section id="services" class="section-bg" style="margin-top:25px">
      <div class="container">
          <div class="section-header">
          <h3>Feedbacks</h3>
          </div>    
    <form method="post" action="<?php echo get_fullurl(); ?>">
        <table class="table table-bordered bg-white">
          <thead>
            <tr>
              <th scope="col-1" style="width:5%">#</th>
              <th scope="col" style="width:10%">User</th>
              <th scope="col" style="width:70%;text-align:center;">Message</th>
              <th scope="col text-center" style="width:5%;text-align:center;">Option</th>
            </tr>
          </thead>
          <tbody>
        <?php $feedbacks = getFeedbackList();
              if(!$feedbacks){echo '<tr><td colspan="4" style="text-align:center;"><h1>No Feedback Found</h1></td></tr>';}else{
              foreach($feedbacks as $feedback): ?>
            <tr class="feedback-list">
              <th scope="row"><?php echo $feedback['id']; ?></th>
              <td style="text-align:center;"><?php echo displayOpt('users','id',$feedback['feedback_user'],'username'); ?></td>
              <td style="text-align:center;"><?php echo $feedback['feedback_message']; ?></td>
              <td><button type="submit" class="btn btn-danger" name="deleteFeedback" value="<?php echo $feedback['id']; ?>">Delete</button></td>
            </tr>
        <?php endforeach; }?>
          </tbody>
        </table>
    </form>
      </div>
    </section>
  </main>
<?php get_footer(); ?>