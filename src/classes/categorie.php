<?php




    require_once 'database.php';

    class categorie{

        private $id_categorie;
        private $name;


        public function __construct($id,$name)
        {
            $this->id_categorie = $id;
            $this->name = $name;
        }


        public static function getCategories(){
            $conn = Database::getInstance()->getConnect();
            $getData = $conn->prepare("SELECT * FROM categorie");
            if($getData->execute()){
                return $getData;
            }else{
                return null;
            }
        }
    }