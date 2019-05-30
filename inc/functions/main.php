<?php 


/**************************************************
*********  Start Pages Declarate ******************
**************************************************/
    $filepage = array(
        "login",
        "register",
        "logout",
        "settings",
        "bookings",
        "events",
        "feedbacks",
        "feedback",
        "my-details",
        "my-bookings",
        "new-event",
        "administrator",
        "messages"
    );
    $pagetitle = array(
        "login"=>"Login",
        "register"=>"Register",
        "register"=>"Register",
        "bookings"=>"Bookings",
        "events"=>"Events",
        "feedbacks"=>"Feedbacks",
        "new-event"=>"Add New Event",
        "my-details"=>"My Details",
        "feedback"=>"Feedbacks",
        "settings"=>"Settings",
        "my-bookings"=>"My Bookings",
        "messages"=>"Mesages",
    );
/**************************************************
************ END Pages Declarate ******************
**************************************************/
function getUserLogedDetails(){
    global $link;
    $id = $_SESSION['id'];;
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($link, $sql);
    // fetch query results as associative array.
    $usersession = mysqli_fetch_assoc($result);
    return $usersession;
}
function getoptvalue($name){
    global $link;
    $sql = "SELECT opt_value FROM settings WHERE opt_name='$name'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row['opt_value'];
        }
    } 
}
function displayOpt($db,$valname,$valvalue,$val){
    global $link;
    $sql = "SELECT $val FROM $db WHERE $valname='$valvalue'";
    $result = $link->query($sql);
        while($row = $result->fetch_assoc()) {
            return $row[$val];
        }    
}
function displayOptList($db){
    global $link;
    $sql = "SELECT * FROM $db ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}
function getOptSingle($db,$valname,$valvalue){
    global $link;
    $sql = "SELECT * FROM $db WHERE $valname='$valvalue'";
    $result = mysqli_query($link, $sql);
    // fetch query results as associative array.
    $usersession = mysqli_fetch_assoc($result);
    return $usersession;
}

function deleteOpt($db,$valname,$valvalue,$location){
    global $link;
    $sql = "DELETE FROM $db WHERE $valname='$valvalue'";
    if ($link->query($sql) === TRUE) {
        header("Location: /$location/");
    }
}

function updateOpt($db,$table,$var,$id,$location){
    global $link;
    $sql = "UPDATE $db SET $table='$var' WHERE id='$id'";
    if ($link->query($sql) === TRUE) {
        header("Location: /$location/");
    }
}
function countDbRows($db,$namea,$namevara,$nameb,$namevarb){
    global $link;
	$sql = "SELECT * FROM $db WHERE $namea='$namevara' AND $nameb='$namevarb'";
    $count = mysqli_num_rows(mysqli_query($link, $sql));
    return $count;
}

function countDbRow($db,$namea,$namevara){
    global $link;
	$sql = "SELECT * FROM $db WHERE $namea='$namevara'";
    $count = mysqli_num_rows(mysqli_query($link, $sql));
    return $count;
}













function uploadImage($id,$location){
    global $link;
    $str = randString(10);
    $currentDir = getcwd();
    $uploadDirectory = "/theme/uploads/";
    $errors = []; // Store all foreseen and unforseen errors here
    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
    $fileName = $str.'-'.$_FILES['myfile']['name'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if ($didUpload) {
                $sql = "UPDATE events SET event_image='$fileName' WHERE id='$id'";
                if ($link->query($sql) === TRUE) {
                    header("Location: /$location/$id/");
                }
                
                
                
                
                echo "The file " . basename($fileName) . " has been uploaded";
            }
        }
}

