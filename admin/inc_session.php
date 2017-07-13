<?php
session_start();
    include_once 'include/class.user.php';
    //include_once 'include/class.menu.php';
    //include_once 'include/class.article.php';
    $user = new User();
    //$menu = new Menu();
   // $article = new Article();


     $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:index.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:index.php");
    }
?>