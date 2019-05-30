<nav class="main-nav float-right d-none d-lg-block">
    <ul>     
<?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ ?>
          <li <?php getActiveMenu('login'); ?>><a href="/login/">Login</a></li>   
          <li <?php getActiveMenu('register'); ?>><a href="/register/">Register</a></li>   
<?php }elseif($logedUser['type'] == 'administrator'){ ?> 
          <li <?php getActiveMenu('login'); ?>><a href="/">Home</a></li>
          <li <?php getActiveMenu('bookings'); ?>><a href="/administrator/bookings/">Bookings <?php $dbnum = countDbRow('bookings','book_status','pending'); if($dbnum !== 0){echo '<b style="padding:8px;background-color:red;border-radius:30%;color:white;">'.$dbnum.'</b>';} ?></a></li>
          <li <?php getActiveMenu('events'); ?>><a href="/administrator/events/">Events</a></li>
        <li <?php getActiveMenu('messages'); ?>><a href="/administrator/messages/">Messages <?php $dbnumsg = countDbRow('messages','message_status','unread'); if($dbnumsg !== 0){echo '<b style="padding:8px;background-color:red;border-radius:30%;color:white;">'.$dbnumsg.'</b>';} ?></a></li>
          <li <?php getActiveMenu('feedbacks'); ?>><a href="/administrator/feedbacks/">Feedbacks</a></li>
          <li <?php getActiveMenu('settings'); ?>><a href="/administrator/settings/">Settings</a></li>
          <li class="drop-down"><b><a style="font-weight:bold;font-size:15px;color:red" href="#"><?php echo $logedUser['username']; ?></a></b>
            <ul>
              <li><a href="/logout/">Logout</a></li>
            </ul>
          </li>
<?php }else{ ?>
        <li <?php getActiveMenu(''); ?>><a href="/">Home</a></li>
        <li <?php getActiveMenu('my-bookings'); ?>><a href="/my-bookings/">My Bookings</a></li>
        <li class="drop-down"><b><a style="font-weight:bold;font-size:15px;color:red" href="#"><?php echo $logedUser['username']; ?></a></b>
            <ul>
              <li><a href="/my-details/">Profile</a></li>
              <li><a href="/logout/">Logout</a></li>
            </ul>
        </li>
        <li <?php getActiveMenu('feedback'); ?>><a style="color:green" href="/feedback/">Feedback</a></li>
<?php } ?>
    </ul>
</nav><!-- .main-nav -->