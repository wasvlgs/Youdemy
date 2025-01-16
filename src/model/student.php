<?php





    require_once 'user.php';




    class etudiant extends user{

        private $status;

        public function __construct($s,$id_user,$nom,$prenom,$email,$password,$type)
        {
            parent::__construct($id_user,$nom,$prenom,$email,$password,$type);
            $this->status = $s;
        }

        public function login($e,$p){
            $this->email = $e;
            $this->password = $p;

            
        }
    }