<?php



    require_once '../classes/database.php';



    abstract class user{

        protected $id_user;
        protected $nom;
        protected $prenom;
        protected $email;
        protected $password;
        protected $type;

        public function __construct($id_user,$nom,$prenom,$email,$password,$type)
        {
            $this->id_user = $id_user;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->password = $password;
            $this->type = $type;
        }

        abstract public function login($e,$p);

        public function signup($n,$p,$e,$pass,$t){
            $this->nom = $n;
            $this->prenom = $p;
            $this->email = $e;
            $this->password = $pass;
            $this->type = $t;
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

    }