<?php



    require_once '../classes/user.php';



    if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['loginSubmit'])){



        $getEmail = htmlspecialchars(trim($_POST['getEmail']));
        $getPass = htmlspecialchars(trim($_POST['getPass']));

        if(!empty($getEmail) && !empty($getPass)){
            user::login($getEmail,$getPass);
        }else{
            session_start();
            $_SESSION['logError'] = "Ivalid information";
            header("Location: ../view/login/login.php");
        }
    }