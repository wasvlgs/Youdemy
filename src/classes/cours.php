







<?php 


    require_once '../classes/database.php';


    class cours{

        private $id_cours;
        private $titre;
        private $desc;
        private $content;
        private $id_teacher;
        private $id_category;


        public function __construct($id_content,$titre,$desc,$content,$id_teacher,$id_category)
        {
            $this->id_cours = $id_category;
            $this->titre = $titre;
            $this->desc = $desc;
            $this->content = $content;
            $this->id_teacher = $id_teacher;
            $this->id_category = $id_category;
        }


        public static function getCours(){
            $conn = Database::getInstance()->getConnect();
            $getData = $conn->prepare("SELECT");
        }
    }








