<?php


    session_start();
    require_once '../classes/database.php';
    require_once '../controller/manageUsersController.php';

    if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_SESSION['id'])){

        if(isset($_POST['block']) && !empty($_POST['block'])){
            $getID = htmlspecialchars(trim($_POST['block']));
            if(!empty($getID)){

            }
        }
    }else{
        $_SESSION['alert'] = 'showAlert("error", "Invalid information!")';
        header('Location: ../view/admin/dashboard.php');
    }








?>