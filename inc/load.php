<?php 
        session_start();
        require_once('main-functions.php');
    if(isset($_GET['slug'])){
        if(in_array($_GET['slug'], $filepage)){
            include(ROOT_DIR.'theme/pages/'. $_GET['slug'] . '.php');
        }else{
            include(ROOT_DIR.'404.php');
        }
    }elseif(isset($_GET['adminslug'])){
        if(in_array($_GET['adminslug'], $filepage)){
            include(ROOT_DIR.'theme/pages/administrator/'. $_GET['adminslug'] . '.php');
        }else{
            include(ROOT_DIR.'404.php');
        }
    }elseif(isset($_GET['editevent'])){
        $events = getOptSingle('events','id',$_GET['editevent']);
        if($events){
            include(ROOT_DIR.'theme/pages/administrator/edit-event.php');
        }else{
            include(ROOT_DIR.'404.php');
        }
    }else{
            include(ROOT_DIR.'theme/index.php');
    }
?>