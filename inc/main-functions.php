<?php
require_once('config.php');
require_once('functions/main.php');
require_once('functions/page-functions.php');
if(!$link){header("Location: /inc/install.php");}

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){$logedUser = '';}else{$logedUser = getUserLogedDetails();}

function get_header(){
    global $logedUser;
    include(ROOT_DIR.'theme/header.php');
}

function get_footer(){
    include(ROOT_DIR.'theme/footer.php');
    
}
function the_navigation(){
    global $logedUser;
    include(ROOT_DIR.'theme/navigation.php');
    
}
function get_fullurl(){
    $fulweburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    return $fulweburl;
}
function get_mainurl(){
    $fulweburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    return $fulweburl;
}

function get_title(){
    global $pagetitle,$filepage;
        if(isset($_GET['slug'])){
        if(in_array($_GET['slug'], $filepage)){
            echo $pagetitle[$_GET['slug']];
        }else{
            echo '404 Not Found';
        }
    }elseif(isset($_GET['adminslug'])){
        if(in_array($_GET['adminslug'], $filepage)){
            echo $pagetitle[$_GET['adminslug']];
        }else{
            echo '404 Not Found';
        }
    }elseif(isset($_GET['editevent'])){
        $events = getOptSingle('events','id',$_GET['editevent']);
        if($events){
            $events['event_name'];
        }else{
            echo '404 Not Found';
        }
    }else{
            echo getoptvalue('website_title');
    }
}

function getActiveMenu($link){
    if(isset($_GET['slug'])){
        if($_GET['slug'] == $link){
            echo 'class="active"';
        }
    }elseif(isset($_GET['adminslug'])){
        if($_GET['adminslug'] == $link){
            echo 'class="active"';
        }
    }
}
function adminRequireLogin($user){
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || $user !== 'administrator'){
        header("location: /login/");
        exit;
    }
}
function userRequireLogin(){
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: /login/");
        exit;
    }
}
function randString($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
    return $randomString; 
} 
