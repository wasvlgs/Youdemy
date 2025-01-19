<?php

    
    session_start();

    require_once 'user.php';




    class prof extends user{



        public function __construct($status,$id_user,$nom,$prenom,$email,$password,$type)
        {
            parent::__construct($status,$id_user,$nom,$prenom,$email,$password,$type);
        }


        public static function getBestTeacher($conn){
            $getBestTeacher = $conn->prepare("SELECT cours.id_user,nom,prenom, COUNT(DISTINCT users.id_user) AS total FROM users INNER JOIN mycours ON users.id_user = mycours.id_user INNER JOIN cours ON cours.id_cours = mycours.id_cours ORDER BY total DESC LIMIT 1");
            if($getBestTeacher->execute()){
                return $getBestTeacher->fetch(PDO::FETCH_ASSOC);
            }else{
                return null;
            }
        }
        
    }