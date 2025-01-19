<?php

    session_start();

    abstract class user{

        protected $id_user;
        protected $nom;
        protected $prenom;
        protected $email;
        protected $password;
        protected $type;
        protected $status;

        public function __construct($status,$id_user,$nom,$prenom,$email,$password,$type)
        {
            $this->id_user = $id_user;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->password = $password;
            $this->type = $type;
            $this->status = $status;
        }



        public static function login($e,$p,$conn){

            $checkEmail = $conn->prepare("SELECT * FROM users INNER JOIN role ON users.role = role.id_role WHERE email = :email");
            $checkEmail->bindParam(":email",$e);
            if($checkEmail->execute() && $checkEmail->rowCount() === 1){
                $getUser = $checkEmail->fetch(PDO::FETCH_ASSOC);
                if(password_verify($p, $getUser['password'])){
                    
                    if($getUser['statut'] === 'active'){
                        $_SESSION['id'] = $getUser['id_user'];
                        $_SESSION['role'] = $getUser['id_role'];
                        if($_SESSION['role'] == 3){
                            header('Location: ../view/catalogue.php');
                        }else if($_SESSION['role'] == 2){
                            header('Location: ../view/teacher/dashboard.php');
                        }else if($_SESSION['role'] == 1){
                            header('Location: ../view/admin/dashboard.php');
                        }else{
                            unset($_SESSION['id']);
                            unset($_SESSION['role']);
                            $_SESSION['logError'] = 'Error try again!';
                            header('Location: ../view/login/login.php');
                        }
                        
                    }else if($getUser['statut'] === 'pending'){
                        $_SESSION['logError'] = 'This account has been not confirmed yet!';
                        header('Location: ../view/login/login.php');
                    }else if($getUser['statut'] === 'block'){
                        $_SESSION['logError'] = 'This account is banned!';
                        header('Location: ../view/login/login.php');
                    }else{
                        $_SESSION['logError'] = 'Error try again!';
                        header('Location: ../view/login/login.php');
                    }
                }else{
                    $_SESSION['logError'] = 'Invalid password!';
                    header('Location: ../view/login/login.php');
                }
            }else{
                $_SESSION['logError'] = 'Invalid information!';
                header('Location: ../view/login/login.php');
            }

        }


        public function getID(){
            return $this->id_user;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getPrenom(){
            return $this->prenom;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getType(){
            return $this->type;
        }



        public function signup($r,$conn){

            $getPass = password_hash($this->password, PASSWORD_DEFAULT);

            $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = :getEmail");
            $checkEmail->bindParam(":getEmail",$this->email,PDO::PARAM_STR);
            if($checkEmail->execute() && $checkEmail->rowCount() === 0){
                $addUser = $conn->prepare("INSERT INTO users(id_user,nom,prenom,email,password,role,statut)
                VALUES(:getID,:getLName, :getFName, :getEmail, :getPass, :getRole, :getStatus)");
               $addUser->bindParam(":getID",$this->id_user,PDO::PARAM_INT);
               $addUser->bindParam(":getLName",$this->nom,PDO::PARAM_STR);
               $addUser->bindParam(":getFName",$this->prenom,PDO::PARAM_STR);
               $addUser->bindParam(":getEmail",$this->email,PDO::PARAM_STR);
               $addUser->bindParam(":getPass",$getPass,PDO::PARAM_STR);
               $addUser->bindParam(":getRole",$this->type,PDO::PARAM_INT);
               $addUser->bindParam(":getStatus",$this->status,PDO::PARAM_STR);
               if ($addUser->execute()) {
                $_SESSION['id'] = $conn->lastInsertId();
                $_SESSION['role'] = $this->type;
                if ($r === 'teacher') {
                    $_SESSION['success'] = 'Your account has been created, wait for verification!';
                    header('Location: ../view/teacher/dashboard.php');
                } else if ($r === 'student') {
                    header('Location: ../view/catalogue.php');
                } else {
                    header('Location: ../view/login/login.php');
                }
            } else {
                $_SESSION['Error'] = 'Failed to sign up, try again later!';
                header('Location: ../view/login/login.php');
            }            
            }else{
                $_SESSION['Error'] = 'This email already exict!';
                header('Location: ../view/login/login.php');
            }

            
        }
    }