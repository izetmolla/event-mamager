<?php
adminRequireLogin($logedUser['type']);
get_header(); 

if(isset($_POST['deleteMessage'])){
    deleteOpt('messages','id',$_POST['deleteMessage'],'administrator/messages');
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
              <th scope="col">Subject</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col" style="width:70%;text-align:center;">Message</th>
              <th scope="col text-center" style="width:5%;text-align:center;">Option</th>
            </tr>
          </thead>
          <tbody>
        <?php $messages = getMessageList();
              if(!$messages){echo '<tr><td colspan="6" style="text-align:center;"><h1>No Messages Found</h1></td></tr>';}else{
              foreach($messages as $message): ?>
            <tr class="feedback-list">
              <th scope="row"><?php echo $message['id']; ?></th>
              <td style="text-align:center;"><?php echo $message['message_subject']; ?></td>
              <td style="text-align:center;"><?php echo $message['message_name']; ?></td>
              <td style="text-align:center;"><?php echo $message['message_email']; ?></td>
              <td style="text-align:center;"><?php echo $message['message']; ?></td>
              <td><button type="submit" class="btn btn-danger" name="deleteMessage" value="<?php echo $message['id']; ?>">Delete</button></td>
            </tr>
        <?php endforeach; }?>
          </tbody>
        </table>
    </form>
      </div>
    </section>
  </main>
<?php get_footer(); ?>