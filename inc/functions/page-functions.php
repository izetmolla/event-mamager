<?php

$sucsesMessage = '';

/**************************************************
*********  Book Functions** ******************
**************************************************/
function insertBooking($userid,$capacity,$bookdate,$bookeventid){
    global $link;
    $sql = "INSERT INTO bookings (book_user_id, book_event_capacity, book_event_date, book_event_id, book_status)
    VALUES ('$userid', '$capacity', '$bookdate', '$bookeventid', 'pending')";
    if ($link->query($sql) === TRUE) {
    $last_id = $link->insert_id;
    header("Location: /book.php?BookID=$last_id");
    }
}
function getBookNow($id,$capacity,$date,$content){
    global $link;
    $sql = "UPDATE bookings SET book_prices='$content',book_event_capacity='$capacity', book_event_date='$date',book_status='pending' WHERE id='$id'";
    if ($link->query($sql) === TRUE) {
        header("Location: /my-bookings/");
    } 
}

function getMyBookingsList($id){
    global $link;
    $sql = "SELECT * FROM bookings WHERE book_user_id='$id' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset; 
}

function getBookingsList(){
    global $link;
    $sql = "SELECT * FROM bookings ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset; 
}

/**************************************************
*********  Events Functions** ******************
**************************************************/
function insertEvent($name,$capacity,$description,$image){
    global $link;
    $sql = "INSERT INTO events (event_name, event_capacity, event_description, event_image)
    VALUES ('$name', '$capacity', '$description', '$image')";
    if ($link->query($sql) === TRUE) {
    $last_id = $link->insert_id;
    header("Location: /administrator/edit-event/$last_id/");
    }
}
function insertProduct($productname,$id){
    global $link;
    $sql = "INSERT INTO products (product_name, product_event_id, product_type)
    VALUES ('$productname', '$id', 'product')";
    if ($link->query($sql) === TRUE) {
    $last_id = $link->insert_id;
    header("Location: /administrator/edit-event/$id/");
    }
}
function insertPackage($packagename,$packageprice,$id,$location){
    global $link;
    $sql = "INSERT INTO products (product_name, product_package_price, product_package_id, product_type)
    VALUES ('$packagename', '$packageprice', '$id', 'product_package')";
    if ($link->query($sql) === TRUE) {
    $last_id = $link->insert_id;
    header("Location: /$location/");
    }
}
function updateEvent($event_name,$event_capacity,$event_description,$id){
    global $link;
    $sql = "UPDATE events SET event_name='$event_name', event_capacity='$event_capacity', event_description='$event_description'  WHERE id='$id'";
    if ($link->query($sql) === TRUE) {
        header("Location: /administrator/edit-event/$id/");
    }
}
function getProductsList($name,$event_id,$product_type){
    global $link;
    $sql = "SELECT * FROM products WHERE $name='$event_id' AND product_type='$product_type' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset; 
}
function getBookingEventList(){
    global $link;
    $sql = "SELECT * FROM events ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset; 
}

/**************************************************
*********  Feedbacks Functions** ******************
**************************************************/
function insertFeedback($message){
    global $link;
    $user = $_SESSION['id'];
    $sql = "INSERT INTO feedbacks (feedback_user, feedback_message)
    VALUES ('$user', '$message')";
    if ($link->query($sql) === TRUE) {
        header("Location: /feedback/?opt=sucsess");
    }
}
function getFeedbacksList(){
    global $link;
}
function getFeedbackList(){
    global $link;
    $sql = "SELECT * FROM feedbacks";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}





/**************************************************
*********  Settings Functions** ******************
**************************************************/
function updateSettings($table,$value){
    global $link;
    $sql = "UPDATE settings SET opt_value='$value' WHERE opt_name='$table'";
    if ($link->query($sql) === TRUE) {
        header("Location: /administrator/settings/");
    }
}

/**************************************************
*********  Messages Functions** ******************
**************************************************/
function insertMessage($message_email,$message_subject,$message_name,$message,$message_status,$location){
    global $link;
    $sql = "INSERT INTO messages (message_email, message_subject, message_name, message, message_status)
    VALUES ('$message_email', '$message_subject', '$message_name', '$message', '$message_status')";
    if ($link->query($sql) === TRUE) {
        header("Location: $location");
    }
}

function getMessageList(){
    global $link;
    $sql = "SELECT * FROM messages";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}
